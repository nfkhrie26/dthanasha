<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dthanasha Kost')</title>
    
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    @vite('resources/css/app.css')
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #F8FAFC; }
        .sidebar-link:hover { background-color: rgba(255,255,255,0.1); }
        .active-link { background-color: #334155; color: white !important; }
        .card-shadow { box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03); }
        .no-scrollbar::-webkit-scrollbar { display: none; }
        @yield('extra_css')
    </style>
</head>
<body class="flex min-h-screen text-zinc-800">

    @include('components.penghuni_sidebar')

    <main class="flex-1 ml-64 p-8">
        <!-- Header Penghuni -->
        <header class="flex items-center justify-between mb-10 pb-4 border-b border-zinc-200">
            @hasSection('search_input')
                @yield('search_input')
            @else
                <div class="text-zinc-400 text-sm font-medium uppercase tracking-widest">
                    @yield('header_title', 'Sisi Penghuni')
                </div>
            @endif
            
            <div class="flex items-center gap-4">
                <div class="text-right">
                    <p class="text-sm font-bold text-zinc-900 uppercase">Kamar 100</p>
                    <p class="text-xs text-zinc-500 uppercase tracking-widest">Misael Feodora</p>
                </div>
                <div class="w-10 h-10 rounded-lg bg-[#334155] flex items-center justify-center text-white font-bold border border-zinc-700">MF</div>
            </div>
        </header>

        @yield('content')
    </main>

    @yield('scripts')
</body>
</html>