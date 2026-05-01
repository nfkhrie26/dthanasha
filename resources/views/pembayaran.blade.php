<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran - Dthanasha Kost</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
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
            <a href="{{ url('/pembayaran') }}" class="sidebar-link active-link flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-semibold transition-all">
                <i class="ph ph-receipt text-lg text-white"></i> Pembayaran
            </a>
            <a href="{{ url('/riwayat') }}" class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium transition-all hover:text-white">
                <i class="ph ph-clock-counter-clockwise text-lg"></i> Riwayat
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
                <input type="text" placeholder="Cari nama penghuni atau nomor kamar..." class="w-full pl-12 pr-4 py-2.5 rounded-xl border border-zinc-200 focus:outline-none focus:ring-2 focus:ring-[#334155] focus:border-transparent bg-white card-shadow transition-all text-sm font-medium">
            </div>
            
            <div class="flex items-center gap-4">
                <div class="text-right">
                    <p class="text-sm font-bold text-zinc-900 uppercase">Pemilik Kost</p>
                    <p class="text-xs text-zinc-500 uppercase tracking-widest">Administrator</p>
                </div>
                <div class="w-11 h-11 rounded-lg bg-[#334155] flex items-center justify-center text-white font-bold shadow-lg border border-zinc-700">PE</div>
            </div>
        </header>

        <!-- SUMMARY CARDS -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10 max-w-4xl">
            <div class="bg-white p-6 rounded-2xl card-shadow border border-zinc-50 flex items-center justify-between group">
                <div>
                    <p class="text-[11px] font-bold text-zinc-400 uppercase tracking-widest mb-1">Sudah Membayar</p>
                    <p class="text-3xl font-black text-zinc-900">80</p>
                </div>
                <div class="w-14 h-14 bg-zinc-100 rounded-xl flex items-center justify-center border border-zinc-200 group-hover:bg-zinc-200 transition-colors">
                    <i class="ph-fill ph-check-circle text-2xl text-emerald-500"></i>
                </div>
            </div>
            <div class="bg-white p-6 rounded-2xl card-shadow border border-zinc-50 flex items-center justify-between group">
                <div>
                    <p class="text-[11px] font-bold text-zinc-400 uppercase tracking-widest mb-1">Menunggu Konfirmasi</p>
                    <p class="text-3xl font-black text-zinc-900">10</p>
                </div>
                <div class="w-14 h-14 bg-zinc-100 rounded-xl flex items-center justify-center border border-zinc-200 group-hover:bg-zinc-200 transition-colors">
                    <i class="ph-fill ph-clock-countdown text-2xl text-amber-500"></i>
                </div>
            </div>
            <div class="bg-white p-6 rounded-2xl card-shadow border border-zinc-50 flex items-center justify-between group">
                <div>
                    <p class="text-[11px] font-bold text-zinc-400 uppercase tracking-widest mb-1">Belum Membayar</p>
                    <p class="text-3xl font-black text-zinc-900">10</p>
                </div>
                <div class="w-14 h-14 bg-zinc-100 rounded-xl flex items-center justify-center border border-zinc-200 group-hover:bg-zinc-200 transition-colors">
                    <i class="ph-fill ph-warning-circle text-2xl text-red-500"></i>
                </div>
            </div>
        </div>

        <!-- FILTER -->
        <div class="flex items-center gap-4 mb-8">
            <select class="px-5 py-2.5 rounded-xl border border-zinc-200 bg-white text-sm font-semibold outline-none card-shadow cursor-pointer text-zinc-700 focus:ring-2 focus:ring-[#334155]">
                <option>Semua Status</option>
                <option>Sudah Membayar</option>
                <option>Menunggu Konfirmasi</option>
                <option>Belum Membayar</option>
            </select>
        </div>

        <!-- GRID DATA PEMBAYARAN -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            
            <!-- Card Belum Membayar -->
            <div class="bg-white w-full rounded-[1.25rem] p-5 card-shadow border border-zinc-100 flex flex-col gap-5 hover:shadow-lg hover:border-zinc-200 transition-all group">
                <div class="flex justify-between items-start">
                    <div class="bg-[#18181B] text-white w-[65px] h-[65px] rounded-2xl flex items-center justify-center font-bold text-2xl shadow-sm tracking-wide">120</div>
                    <div class="text-right flex flex-col items-end">
                        <p class="text-[15px] font-bold text-zinc-900 mb-1 group-hover:text-[#334155] transition-colors">Misael</p>
                        <span class="text-[10px] font-black uppercase tracking-widest text-zinc-500 bg-zinc-100 px-2.5 py-1 rounded-lg">Reguler</span>
                    </div>
                </div>
                <button onclick="bukaModalKonfirmasi('Misael', '120', 'Belum Membayar')" class="bg-red-500 hover:bg-red-600 text-white font-bold py-3 rounded-xl w-full text-sm shadow-md transition-all active:scale-95 mt-2 flex justify-center items-center gap-2">
                    <i class="ph-fill ph-warning-circle text-lg"></i> Belum Membayar
                </button>
            </div>

            <!-- Card Menunggu Pembayaran -->
            <div class="bg-white w-full rounded-[1.25rem] p-5 card-shadow border border-zinc-100 flex flex-col gap-5 hover:shadow-lg hover:border-zinc-200 transition-all group">
                <div class="flex justify-between items-start">
                    <div class="bg-[#18181B] text-white w-[65px] h-[65px] rounded-2xl flex items-center justify-center font-bold text-2xl shadow-sm tracking-wide">121</div>
                    <div class="text-right flex flex-col items-end">
                        <p class="text-[15px] font-bold text-zinc-900 mb-1 group-hover:text-[#334155] transition-colors">Ayu Lestari</p>
                        <span class="text-[10px] font-black uppercase tracking-widest text-zinc-500 bg-zinc-100 px-2.5 py-1 rounded-lg">Reguler</span>
                    </div>
                </div>
                <button onclick="bukaModalKonfirmasi('Ayu Lestari', '121', 'Menunggu Konfirmasi')" class="bg-amber-500 hover:bg-amber-600 text-white font-bold py-3 rounded-xl w-full text-sm shadow-md transition-all active:scale-95 mt-2 flex justify-center items-center gap-2">
                    <i class="ph-fill ph-clock-countdown text-lg"></i> Menunggu Konfirmasi
                </button>
            </div>

            <!-- Card Sudah Membayar -->
            <div class="bg-white w-full rounded-[1.25rem] p-5 card-shadow border border-zinc-100 flex flex-col gap-5 hover:shadow-lg hover:border-zinc-200 transition-all group">
                <div class="flex justify-between items-start">
                    <div class="bg-[#18181B] text-white w-[65px] h-[65px] rounded-2xl flex items-center justify-center font-bold text-2xl shadow-sm tracking-wide">122</div>
                    <div class="text-right flex flex-col items-end">
                        <p class="text-[15px] font-bold text-zinc-900 mb-1 group-hover:text-[#334155] transition-colors">Dimas Anggara</p>
                        <span class="text-[10px] font-black uppercase tracking-widest text-zinc-500 bg-zinc-100 px-2.5 py-1 rounded-lg">VIP</span>
                    </div>
                </div>
                <button onclick="bukaModalKonfirmasi('Dimas Anggara', '122', 'Sudah Membayar')" class="bg-emerald-500 hover:bg-emerald-600 text-white font-bold py-3 rounded-xl w-full text-sm shadow-md transition-all active:scale-95 mt-2 flex justify-center items-center gap-2">
                    <i class="ph-fill ph-check-circle text-lg"></i> Sudah Membayar
                </button>
            </div>

            <!-- Card Belum Membayar -->
            <div class="bg-white w-full rounded-[1.25rem] p-5 card-shadow border border-zinc-100 flex flex-col gap-5 hover:shadow-lg hover:border-zinc-200 transition-all group">
                <div class="flex justify-between items-start">
                    <div class="bg-[#18181B] text-white w-[65px] h-[65px] rounded-2xl flex items-center justify-center font-bold text-2xl shadow-sm tracking-wide">123</div>
                    <div class="text-right flex flex-col items-end">
                        <p class="text-[15px] font-bold text-zinc-900 mb-1 group-hover:text-[#334155] transition-colors">Putri Larasati</p>
                        <span class="text-[10px] font-black uppercase tracking-widest text-zinc-500 bg-zinc-100 px-2.5 py-1 rounded-lg">Reguler</span>
                    </div>
                </div>
                <button onclick="bukaModalKonfirmasi('Putri Larasati', '123', 'Belum Membayar')" class="bg-red-500 hover:bg-red-600 text-white font-bold py-3 rounded-xl w-full text-sm shadow-md transition-all active:scale-95 mt-2 flex justify-center items-center gap-2">
                    <i class="ph-fill ph-warning-circle text-lg"></i> Belum Membayar
                </button>
            </div>

            <!-- Card Sudah Membayar -->
            <div class="bg-white w-full rounded-[1.25rem] p-5 card-shadow border border-zinc-100 flex flex-col gap-5 hover:shadow-lg hover:border-zinc-200 transition-all group">
                <div class="flex justify-between items-start">
                    <div class="bg-[#18181B] text-white w-[65px] h-[65px] rounded-2xl flex items-center justify-center font-bold text-2xl shadow-sm tracking-wide">124</div>
                    <div class="text-right flex flex-col items-end">
                        <p class="text-[15px] font-bold text-zinc-900 mb-1 group-hover:text-[#334155] transition-colors">Reza Rahadian</p>
                        <span class="text-[10px] font-black uppercase tracking-widest text-zinc-500 bg-zinc-100 px-2.5 py-1 rounded-lg">VIP</span>
                    </div>
                </div>
                <button onclick="bukaModalKonfirmasi('Reza Rahadian', '124', 'Sudah Membayar')" class="bg-emerald-500 hover:bg-emerald-600 text-white font-bold py-3 rounded-xl w-full text-sm shadow-md transition-all active:scale-95 mt-2 flex justify-center items-center gap-2">
                    <i class="ph-fill ph-check-circle text-lg"></i> Sudah Membayar
                </button>
            </div>

        </div>

        <!-- PAGINATION CUSTOM -->
        <div class="flex justify-end items-center gap-2 mt-10">
            <button class="w-10 h-10 flex items-center justify-center rounded-xl border border-zinc-200 text-zinc-400 hover:bg-white transition-all bg-transparent"><i class="ph ph-caret-left font-bold"></i></button>
            <button class="w-10 h-10 flex items-center justify-center rounded-xl bg-[#334155] text-white text-sm font-bold shadow-sm">1</button>
            <button class="w-10 h-10 flex items-center justify-center rounded-xl border border-zinc-200 text-zinc-600 hover:bg-white text-sm font-bold transition-all bg-transparent">2</button>
            <button class="w-10 h-10 flex items-center justify-center rounded-xl border border-zinc-200 text-zinc-600 hover:bg-white text-sm font-bold transition-all bg-transparent">3</button>
            <button class="w-10 h-10 flex items-center justify-center rounded-xl border border-zinc-200 text-zinc-400 hover:bg-white transition-all bg-transparent"><i class="ph ph-caret-right font-bold"></i></button>
        </div>
    </main>

    <!-- MODAL KONFIRMASI PEMBAYARAN -->
    <div id="modalKonfirmasi" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-[60] hidden flex items-center justify-center">
        <div class="bg-white w-full max-w-md rounded-3xl p-8 shadow-2xl scale-95 transition-all max-h-[90vh] overflow-y-auto no-scrollbar">
            
            <h2 id="modal_judul" class="text-xl font-black text-zinc-900 mb-6 text-center uppercase tracking-wide">Konfirmasi Pembayaran</h2>
            
            <form action="{{ url('/proses_pembayaran') }}" method="POST" id="formPembayaran" class="space-y-4">
                @csrf
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">Nama</label>
                        <input type="text" id="modal_nama" name="nama" class="w-full px-4 py-3 rounded-xl bg-zinc-50 border border-zinc-100 font-bold focus:outline-none text-zinc-600 text-sm" readonly>
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">Nomor Kamar</label>
                        <input type="text" id="modal_kamar" name="nomor_kamar" class="w-full px-4 py-3 rounded-xl bg-zinc-50 border border-zinc-100 font-bold focus:outline-none text-zinc-600 text-sm" readonly>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">Status</label>
                        <input type="text" id="modal_status" name="status" class="w-full px-4 py-3 rounded-xl bg-zinc-50 border border-zinc-100 font-bold focus:outline-none text-zinc-600 text-sm" readonly>
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">Nominal</label>
                        <input type="text" id="modal_nominal" name="nominal" class="w-full px-4 py-3 rounded-xl bg-white border border-zinc-200 focus:outline-none focus:ring-2 focus:ring-[#334155] transition-all text-sm font-bold text-zinc-900">
                    </div>
                </div>

                <div>
                    <label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">Metode Pembayaran</label>
                    <select id="modal_metode" name="metode_pembayaran" class="w-full px-4 py-3 rounded-xl bg-white border border-zinc-200 focus:outline-none focus:ring-2 focus:ring-[#334155] transition-all text-sm font-bold text-zinc-900">
                        <option value="">Pilih Metode...</option>
                        <option value="Transfer Bank">Transfer Bank</option>
                        <option value="Cash">Cash</option>
                        <option value="E-Wallet">E-Wallet (OVO/Dana/Gopay)</option>
                    </select>
                </div>
                
                <div>
                    <label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">Bukti Pembayaran (Link/File)</label>
                    <input type="text" id="modal_bukti" name="bukti_pembayaran" class="w-full px-4 py-3 rounded-xl bg-white border border-zinc-200 focus:outline-none focus:ring-2 focus:ring-[#334155] transition-all text-sm font-bold text-zinc-900" placeholder="Masukkan link bukti bayar">
                </div>

                <div id="modal_action_buttons" class="flex flex-col gap-3 pt-6 border-t border-zinc-100">
                    <!-- Tombol di-inject via JS -->
                </div>
            </form>
        </div>
    </div>

    <script>
        function bukaModalKonfirmasi(nama, kamar, status) { 
            // 1. Isi form otomatis
            document.getElementById('modal_nama').value = nama;
            document.getElementById('modal_kamar').value = kamar;
            document.getElementById('modal_status').value = status;
            
            document.getElementById('modal_nominal').value = "";
            document.getElementById('modal_metode').value = "";
            document.getElementById('modal_bukti').value = "";

            // 2. Manipulasi Tombol Action berdasarkan Status
            const actionContainer = document.getElementById('modal_action_buttons');
            const judulModal = document.getElementById('modal_judul');
            const inputs = document.querySelectorAll('#modal_nominal, #modal_metode, #modal_bukti');

            if (status === 'Sudah Membayar') {
                // Kalau udah bayar: Cuma tombol KEMBALI dan form jadi Readonly
                judulModal.innerText = "Detail Pembayaran";
                
                inputs.forEach(input => {
                    input.setAttribute('disabled', true);
                    input.classList.add('bg-zinc-50', 'text-zinc-500');
                    input.classList.remove('bg-white', 'text-zinc-900');
                });

                actionContainer.innerHTML = `
                    <button type="button" onclick="tutupModal('modalKonfirmasi')" class="w-full px-4 py-3.5 rounded-xl bg-zinc-100 text-zinc-600 font-bold hover:bg-zinc-200 transition-all text-sm uppercase tracking-wide">
                        Tutup Detail
                    </button>
                `;
            } else {
                // Kalau Belum Membayar / Menunggu Konfirmasi
                judulModal.innerText = "Konfirmasi Pembayaran";
                
                inputs.forEach(input => {
                    input.removeAttribute('disabled');
                    input.classList.remove('bg-zinc-50', 'text-zinc-500');
                    input.classList.add('bg-white', 'text-zinc-900');
                });

                const urlNotif = "{{ url('/kirim_notifikasi') }}";

                actionContainer.innerHTML = `
                    <div class="flex gap-3">
                        <button type="button" onclick="tutupModal('modalKonfirmasi')" class="flex-1 px-4 py-3.5 rounded-xl bg-zinc-100 text-zinc-600 font-bold hover:bg-zinc-200 transition-all text-sm uppercase tracking-wide">Batal</button>
                        <button type="submit" class="flex-1 px-4 py-3.5 rounded-xl bg-emerald-500 text-white font-bold hover:bg-emerald-600 shadow-lg transition-all active:scale-95 text-sm uppercase tracking-wide flex items-center justify-center gap-2">
                            <i class="ph ph-check-circle text-lg"></i> Konfirmasi
                        </button>
                    </div>
                    <button type="button" onclick="window.location.href='${urlNotif}'" class="w-full px-4 py-3.5 rounded-xl bg-yellow-50 border border-yellow-100 text-yellow-600 font-bold hover:bg-yellow-100 transition-all active:scale-95 flex items-center justify-center gap-2 text-sm uppercase tracking-wide mt-2">
                        <i class="ph-fill ph-bell text-xl"></i> Kirim Notifikasi Pembayaran
                    </button>
                `;
            }

            // 3. Tampilkan Modal
            document.getElementById('modalKonfirmasi').classList.remove('hidden'); 
        }

        function tutupModal(modalId) { 
            document.getElementById(modalId).classList.add('hidden'); 
        }
    </script>
</body>
</html>