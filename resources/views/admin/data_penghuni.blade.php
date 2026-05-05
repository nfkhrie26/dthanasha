@extends('layouts.admin')

@section('title', 'Data Penghuni - Dthanasha Kost')
@section('search_placeholder', 'Cari data penghuni...')

@section('extra_head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endsection

@section('content')
    <!-- Notifikasi Sukses/Gagal -->
    @if(session('success'))
        <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-xl font-bold text-sm flex items-center gap-2">
            <i class="ph-fill ph-check-circle text-lg"></i> {{ session('success') }}
        </div>
    @endif

    <!-- KARTU SUMMARY GENDER -->
    <div class="flex gap-6 mb-10">
        <div class="bg-white p-6 rounded-2xl card-shadow border border-gray-50 flex items-center gap-4 w-60 group transition-all">
            <div class="w-14 h-14 bg-zinc-100 rounded-xl flex items-center justify-center border border-zinc-200 group-hover:bg-zinc-200 transition-colors">
                <i class="fas fa-mars text-2xl text-black"></i>
            </div>
            <div>
                <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Pria</p>
                <p class="text-3xl font-extrabold text-gray-900">{{ $totalPria ?? 0 }}</p>
            </div>
        </div>
        <div class="bg-white p-6 rounded-2xl card-shadow border border-gray-50 flex items-center gap-4 w-60 group transition-all">
            <div class="w-14 h-14 bg-zinc-100 rounded-xl flex items-center justify-center border border-zinc-200 group-hover:bg-zinc-200 transition-colors">
                <i class="fas fa-venus text-2xl text-black"></i>
            </div>
            <div>
                <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Wanita</p>
                <p class="text-3xl font-extrabold text-gray-900">{{ $totalWanita ?? 0 }}</p>
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
                    @forelse($penghunis as $index => $p)
                        <tr class="hover:bg-zinc-50 transition-colors cursor-pointer group" 
                            onclick="bukaModalHapus('{{ $p->nama_penghuni }}', '{{ $p->usia }}', '-', '{{ $p->jenis_kelamin }}', '{{ $p->no_telepon }}', '{{ $p->no_telepon_orangtua }}', '{{ $p->user->username ?? '' }}')">
                            <td class="px-6 py-4 text-sm font-bold text-gray-400 text-center">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 group-hover:text-[#334155] transition-colors">{{ $p->nama_penghuni }}</td>
                            <td class="px-6 py-4 text-sm text-center text-gray-600">{{ $p->usia }}</td>
                            <td class="px-6 py-4 text-center">
                                <span class="bg-zinc-200 text-zinc-800 text-[11px] font-black px-2.5 py-1 rounded-md">-</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $p->jenis_kelamin == 'L' ? 'Pria' : 'Wanita' }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $p->no_telepon }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $p->no_telepon_orangtua }}</td>
                            <td class="px-6 py-4">
                                <span class="text-xs font-medium text-zinc-600 bg-zinc-100 px-2 py-1 rounded-lg border border-zinc-200">{{ '@' . ($p->user->username ?? 'tidak_ada') }}</span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-6 py-8 text-center text-sm font-bold text-zinc-400">Belum ada data penghuni. Silakan tambah data baru.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- PAGINATION -->
        <div class="p-6 border-t border-zinc-100 flex items-center justify-between bg-white">
            <p class="text-xs font-semibold text-zinc-400">Total: {{ count($penghunis ?? []) }} Penghuni</p>
            <div class="flex gap-2">
                <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-zinc-200 text-zinc-400 hover:bg-zinc-50 transition-all"><i class="fas fa-chevron-left text-xs"></i></button>
                <button class="w-8 h-8 flex items-center justify-center rounded-lg bg-[#334155] text-white text-xs font-bold shadow-sm">1</button>
                <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-zinc-200 text-zinc-600 hover:bg-zinc-50 text-xs font-bold transition-all">2</button>
                <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-zinc-200 text-zinc-400 hover:bg-zinc-50 transition-all"><i class="fas fa-chevron-right text-xs"></i></button>
            </div>
        </div>
    </div>

    <!-- MODAL TAMBAH -->
    <div id="modalTambah" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-[60] hidden flex items-center justify-center">
        <div class="bg-white w-full max-w-lg rounded-3xl p-8 shadow-2xl scale-95 transition-all max-h-[90vh] overflow-y-auto no-scrollbar">
            <h2 class="text-xl font-black text-gray-900 mb-6 text-center uppercase tracking-wide">Tambah Akun Baru</h2>
            <form action="{{ url('/tambah_akun') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">Nama Lengkap</label>
                    <input type="text" name="nama" class="w-full px-4 py-3 rounded-xl bg-white border border-zinc-200 focus:outline-none focus:ring-2 focus:ring-[#334155] transition-all text-sm font-bold text-zinc-900" required>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">Usia</label>
                        <input type="number" name="usia" class="w-full px-4 py-3 rounded-xl bg-white border border-zinc-200 focus:outline-none focus:ring-2 focus:ring-[#334155] transition-all text-sm font-bold text-zinc-900" required>
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">Gender</label>
                        <select name="jk" class="w-full px-4 py-3 rounded-xl bg-white border border-zinc-200 focus:outline-none focus:ring-2 focus:ring-[#334155] transition-all text-sm font-bold text-zinc-900" required>
                            <option value="L">Pria</option>
                            <option value="P">Wanita</option>
                        </select>
                    </div>
                </div>
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
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">No. Kamar</label>
                        <input type="text" name="nomor_kamar" placeholder="Akan disambungkan nanti" class="w-full px-4 py-3 rounded-xl bg-zinc-100 border border-zinc-200 text-zinc-500 font-bold text-sm cursor-not-allowed" readonly>
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">Nama Akun (Username)</label>
                        <input type="text" name="nama_akun" class="w-full px-4 py-3 rounded-xl bg-white border border-zinc-200 focus:outline-none focus:ring-2 focus:ring-[#334155] transition-all text-sm font-bold text-zinc-900" required>
                    </div>
                </div>
                <div>
                    <label class="block text-[11px] font-bold text-zinc-500 uppercase tracking-widest ml-1 mb-2">Password Login</label>
                    <input type="password" name="password" class="w-full px-4 py-3 rounded-xl bg-white border border-zinc-200 focus:outline-none focus:ring-2 focus:ring-[#334155] transition-all text-sm font-bold text-zinc-900" required>
                </div>
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
@endsection

@section('scripts')
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
@endsection