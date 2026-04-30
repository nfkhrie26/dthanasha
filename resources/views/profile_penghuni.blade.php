<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya - Dthanasha Kost</title>
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
        
        /* Animasi form edit */
        .fade-in { animation: fadeIn 0.3s ease-in-out; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(-5px); } to { opacity: 1; transform: translateY(0); } }
    </style>
</head>
<body class="flex min-h-screen text-zinc-800">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-[#18181B] text-zinc-400 flex flex-col fixed h-full z-50 border-r border-zinc-800">
        <div class="p-6 border-b border-gray-800 text-center">
            <h2 class="text-white text-xl font-bold tracking-tight uppercase">DTHANASHA KOST</h2>
            <p class="text-[10px] text-zinc-500 tracking-[0.2em] mt-1 uppercase">Penghuni</p>
        </div>
        
        <nav class="flex-1 px-4 py-6 space-y-1">
            <a href="{{ url('/penghuni/dashboard') }}" class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium transition-all hover:text-white">
                <i class="ph ph-squares-four text-lg"></i> Dashboard
            </a>
            <a href="{{ url('/penghuni/pembayaran') }}" class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium transition-all hover:text-white">
                <i class="ph ph-receipt text-lg"></i> Pembayaran Kost
            </a>
            <a href="{{ url('/penghuni/profile') }}" class="sidebar-link active-link flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-semibold transition-all">
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

    <!-- MAIN CONTENT -->
    <main class="flex-1 ml-64 p-8">
        
        <!-- HEADER -->
        <header class="flex items-center justify-between mb-10 pb-4 border-b border-zinc-200">
            <div class="text-zinc-400 text-sm font-bold uppercase tracking-widest">Sisi Penghuni / Profil Saya</div>
            
            <div class="flex items-center gap-4">
                <div class="text-right">
                    <p class="text-sm font-bold text-zinc-900 uppercase">Kamar 100</p>
                    <p class="text-xs text-zinc-500 uppercase tracking-widest">Misael Feodora</p>
                </div>
                <div class="w-10 h-10 rounded-lg bg-[#334155] flex items-center justify-center text-white font-bold border border-zinc-700">MF</div>
            </div>
        </header>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- KOLOM KIRI: AVATAR & INFO SINGKAT -->
            <div class="space-y-6">
                
                <!-- Card Foto Profil -->
                <div class="bg-white p-8 rounded-3xl card-shadow border border-gray-50 flex flex-col items-center text-center">
                    <div class="relative mb-6 group">
                        <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-zinc-100 shadow-sm bg-[#334155] flex items-center justify-center text-white text-4xl font-bold">
                            <!-- Inisial jika belum ada foto -->
                            MF
                        </div>
                        <label class="absolute inset-0 bg-black/50 rounded-full flex flex-col items-center justify-center text-white opacity-0 group-hover:opacity-100 transition-opacity cursor-pointer">
                            <i class="ph ph-camera text-2xl mb-1"></i>
                            <span class="text-[10px] font-bold uppercase tracking-wider">Ubah</span>
                            <input type="file" class="hidden" accept="image/*">
                        </label>
                    </div>

                    <h2 class="text-xl font-black text-zinc-900 uppercase tracking-wide">Misael Feodora</h2>
                    <p class="text-sm font-semibold text-zinc-500 mb-6">Penghuni</p>

                    <div class="w-full bg-zinc-50 p-4 rounded-2xl border border-zinc-100 flex justify-between items-center">
                        <div class="text-left">
                            <p class="text-[10px] font-bold text-zinc-400 uppercase tracking-widest">Kamar Saat Ini</p>
                            <p class="text-lg font-black text-zinc-900">100</p>
                        </div>
                        <i class="ph-fill ph-door text-zinc-300 text-3xl"></i>
                    </div>
                </div>
            </div>

            <!-- KOLOM KANAN: DATA DIRI & FORM EDIT -->
            <div class="lg:col-span-2">
                <div class="bg-white p-8 rounded-3xl card-shadow border border-gray-50 min-h-[500px]">
                    
                    <div class="flex justify-between items-center mb-8 border-b border-zinc-100 pb-4">
                        <h3 class="text-lg font-black text-zinc-900 uppercase tracking-wide">Informasi Pribadi</h3>
                        <button id="btnEdit" onclick="toggleEditMode()" class="px-4 py-2 bg-[#18181B] hover:bg-[#334155] text-white rounded-xl font-bold text-xs uppercase tracking-widest transition-all shadow-md flex items-center gap-2 active:scale-95">
                            <i class="ph ph-pencil-simple"></i> Edit Profil
                        </button>
                    </div>

                    <!-- MODE VIEW (Hanya Baca) -->
                    <div id="viewMode" class="space-y-6 fade-in">
                        <div class="grid grid-cols-2 gap-8">
                            
                            <!-- Baris 1: Nama & Usia -->
                            <div>
                                <p class="text-[11px] font-bold text-zinc-400 uppercase tracking-widest mb-2">Nama Lengkap</p>
                                <p class="text-sm font-bold text-zinc-900">Misael Feodora D</p>
                            </div>
                            <div>
                                <p class="text-[11px] font-bold text-zinc-400 uppercase tracking-widest mb-2">Usia</p>
                                <p class="text-sm font-bold text-zinc-900">21</p>
                            </div>

                            <!-- Baris 2: Nomor Kamar & Jenis Kelamin -->
                            <div>
                                <p class="text-[11px] font-bold text-zinc-400 uppercase tracking-widest mb-2">Nomor Kamar</p>
                                <p class="text-sm font-bold text-zinc-900">100</p>
                            </div>
                            <div>
                                <p class="text-[11px] font-bold text-zinc-400 uppercase tracking-widest mb-2">Jenis Kelamin</p>
                                <p class="text-sm font-bold text-zinc-900">Pria</p>
                            </div>

                            <!-- Baris 3: Kontak & Nomor Ortu -->
                            <div>
                                <p class="text-[11px] font-bold text-zinc-400 uppercase tracking-widest mb-2">Kontak</p>
                                <p class="text-sm font-bold text-zinc-900">081384700455</p>
                            </div>
                            <div>
                                <p class="text-[11px] font-bold text-zinc-400 uppercase tracking-widest mb-2">Nomor Orang Tua</p>
                                <p class="text-sm font-bold text-zinc-900">081384700455</p>
                            </div>
                            
                            <!-- Baris 4: Nama Akun & Password -->
                            <div>
                                <p class="text-[11px] font-bold text-zinc-400 uppercase tracking-widest mb-2">Nama Akun</p>
                                <p class="text-sm font-bold text-zinc-900">Mr ael</p>
                            </div>
                            <div>
                                <p class="text-[11px] font-bold text-zinc-400 uppercase tracking-widest mb-2">Password</p>
                                <div class="flex items-center gap-2">
                                    <p class="text-sm font-bold text-zinc-900 tracking-widest">***********</p>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- MODE EDIT (Formulir) -->
                    <form id="editMode" action="{{ url('/penghuni/update-profile') }}" method="POST" class="space-y-6 hidden fade-in">
                        @csrf
                        <div class="grid grid-cols-2 gap-6">
                            
                            <!-- Input Nama -->
                            <div>
                                <label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">Nama Lengkap</label>
                                <input type="text" name="nama" value="Misael Feodora D" class="w-full px-4 py-3 rounded-xl bg-zinc-50 border border-zinc-200 focus:outline-none focus:ring-2 focus:ring-[#334155] transition-all text-sm font-bold text-zinc-900" required>
                            </div>

                            <!-- Input Usia -->
                            <div>
                                <label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">Usia</label>
                                <input type="number" name="usia" value="21" class="w-full px-4 py-3 rounded-xl bg-zinc-50 border border-zinc-200 focus:outline-none focus:ring-2 focus:ring-[#334155] transition-all text-sm font-bold text-zinc-900" required>
                            </div>

                            <!-- Input Kamar (Readonly) -->
                            <div>
                                <label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">Nomor Kamar <span class="text-[10px] font-normal text-zinc-400 normal-case">(Tidak bisa diubah)</span></label>
                                <input type="text" name="kamar" value="100" class="w-full px-4 py-3 rounded-xl bg-zinc-100 border border-zinc-200 text-zinc-500 cursor-not-allowed text-sm font-bold" readonly>
                            </div>

                            <!-- Input Jenis Kelamin -->
                            <div>
                                <label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">Jenis Kelamin</label>
                                <select name="jk" class="w-full px-4 py-3 rounded-xl bg-zinc-50 border border-zinc-200 focus:outline-none focus:ring-2 focus:ring-[#334155] transition-all text-sm font-bold text-zinc-900">
                                    <option value="Pria" selected>Pria</option>
                                    <option value="Wanita">Wanita</option>
                                </select>
                            </div>

                            <!-- Input Kontak -->
                            <div>
                                <label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">Kontak</label>
                                <input type="text" name="kontak" value="081384700455" class="w-full px-4 py-3 rounded-xl bg-zinc-50 border border-zinc-200 focus:outline-none focus:ring-2 focus:ring-[#334155] transition-all text-sm font-bold text-zinc-900" required>
                            </div>

                            <!-- Input Kontak Ortu -->
                            <div>
                                <label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">Nomor Orang Tua</label>
                                <input type="text" name="kontak_ortu" value="081384700455" class="w-full px-4 py-3 rounded-xl bg-zinc-50 border border-zinc-200 focus:outline-none focus:ring-2 focus:ring-[#334155] transition-all text-sm font-bold text-zinc-900" required>
                            </div>

                            <!-- Input Nama Akun -->
                            <div>
                                <label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">Nama Akun</label>
                                <input type="text" name="nama_akun" value="Mr ael" class="w-full px-4 py-3 rounded-xl bg-zinc-50 border border-zinc-200 focus:outline-none focus:ring-2 focus:ring-[#334155] transition-all text-sm font-bold text-zinc-900" required>
                            </div>

                            <!-- Input Password -->
                            <div>
                                <label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">Password</label>
                                <div class="relative">
                                    <input type="password" id="inputPassword" name="password" value="password123" class="w-full pl-4 pr-12 py-3 rounded-xl bg-zinc-50 border border-zinc-200 focus:outline-none focus:ring-2 focus:ring-[#334155] transition-all text-sm font-bold text-zinc-900" placeholder="Biarkan kosong jika tidak diubah">
                                    <i id="toggleEye" onclick="togglePasswordVisibility()" class="ph-fill ph-eye absolute right-4 top-1/2 -translate-y-1/2 text-xl text-zinc-400 cursor-pointer hover:text-black transition-colors"></i>
                                </div>
                            </div>
                        </div>

                        <div class="flex gap-3 pt-6 border-t border-zinc-100">
                            <button type="button" onclick="toggleEditMode()" class="flex-1 px-4 py-3.5 rounded-xl bg-zinc-100 text-zinc-600 font-bold hover:bg-zinc-200 transition-all text-sm uppercase tracking-wide">Batal</button>
                            <button type="submit" class="flex-1 px-4 py-3.5 rounded-xl bg-[#18181B] text-white font-bold hover:bg-[#334155] shadow-lg transition-all active:scale-95 text-sm uppercase tracking-wide flex justify-center items-center gap-2">
                                <i class="ph ph-floppy-disk text-lg"></i> Simpan Perubahan
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </main>

    <!-- SCRIPT LOGIKA -->
    <script>
        let isEditMode = false;
        
        function toggleEditMode() {
            isEditMode = !isEditMode;
            
            const viewDiv = document.getElementById('viewMode');
            const editDiv = document.getElementById('editMode');
            const btnEdit = document.getElementById('btnEdit');

            if (isEditMode) {
                viewDiv.classList.add('hidden');
                editDiv.classList.remove('hidden');
                btnEdit.classList.add('hidden');
            } else {
                editDiv.classList.add('hidden');
                viewDiv.classList.remove('hidden');
                btnEdit.classList.remove('hidden');
            }
        }

        function togglePasswordVisibility() {
            const passInput = document.getElementById('inputPassword');
            const eyeIcon = document.getElementById('toggleEye');

            if (passInput.type === 'password') {
                passInput.type = 'text';
                eyeIcon.classList.remove('ph-eye');
                eyeIcon.classList.add('ph-eye-slash');
            } else {
                passInput.type = 'password';
                eyeIcon.classList.remove('ph-eye-slash');
                eyeIcon.classList.add('ph-eye');
            }
        }
    </script>
</body>
</html>