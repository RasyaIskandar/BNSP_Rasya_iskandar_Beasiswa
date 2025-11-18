<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Beasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">

    <div class="max-w-7xl mx-auto p-6">

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <div class="bg-blue-600 text-white p-6 rounded-lg shadow">

                <div>
                    <h1 class="text-2xl font-bold">Daftar Beasiswa</h1>
                    <p class="mt-2 text-sm text-blue-100">
                        Pilih beasiswa yang ingin kamu daftar.
                    </p>
                </div>

                <ul class="mt-6 space-y-3">
                    @foreach ($beasiswa as $b)
                        <li class="bg-white text-gray-800 p-4 rounded-lg shadow-sm border hover:shadow transition">
                            <p class="font-semibold text-blue-600">{{ $b->nama }}</p>
                            <p class="text-sm mt-1">IPK Minimal: <span class="font-medium">{{ $b->ipk }}</span></p>
                            <p class="text-xs text-gray-600 mt-1">{{ $b->deskripsi }}</p>

                            <a href="{{ route('beasiswa.create') }}?beasiswa_id={{ $b->id }}"
                               class="block mt-3 text-center bg-blue-600 text-white py-2 rounded hover:bg-blue-700 text-sm">
                                Daftar
                            </a>
                        </li>
                    @endforeach
                </ul>

                <a href="{{ route('beasiswa.list') }}"
                   class="block mt-6 text-center bg-white text-blue-600 font-semibold py-2 rounded border hover:bg-gray-100 text-sm">
                    Lihat Pengajuan
                </a>
            </div>

            <div class="lg:col-span-2 space-y-6">

                <div class="bg-white border rounded-lg p-6 shadow-sm">
                    <h2 class="text-xl font-bold text-gray-800">Informasi Beasiswa</h2>

                    <p class="text-gray-700 text-sm mt-3 leading-relaxed">
                        Setiap beasiswa memiliki ketentuan dan minimal IPK yang berbeda. 
                        Pastikan kamu membaca detailnya sebelum mendaftar.
                    </p>

                    <p class="text-gray-700 text-sm mt-4 pt-4 border-t leading-relaxed">
                        Pendaftaran dilakukan secara online dan bisa dipantau melalui halaman pengajuan.
                        IPK di bawah <span class="font-semibold text-red-600">3.00</span> akan otomatis dianggap tidak memenuhi syarat.
                    </p>
                </div>

                <div class="grid md:grid-cols-2 gap-6">

                    <div class="bg-yellow-50 p-6 rounded-lg border shadow-sm">
                        <h3 class="text-lg font-semibold text-gray-800">Syarat Umum</h3>
                        <p class="text-sm text-gray-700 mt-3 leading-relaxed">
                            Mahasiswa aktif minimal semester 2, memiliki IPK sesuai syarat, dan berkas harus dalam format PDF.
                        </p>
                    </div>

                    <div class="bg-orange-50 p-6 rounded-lg border shadow-sm">
                        <h3 class="text-lg font-semibold text-gray-800">Periode Pendaftaran</h3>
                        <p class="text-sm text-gray-700 mt-3 leading-relaxed">
                            Pendaftaran dibuka di awal semester dan ditutup jika kuota terpenuhi.
                        </p>
                    </div>

                </div>

            </div>
        </div>
    </div>

</body>
</html>
