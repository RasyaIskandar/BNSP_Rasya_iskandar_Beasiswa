<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use App\Models\Mahasiswa;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class BeasiswaController extends Controller
{
    // halaman awal yang nampilin semua beasiswa
    public function index()
    {
        $beasiswa = Beasiswa::all(); 
        // nge-get semua data beasiswa dari database

        return view('beasiswa.index', compact('beasiswa'));
    }

    // halaman list semua pendaftaran (kayak overview)
    public function list()
    {
        // ambil semua data pendaftaran + mahasiswa + beasiswanya biar lengkap
        $pendaftaran = Pendaftaran::with(['mahasiswa','beasiswa'])->get();

        return view('beasiswa.list', compact('pendaftaran'));
    }

    // nampilin form daftar beasiswa
    public function create(Request $request)
    {
        $beasiswa = Beasiswa::all(); 
        // ini buat dropdown beasiswa

        $selected = $request->beasiswa_id ?? null;
        // kalau user nge-klik daftar dari sidebar, otomatis ke-select

        // generate IPK random 
        $ipkRandom = number_format(mt_rand(250, 400) / 100, 2);

        return view('beasiswa.create', compact('beasiswa', 'selected', 'ipkRandom'));
    }

    // proses submit form pendaftaran
    public function store(Request $request)
    {
        // generate IPK random lagi buat data yang disimpen
        $ipkRandom = number_format(mt_rand(250, 400) / 100, 2);

        // validasi input form
        $data = $request->validate([
            'nama'        => 'required|string|max:255',
            'email'       => 'required|email|max:255',
            'no_hp'       => 'required|string|max:20',
            'semester'    => 'required|integer|min:1|max:14',
            'beasiswa_id' => 'required|exists:beasiswa,id',
            'berkas'      => 'required|file|mimes:pdf|max:2048',
        ]);

        // upload file ke storage/public/berkas
        $filePath = $request->file('berkas')->store('berkas', 'public');
        $fileName = basename($filePath);

        // masukin data mahasiswa dulu
        $mahasiswa = Mahasiswa::create([
            'nama'     => $data['nama'],
            'email'    => $data['email'],
            'no_hp'    => $data['no_hp'],
            'semester' => $data['semester'],
            'ipk'      => $ipkRandom
        ]);

        // bikin record pendaftaran baru lewat relasi mahasiswa
        $pendaftaran = $mahasiswa->pendaftaran()->create([
            'beasiswa_id' => $data['beasiswa_id'], // user pilih beasiswa apa
            'berkas_path' => $filePath,            // lokasi file
            'berkas'      => $fileName,            // nama file aslinya
            'status'      => 'belum di verifikasi',              // langsung kasih status "belum di verifikasi"
            'catatan'     => null,
        ]);

        // habis daftar, user dilempar ke halaman detail pengajuan
        return redirect() ->route('beasiswa.show', $pendaftaran->id)->with('success', 'Pendaftaran berhasil!');
    }

    // detail 1 pengajuan beasiswa
    public function show($id)
    {
        // nyari data pengajuan + data mahasiswa + data beasiswa
        $pendaftaran = Pendaftaran::with(['mahasiswa','beasiswa'])->findOrFail($id);

        return view('beasiswa.show', compact('pendaftaran'));
    }
}
