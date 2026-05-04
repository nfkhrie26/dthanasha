@extends('layouts.penghuni')

@section('title', 'Profil Saya - Dthanasha Kost')
@section('header_title', 'Sisi Penghuni / Profil Saya')

@section('extra_css')
    .fade-in { animation: fadeIn 0.3s ease-in-out; }
    @keyframes fadeIn { from { opacity: 0; transform: translateY(-5px); } to { opacity: 1; transform: translateY(0); } }
@endsection

@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Kolom Kiri: Profil -->
        <div class="space-y-6">
            <div class="bg-white p-8 rounded-3xl card-shadow border border-gray-50 flex flex-col items-center text-center">
                <div class="relative mb-6 group">
                    <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-zinc-100 shadow-sm bg-[#334155] flex items-center justify-center text-white text-4xl font-bold">MF</div>
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

        <!-- Kolom Kanan: Form Profil -->
        <div class="lg:col-span-2">
            <div class="bg-white p-8 rounded-3xl card-shadow border border-gray-50 min-h-[500px]">
                <div class="flex justify-between items-center mb-8 border-b border-zinc-100 pb-4">
                    <h3 class="text-lg font-black text-zinc-900 uppercase tracking-wide">Informasi Pribadi</h3>
                    <button id="btnEdit" onclick="toggleEditMode()" class="px-4 py-2 bg-[#18181B] hover:bg-[#334155] text-white rounded-xl font-bold text-xs uppercase tracking-widest transition-all shadow-md flex items-center gap-2 active:scale-95">
                        <i class="ph ph-pencil-simple"></i> Edit Profil
                    </button>
                </div>

                <!-- Mode Readonly -->
                <div id="viewMode" class="space-y-6 fade-in">
                    <div class="grid grid-cols-2 gap-8">
                        <div><p class="text-[11px] font-bold text-zinc-400 uppercase tracking-widest mb-2">Nama Lengkap</p><p class="text-sm font-bold text-zinc-900">Misael Feodora D</p></div>
                        <div><p class="text-[11px] font-bold text-zinc-400 uppercase tracking-widest mb-2">Usia</p><p class="text-sm font-bold text-zinc-900">21</p></div>
                        <div><p class="text-[11px] font-bold text-zinc-400 uppercase tracking-widest mb-2">Nomor Kamar</p><p class="text-sm font-bold text-zinc-900">100</p></div>
                        <div><p class="text-[11px] font-bold text-zinc-400 uppercase tracking-widest mb-2">Jenis Kelamin</p><p class="text-sm font-bold text-zinc-900">Pria</p></div>
                        <div><p class="text-[11px] font-bold text-zinc-400 uppercase tracking-widest mb-2">Kontak</p><p class="text-sm font-bold text-zinc-900">081384700455</p></div>
                        <div><p class="text-[11px] font-bold text-zinc-400 uppercase tracking-widest mb-2">Nomor Orang Tua</p><p class="text-sm font-bold text-zinc-900">081384700455</p></div>
                        <div><p class="text-[11px] font-bold text-zinc-400 uppercase tracking-widest mb-2">Nama Akun</p><p class="text-sm font-bold text-zinc-900">Mr ael</p></div>
                        <div><p class="text-[11px] font-bold text-zinc-400 uppercase tracking-widest mb-2">Password</p><p class="text-sm font-bold text-zinc-900 tracking-widest">***********</p></div>
                    </div>
                </div>

                <!-- Mode Edit -->
                <form id="editMode" action="{{ url('/penghuni/update-profile') }}" method="POST" class="space-y-6 hidden fade-in">
                    @csrf
                    <div class="grid grid-cols-2 gap-6">
                        <div><label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">Nama Lengkap</label><input type="text" name="nama" value="Misael Feodora D" class="w-full px-4 py-3 rounded-xl bg-zinc-50 border border-zinc-200 focus:outline-none focus:ring-2 focus:ring-[#334155] transition-all text-sm font-bold text-zinc-900" required></div>
                        <div><label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">Usia</label><input type="number" name="usia" value="21" class="w-full px-4 py-3 rounded-xl bg-zinc-50 border border-zinc-200 focus:outline-none focus:ring-2 focus:ring-[#334155] transition-all text-sm font-bold text-zinc-900" required></div>
                        <div><label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">Nomor Kamar <span class="text-[10px] font-normal text-zinc-400 normal-case">(Tidak bisa diubah)</span></label><input type="text" name="kamar" value="100" class="w-full px-4 py-3 rounded-xl bg-zinc-100 border border-zinc-200 text-zinc-500 cursor-not-allowed text-sm font-bold" readonly></div>
                        <div>
                            <label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">Jenis Kelamin</label>
                            <select name="jk" class="w-full px-4 py-3 rounded-xl bg-zinc-50 border border-zinc-200 focus:outline-none focus:ring-2 focus:ring-[#334155] transition-all text-sm font-bold text-zinc-900">
                                <option value="Pria" selected>Pria</option>
                                <option value="Wanita">Wanita</option>
                            </select>
                        </div>
                        <div><label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">Kontak</label><input type="text" name="kontak" value="081384700455" class="w-full px-4 py-3 rounded-xl bg-zinc-50 border border-zinc-200 focus:outline-none focus:ring-2 focus:ring-[#334155] transition-all text-sm font-bold text-zinc-900" required></div>
                        <div><label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">Nomor Orang Tua</label><input type="text" name="kontak_ortu" value="081384700455" class="w-full px-4 py-3 rounded-xl bg-zinc-50 border border-zinc-200 focus:outline-none focus:ring-2 focus:ring-[#334155] transition-all text-sm font-bold text-zinc-900" required></div>
                        <div><label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">Nama Akun</label><input type="text" name="nama_akun" value="Mr ael" class="w-full px-4 py-3 rounded-xl bg-zinc-50 border border-zinc-200 focus:outline-none focus:ring-2 focus:ring-[#334155] transition-all text-sm font-bold text-zinc-900" required></div>
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
@endsection

@section('scripts')
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
@endsection