<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Manual - Dthanasha Kost</title>
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
        
        <header class="flex items-center justify-between mb-8 pb-4 border-b border-zinc-200">
            <div class="flex items-center gap-3">
                <a href="{{ url('/penghuni/pembayaran') }}" class="w-8 h-8 flex items-center justify-center rounded-lg bg-white border border-zinc-200 hover:bg-zinc-50 transition-all text-zinc-600">
                    <i class="ph ph-arrow-left font-bold"></i>
                </a>
                <div class="text-zinc-500 text-sm font-bold uppercase tracking-widest">Sisi Penghuni / Pembayaran Manual</div>
            </div>
            
            <div class="flex items-center gap-4">
                <div class="text-right">
                    <p class="text-sm font-bold text-zinc-900 uppercase">Kamar 100</p>
                    <p class="text-xs text-zinc-500 uppercase tracking-widest">Misael Feodora</p>
                </div>
                <div class="w-10 h-10 rounded-lg bg-[#334155] flex items-center justify-center text-white font-bold border border-zinc-700">MF</div>
            </div>
        </header>

        <div class="flex items-center gap-3 mb-8">
            <div class="w-12 h-12 bg-zinc-900 rounded-xl flex items-center justify-center text-white">
                <i class="ph ph-upload-simple text-2xl"></i>
            </div>
            <div>
                <h1 class="text-2xl font-black text-gray-900">Pembayaran Manual</h1>
                <p class="text-sm font-semibold text-zinc-500">Silakan transfer dan unggah bukti pembayaran Anda.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            
            <div class="space-y-8">
                
                <div>
                    <h3 class="text-sm font-bold text-zinc-900 uppercase tracking-wide mb-4 flex items-center gap-2">
                        Status Tagihan Saat Ini <i class="ph ph-wallet text-lg"></i>
                    </h3>
                    <div class="bg-white p-6 rounded-3xl card-shadow border border-gray-50 flex flex-col justify-between">
                        <div class="bg-zinc-100/80 border border-zinc-200 text-red-600 font-extrabold text-sm py-3 rounded-xl flex justify-center items-center gap-2 w-full mx-auto mb-6">
                            <div class="w-2 h-2 bg-red-600 rounded-full animate-pulse"></div> Belum Lunas
                        </div>
                        
                        <div class="space-y-4">
                            <div class="flex items-center gap-4 text-sm">
                                <span class="font-bold text-zinc-500 w-28 uppercase tracking-wider text-[11px]">Periode</span> 
                                <span class="font-bold text-zinc-900">April 2026</span>
                            </div>
                            <div class="flex items-center gap-4 text-sm">
                                <span class="font-bold text-zinc-500 w-28 uppercase tracking-wider text-[11px]">Jatuh Tempo</span> 
                                <span class="font-bold text-zinc-900">10 April 2026</span>
                            </div>
                            <div class="flex items-center gap-4 pt-4 border-t border-zinc-100">
                                <span class="font-bold text-zinc-500 w-28 uppercase tracking-wider text-[11px]">Nominal</span> 
                                <span class="font-black text-2xl text-red-600">Rp 1.200.000</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <h3 class="text-sm font-bold text-zinc-900 uppercase tracking-wide mb-4 flex items-center gap-2">
                        Pembayaran Melalui <i class="ph ph-credit-card text-lg"></i>
                    </h3>
                    <div class="bg-white rounded-3xl card-shadow border border-gray-50 overflow-hidden">
                        <div class="bg-zinc-100 px-6 py-4 border-b border-zinc-200">
                            <span class="font-black text-zinc-900 uppercase tracking-widest text-xs">Transfer Bank</span>
                        </div>
                        <div class="p-6 space-y-4">
                            <div>
                                <span class="block text-[11px] font-bold text-zinc-500 uppercase tracking-wider mb-1">Bank Tujuan</span>
                                <span class="font-bold text-zinc-900 text-lg">Bank BRI</span>
                            </div>
                            <div>
                                <span class="block text-[11px] font-bold text-zinc-500 uppercase tracking-wider mb-1">Nomor Rekening</span>
                                <div class="flex items-center gap-4">
                                    <span class="font-black text-zinc-900 text-2xl" id="norek">1234 5678 9012</span>
                                    <button onclick="salinRekening()" class="bg-zinc-100 hover:bg-zinc-200 text-zinc-700 text-xs font-bold px-3 py-1.5 rounded-lg border border-zinc-200 transition-all flex items-center gap-1">
                                        <i class="ph ph-copy"></i> <span id="text-salin">Salin</span>
                                    </button>
                                </div>
                            </div>
                            <div>
                                <span class="block text-[11px] font-bold text-zinc-500 uppercase tracking-wider mb-1">Nama Penerima</span>
                                <span class="font-bold text-zinc-900 text-lg">Pemilik Kost Dthanasha</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <h3 class="text-sm font-bold text-zinc-900 uppercase tracking-wide mb-4 flex items-center gap-2">
                    Upload Bukti Pembayaran <i class="ph ph-upload-simple text-lg"></i>
                </h3>
                
                <form action="{{ url('/proses_bayar_manual') }}" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-3xl card-shadow border border-gray-50 flex flex-col h-[calc(100%-2.5rem)]">
                    @csrf
                    
                    <div class="flex-1 flex flex-col justify-center">
                        <div class="relative w-full h-64 border-2 border-dashed border-zinc-300 bg-zinc-50 rounded-2xl flex flex-col items-center justify-center text-center hover:bg-zinc-100 hover:border-zinc-400 transition-all cursor-pointer group">
                            
                            <input type="file" name="bukti_transfer" id="fileInput" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" required accept=".jpg,.jpeg,.png,.pdf" onchange="tampilkanNamaFile()">
                            
                            <div class="flex flex-col items-center z-0 pointer-events-none" id="upload-content">
                                <div class="w-14 h-14 bg-amber-100 text-amber-600 rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                                    <i class="ph ph-plus text-2xl font-bold"></i>
                                </div>
                                <p class="text-sm font-bold text-zinc-900">Klik atau seret foto bukti transfer ke sini</p>
                                <p class="text-xs font-medium text-zinc-500 mt-2">Format: JPG, PNG, atau PDF (Maks. 5 MB)</p>
                            </div>
                            
                            <div class="flex flex-col items-center z-0 hidden pointer-events-none" id="file-selected">
                                <i class="ph-fill ph-file-image text-green-500 text-4xl mb-2"></i>
                                <p class="text-sm font-bold text-zinc-900" id="file-name">nama_file.jpg</p>
                                <p class="text-xs font-bold text-blue-600 mt-1">Klik untuk mengganti file</p>
                            </div>

                        </div>
                    </div>

                    <div class="mt-8 space-y-3">
                        <button type="submit" class="w-full py-4 rounded-xl bg-green-600 hover:bg-green-700 text-white font-black text-sm uppercase tracking-wide transition-all shadow-md active:scale-95 flex justify-center items-center gap-2">
                            Konfirmasi Pembayaran <i class="ph ph-check-circle text-lg"></i>
                        </button>
                        
                        <a href="{{ url('/penghuni/pembayaran') }}" class="w-full py-4 rounded-xl bg-zinc-100 hover:bg-zinc-200 text-zinc-600 font-bold text-sm uppercase tracking-wide transition-all flex justify-center items-center">
                            Kembali ke Daftar Tagihan
                        </a>
                    </div>
                </form>
            </div>

        </div>
    </main>

    <script>
        // Fitur Salin Rekening
        function salinRekening() {
            const norek = "123456789012"; // Nomor rekening bersih tanpa spasi
            navigator.clipboard.writeText(norek).then(() => {
                const textSalin = document.getElementById('text-salin');
                textSalin.innerText = "Tersalin!";
                textSalin.classList.add("text-green-600");
                
                setTimeout(() => {
                    textSalin.innerText = "Salin";
                    textSalin.classList.remove("text-green-600");
                }, 2000);
            });
        }

        // Fitur ganti UI pas file diupload
        function tampilkanNamaFile() {
            const input = document.getElementById('fileInput');
            const fileNameDisplay = document.getElementById('file-name');
            const defaultContent = document.getElementById('upload-content');
            const selectedContent = document.getElementById('file-selected');

            if (input.files && input.files.length > 0) {
                fileNameDisplay.innerText = input.files[0].name;
                defaultContent.classList.add('hidden');
                selectedContent.classList.remove('hidden');
            } else {
                defaultContent.classList.remove('hidden');
                selectedContent.classList.add('hidden');
            }
        }
    </script>
</body>
</html>
