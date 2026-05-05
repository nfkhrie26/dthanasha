@extends('layouts.admin')

@section('title', 'Pembayaran - Dthanasha Kost')
@section('search_placeholder', 'Cari nama penghuni atau nomor kamar...')

@section('content')
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
    </div>

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
@endsection

@section('scripts')
    <script>
        function bukaModalKonfirmasi(nama, kamar, status) { 
            document.getElementById('modal_nama').value = nama;
            document.getElementById('modal_kamar').value = kamar;
            document.getElementById('modal_status').value = status;
            document.getElementById('modal_nominal').value = "";
            document.getElementById('modal_metode').value = "";
            document.getElementById('modal_bukti').value = "";

            const actionContainer = document.getElementById('modal_action_buttons');
            const judulModal = document.getElementById('modal_judul');
            const inputs = document.querySelectorAll('#modal_nominal, #modal_metode, #modal_bukti');

            if (status === 'Sudah Membayar') {
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
            document.getElementById('modalKonfirmasi').classList.remove('hidden'); 
        }

        function tutupModal(modalId) { 
            document.getElementById(modalId).classList.add('hidden'); 
        }
    </script>
@endsection