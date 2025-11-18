<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Pendaftaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen p-6">

    <div class="max-w-5xl mx-auto">

        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-gray-800">List Pendaftaran Beasiswa</h1>

            <a href="{{ route('beasiswa.index') }}"
               class="px-4 py-2 text-sm bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition">
                Kembali
            </a>
        </div>

        <!-- Table -->
        <div class="bg-white rounded-lg shadow border border-gray-200 overflow-hidden">

            <table class="w-full text-sm">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="py-3 px-4 text-left">Nama</th>
                        <th class="py-3 px-4 text-left">Email</th>
                        <th class="py-3 px-4 text-left">Beasiswa</th>
                        <th class="py-3 px-4 text-left">IPK</th>
                        <th class="py-3 px-4 text-left">Status</th>
                        <th class="py-3 px-4"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($pendaftaran as $p)
                        <tr class="border-t hover:bg-gray-50">

                            <td class="py-3 px-4 text-gray-800">
                                {{ $p->mahasiswa->nama }}
                            </td>

                            <td class="py-3 px-4 text-gray-600">
                                {{ $p->mahasiswa->email }}
                            </td>

                            <td class="py-3 px-4 text-gray-600">
                                {{ $p->beasiswa->nama }}
                            </td>

                            <td class="py-3 px-4 font-semibold
                                {{ $p->mahasiswa->ipk < 3 ? 'text-red-600' : 'text-green-600' }}">
                                {{ $p->mahasiswa->ipk }}
                            </td>

                            <td class="py-3 px-4">
                                <span class="px-2 py-1 rounded text-xs font-medium
                                    @if($p->status === 'Verif')
                                        bg-green-100 text-green-700
                                    @else
                                        bg-red-100 text-red-700
                                    @endif">
                                    {{ $p->status }}
                                </span>
                            </td>

                            <td class="py-3 px-4 text-right">
                                <a href="{{ route('beasiswa.show', $p->id) }}"
                                   class="text-blue-600 hover:text-blue-800 font-medium">
                                    Detail
                                </a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>

</body>
</html>
