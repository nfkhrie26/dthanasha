<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Kost - Dthanasha Kost</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            background-color: #F8FAFC; 
        }
        .sidebar-link:hover { background-color: rgba(255,255,255,0.1); }
        .active-link { background-color: #334155; color: white !important; }
        .card-shadow { box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03); }
        .no-scrollbar::-webkit-scrollbar { display: none; }
    </style>
</head>
<body class="flex min-h-screen text-zinc-800">

    <aside class="w-64 bg-[#18181B] text-zinc-400 flex flex-col fixed h-full z-50 border-r border-zinc-800">
        <div class="p-6 border-b border-gray-800 text-center">
            <h2 class="text-white text-xl font-bold tracking-tight uppercase">DTHANASHA KOST</h2>
            <p class="text-[10px] text-zinc-500 tracking-[0.2em] mt-1 uppercase">Penghuni</p>
        </div>
        
        <nav class="flex-1 px-4 py-6 space-y-1">
            <a href="{{ url('/penghuni/dashboard') }}" class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium transition-all hover:text-white">
                <i class="ph ph-squares-four text-lg"></i> Dashboard
            </a>
            <a href="{{ url('/penghuni/pembayaran') }}" class="sidebar-link active-link flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-semibold transition-all">
                <i class="ph ph-receipt text-lg text-white"></i> Pembayaran Kost
            </a>
            <a href="{{ url('/penghuni/profile') }}" class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium transition-all hover:text-white">
                <i class="ph ph-user text-lg text-white"></i> Profil Saya
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

    <main class="flex-1 ml-64 p-8">
        
        <header class="flex items-center justify-between mb-10 pb-4 border-b border-zinc-200">
            <div class="text-zinc-400 text-sm font-medium uppercase tracking-widest">Sisi Penghuni / Pembayaran</div>
            
            <div class="flex items-center gap-4">
                <div class="text-right">
                    <p class="text-sm font-bold text-zinc-900 uppercase">Kamar 100</p>
                    <p class="text-xs text-zinc-500 uppercase tracking-widest">Misael Feodora</p>
                </div>
                <div class="w-10 h-10 rounded-lg bg-[#334155] flex items-center justify-center text-white font-bold border border-zinc-700">MF</div>
            </div>
        </header>

        <div class="mb-6 p-4 bg-blue-50 border border-blue-200 rounded-xl flex gap-4 items-center">
            <p class="text-sm font-bold text-blue-700 flex-1"><i class="ph ph-info text-lg align-middle mr-2"></i> Area Tes Simulasi Callback Gateway:</p>
            <button onclick="bukaModalBerhasil()" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-xs font-bold rounded-lg transition-all shadow-sm">Test Modal Berhasil</button>
            <button onclick="bukaModalGagal()" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-xs font-bold rounded-lg transition-all shadow-sm">Test Modal Gagal</button>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-10">
            
            <div class="bg-white p-8 rounded-3xl card-shadow border border-gray-50 flex flex-col justify-between h-72">
                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1 flex items-center gap-2">
                            Status Tagihan Bulan Ini <i class="ph ph-wallet"></i>
                        </h3>
                        <div class="flex items-center gap-2 mt-4">
                            <i class="ph ph-calendar-blank text-zinc-400"></i>
                            <p class="text-sm font-bold text-zinc-700">Periode : <span class="font-black">April 2026</span></p>
                        </div>
                        <div class="flex items-center gap-2 mt-2">
                            <i class="ph ph-clock-countdown text-zinc-400"></i>
                            <p class="text-sm font-bold text-zinc-700">Jatuh Tempo : <span class="text-red-500 font-black">10 April 2026</span></p>
                        </div>
                    </div>
                    <span class="bg-red-50 text-red-600 text-[10px] font-black px-3 py-1.5 rounded-lg border border-red-100 uppercase tracking-widest flex items-center gap-1.5">
                        <div class="w-1.5 h-1.5 bg-red-600 rounded-full animate-pulse"></div> Belum Lunas
                    </span>
                </div>

                <div class="mt-auto pt-6 border-t border-zinc-100 flex justify-between items-end">
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Nominal Tagihan</p>
                        <p class="text-4xl font-black text-red-600">Rp 1.200.000</p>
                    </div>
                </div>
            </div>

            <div class="bg-white p-8 rounded-3xl card-shadow border border-gray-50 h-72 flex flex-col justify-center">
                <h3 class="text-sm font-bold text-zinc-900 uppercase tracking-wide mb-6">Aksi Cepat</h3>
                <div class="flex gap-6 h-full">
                    
                    <button class="flex-1 bg-[#18181B] hover:bg-[#334155] text-white rounded-2xl flex flex-col items-center justify-center gap-3 transition-all active:scale-95 shadow-md">
                        <i class="ph ph-wallet text-3xl"></i>
                        <span class="font-bold text-sm tracking-wide">Bayar Sekarang</span>
                    </button>
                    
                    <a href="https://wa.me/6281234567890" target="_blank" class="flex-1 bg-zinc-50 hover:bg-zinc-100 text-zinc-900 border border-zinc-200 rounded-2xl flex flex-col items-center justify-center gap-3 transition-all active:scale-95">
                        <i class="ph ph-chat-centered-text text-3xl"></i>
                        <span class="font-bold text-sm tracking-wide text-center px-4">Hubungi Pemilik</span>
                    </a>

                </div>
            </div>

        </div>

        <div class="bg-white rounded-3xl card-shadow border border-gray-50 overflow-hidden">
            <div class="p-6 border-b border-gray-50 flex justify-between items-center bg-zinc-50/50">
                <h3 class="text-sm font-bold text-zinc-900 uppercase tracking-wide">Riwayat Pembayaran Anda</h3>
                <i class="ph ph-clock-counter-clockwise text-zinc-400 text-lg"></i>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-zinc-100 text-zinc-500 text-[10px] uppercase tracking-widest border-b border-zinc-200">
                        <tr>
                            <th class="px-6 py-4">Periode Pembayaran</th>
                            <th class="px-6 py-4">Tanggal Pembayaran</th>
                            <th class="px-6 py-4 text-center">Status Pembayaran</th>
                            <th class="px-6 py-4 text-right">Nominal</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-100">
                        <tr class="hover:bg-zinc-50/80 transition-colors">
                            <td class="px-6 py-4 text-sm font-bold text-gray-900">Juni 2026</td>
                            <td class="px-6 py-4 text-sm font-medium text-zinc-600">-</td>
                            <td class="px-6 py-4 text-center">
                                <span class="text-amber-500 font-bold text-sm">Belum Lunas</span>
                            </td>
                            <td class="px-6 py-4 text-sm font-black text-zinc-900 text-right">Rp 1.000.000</td>
                        </tr>
                        <tr class="hover:bg-zinc-50/80 transition-colors">
                            <td class="px-6 py-4 text-sm font-bold text-gray-900">Mei 2026</td>
                            <td class="px-6 py-4 text-sm font-medium text-zinc-600">1 Mei 2026</td>
                            <td class="px-6 py-4 text-center">
                                <span class="text-green-500 font-bold text-sm">Lunas</span>
                            </td>
                            <td class="px-6 py-4 text-sm font-black text-zinc-900 text-right">Rp 1.000.000</td>
                        </tr>
                        <tr class="hover:bg-zinc-50/80 transition-colors">
                            <td class="px-6 py-4 text-sm font-bold text-gray-900">April 2026</td>
                            <td class="px-6 py-4 text-sm font-medium text-zinc-600">1 April 2026</td>
                            <td class="px-6 py-4 text-center">
                                <span class="text-green-500 font-bold text-sm">Lunas</span>
                            </td>
                            <td class="px-6 py-4 text-sm font-black text-zinc-900 text-right">Rp 1.000.000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <div id="modalBerhasil" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-[60] hidden flex items-center justify-center">
        <div class="bg-white w-full max-w-md rounded-3xl p-8 shadow-2xl scale-95 transition-all text-center">
            
            <h2 class="text-xl font-black text-gray-900 mb-6">Pembayaran Berhasil</h2>
            
            <div class="flex justify-center mb-6">
                <i class="ph-fill ph-check-circle text-green-600 text-7xl"></i>
            </div>

            <div class="space-y-4 mb-8 text-left bg-zinc-50 p-4 rounded-xl border border-zinc-100">
                <div class="flex justify-between items-center">
                    <span class="text-sm font-bold text-zinc-900">Periode Pembayaran</span>
                    <span class="text-sm font-medium text-zinc-700">Juni 2026</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-sm font-bold text-zinc-900">Tanggal Pembayaran</span>
                    <span class="text-sm font-medium text-zinc-700">1 Juni 2026</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-sm font-bold text-zinc-900">Status Pembayaran</span>
                    <span class="text-sm font-bold text-green-600">Berhasil</span>
                </div>
                <div class="flex justify-between items-center pt-2 border-t border-zinc-200">
                    <span class="text-sm font-bold text-zinc-900">Nominal</span>
                    <span class="text-base font-black text-zinc-900">Rp 1.000.000</span>
                </div>
            </div>

            <button onclick="tutupModal('modalBerhasil')" class="w-full px-4 py-3 rounded-xl bg-zinc-200 text-zinc-700 font-bold hover:bg-zinc-300 transition-all text-sm">
                Kembali
            </button>
        </div>
    </div>

    <div id="modalGagal" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-[60] hidden flex items-center justify-center">
        <div class="bg-white w-full max-w-md rounded-3xl p-8 shadow-2xl scale-95 transition-all text-center">
            
            <h2 class="text-xl font-black text-gray-900 mb-6">Pembayaran Gagal</h2>
            
            <div class="flex justify-center mb-6">
                <i class="ph-fill ph-warning-circle text-red-600 text-7xl"></i>
            </div>

            <div class="space-y-4 mb-8 text-left bg-zinc-50 p-4 rounded-xl border border-zinc-100">
                <div class="flex justify-between items-center">
                    <span class="text-sm font-bold text-zinc-900">Periode Pembayaran</span>
                    <span class="text-sm font-medium text-zinc-700">Juni 2026</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-sm font-bold text-zinc-900">Tanggal Pembayaran</span>
                    <span class="text-sm font-medium text-zinc-700">1 Juni 2026</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-sm font-bold text-zinc-900">Status Pembayaran</span>
                    <span class="text-sm font-bold text-red-600">Gagal</span>
                </div>
                <div class="flex justify-between items-center pt-2 border-t border-zinc-200">
                    <span class="text-sm font-bold text-zinc-900">Nominal</span>
                    <span class="text-base font-black text-zinc-900">Rp 1.000.000</span>
                </div>
            </div>

            <div class="flex gap-3">
                <button onclick="tutupModal('modalGagal')" class="flex-1 px-4 py-3 rounded-xl bg-zinc-200 text-zinc-700 font-bold hover:bg-zinc-300 transition-all text-sm">
                    Kembali
                </button>
                <a href="{{ url('/penghuni/pembayaran-manual') }}" class="flex-1 px-4 py-3 rounded-xl bg-blue-500 text-white font-bold hover:bg-blue-600 shadow-md transition-all text-sm active:scale-95 flex items-center justify-center">
                    Pembayaran Manual
                </a>
            </div>
        </div>
    </div>

    <div id="modalManual" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-[60] hidden flex items-center justify-center">
        <div class="bg-white w-full max-w-lg rounded-3xl p-8 shadow-2xl scale-95 transition-all max-h-[90vh] overflow-y-auto no-scrollbar">
            
            <div class="text-center mb-6">
                <div class="w-16 h-16 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-4 border border-blue-100">
                    <i class="ph ph-upload-simple text-3xl"></i>
                </div>
                <h2 class="text-xl font-black text-gray-900 uppercase tracking-wide">Upload Pembayaran Manual</h2>
            </div>
            
            <form action="{{ url('/proses_bayar_manual') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">Metode Transfer Ke</label>
                    <div class="p-4 border border-zinc-200 rounded-xl bg-white flex items-center justify-between">
                        <div>
                            <p class="text-sm font-black text-zinc-900">BCA - 1234567890</p>
                            <p class="text-xs font-bold text-zinc-500">a.n Pemilik Kost Dthanasha</p>
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">Upload Bukti Transfer</label>
                    <div class="w-full border-2 border-dashed border-zinc-300 rounded-2xl p-6 flex flex-col items-center justify-center text-zinc-500 hover:bg-zinc-50 transition-colors cursor-pointer bg-white">
                        <i class="ph ph-image text-3xl mb-2 text-zinc-400"></i>
                        <p class="text-sm font-bold text-zinc-700">Klik untuk unggah gambar</p>
                        <input type="file" name="bukti" class="hidden" required>
                    </div>
                </div>

                <div class="flex gap-3 pt-4 border-t border-zinc-100">
                    <button type="button" onclick="tutupModal('modalManual')" class="flex-1 px-4 py-3 rounded-xl bg-zinc-100 text-zinc-600 font-bold hover:bg-zinc-200 transition-all text-sm uppercase">Batal</button>
                    <button type="submit" class="flex-1 px-4 py-3 rounded-xl bg-[#18181B] text-white font-bold hover:bg-[#334155] transition-all text-sm uppercase">Kirim Bukti</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function bukaModalBerhasil() { 
            tutupSemuaModal();
            document.getElementById('modalBerhasil').classList.remove('hidden'); 
        }

        function bukaModalGagal() { 
            tutupSemuaModal();
            document.getElementById('modalGagal').classList.remove('hidden'); 
        }

        function pindahKeManual() {
            tutupSemuaModal();
            document.getElementById('modalManual').classList.remove('hidden');
        }

        function tutupModal(id) { 
            document.getElementById(id).classList.add('hidden'); 
        }

        function tutupSemuaModal() {
            document.getElementById('modalBerhasil').classList.add('hidden');
            document.getElementById('modalGagal').classList.add('hidden');
            document.getElementById('modalManual').classList.add('hidden');
        }
    </script>
</body>
</html>
