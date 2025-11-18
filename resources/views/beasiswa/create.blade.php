<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pengajuan Beasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen p-6">

    <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg border border-gray-200 shadow-sm">

        <h1 class="text-2xl font-bold text-gray-900 mb-2">Form Pengajuan Beasiswa</h1>
        <p class="text-gray-600 mb-6">Isi data dengan benar sebelum mengirim pengajuan.</p>

        <form action="{{ route('beasiswa.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf

            <div>
                <label class="block font-medium text-gray-800 mb-1">Nama Mahasiswa</label>
                <input type="text" name="nama" value="{{ old('nama') }}"
                    class="w-full p-3 border rounded-md focus:ring focus:ring-blue-300 outline-none"
                    placeholder="Nama lengkap">
            </div>

            <div>
                <label class="block font-medium text-gray-800 mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                    class="w-full p-3 border rounded-md focus:ring focus:ring-blue-300 outline-none"
                    placeholder="email@example.com">
            </div>

            <div>
                <label class="block font-medium text-gray-800 mb-1">No. HP</label>
                <input type="number" name="no_hp" value="{{ old('no_hp') }}"
                    class="w-full p-3 border rounded-md focus:ring focus:ring-blue-300 outline-none"
                    placeholder="Contoh: 08123456789">
            </div>

            <div>
    <label class="block font-medium text-gray-800 mb-1">Semester</label>
    <select name="semester"
        class="w-full p-3 border rounded-md focus:ring focus:ring-blue-300 outline-none">

        <option value="" disabled selected>Pilih Semester</option>

        @for ($i = 2; $i <= 8; $i++)
            <option value="{{ $i }}" {{ old('semester') == $i ? 'selected' : '' }}>
                Semester {{ $i }}
            </option>
        @endfor

    </select>
    </div>


            <div>
                <label class="block font-medium text-gray-800 mb-1">IPK Terakhir</label>

                <input type="text" value="{{ $ipkRandom }}" disabled
                       class="w-full p-3 border rounded-md bg-gray-100 text-gray-700">

                <input type="hidden" name="ipk" value="{{ $ipkRandom }}">

                <p class="text-sm mt-1 {{ $ipkRandom < 3 ? 'text-red-600' : 'text-green-600' }}">
                    {{ $ipkRandom < 3 ? 'IPK di bawah 3.0. Tidak memenuhi syarat.' : 'IPK memenuhi syarat.' }}
                </p>
            </div>

            <div>
                <label class="block font-medium text-gray-800 mb-1">Pilih Beasiswa</label>

                <select name="beasiswa_id"
                    class="w-full p-3 border rounded-md focus:ring focus:ring-blue-300 outline-none
                    {{ $ipkRandom < 3 ? 'bg-gray-100 cursor-not-allowed' : '' }}"
                    {{ $ipkRandom < 3 ? 'disabled' : '' }}>
                    @foreach ($beasiswa as $b)
                        <option value="{{ $b->id }}" @selected($selected == $b->id)>
                            {{ $b->nama }} (Min IPK: {{ $b->ipk }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block font-medium text-gray-800 mb-1">Upload Berkas (PDF)</label>

                <input type="file" name="berkas"
                    class="w-full p-3 border rounded-md bg-white {{ $ipkRandom < 3 ? 'bg-gray-100 cursor-not-allowed' : '' }}"
                    {{ $ipkRandom < 3 ? 'disabled' : '' }}>
            </div>

            <button type="submit"
                class="w-full py-3 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 transition
                {{ $ipkRandom < 3 ? 'opacity-50 cursor-not-allowed' : '' }}"
                {{ $ipkRandom < 3 ? 'disabled' : '' }}>
                Kirim Pengajuan
            </button>

        </form>

        <a href="{{ route('beasiswa.index') }}"
           class="block text-center mt-6 text-blue-600 hover:underline">
            Kembali ke halaman utama
        </a>

    </div>

</body>
</html>
