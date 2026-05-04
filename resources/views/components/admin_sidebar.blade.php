<aside class="w-64 bg-[#18181B] text-zinc-400 flex flex-col fixed h-full z-50 border-r border-zinc-800">
    <div class="p-6 border-b border-zinc-800">
        <h2 class="text-white text-xl font-bold tracking-tight uppercase">Dthanasha <span class="text-white">Kost</span></h2>
        <p class="text-[10px] text-zinc-500 tracking-[0.2em] mt-1 uppercase">Pemilik Kost</p>
    </div>
    
    <nav class="flex-1 px-4 py-6 space-y-1">
        <a href="{{ url('/dashboard') }}" class="sidebar-link {{ Request::is('dashboard') ? 'active-link font-semibold' : 'font-medium hover:text-white' }} flex items-center gap-3 px-4 py-3 rounded-lg text-sm transition-all">
            <i class="ph ph-squares-four text-lg {{ Request::is('dashboard') ? 'text-white' : '' }}"></i> Dashboard
        </a>
        <a href="{{ url('/data_penghuni') }}" class="sidebar-link {{ Request::is('data_penghuni') ? 'active-link font-semibold' : 'font-medium hover:text-white' }} flex items-center gap-3 px-4 py-3 rounded-lg text-sm transition-all">
            <i class="ph ph-users text-lg {{ Request::is('data_penghuni') ? 'text-white' : '' }}"></i> Data Penghuni
        </a>
        <a href="{{ url('/waiting_list') }}" class="sidebar-link {{ Request::is('waiting_list') ? 'active-link font-semibold' : 'font-medium hover:text-white' }} flex items-center gap-3 px-4 py-3 rounded-lg text-sm transition-all">
            <i class="ph ph-clock text-lg {{ Request::is('waiting_list') ? 'text-white' : '' }}"></i> Waiting List
        </a>
        <a href="{{ url('/manajemen_kamar') }}" class="sidebar-link {{ Request::is('manajemen_kamar') ? 'active-link font-semibold' : 'font-medium hover:text-white' }} flex items-center gap-3 px-4 py-3 rounded-lg text-sm transition-all">
            <i class="ph ph-door text-lg {{ Request::is('manajemen_kamar') ? 'text-white' : '' }}"></i> Manajemen Kamar
        </a>
        <a href="{{ url('/pembayaran') }}" class="sidebar-link {{ Request::is('pembayaran') ? 'active-link font-semibold' : 'font-medium hover:text-white' }} flex items-center gap-3 px-4 py-3 rounded-lg text-sm transition-all">
            <i class="ph ph-receipt text-lg {{ Request::is('pembayaran') ? 'text-white' : '' }}"></i> Pembayaran
        </a>
        <a href="{{ url('/riwayat') }}" class="sidebar-link {{ Request::is('riwayat') ? 'active-link font-semibold' : 'font-medium hover:text-white' }} flex items-center gap-3 px-4 py-3 rounded-lg text-sm transition-all">
            <i class="ph ph-clock-counter-clockwise text-lg {{ Request::is('riwayat') ? 'text-white' : '' }}"></i> Riwayat
        </a>
    </nav>

    <div class="p-6 border-t border-zinc-800">
        <form action="{{ url('/logout') }}" method="POST">
            @csrf
            <button class="flex items-center gap-3 text-sm font-medium hover:text-red-400 transition-all uppercase tracking-wider w-full">
                <i class="ph ph-sign-out text-lg"></i> Keluar
            </button>
        </form>
    </div>
</aside>