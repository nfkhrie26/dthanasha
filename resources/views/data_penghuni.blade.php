<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Penghuni - Dthanasha Kost</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
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
    <aside class="w-64 bg-[#18181B] text-gray-400 flex flex-col fixed h-full z-50">
        <div class="p-6 border-b border-zinc-800">
            <h2 class="text-white text-xl font-bold tracking-tight uppercase">Dthanasha <span class="text-white">Kost</span></h2>
             <p class="text-[10px] text-zinc-500 tracking-[0.2em] mt-1 uppercase">Pemilik Kost</p>
        </div>
        
        <nav class="flex-1 px-4 py-6 space-y-1">
            <a href="{{ url('/dashboard') }}" class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium transition-all hover:text-white">
                <i class="fas fa-home w-5"></i> Dashboard
            </a>
            <a href="{{ url('/data_penghuni') }}" class="sidebar-link active-link flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-semibold transition-all">
                <i class="fas fa-user w-5"></i> Data Penghuni
            </a>
            <a href="{{ url('/waiting_list') }}" class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium transition-all hover:text-white">
                <i class="far fa-clock w-5"></i> Waiting List
            </a>
            <a href="{{ url('/manajemen_kamar') }}" class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium transition-all hover:text-white">
                <i class="fas fa-bed w-5"></i> Manajemen Kamar
            </a>
            <a href="{{ url('/pembayaran') }}" class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium transition-all hover:text-white">
                <i class="fas fa-money-bill-wave w-5"></i> Pembayaran
            </a>
            <a href="{{ url('/riwayat') }}" class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium transition-all hover:text-white">
                <i class="fas fa-history w-5"></i> Riwayat
            </a>
        </nav>

        <div class="p-4 border-t border-gray-800">
            <form action="{{ url('/logout') }}" method="POST">
                @csrf
                <button class="flex items-center gap-3 px-4 py-3 w-full text-left text-sm font-medium hover:text-red-400 transition-all uppercase tracking-wider">
                    <i class="fas fa-sign-out-alt w-5"></i> Keluar
                </button>
            </form>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="flex-1 ml-64 p-8">
        
        <!-- HEADER -->
        <header class="flex items-center justify-between mb-10 pb-4 border-b border-zinc-200">
            <div class="relative w-96">
                <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                <input type="text" placeholder="Cari data penghuni..." class="w-full pl-12 pr-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#334155] focus:border-transparent bg-white card-shadow transition-all text-sm">
            </div>
            
            <div class="flex items-center gap-4">
                <div class="text-right">
                    <p class="text-sm font-bold text-gray-900 uppercase">Pemilik Kost</p>
                    <p class="text-xs text-gray-500 uppercase tracking-widest">Administrator</p>
                </div>
                <div class="w-11 h-11 rounded-lg bg-[#334155] flex items-center justify-center text-white font-bold shadow-lg border border-zinc-700">PE</div>
            </div>
        </header>

        <!-- KARTU SUMMARY GENDER -->
        <div class="flex gap-6 mb-10">
            <div class="bg-white p-6 rounded-2xl card-shadow border border-gray-50 flex items-center gap-4 w-60 group transition-all">
                <div class="w-14 h-14 bg-zinc-100 rounded-xl flex items-center justify-center border border-zinc-200 group-hover:bg-zinc-200 transition-colors">
                    <i class="fas fa-mars text-2xl text-black"></i>
                </div>
                <div>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Pria</p>
                    <p class="text-3xl font-extrabold text-gray-900">50</p>
                </div>
            </div>
            <div class="bg-white p-6 rounded-2xl card-shadow border border-gray-50 flex items-center gap-4 w-60 group transition-all">
                <div class="w-14 h-14 bg-zinc-100 rounded-xl flex items-center justify-center border border-zinc-200 group-hover:bg-zinc-200 transition-colors">
                    <i class="fas fa-venus text-2xl text-black"></i>
                </div>
                <div>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Wanita</p>
                    <p class="text-3xl font-extrabold text-gray-900">50</p>
                </div>
            </div>
        </div>

        <!-- TABEL DATA -->
        <div class="bg-white rounded-3xl card-shadow border border-gray-50 overflow-hidden">
            <div class="p-6 border-b border-gray-50 flex justify-between items-center bg-gray-50">
                <h3 class="text-sm font-bold text-gray-900 uppercase tracking-wide">Daftar Penghuni Aktif</h3>
                <div class="flex gap-3">
                    <select class="text-sm border border-zinc-200 bg-white rounded-lg px-3 py-2 outline-none font-semibold text-gray-600 cursor-pointer focus:ring-2 focus:ring-[#334155]">
                        <option>Semua Gender</option>
                        <option>Pria</option>
                        <option>Wanita</option>
                    </select>
                    <button onclick="bukaModalTambah()" class="bg-[#18181B] hover:bg-[#334155] text-white px-5 py-2 rounded-xl text-sm font-bold transition-all flex items-center gap-2 shadow-md active:scale-95">
                        <i class="fas fa-plus"></i> Tambah Akun
                    </button>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-zinc-100 text-zinc-500 text-[10px] uppercase tracking-widest border-b border-zinc-200">
                        <tr>
                            <th class="px-6 py-4 text-center">NO</th>
                            <th class="px-6 py-4">Nama Lengkap</th>
                            <th class="px-6 py-4 text-center">Usia</th>
                            <th class="px-6 py-4 text-center">Kamar</th>
                            <th class="px-6 py-4">Gender</th>
                            <th class="px-6 py-4">Kontak</th>
                            <th class="px-6 py-4">No. Orangtua</th>
                            <th class="px-6 py-4">Nama Akun</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-200">
                        <tr class="hover:bg-zinc-50 transition-colors cursor-pointer group" 
                            onclick="bukaModalHapus('Dimas Anggara', '21', '012', 'Pria', '081234567890', '085234567890', 'dimas_ang')">
                            <td class="px-6 py-4 text-sm font-bold text-gray-400 text-center">1</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 group-hover:text-[#334155] transition-colors">Dimas Anggara</td>
                            <td class="px-6 py-4 text-sm text-center text-gray-600">21</td>
                            <td class="px-6 py-4 text-center">
                                <span class="bg-zinc-200 text-zinc-800 text-[11px] font-black px-2.5 py-1 rounded-md">012</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">Pria</td>
                            <td class="px-6 py-4 text-sm text-gray-500">081234567890</td>
                            <td class="px-6 py-4 text-sm text-gray-500">085234567890</td>
                            <td class="px-6 py-4">
                                <span class="text-xs font-medium text-zinc-600 bg-zinc-100 px-2 py-1 rounded-lg border border-zinc-200">@dimas_ang</span>
                            </td>
                        </tr>
                        <tr class="hover:bg-zinc-50 transition-colors cursor-pointer group" 
                            onclick="bukaModalHapus('Putri Larasati', '20', '045', 'Wanita', '081384700111', '08777000322', 'putrilaras')">
                            <td class="px-6 py-4 text-sm font-bold text-gray-400 text-center">2</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 group-hover:text-[#334155] transition-colors">Putri Larasati</td>
                            <td class="px-6 py-4 text-sm text-center text-gray-600">20</td>
                            <td class="px-6 py-4 text-center">
                                <span class="bg-zinc-200 text-zinc-800 text-[11px] font-black px-2.5 py-1 rounded-md">045</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">Wanita</td>
                            <td class="px-6 py-4 text-sm text-gray-500">081384700111</td>
                            <td class="px-6 py-4 text-sm text-gray-500">08777000322</td>
                            <td class="px-6 py-4">
                                <span class="text-xs font-medium text-zinc-600 bg-zinc-100 px-2 py-1 rounded-lg border border-zinc-200">@putrilaras</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- PAGINATION -->
            <div class="p-6 border-t border-zinc-100 flex items-center justify-between bg-white">
                <p class="text-xs font-semibold text-zinc-400">Menampilkan 2 dari 80 Penghuni</p>
                <div class="flex gap-2">
                    <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-zinc-200 text-zinc-400 hover:bg-zinc-50 transition-all"><i class="fas fa-chevron-left text-xs"></i></button>
                    <button class="w-8 h-8 flex items-center justify-center rounded-lg bg-[#334155] text-white text-xs font-bold shadow-sm">1</button>
                    <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-zinc-200 text-zinc-600 hover:bg-zinc-50 text-xs font-bold transition-all">2</button>
                    <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-zinc-200 text-zinc-400 hover:bg-zinc-50 transition-all"><i class="fas fa-chevron-right text-xs"></i></button>
                </div>
            </div>
        </div>
    </main>

    <!-- MODAL TAMBAH (KOLOM SUDAH LENGKAP) -->
    <div id="modalTambah" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-[60] hidden flex items-center justify-center">
        <!-- max-w-lg dan max-h-[90vh] overflow-y-auto agar aman di layar kecil -->
        <div class="bg-white w-full max-w-lg rounded-3xl p-8 shadow-2xl scale-95 transition-all max-h-[90vh] overflow-y-auto no-scrollbar">
            <h2 class="text-xl font-black text-gray-900 mb-6 text-center uppercase tracking-wide">Tambah Akun Baru</h2>
            <form action="{{ url('/tambah_akun') }}" method="POST" class="space-y-4">
                @csrf
                
                <!-- Baris 1: Nama Lengkap -->
                <div>
                    <label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">Nama Lengkap</label>
                    <input type="text" name="nama" class="w-full px-4 py-3 rounded-xl bg-white border border-zinc-200 focus:outline-none focus:ring-2 focus:ring-[#334155] transition-all text-sm font-bold text-zinc-900" required>
                </div>
                
                <!-- Baris 2: Usia & Gender -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">Usia</label>
                        <input type="number" name="usia" class="w-full px-4 py-3 rounded-xl bg-white border border-zinc-200 focus:outline-none focus:ring-2 focus:ring-[#334155] transition-all text-sm font-bold text-zinc-900" required>
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">Gender</label>
                        <select name="jk" class="w-full px-4 py-3 rounded-xl bg-white border border-zinc-200 focus:outline-none focus:ring-2 focus:ring-[#334155] transition-all text-sm font-bold text-zinc-900" required>
                            <option value="Pria">Pria</option>
                            <option value="Wanita">Wanita</option>
                        </select>
                    </div>
                </div>

                <!-- Baris 3: Kontak & No Orang Tua -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">Kontak Penghuni</label>
                        <input type="text" name="kontak" class="w-full px-4 py-3 rounded-xl bg-white border border-zinc-200 focus:outline-none focus:ring-2 focus:ring-[#334155] transition-all text-sm font-bold text-zinc-900" required>
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">No. Orang Tua</label>
                        <input type="text" name="kontak_ortu" class="w-full px-4 py-3 rounded-xl bg-white border border-zinc-200 focus:outline-none focus:ring-2 focus:ring-[#334155] transition-all text-sm font-bold text-zinc-900" required>
                    </div>
                </div>

                <!-- Baris 4: Kamar & Nama Akun -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">No. Kamar</label>
                        <input type="text" name="nomor_kamar" class="w-full px-4 py-3 rounded-xl bg-white border border-zinc-200 focus:outline-none focus:ring-2 focus:ring-[#334155] transition-all text-sm font-bold text-zinc-900" required>
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">Nama Akun</label>
                        <input type="text" name="nama_akun" class="w-full px-4 py-3 rounded-xl bg-white border border-zinc-200 focus:outline-none focus:ring-2 focus:ring-[#334155] transition-all text-sm font-bold text-zinc-900" required>
                    </div>
                </div>

                <!-- Baris 5: Password -->
                <div>
                    <label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">Password Login</label>
                    <input type="password" name="password" class="w-full px-4 py-3 rounded-xl bg-white border border-zinc-200 focus:outline-none focus:ring-2 focus:ring-[#334155] transition-all text-sm font-bold text-zinc-900" required>
                </div>

                <!-- Tombol Aksi -->
                <div class="flex gap-3 pt-4 border-t border-zinc-100">
                    <button type="button" onclick="tutupModal('modalTambah')" class="flex-1 px-4 py-3.5 rounded-xl bg-zinc-100 text-zinc-600 font-bold hover:bg-zinc-200 transition-all text-sm uppercase tracking-wide">Batal</button>
                    <button type="submit" class="flex-1 px-4 py-3.5 rounded-xl bg-[#18181B] text-white font-bold hover:bg-[#334155] shadow-lg transition-all active:scale-95 text-sm uppercase tracking-wide">Simpan Penghuni</button>
                </div>
            </form>
        </div>
    </div>

    <!-- MODAL DETAIL / HAPUS -->
    <div id="modalHapus" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-[60] hidden flex items-center justify-center">
        <div class="bg-white w-full max-w-md rounded-3xl p-8 shadow-2xl max-h-[90vh] overflow-y-auto no-scrollbar">
            <div class="text-center mb-6">
                <div class="w-16 h-16 bg-zinc-100 text-zinc-800 border border-zinc-200 rounded-2xl flex items-center justify-center mx-auto mb-4 text-2xl">
                    <i class="fas fa-user"></i>
                </div>
                <h2 class="text-xl font-black text-gray-900 uppercase tracking-wide">Detail Penghuni</h2>
            </div>
            
            <form action="{{ url('/hapus_penghuni') }}" method="POST" class="space-y-4">
                @csrf @method('DELETE')
                <input type="hidden" id="hapus_id_akun" name="akun">
                
                <div class="grid grid-cols-2 gap-4">
                    <div class="col-span-2">
                        <label class="block text-[10px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-1">Nama</label>
                        <input type="text" id="hapus_nama" class="w-full px-4 py-3 rounded-xl bg-zinc-50 border border-zinc-100 text-zinc-900 font-bold text-sm" readonly>
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-1">Usia</label>
                        <input type="text" id="hapus_usia" class="w-full px-4 py-3 rounded-xl bg-zinc-50 border border-zinc-100 text-zinc-900 font-bold text-sm" readonly>
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-1">No. Kamar</label>
                        <input type="text" id="hapus_kamar" class="w-full px-4 py-3 rounded-xl bg-zinc-50 border border-zinc-100 text-zinc-900 font-bold text-sm" readonly>
                    </div>
                </div>

                <div class="flex gap-3 pt-6 border-t border-zinc-100">
                    <button type="button" onclick="tutupModal('modalHapus')" class="flex-1 px-4 py-3 rounded-xl bg-zinc-100 text-zinc-600 font-bold hover:bg-zinc-200 transition-all text-sm uppercase">Kembali</button>
                    <button type="submit" class="flex-1 px-4 py-3 rounded-xl bg-red-50 text-red-600 font-bold hover:bg-red-100 border border-red-100 transition-all active:scale-95 flex items-center justify-center gap-2 text-sm uppercase">
                        <i class="fas fa-trash-alt"></i> Hapus
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function bukaModalTambah() { document.getElementById('modalTambah').classList.remove('hidden'); }
        function bukaModalHapus(nama, usia, kamar, jk, kontak, ortu, akun) {
            document.getElementById('hapus_nama').value = nama;
            document.getElementById('hapus_usia').value = usia;
            document.getElementById('hapus_kamar').value = kamar;
            document.getElementById('hapus_id_akun').value = akun;
            document.getElementById('modalHapus').classList.remove('hidden');
        }
        function tutupModal(modalId) { document.getElementById(modalId).classList.add('hidden'); }
    </script>
</body>
</html>