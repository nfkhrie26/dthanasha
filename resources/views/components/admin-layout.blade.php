<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title bisa dinamis lewat props, kalau gak diisi default-nya Dthanasha Kost -->
    <title>{{ $title ?? 'Admin - Dthanasha Kost' }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #F8FAFC; }
        .sidebar-link:hover { background-color: rgba(255,255,255,0.05); }
        .active-link { background-color: #334155; color: white !important; }
        .card-shadow { box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03); }
        .no-scrollbar::-webkit-scrollbar { display: none; }
    </style>
</head>
<body class="flex min-h-screen text-zinc-800">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-[#18181B] text-zinc-400 flex flex-col fixed h-full z-50">
        <div class="p-6 border-b border-zinc-800">
            <h2 class="text-white text-xl font-bold tracking-tight uppercase">Dthanasha <span class="text-white">Kost</span></h2>
            <p class="text-[10px] text-zinc-500 tracking-[0.2em] mt-1 uppercase">Pemilik Kost</p>
        </div>
        
       <nav class="flex-1 px-4 py-6 space-y-1">
            
            <!-- Dashboard -->
            <a href="{{ route('admin.dashboard') }}" class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-lg text-sm transition-all {{ request()->routeIs('admin.dashboard') ? 'active-link font-semibold' : 'font-medium hover:text-white' }}">
                <i class="ph ph-squares-four text-lg {{ request()->routeIs('admin.dashboard') ? 'text-white' : '' }}"></i> Dashboard
            </a>
            
            <!-- Data Penghuni -->
            <a href="{{ route('admin.data-penghuni') }}" class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-lg text-sm transition-all {{ request()->routeIs('admin.data-penghuni') ? 'active-link font-semibold' : 'font-medium hover:text-white' }}">
                <i class="ph ph-users text-lg {{ request()->routeIs('admin.data-penghuni') ? 'text-white' : '' }}"></i> Data Penghuni
            </a>
            
            <!-- Waiting List -->
            <a href="{{ route('admin.waiting-list') }}" class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-lg text-sm transition-all {{ request()->routeIs('admin.waiting-list') ? 'active-link font-semibold' : 'font-medium hover:text-white' }}">
                <i class="ph ph-clock text-lg {{ request()->routeIs('admin.waiting-list') ? 'text-white' : '' }}"></i> Waiting List
            </a>
            
            <!-- Manajemen Kamar -->
            <a href="{{ route('admin.manajemen-kamar') }}" class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-lg text-sm transition-all {{ request()->routeIs('admin.manajemen-kamar') ? 'active-link font-semibold' : 'font-medium hover:text-white' }}">
                <i class="ph ph-door text-lg {{ request()->routeIs('admin.manajemen-kamar') ? 'text-white' : '' }}"></i> Manajemen Kamar
            </a>
            
            <!-- Pembayaran -->
            <a href="{{ route('admin.pembayaran') }}" class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-lg text-sm transition-all {{ request()->routeIs('admin.pembayaran') ? 'active-link font-semibold' : 'font-medium hover:text-white' }}">
                <i class="ph ph-receipt text-lg {{ request()->routeIs('admin.pembayaran') ? 'text-white' : '' }}"></i> Pembayaran
            </a>
            
            <!-- Riwayat -->
            <a href="{{ route('admin.riwayat') }}" class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-lg text-sm transition-all {{ request()->routeIs('admin.riwayat') ? 'active-link font-semibold' : 'font-medium hover:text-white' }}">
                <i class="ph ph-clock-counter-clockwise text-lg {{ request()->routeIs('admin.riwayat') ? 'text-white' : '' }}"></i> Riwayat
            </a>

        </nav>

        <div class="p-4 border-t border-zinc-800">
            <form action="{{ url('/logout') }}" method="POST">
                @csrf
                <button class="flex items-center gap-3 px-4 py-3 w-full text-left text-sm font-medium hover:text-red-400 transition-all uppercase tracking-wider">
                    <i class="ph ph-sign-out text-lg"></i> Keluar
                </button>
            </form>
        </div>
    </aside>

    <!-- MAIN CONTENT AREA -->
    <main class="flex-1 ml-64 p-8">
        
        <!-- HEADER PENCARIAN (Global buat semua halaman admin) -->
        <header class="flex items-center justify-between mb-10 pb-4 border-b border-zinc-200">
            <div class="relative w-96">
                <i class="ph ph-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-zinc-400 text-lg"></i>
                <input type="text" placeholder="Cari data..." class="w-full pl-12 pr-4 py-2.5 rounded-xl border border-zinc-200 focus:outline-none focus:ring-2 focus:ring-[#334155] bg-white card-shadow transition-all text-sm font-medium">
            </div>
            
            <div class="flex items-center gap-4">
                <div class="text-right">
                    <p class="text-sm font-bold text-zinc-900 uppercase">Pemilik Kost</p>
                    <p class="text-xs text-zinc-500 uppercase tracking-widest">Administrator</p>
                </div>
                <div class="w-11 h-11 rounded-lg bg-[#334155] flex items-center justify-center text-white font-bold shadow-lg border border-zinc-700">PE</div>
            </div>
        </header>

        <!-- KONTEN DINAMIS HALAMAN MASUK KE SINI -->
        {{ $slot }}

    </main>

    <!-- Slot khusus kalau lu mau nambahin tag <script> di bawah halaman tertentu -->
    {{ $scripts ?? '' }}

</body>
</html>