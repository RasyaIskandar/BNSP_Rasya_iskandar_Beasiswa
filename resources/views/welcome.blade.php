<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Pendaftaran Beasiswa</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">
    <header class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <a href="/" class="text-xl font-bold text-blue-600">Beasiswa Kampus</a>

            @if (Route::has('login'))
                <nav class="flex items-center space-x-4 text-sm">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="hover:text-blue-600">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="hover:text-blue-600">Masuk</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                               class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                                Daftar
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </div>
    </header>

    <main class="flex-1 flex items-center justify-center px-6 py-16">
        <div class="max-w-3xl text-center bg-white p-10 rounded-xl shadow-md border border-gray-200">

            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                Sistem Pendaftaran Beasiswa
            </h1>

            <div class="flex justify-center">
                <a href="{{ route('beasiswa.index') }}"
                    class="px-8 py-3 bg-blue-600 text-white rounded-lg text-lg font-medium hover:bg-blue-700 transition">
                    Beranda
                </a>
            </div>
        </div>
    </main>

</body>
</html>
