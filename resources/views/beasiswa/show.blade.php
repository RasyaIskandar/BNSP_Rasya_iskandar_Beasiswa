<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengajuan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen p-6">

    <div class="max-w-2xl mx-auto">

        <h1 class="text-2xl font-semibold text-gray-900 mb-5">
            Detail Pengajuan
        </h1>

        <div class="bg-white border rounded-lg p-6 space-y-6">

            <div class="pb-4 border-b">
                <h2 class="text-lg font-semibold text-gray-800 mb-3">Data Mahasiswa</h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                    <div>
                        <p class="text-gray-500">Nama</p>
                        <p class="text-gray-800">{{ $pendaftaran->mahasiswa->nama }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500">Email</p>
                        <p class="text-gray-800">{{ $pendaftaran->mahasiswa->email }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500">No HP</p>
                        <p class="text-gray-800">{{ $pendaftaran->mahasiswa->no_hp }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500">Semester</p>
                        <p class="text-gray-800">{{ $pendaftaran->mahasiswa->semester }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500">IPK</p>
                        <p class="font-semibold {{ $pendaftaran->mahasiswa->ipk < 3 ? 'text-red-600' : 'text-green-600' }}">
                            {{ $pendaftaran->mahasiswa->ipk }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="pb-4 border-b">
                <h2 class="text-lg font-semibold text-gray-800 mb-3">Beasiswa</h2>

                <div class="space-y-2 text-sm">
                    <div>
                        <p class="text-gray-500">Jenis</p>
                        <p class="text-gray-800">{{ $pendaftaran->beasiswa->nama }}</p>
                    </div>

                    <div>
                        <p class="text-gray-500">Deskripsi</p>
                        <p class="text-gray-700">{{ $pendaftaran->beasiswa->deskripsi }}</p>
                    </div>

                    <div>
                        <p class="text-gray-500">Minimal IPK</p>
                        <p class="text-gray-800 font-medium">{{ $pendaftaran->beasiswa->ipk }}</p>
                    </div>
                </div>
            </div>

            <div>
                <h2 class="text-lg font-semibold text-gray-800 mb-3">Status & Berkas</h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                    <div>
                        <p class="text-gray-500">Status</p>
                        <span class="inline-block px-3 py-1 rounded text-sm font-medium
                            {{ $pendaftaran->status == 'belum di verifikasi' 
                                ? 'bg-yellow-100 text-yellow-800' 
                                : 'bg-green-100 text-green-800' }}">
                            {{ $pendaftaran->status }}
                        </span>
                    </div>

                    <div>
                        <p class="text-gray-500">Berkas</p>
                        <a href="{{ asset('storage/' . $pendaftaran->berkas_path) }}" 
                           target="_blank" 
                           class="text-blue-600 hover:underline">
                            Lihat Berkas
                        </a>
                    </div>
                </div>
            </div>

        </div>

        <div class="mt-5">
            <a href="{{ route('beasiswa.list') }}"
               class="px-4 py-2 bg-white border rounded-md text-gray-700 text-sm hover:bg-gray-200 transition">
                Kembali
            </a>
        </div>

    </div>

</body>
</html>
