<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waiting List - Dthanasha Kost</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
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
                <i class="ph ph-squares-four text-lg"></i> Dashboard
            </a>
            <a href="{{ url('/data_penghuni') }}" class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium transition-all hover:text-white">
                <i class="ph ph-users text-lg"></i> Data Penghuni
            </a>
            <a href="{{ url('/waiting_list') }}" class="sidebar-link active-link flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-semibold transition-all">
                <i class="ph ph-clock text-lg text-white"></i> Waiting List
            </a>
            <a href="{{ url('/manajemen_kamar') }}" class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium transition-all hover:text-white">
                <i class="ph ph-door text-lg"></i> Manajemen Kamar
            </a>
            <a href="{{ url('/pembayaran') }}" class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium transition-all hover:text-white">
                <i class="ph ph-receipt text-lg"></i> Pembayaran
            </a>
            <a href="{{ url('/riwayat') }}" class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium transition-all hover:text-white">
                <i class="ph ph-clock-counter-clockwise text-lg"></i> Riwayat
            </a>
        </nav>

        <div class="p-4 border-t border-gray-800">
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
                <i class="ph ph-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-lg"></i>
                <input type="text" placeholder="Cari nama calon penghuni..." class="w-full pl-12 pr-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#334155] focus:border-transparent bg-white card-shadow transition-all text-sm">
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
                    <i class="ph ph-gender-male text-3xl text-black"></i>
                </div>
                <div>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Pria</p>
                    <p class="text-3xl font-extrabold text-gray-900">30</p>
                </div>
            </div>
            <div class="bg-white p-6 rounded-2xl card-shadow border border-gray-50 flex items-center gap-4 w-60 group transition-all">
                <div class="w-14 h-14 bg-zinc-100 rounded-xl flex items-center justify-center border border-zinc-200 group-hover:bg-zinc-200 transition-colors">
                    <i class="ph ph-gender-female text-3xl text-black"></i>
                </div>
                <div>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Wanita</p>
                    <p class="text-3xl font-extrabold text-gray-900">50</p>
                </div>
            </div>
        </div>

        <!-- TABEL DATA WAITING LIST -->
        <div class="bg-white rounded-3xl card-shadow border border-gray-50 overflow-hidden">
            <div class="p-6 border-b border-gray-50 flex justify-between items-center bg-gray-50">
                <h3 class="text-sm font-bold text-gray-900 uppercase tracking-wide">Data Waiting List</h3>
                <div class="flex gap-3">
                    <select class="text-sm border border-zinc-200 bg-white rounded-lg px-3 py-2 outline-none font-semibold text-gray-600 cursor-pointer focus:ring-2 focus:ring-[#334155]">
                        <option>Semua Gender</option>
                        <option>Pria</option>
                        <option>Wanita</option>
                    </select>
                    <button onclick="bukaModalTambah()" class="bg-[#18181B] hover:bg-[#334155] text-white px-5 py-2 rounded-xl text-sm font-bold transition-all flex items-center gap-2 shadow-md active:scale-95">
                        <i class="ph ph-plus-circle text-lg"></i> Tambah Antrean
                    </button>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-zinc-100 text-zinc-500 text-[10px] uppercase tracking-widest border-b border-zinc-200">
                        <tr>
                            <!-- Lebar kolom dikunci biar sejajar lurus -->
                            <th class="px-6 py-4 text-center w-[10%]">NO</th>
                            <th class="px-6 py-4 w-[30%]">Nama Lengkap</th>
                            <th class="px-6 py-4 w-[20%]">Jenis Kelamin</th>
                            <th class="px-6 py-4 w-[25%]">Nomor Kontak</th>
                            <th class="px-6 py-4 text-right w-[15%]">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-100">
                        
                        <!-- Baris 1 -->
                        <tr class="hover:bg-zinc-50 transition-colors group">
                            <td class="px-6 py-4 text-sm font-bold text-zinc-400 text-center">1</td>
                            <td class="px-6 py-4 text-sm font-medium text-zinc-900 group-hover:text-[#334155] transition-colors">Dimas Anggara</td>
                            <td class="px-6 py-4 text-sm text-zinc-600">Pria</td>
                            <td class="px-6 py-4 text-sm font-medium text-zinc-600">081234567890</td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <button onclick="bukaModalEdit('1', 'Dimas Anggara', 'Pria', '081234567890')" class="w-8 h-8 flex items-center justify-center rounded-lg bg-zinc-100 hover:bg-zinc-200 text-zinc-600 transition-colors shadow-sm" title="Edit">
                                        <i class="ph ph-pencil-simple text-base"></i>
                                    </button>
                                    <form action="{{ url('/hapus_waiting_list') }}" method="POST" class="inline">
                                        @csrf @method('DELETE')
                                        <input type="hidden" name="id" value="1">
                                        <button type="submit" class="w-8 h-8 flex items-center justify-center rounded-lg bg-red-50 hover:bg-red-100 text-red-500 transition-colors shadow-sm" title="Hapus">
                                            <i class="ph ph-trash text-base"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        
                        <!-- Baris 2 -->
                        <tr class="hover:bg-zinc-50 transition-colors group">
                            <td class="px-6 py-4 text-sm font-bold text-zinc-400 text-center">2</td>
                            <td class="px-6 py-4 text-sm font-medium text-zinc-900 group-hover:text-[#334155] transition-colors">Putri Larasati</td>
                            <td class="px-6 py-4 text-sm text-zinc-600">Wanita</td>
                            <td class="px-6 py-4 text-sm font-medium text-zinc-600">081384700111</td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <button onclick="bukaModalEdit('2', 'Putri Larasati', 'Wanita', '081384700111')" class="w-8 h-8 flex items-center justify-center rounded-lg bg-zinc-100 hover:bg-zinc-200 text-zinc-600 transition-colors shadow-sm" title="Edit">
                                        <i class="ph ph-pencil-simple text-base"></i>
                                    </button>
                                    <form action="{{ url('/hapus_waiting_list') }}" method="POST" class="inline">
                                        @csrf @method('DELETE')
                                        <input type="hidden" name="id" value="2">
                                        <button type="submit" class="w-8 h-8 flex items-center justify-center rounded-lg bg-red-50 hover:bg-red-100 text-red-500 transition-colors shadow-sm" title="Hapus">
                                            <i class="ph ph-trash text-base"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                        <!-- Baris 3 -->
                        <tr class="hover:bg-zinc-50 transition-colors group">
                            <td class="px-6 py-4 text-sm font-bold text-zinc-400 text-center">3</td>
                            <td class="px-6 py-4 text-sm font-medium text-zinc-900 group-hover:text-[#334155] transition-colors">Reza Rahadian</td>
                            <td class="px-6 py-4 text-sm text-zinc-600">Pria</td>
                            <td class="px-6 py-4 text-sm font-medium text-zinc-600">081555666777</td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <button onclick="bukaModalEdit('3', 'Reza Rahadian', 'Pria', '081555666777')" class="w-8 h-8 flex items-center justify-center rounded-lg bg-zinc-100 hover:bg-zinc-200 text-zinc-600 transition-colors shadow-sm" title="Edit">
                                        <i class="ph ph-pencil-simple text-base"></i>
                                    </button>
                                    <form action="{{ url('/hapus_waiting_list') }}" method="POST" class="inline">
                                        @csrf @method('DELETE')
                                        <input type="hidden" name="id" value="3">
                                        <button type="submit" class="w-8 h-8 flex items-center justify-center rounded-lg bg-red-50 hover:bg-red-100 text-red-500 transition-colors shadow-sm" title="Hapus">
                                            <i class="ph ph-trash text-base"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                        <!-- Baris 4 -->
                        <tr class="hover:bg-zinc-50 transition-colors group">
                            <td class="px-6 py-4 text-sm font-bold text-zinc-400 text-center">4</td>
                            <td class="px-6 py-4 text-sm font-medium text-zinc-900 group-hover:text-[#334155] transition-colors">Budi Santoso</td>
                            <td class="px-6 py-4 text-sm text-zinc-600">Pria</td>
                            <td class="px-6 py-4 text-sm font-medium text-zinc-600">081299887766</td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <button onclick="bukaModalEdit('4', 'Budi Santoso', 'Pria', '081299887766')" class="w-8 h-8 flex items-center justify-center rounded-lg bg-zinc-100 hover:bg-zinc-200 text-zinc-600 transition-colors shadow-sm" title="Edit">
                                        <i class="ph ph-pencil-simple text-base"></i>
                                    </button>
                                    <form action="{{ url('/hapus_waiting_list') }}" method="POST" class="inline">
                                        @csrf @method('DELETE')
                                        <input type="hidden" name="id" value="4">
                                        <button type="submit" class="w-8 h-8 flex items-center justify-center rounded-lg bg-red-50 hover:bg-red-100 text-red-500 transition-colors shadow-sm" title="Hapus">
                                            <i class="ph ph-trash text-base"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                        <!-- Baris 5 -->
                        <tr class="hover:bg-zinc-50 transition-colors group">
                            <td class="px-6 py-4 text-sm font-bold text-zinc-400 text-center">5</td>
                            <td class="px-6 py-4 text-sm font-medium text-zinc-900 group-hover:text-[#334155] transition-colors">Ayu Lestari</td>
                            <td class="px-6 py-4 text-sm text-zinc-600">Wanita</td>
                            <td class="px-6 py-4 text-sm font-medium text-zinc-600">085612345678</td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <button onclick="bukaModalEdit('5', 'Ayu Lestari', 'Wanita', '085612345678')" class="w-8 h-8 flex items-center justify-center rounded-lg bg-zinc-100 hover:bg-zinc-200 text-zinc-600 transition-colors shadow-sm" title="Edit">
                                        <i class="ph ph-pencil-simple text-base"></i>
                                    </button>
                                    <form action="{{ url('/hapus_waiting_list') }}" method="POST" class="inline">
                                        @csrf @method('DELETE')
                                        <input type="hidden" name="id" value="5">
                                        <button type="submit" class="w-8 h-8 flex items-center justify-center rounded-lg bg-red-50 hover:bg-red-100 text-red-500 transition-colors shadow-sm" title="Hapus">
                                            <i class="ph ph-trash text-base"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

            <!-- PAGINATION -->
            <div class="p-6 border-t border-zinc-100 flex items-center justify-between bg-white">
                <p class="text-xs font-semibold text-zinc-400">Menampilkan 5 dari 80 Antrean</p>
                <div class="flex gap-2">
                    <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-zinc-200 text-zinc-400 hover:bg-zinc-50 transition-all"><i class="ph ph-caret-left font-bold"></i></button>
                    <button class="w-8 h-8 flex items-center justify-center rounded-lg bg-[#334155] text-white text-xs font-bold shadow-sm">1</button>
                    <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-zinc-200 text-zinc-600 hover:bg-zinc-50 text-xs font-bold transition-all">2</button>
                    <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-zinc-200 text-zinc-400 hover:bg-zinc-50 transition-all"><i class="ph ph-caret-right font-bold"></i></button>
                </div>
            </div>
        </div>
    </main>

    <!-- MODAL TAMBAH -->
    <div id="modalTambah" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-[60] hidden flex items-center justify-center">
        <div class="bg-white w-full max-w-md rounded-3xl p-8 shadow-2xl scale-95 transition-all">
            <h2 class="text-xl font-black text-gray-900 mb-6 text-center uppercase tracking-wide">Tambah Waiting List</h2>
            <form action="{{ url('/tambah_waiting_list') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">Nama Lengkap</label>
                    <input type="text" name="nama" class="w-full px-4 py-3 rounded-xl bg-white border border-zinc-200 focus:outline-none focus:ring-2 focus:ring-[#334155] transition-all text-sm font-bold text-zinc-900" required>
                </div>
                <div>
                    <label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="w-full px-4 py-3 rounded-xl bg-white border border-zinc-200 focus:outline-none focus:ring-2 focus:ring-[#334155] transition-all text-sm font-bold text-zinc-900" required>
                        <option value="Pria">Pria</option>
                        <option value="Wanita">Wanita</option>
                    </select>
                </div>
                <div>
                    <label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">Nomor Telepon</label>
                    <input type="text" name="telepon" class="w-full px-4 py-3 rounded-xl bg-white border border-zinc-200 focus:outline-none focus:ring-2 focus:ring-[#334155] transition-all text-sm font-bold text-zinc-900" required>
                </div>

                <div class="flex gap-3 pt-6 border-t border-zinc-100">
                    <button type="button" onclick="tutupModal('modalTambah')" class="flex-1 px-4 py-3.5 rounded-xl bg-zinc-100 text-zinc-600 font-bold hover:bg-zinc-200 transition-all text-sm uppercase tracking-wide">Batal</button>
                    <button type="submit" class="flex-1 px-4 py-3.5 rounded-xl bg-[#18181B] text-white font-bold hover:bg-[#334155] shadow-lg transition-all active:scale-95 text-sm uppercase tracking-wide">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>

    <!-- MODAL EDIT -->
    <div id="modalEdit" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-[60] hidden flex items-center justify-center">
        <div class="bg-white w-full max-w-md rounded-3xl p-8 shadow-2xl scale-95 transition-all">
            <h2 class="text-xl font-black text-gray-900 mb-6 text-center uppercase tracking-wide">Edit Waiting List</h2>
            <form action="{{ url('/edit_waiting_list') }}" method="POST" class="space-y-4">
                @csrf @method('PUT')
                <input type="hidden" id="edit_id" name="id">
                
                <div>
                    <label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">Nama Lengkap</label>
                    <input type="text" id="edit_nama" name="nama" class="w-full px-4 py-3 rounded-xl bg-white border border-zinc-200 focus:outline-none focus:ring-2 focus:ring-[#334155] transition-all text-sm font-bold text-zinc-900" required>
                </div>
                <div>
                    <label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">Jenis Kelamin</label>
                    <select id="edit_jk" name="jenis_kelamin" class="w-full px-4 py-3 rounded-xl bg-white border border-zinc-200 focus:outline-none focus:ring-2 focus:ring-[#334155] transition-all text-sm font-bold text-zinc-900" required>
                        <option value="Pria">Pria</option>
                        <option value="Wanita">Wanita</option>
                    </select>
                </div>
                <div>
                    <label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">Nomor Telepon</label>
                    <input type="text" id="edit_telepon" name="telepon" class="w-full px-4 py-3 rounded-xl bg-white border border-zinc-200 focus:outline-none focus:ring-2 focus:ring-[#334155] transition-all text-sm font-bold text-zinc-900" required>
                </div>

                <div class="flex gap-3 pt-6 border-t border-zinc-100">
                    <button type="button" onclick="tutupModal('modalEdit')" class="flex-1 px-4 py-3.5 rounded-xl bg-zinc-100 text-zinc-600 font-bold hover:bg-zinc-200 transition-all text-sm uppercase tracking-wide">Batal</button>
                    <button type="submit" class="flex-1 px-4 py-3.5 rounded-xl bg-[#18181B] text-white font-bold hover:bg-[#334155] shadow-lg transition-all active:scale-95 text-sm uppercase tracking-wide">Update Data</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function bukaModalTambah() { 
            document.getElementById('modalTambah').classList.remove('hidden'); 
        }

        function bukaModalEdit(id, nama, jk, telepon) {
            document.getElementById('edit_id').value = id;
            document.getElementById('edit_nama').value = nama;
            document.getElementById('edit_jk').value = jk;
            document.getElementById('edit_telepon').value = telepon;
            
            document.getElementById('modalEdit').classList.remove('hidden');
        }

        function tutupModal(modalId) { 
            document.getElementById(modalId).classList.add('hidden'); 
        }
    </script>
</body>
</html>