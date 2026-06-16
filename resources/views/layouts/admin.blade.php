<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Riyana Travel</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

<div class="flex min-h-screen">

    <!-- Sidebar -->
    <aside class="w-72 bg-slate-900 text-white flex flex-col">

        <div class="p-6 border-b border-slate-700">
            <h1 class="text-3xl font-bold">
                Riyana Travel
            </h1>

            <p class="text-sm text-slate-400 mt-1">
                Admin Panel
            </p>
        </div>

        <nav class="flex-1 p-4 space-y-2">

            <!-- Dashboard -->
            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800">
                Dashboard
            </a>

            <!-- Kategori -->
            <a href="{{ route('admin.kategori.index') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800">
                Kategori
            </a>

            <!-- Produk -->
            <a href="{{ route('admin.produk.index') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800">
                Produk Umroh Dan Haji
            </a>

        </nav>

        <div class="p-4 border-t border-slate-700">

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button class="w-full px-4 py-3 rounded-lg bg-red-600 hover:bg-red-700">
                    Logout
                </button>

            </form>

        </div>

    </aside>

    <!-- Content -->
    <main class="flex-1">

        <header class="bg-white shadow-sm px-8 py-5">

            <div class="flex justify-between items-center">

                <div>
                    <h2 class="text-2xl font-semibold">
                        @yield('title')
                    </h2>
                </div>

                <div class="text-right">
                    <p class="font-medium">
                        {{ auth()->user()->name }}
                    </p>

                    <p class="text-sm text-gray-500">
                        {{ auth()->user()->email }}
                    </p>
                </div>

            </div>

        </header>

        <div class="p-8">
            @yield('content')
        </div>

    </main>

</div>

</body>
</html>