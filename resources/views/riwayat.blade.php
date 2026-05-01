<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pembayaran - Dthanasha Kost</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @vite('resources/css/app.css')
    <style>
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            background-color: #F8FAFC; 
        }
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
            <a href="{{ url('/dashboard') }}" class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium transition-all hover:text-white">
                <i class="ph ph-squares-four text-lg"></i> Dashboard
            </a>
            <a href="{{ url('/data_penghuni') }}" class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium transition-all hover:text-white">
                <i class="ph ph-users text-lg"></i> Data Penghuni
            </a>
            <a href="{{ url('/waiting_list') }}" class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium transition-all hover:text-white">
                <i class="ph ph-clock text-lg"></i> Waiting List
            </a>
            <a href="{{ url('/manajemen_kamar') }}" class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium transition-all hover:text-white">
                <i class="ph ph-door text-lg"></i> Manajemen Kamar
            </a>
            <a href="{{ url('/pembayaran') }}" class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium transition-all hover:text-white">
                <i class="ph ph-receipt text-lg"></i> Pembayaran
            </a>
            <a href="{{ url('/riwayat') }}" class="sidebar-link active-link flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-semibold transition-all">
                <i class="ph ph-clock-counter-clockwise text-lg text-white"></i> Riwayat
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

    <!-- MAIN CONTENT -->
    <main class="flex-1 ml-64 p-8">
        
        <!-- HEADER -->
        <header class="flex items-center justify-between mb-10 pb-4 border-b border-zinc-200">
            <div class="relative w-96">
                <i class="ph ph-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-zinc-400 text-lg"></i>
                <input type="text" placeholder="Cari riwayat transaksi..." class="w-full pl-12 pr-4 py-2.5 rounded-xl border border-zinc-200 focus:outline-none focus:ring-2 focus:ring-[#334155] focus:border-transparent bg-white card-shadow transition-all text-sm font-medium">
            </div>
            
            <div class="flex items-center gap-4">
                <div class="text-right">
                    <p class="text-sm font-bold text-zinc-900 uppercase">Pemilik Kost</p>
                    <p class="text-xs text-zinc-500 uppercase tracking-widest">Administrator</p>
                </div>
                <div class="w-11 h-11 rounded-lg bg-[#334155] flex items-center justify-center text-white font-bold shadow-lg border border-zinc-700">PE</div>
            </div>
        </header>

        <!-- KARTU SUMMARY KEUANGAN -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <div class="bg-white p-6 rounded-2xl card-shadow border border-zinc-50 flex items-center gap-5 group transition-all">
                <div class="w-14 h-14 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center border border-emerald-100 group-hover:bg-emerald-100 transition-colors">
                    <i class="ph-fill ph-arrow-down-left text-2xl"></i>
                </div>
                <div>
                    <p class="text-[11px] font-bold text-zinc-400 uppercase tracking-widest mb-1">Pemasukan</p>
                    <p class="text-2xl font-black text-emerald-600">Rp 2.700.000</p>
                </div>
            </div>
            <div class="bg-white p-6 rounded-2xl card-shadow border border-zinc-50 flex items-center gap-5 group transition-all">
                <div class="w-14 h-14 bg-red-50 text-red-600 rounded-xl flex items-center justify-center border border-red-100 group-hover:bg-red-100 transition-colors">
                    <i class="ph-fill ph-arrow-up-right text-2xl"></i>
                </div>
                <div>
                    <p class="text-[11px] font-bold text-zinc-400 uppercase tracking-widest mb-1">Pengeluaran</p>
                    <p class="text-2xl font-black text-red-600">Rp 1.500.000</p>
                </div>
            </div>
            <div class="bg-white p-6 rounded-2xl card-shadow border border-zinc-50 flex items-center gap-5 group transition-all">
                <div class="w-14 h-14 bg-zinc-100 text-[#334155] rounded-xl flex items-center justify-center border border-zinc-200 group-hover:bg-zinc-200 transition-colors">
                    <i class="ph-fill ph-wallet text-2xl"></i>
                </div>
                <div>
                    <p class="text-[11px] font-bold text-zinc-400 uppercase tracking-widest mb-1">Keuntungan Bersih</p>
                    <p class="text-2xl font-black text-zinc-900">Rp 1.200.000</p>
                </div>
            </div>
        </div>

        <!-- GRAFIK MINGGUAN -->
        <div class="bg-white p-8 rounded-3xl card-shadow border border-zinc-50 mb-10">
            <div class="flex items-center justify-between mb-8">
                <h3 class="text-sm font-bold text-zinc-900 uppercase tracking-wide">Pemasukan & Pengeluaran Mingguan</h3>
                <div class="flex gap-4 text-xs font-bold text-zinc-500 uppercase tracking-widest">
                    <span class="flex items-center gap-2"><div class="w-3 h-3 bg-[#18181B] rounded-full"></div> Pemasukan</span>
                    <span class="flex items-center gap-2"><div class="w-3 h-3 bg-zinc-200 rounded-full border border-zinc-300"></div> Pengeluaran</span>
                </div>
            </div>
            <div class="h-[300px] w-full"><canvas id="barChart"></canvas></div>
        </div>

        <!-- TABEL RIWAYAT TRANSAKSI -->
        <div class="bg-white rounded-3xl card-shadow border border-zinc-50 overflow-hidden">
            <div class="p-6 border-b border-zinc-50 flex justify-between items-center bg-zinc-50/50">
                <h3 class="text-sm font-bold text-zinc-900 uppercase tracking-wide">Riwayat Transaksi</h3>
                <div class="flex gap-3">
                    <select class="text-sm border border-zinc-200 bg-white rounded-xl px-4 py-2 outline-none font-semibold text-zinc-600 cursor-pointer focus:ring-2 focus:ring-[#334155]">
                        <option>Semua Transaksi</option>
                        <option>Pemasukan</option>
                        <option>Pengeluaran</option>
                    </select>
                    <button onclick="bukaModalTambah()" class="bg-[#18181B] hover:bg-[#334155] text-white px-5 py-2 rounded-xl text-sm font-bold transition-all flex items-center gap-2 shadow-md active:scale-95">
                        <i class="ph ph-plus-circle text-lg"></i> Tambah Transaksi
                    </button>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-zinc-100 text-zinc-500 text-[10px] uppercase tracking-widest border-b border-zinc-200">
                        <tr>
                            <th class="px-6 py-4">Nama Kegiatan</th>
                            <th class="px-6 py-4 text-center">Pihak Terkait</th>
                            <th class="px-6 py-4 text-center">Tanggal</th>
                            <th class="px-6 py-4 text-center">Metode</th>
                            <th class="px-6 py-4 text-right">Nominal</th>
                            <th class="px-6 py-4 text-center">Status</th>
                            <th class="px-6 py-4 text-center">Bukti</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-100">
                        
                        <!-- Transaksi 1 -->
                        <tr class="hover:bg-zinc-50 transition-all cursor-pointer group" onclick="bukaModalEdit('Perbaikan kamar mandi', 'Pemilik', '12 Jan 2026', 'Cash', '1200000', 'Berhasil', 'trx_001')">
                            <td class="px-6 py-4 text-sm font-bold text-zinc-900 group-hover:text-[#334155] transition-colors">Perbaikan kamar mandi</td>
                            <td class="px-6 py-4 text-sm text-center text-zinc-600 font-medium">Pemilik</td>
                            <td class="px-6 py-4 text-sm text-center text-zinc-500 font-medium">12 Jan 2026</td>
                            <td class="px-6 py-4 text-center"><span class="bg-zinc-100 border border-zinc-200 text-zinc-600 text-[10px] uppercase tracking-widest font-black px-3 py-1 rounded-lg">Cash</span></td>
                            <td class="px-6 py-4 text-sm font-black text-red-500 text-right">- Rp 1.200.000</td>
                            <td class="px-6 py-4 text-center"><span class="bg-emerald-50 text-emerald-600 border border-emerald-100 text-[10px] uppercase tracking-widest font-black px-3 py-1.5 rounded-lg">Berhasil</span></td>
                            <td class="px-6 py-4 text-center"><button class="text-blue-500 hover:text-blue-700 bg-blue-50 p-2 rounded-lg transition-colors"><i class="ph-fill ph-file-text text-lg"></i></button></td>
                        </tr>
                        
                        <!-- Transaksi 2 -->
                        <tr class="hover:bg-zinc-50 transition-all cursor-pointer group" onclick="bukaModalEdit('Pembayaran bulanan kost', 'Misael Feodora', '12 Jan 2026', 'Transfer', '1200000', 'Gagal', 'trx_002')">
                            <td class="px-6 py-4 text-sm font-bold text-zinc-900 group-hover:text-[#334155] transition-colors">Pembayaran bulanan kost</td>
                            <td class="px-6 py-4 text-sm text-center text-zinc-600 font-medium">Misael Feodora</td>
                            <td class="px-6 py-4 text-sm text-center text-zinc-500 font-medium">12 Jan 2026</td>
                            <td class="px-6 py-4 text-center"><span class="bg-zinc-100 border border-zinc-200 text-zinc-600 text-[10px] uppercase tracking-widest font-black px-3 py-1 rounded-lg">Transfer</span></td>
                            <td class="px-6 py-4 text-sm font-black text-emerald-500 text-right">+ Rp 1.200.000</td>
                            <td class="px-6 py-4 text-center"><span class="bg-red-50 text-red-600 border border-red-100 text-[10px] uppercase tracking-widest font-black px-3 py-1.5 rounded-lg">Gagal</span></td>
                            <td class="px-6 py-4 text-center"><button class="text-blue-500 hover:text-blue-700 bg-blue-50 p-2 rounded-lg transition-colors"><i class="ph-fill ph-file-text text-lg"></i></button></td>
                        </tr>

                        <!-- Transaksi 3 -->
                        <tr class="hover:bg-zinc-50 transition-all cursor-pointer group" onclick="bukaModalEdit('Pembayaran Keamanan', 'Pemilik', '12 Jan 2026', 'Transfer', '1200000', 'Berhasil', 'trx_003')">
                            <td class="px-6 py-4 text-sm font-bold text-zinc-900 group-hover:text-[#334155] transition-colors">Pembayaran Keamanan</td>
                            <td class="px-6 py-4 text-sm text-center text-zinc-600 font-medium">Pemilik</td>
                            <td class="px-6 py-4 text-sm text-center text-zinc-500 font-medium">12 Jan 2026</td>
                            <td class="px-6 py-4 text-center"><span class="bg-zinc-100 border border-zinc-200 text-zinc-600 text-[10px] uppercase tracking-widest font-black px-3 py-1 rounded-lg">Transfer</span></td>
                            <td class="px-6 py-4 text-sm font-black text-red-500 text-right">- Rp 1.200.000</td>
                            <td class="px-6 py-4 text-center"><span class="bg-emerald-50 text-emerald-600 border border-emerald-100 text-[10px] uppercase tracking-widest font-black px-3 py-1.5 rounded-lg">Berhasil</span></td>
                            <td class="px-6 py-4 text-center"><button class="text-blue-500 hover:text-blue-700 bg-blue-50 p-2 rounded-lg transition-colors"><i class="ph-fill ph-file-text text-lg"></i></button></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="p-6 border-t border-zinc-100 flex items-center justify-between bg-white">
                <p class="text-[11px] font-bold text-zinc-400 uppercase tracking-widest">Menampilkan 3 dari 150 Transaksi</p>
                <div class="flex gap-2">
                    <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-zinc-200 text-zinc-400 hover:bg-zinc-50 transition-all"><i class="ph ph-caret-left font-bold"></i></button>
                    <button class="w-8 h-8 flex items-center justify-center rounded-lg bg-[#334155] text-white text-xs font-bold shadow-sm">1</button>
                    <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-zinc-200 text-zinc-600 hover:bg-zinc-50 text-xs font-bold transition-all">2</button>
                    <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-zinc-200 text-zinc-400 hover:bg-zinc-50 transition-all"><i class="ph ph-caret-right font-bold"></i></button>
                </div>
            </div>
        </div>
    </main>

    <!-- MODAL TAMBAH TRANSAKSI -->
    <div id="modalTambah" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-[60] hidden flex items-center justify-center">
        <div class="bg-white w-full max-w-lg rounded-3xl p-8 shadow-2xl scale-95 transition-all max-h-[90vh] overflow-y-auto no-scrollbar">
            <h2 class="text-xl font-black text-zinc-900 mb-6 text-center uppercase tracking-wide">Tambah Riwayat Transaksi</h2>
            <form action="{{ url('/tambah_riwayat') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">Nama Kegiatan</label>
                    <input type="text" name="kegiatan" class="w-full px-4 py-3 rounded-xl bg-white border border-zinc-200 focus:outline-none focus:ring-2 focus:ring-[#334155] transition-all text-sm font-bold text-zinc-900" required>
                </div>
                
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">Pihak Terkait</label>
                        <input type="text" name="nama" class="w-full px-4 py-3 rounded-xl bg-white border border-zinc-200 focus:outline-none focus:ring-2 focus:ring-[#334155] transition-all text-sm font-bold text-zinc-900" required placeholder="Cth: Pemilik / Penghuni">
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">Tanggal</label>
                        <input type="date" name="waktu" class="w-full px-4 py-3 rounded-xl bg-white border border-zinc-200 focus:outline-none focus:ring-2 focus:ring-[#334155] transition-all text-sm font-bold text-zinc-900" required>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">Metode</label>
                        <select name="metode" class="w-full px-4 py-3 rounded-xl bg-white border border-zinc-200 focus:outline-none focus:ring-2 focus:ring-[#334155] transition-all text-sm font-bold text-zinc-900" required>
                            <option value="Transfer">Transfer</option>
                            <option value="Cash">Cash</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">Nominal (Rp)</label>
                        <input type="number" name="nominal" class="w-full px-4 py-3 rounded-xl bg-white border border-zinc-200 focus:outline-none focus:ring-2 focus:ring-[#334155] transition-all text-sm font-bold text-zinc-900" required>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">Status</label>
                        <select name="status" class="w-full px-4 py-3 rounded-xl bg-white border border-zinc-200 focus:outline-none focus:ring-2 focus:ring-[#334155] transition-all text-sm font-bold text-zinc-900" required>
                            <option value="Berhasil">Berhasil</option>
                            <option value="Gagal">Gagal</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">Bukti File</label>
                        <input type="text" name="bukti" class="w-full px-4 py-3 rounded-xl bg-white border border-zinc-200 focus:outline-none focus:ring-2 focus:ring-[#334155] transition-all text-sm font-bold text-zinc-900" placeholder="Link GDrive dll">
                    </div>
                </div>

                <div class="flex gap-3 pt-6 border-t border-zinc-100">
                    <button type="button" onclick="tutupModal('modalTambah')" class="flex-1 px-4 py-3.5 rounded-xl bg-zinc-100 text-zinc-600 font-bold hover:bg-zinc-200 transition-all text-sm uppercase tracking-wide">Batal</button>
                    <button type="submit" class="flex-1 px-4 py-3.5 rounded-xl bg-[#18181B] text-white font-bold hover:bg-[#334155] shadow-lg transition-all active:scale-95 text-sm uppercase tracking-wide">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>

    <!-- MODAL EDIT/DETAIL TRANSAKSI -->
    <div id="modalEdit" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-[60] hidden flex items-center justify-center">
        <div class="bg-white w-full max-w-lg rounded-3xl p-8 shadow-2xl scale-95 transition-all max-h-[90vh] overflow-y-auto no-scrollbar">
            <h2 class="text-xl font-black text-zinc-900 mb-6 text-center uppercase tracking-wide">Detail Transaksi</h2>
            
            <form action="{{ url('/edit_riwayat') }}" method="POST" id="formEditRiwayat" class="space-y-4">
                @csrf @method('PUT')
                <input type="hidden" id="edit_id" name="id">
                
                <div>
                    <label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">Nama Kegiatan</label>
                    <input type="text" id="edit_kegiatan" name="kegiatan" class="w-full px-4 py-3 rounded-xl bg-white border border-zinc-200 focus:outline-none focus:ring-2 focus:ring-[#334155] transition-all text-sm font-bold text-zinc-900" required>
                </div>
                
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">Pihak Terkait</label>
                        <input type="text" id="edit_nama" name="nama" class="w-full px-4 py-3 rounded-xl bg-white border border-zinc-200 focus:outline-none focus:ring-2 focus:ring-[#334155] transition-all text-sm font-bold text-zinc-900" required>
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">Tanggal</label>
                        <input type="text" id="edit_waktu" name="waktu" class="w-full px-4 py-3 rounded-xl bg-white border border-zinc-200 focus:outline-none focus:ring-2 focus:ring-[#334155] transition-all text-sm font-bold text-zinc-900" required>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">Metode</label>
                        <select id="edit_metode" name="metode" class="w-full px-4 py-3 rounded-xl bg-white border border-zinc-200 focus:outline-none focus:ring-2 focus:ring-[#334155] transition-all text-sm font-bold text-zinc-900" required>
                            <option value="Transfer">Transfer</option>
                            <option value="Cash">Cash</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">Nominal (Rp)</label>
                        <input type="number" id="edit_nominal" name="nominal" class="w-full px-4 py-3 rounded-xl bg-white border border-zinc-200 focus:outline-none focus:ring-2 focus:ring-[#334155] transition-all text-sm font-bold text-zinc-900" required>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">Status</label>
                        <select id="edit_status" name="status" class="w-full px-4 py-3 rounded-xl bg-white border border-zinc-200 focus:outline-none focus:ring-2 focus:ring-[#334155] transition-all text-sm font-bold text-zinc-900" required>
                            <option value="Berhasil">Berhasil</option>
                            <option value="Gagal">Gagal</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">Bukti File</label>
                        <input type="text" id="edit_bukti" name="bukti" class="w-full px-4 py-3 rounded-xl bg-white border border-zinc-200 focus:outline-none focus:ring-2 focus:ring-[#334155] transition-all text-sm font-bold text-zinc-900" required>
                    </div>
                </div>

                <div class="flex gap-3 pt-6 border-b border-zinc-100 pb-6">
                    <button type="button" onclick="tutupModal('modalEdit')" class="flex-1 px-4 py-3.5 rounded-xl bg-zinc-100 text-zinc-600 font-bold hover:bg-zinc-200 transition-all text-sm uppercase tracking-wide">Batal</button>
                    <button type="submit" class="flex-1 px-4 py-3.5 rounded-xl bg-[#18181B] text-white font-bold hover:bg-[#334155] shadow-lg transition-all active:scale-95 text-sm uppercase tracking-wide">Update Transaksi</button>
                </div>
            </form>

            <form action="{{ url('/hapus_riwayat') }}" method="POST" class="mt-4">
                @csrf @method('DELETE')
                <input type="hidden" id="hapus_id" name="id">
                <button type="submit" class="w-full px-4 py-3.5 rounded-xl bg-red-50 text-red-600 border border-red-100 font-bold hover:bg-red-100 transition-all active:scale-95 flex items-center justify-center gap-2 text-sm uppercase tracking-wide">
                    <i class="ph ph-trash text-lg"></i> Hapus Permanen
                </button>
            </form>
        </div>
    </div>

    <script>
        const formatRupiah = (number) => new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(number);

        const barCtx = document.getElementById('barChart').getContext('2d');
        new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: ['Sat', 'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri'],
                datasets: [
                    { label: 'Pemasukan', data: [4500000, 3200000, 3100000, 4800000, 1500000, 3800000, 3700000], backgroundColor: '#18181B', borderRadius: 8, barPercentage: 0.5, categoryPercentage: 0.4 },
                    // Warna batang pengeluaran diubah jadi abu-abu muda menyesuaikan screenshot lu
                    { label: 'Pengeluaran', data: [2000000, 1000000, 2500000, 3500000, 2100000, 2300000, 3000000], backgroundColor: '#E4E4E7', borderRadius: 8, barPercentage: 0.5, categoryPercentage: 0.4 }
                ]
            },
            options: {
                responsive: true, maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: { callbacks: { label: function(c) { return c.dataset.label + ': ' + formatRupiah(c.parsed.y); } } }
                },
                scales: { 
                    y: { beginAtZero: true, grid: { color: '#F1F5F9', drawBorder: false }, ticks: { display: false } }, 
                    x: { grid: { display: false }, ticks: { font: { family: 'Plus Jakarta Sans', size: 12, weight: '600' }, color: '#94A3B8' } } 
                }
            }
        });

        function bukaModalTambah() { document.getElementById('modalTambah').classList.remove('hidden'); }
        
        function bukaModalEdit(kegiatan, nama, waktu, metode, nominal, status, id) {
            document.getElementById('edit_kegiatan').value = kegiatan;
            document.getElementById('edit_nama').value = nama;
            document.getElementById('edit_waktu').value = waktu;
            document.getElementById('edit_metode').value = metode;
            document.getElementById('edit_nominal').value = nominal;
            document.getElementById('edit_status').value = status;
            document.getElementById('edit_bukti').value = "bukti_" + id + ".pdf"; 
            
            document.getElementById('edit_id').value = id;
            document.getElementById('hapus_id').value = id;

            document.getElementById('modalEdit').classList.remove('hidden');
        }
        
        function tutupModal(modalId) { document.getElementById(modalId).classList.add('hidden'); }
    </script>
</body>
</html>