@extends('layouts.admin')

@section('title', 'Manajemen Kamar - Dthanasha Kost')
@section('search_placeholder', 'Cari nomor kamar...')

@section('content')
    <!-- SUMMARY CARDS -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        <div class="bg-white p-6 rounded-2xl card-shadow border border-gray-50 flex items-center justify-between group">
            <div>
                <p class="text-[11px] font-bold text-zinc-400 uppercase tracking-widest mb-1">Terisi</p>
                <p class="text-3xl font-black text-zinc-900">100</p>
            </div>
            <div class="w-14 h-14 bg-zinc-100 rounded-xl flex items-center justify-center border border-zinc-200 group-hover:bg-zinc-200 transition-colors">
                <i class="ph-fill ph-user-check text-2xl text-black"></i>
            </div>
        </div>
        <div class="bg-white p-6 rounded-2xl card-shadow border border-gray-50 flex items-center justify-between group">
            <div>
                <p class="text-[11px] font-bold text-zinc-400 uppercase tracking-widest mb-1">Kosong</p>
                <p class="text-3xl font-black text-zinc-900">20</p>
            </div>
            <div class="w-14 h-14 bg-zinc-100 rounded-xl flex items-center justify-center border border-zinc-200 group-hover:bg-zinc-200 transition-colors">
                <i class="ph-fill ph-door-open text-2xl text-black"></i>
            </div>
        </div>
        <div class="bg-white p-6 rounded-2xl card-shadow border border-gray-50 flex items-center justify-between group">
            <div>
                <p class="text-[11px] font-bold text-zinc-400 uppercase tracking-widest mb-1">Reguler</p>
                <p class="text-3xl font-black text-zinc-900">60</p>
            </div>
            <div class="w-14 h-14 bg-zinc-100 rounded-xl flex items-center justify-center border border-zinc-200 group-hover:bg-zinc-200 transition-colors">
                <i class="ph-fill ph-bed text-2xl text-black"></i>
            </div>
        </div>
        <div class="bg-white p-6 rounded-2xl card-shadow border border-gray-50 flex items-center justify-between group">
            <div>
                <p class="text-[11px] font-bold text-zinc-400 uppercase tracking-widest mb-1">VIP</p>
                <p class="text-3xl font-black text-zinc-900">60</p>
            </div>
            <div class="w-14 h-14 bg-zinc-100 rounded-xl flex items-center justify-center border border-zinc-200 group-hover:bg-zinc-200 transition-colors">
                <i class="ph-fill ph-crown text-2xl text-black"></i>
            </div>
        </div>
    </div>

    <!-- FILTER & ADD BUTTON -->
    <div class="flex items-center gap-4 mb-8">
        <select class="px-5 py-2.5 rounded-xl border border-zinc-200 bg-white text-sm font-semibold outline-none card-shadow cursor-pointer text-zinc-700 focus:ring-2 focus:ring-[#334155]">
            <option>Semua Jenis</option>
            <option>Reguler</option>
            <option>VIP</option>
        </select>
        <select class="px-5 py-2.5 rounded-xl border border-zinc-200 bg-white text-sm font-semibold outline-none card-shadow cursor-pointer text-zinc-700 focus:ring-2 focus:ring-[#334155]">
            <option>Semua Status</option>
            <option>Terisi</option>
            <option>Kosong</option>
        </select>
        <button onclick="bukaModalTambah()" class="bg-[#18181B] hover:bg-[#334155] transition-all px-5 py-2.5 rounded-xl text-sm font-bold text-white shadow-md flex items-center gap-2 active:scale-95 ml-auto">
            <i class="ph ph-plus-circle text-lg"></i> Tambah Kamar
        </button>
    </div>

    <!-- GRID KAMAR -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        <!-- Kamar 001 -->
        <div class="bg-white w-full rounded-[1.25rem] p-5 card-shadow border border-zinc-100 flex flex-col gap-5 hover:shadow-lg hover:border-zinc-200 transition-all group">
            <div class="flex justify-between items-start">
                <div class="bg-[#18181B] text-white w-[65px] h-[65px] rounded-2xl flex items-center justify-center font-bold text-2xl shadow-sm tracking-wide">001</div>
                <div class="text-right flex flex-col items-end">
                    <span class="text-[10px] font-black tracking-widest text-blue-700 bg-blue-50 px-2.5 py-1 rounded-lg mb-1.5 uppercase">Terisi</span>
                    <p class="text-[15px] font-bold text-zinc-900">Reguler</p>
                </div>
            </div>
            <div class="flex gap-2 h-11">
                <button onclick="bukaModalDetail('001', 'Dimas Anggara', 'Terisi', 'Reguler', 'Pria')" class="bg-zinc-100 hover:bg-zinc-200 text-zinc-700 font-bold rounded-xl flex-1 text-[13px] transition-all active:scale-95">Detail</button>
                <form action="{{ url('/hapus_kamar') }}" method="POST" class="h-full">
                    @csrf @method('DELETE')
                    <input type="hidden" name="nomor_kamar" value="001">
                    <button type="submit" class="bg-red-50 hover:bg-red-100 text-red-500 w-11 h-full rounded-xl flex items-center justify-center transition-all active:scale-95"><i class="ph ph-trash text-lg"></i></button>
                </form>
            </div>
        </div>

        <!-- Kamar 002 -->
        <div class="bg-white w-full rounded-[1.25rem] p-5 card-shadow border border-zinc-100 flex flex-col gap-5 hover:shadow-lg hover:border-zinc-200 transition-all group">
            <div class="flex justify-between items-start">
                <div class="bg-[#18181B] text-white w-[65px] h-[65px] rounded-2xl flex items-center justify-center font-bold text-2xl shadow-sm tracking-wide">002</div>
                <div class="text-right flex flex-col items-end">
                    <span class="text-[10px] font-black tracking-widest text-orange-600 bg-orange-50 px-2.5 py-1 rounded-lg mb-1.5 uppercase">Kosong</span>
                    <p class="text-[15px] font-bold text-zinc-900">Reguler</p>
                </div>
            </div>
            <div class="flex gap-2 h-11">
                <button onclick="bukaModalDetail('002', '', 'Kosong', 'Reguler', '')" class="bg-zinc-100 hover:bg-zinc-200 text-zinc-700 font-bold rounded-xl flex-1 text-[13px] transition-all active:scale-95">Detail</button>
                <form action="{{ url('/hapus_kamar') }}" method="POST" class="h-full">
                    @csrf @method('DELETE')
                    <input type="hidden" name="nomor_kamar" value="002">
                    <button type="submit" class="bg-red-50 hover:bg-red-100 text-red-500 w-11 h-full rounded-xl flex items-center justify-center transition-all active:scale-95"><i class="ph ph-trash text-lg"></i></button>
                </form>
            </div>
        </div>
        
        <!-- Kamar 003, 004, 005, 006 dsb bisa dilanjutin kayak di atas -->
    </div>

    <!-- PAGINATION CUSTOM -->
    <div class="flex justify-end items-center gap-2 mt-10">
        <button class="w-10 h-10 flex items-center justify-center rounded-xl border border-zinc-200 text-zinc-400 hover:bg-white transition-all bg-transparent"><i class="ph ph-caret-left font-bold"></i></button>
        <button class="w-10 h-10 flex items-center justify-center rounded-xl bg-[#334155] text-white text-sm font-bold shadow-sm">1</button>
        <button class="w-10 h-10 flex items-center justify-center rounded-xl border border-zinc-200 text-zinc-600 hover:bg-white text-sm font-bold transition-all bg-transparent">2</button>
        <button class="w-10 h-10 flex items-center justify-center rounded-xl border border-zinc-200 text-zinc-400 hover:bg-white transition-all bg-transparent"><i class="ph ph-caret-right font-bold"></i></button>
    </div>

    <!-- MODAL TAMBAH -->
    <div id="modalTambah" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-[60] hidden flex items-center justify-center">
        <div class="bg-white w-full max-w-md rounded-3xl p-8 shadow-2xl scale-95 transition-all max-h-[90vh] overflow-y-auto no-scrollbar">
            <h2 class="text-xl font-black text-zinc-900 mb-6 text-center uppercase tracking-wide">Tambah Kamar Baru</h2>
            <form action="{{ url('/tambah_kamar') }}" method="POST" class="space-y-4">
                @csrf
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">Nomor Kamar</label>
                        <input type="text" name="nomor_kamar" class="w-full px-4 py-3 rounded-xl bg-white border border-zinc-200 focus:outline-none focus:ring-2 focus:ring-[#334155] transition-all font-bold text-zinc-900 text-sm" required>
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">Status Kamar</label>
                        <select name="status_kamar" class="w-full px-4 py-3 rounded-xl bg-white border border-zinc-200 focus:outline-none focus:ring-2 focus:ring-[#334155] transition-all font-bold text-zinc-900 text-sm" required>
                            <option value="Kosong">Kosong</option>
                            <option value="Terisi">Terisi</option>
                        </select>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">Jenis Kamar</label>
                        <select name="jenis_kamar" class="w-full px-4 py-3 rounded-xl bg-white border border-zinc-200 focus:outline-none focus:ring-2 focus:ring-[#334155] transition-all font-bold text-zinc-900 text-sm" required>
                            <option value="Reguler">Reguler</option>
                            <option value="VIP">VIP</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">Gender</label>
                        <select name="jenis_kelamin" class="w-full px-4 py-3 rounded-xl bg-white border border-zinc-200 focus:outline-none focus:ring-2 focus:ring-[#334155] transition-all font-bold text-zinc-900 text-sm">
                            <option value="">(Belum Ada)</option>
                            <option value="Pria">Pria</option>
                            <option value="Wanita">Wanita</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">Nama Penghuni</label>
                    <input type="text" name="nama_penghuni" class="w-full px-4 py-3 rounded-xl bg-white border border-zinc-200 focus:outline-none focus:ring-2 focus:ring-[#334155] transition-all font-bold text-zinc-900 text-sm" placeholder="Kosongkan jika belum terisi">
                </div>
                <div class="flex gap-3 pt-6 border-t border-zinc-100">
                    <button type="button" onclick="tutupModal('modalTambah')" class="flex-1 px-4 py-3.5 rounded-xl bg-zinc-100 text-zinc-600 font-bold hover:bg-zinc-200 transition-all text-sm uppercase tracking-wide">Batal</button>
                    <button type="submit" class="flex-1 px-4 py-3.5 rounded-xl bg-[#18181B] text-white font-bold hover:bg-[#334155] shadow-lg transition-all active:scale-95 text-sm uppercase tracking-wide">Simpan Kamar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- MODAL DETAIL / EDIT -->
    <div id="modalDetail" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-[60] hidden flex items-center justify-center">
        <div class="bg-white w-full max-w-md rounded-3xl p-8 shadow-2xl scale-95 transition-all max-h-[90vh] overflow-y-auto no-scrollbar">
            <h2 class="text-xl font-black text-zinc-900 mb-6 text-center uppercase tracking-wide">Detail & Edit Kamar</h2>
            <form action="{{ url('/edit_kamar') }}" method="POST" class="space-y-4">
                @csrf @method('PUT')
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">Nomor Kamar</label>
                        <input type="text" id="detail_nomor" name="nomor_kamar" class="w-full px-4 py-3 rounded-xl bg-zinc-100 border border-zinc-200 text-zinc-500 font-bold focus:outline-none text-sm" readonly>
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">Status Kamar</label>
                        <select id="detail_status" name="status_kamar" class="w-full px-4 py-3 rounded-xl bg-white border border-zinc-200 focus:outline-none focus:ring-2 focus:ring-[#334155] transition-all font-bold text-zinc-900 text-sm" required>
                            <option value="Kosong">Kosong</option>
                            <option value="Terisi">Terisi</option>
                        </select>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">Jenis Kamar</label>
                        <select id="detail_jenis" name="jenis_kamar" class="w-full px-4 py-3 rounded-xl bg-white border border-zinc-200 focus:outline-none focus:ring-2 focus:ring-[#334155] transition-all font-bold text-zinc-900 text-sm" required>
                            <option value="Reguler">Reguler</option>
                            <option value="VIP">VIP</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">Gender</label>
                        <select id="detail_kelamin" name="jenis_kelamin" class="w-full px-4 py-3 rounded-xl bg-white border border-zinc-200 focus:outline-none focus:ring-2 focus:ring-[#334155] transition-all font-bold text-zinc-900 text-sm">
                            <option value="">(Belum Ada)</option>
                            <option value="Pria">Pria</option>
                            <option value="Wanita">Wanita</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">Nama Penghuni</label>
                    <input type="text" id="detail_nama" name="nama_penghuni" class="w-full px-4 py-3 rounded-xl bg-white border border-zinc-200 focus:outline-none focus:ring-2 focus:ring-[#334155] transition-all font-bold text-zinc-900 text-sm" placeholder="Kosongkan jika belum terisi">
                </div>
                <div class="flex gap-3 pt-6 border-t border-zinc-100">
                    <button type="button" onclick="tutupModal('modalDetail')" class="flex-1 px-4 py-3.5 rounded-xl bg-zinc-100 text-zinc-600 font-bold hover:bg-zinc-200 transition-all text-sm uppercase tracking-wide">Tutup</button>
                    <button type="submit" class="flex-1 px-4 py-3.5 rounded-xl bg-[#18181B] text-white font-bold hover:bg-[#334155] shadow-lg transition-all active:scale-95 text-sm uppercase tracking-wide">Update Kamar</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function bukaModalTambah() { document.getElementById('modalTambah').classList.remove('hidden'); }
        function bukaModalDetail(nomor, nama, status, jenis, kelamin) {
            document.getElementById('detail_nomor').value = nomor;
            document.getElementById('detail_nama').value = nama;
            document.getElementById('detail_status').value = status;
            document.getElementById('detail_jenis').value = jenis;
            document.getElementById('detail_kelamin').value = kelamin ? kelamin : "";
            document.getElementById('modalDetail').classList.remove('hidden');
        }
        function tutupModal(modalId) { document.getElementById(modalId).classList.add('hidden'); }
    </script>
@endsection