@extends('layouts.admin')

@section('title', 'Dashboard Pemilik - Dthanasha Kost')
@section('search_placeholder', 'Cari data...')

@section('extra_head')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        <div class="bg-white p-6 rounded-2xl card-shadow border border-gray-50 group transition-all">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-zinc-100 rounded-xl flex items-center justify-center border border-zinc-200 group-hover:bg-zinc-200 transition-colors">
                    <i class="ph ph-users text-2xl text-black font-bold"></i>
                </div>
            </div>
            <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Total Penghuni</p>
            <p class="text-3xl font-black text-gray-900">80</p>
        </div>

        <div class="bg-white p-6 rounded-2xl card-shadow border border-gray-50 group transition-all">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-zinc-100 rounded-xl flex items-center justify-center border border-zinc-200 group-hover:bg-zinc-200 transition-colors">
                    <i class="ph ph-door text-2xl text-black"></i>
                </div>
            </div>
            <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Total Kamar</p>
            <p class="text-3xl font-black text-gray-900">100</p>
        </div>

        <div class="bg-white p-6 rounded-2xl card-shadow border border-gray-50 group transition-all">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-zinc-100 rounded-xl flex items-center justify-center border border-zinc-200 group-hover:bg-zinc-200 transition-colors">
                    <i class="ph ph-door-open text-2xl text-black"></i>
                </div>
            </div>
            <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Kamar Kosong</p>
            <p class="text-3xl font-black text-black-600">20</p>
        </div>

        <div class="bg-white p-6 rounded-2xl card-shadow border border-gray-50 group transition-all">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-zinc-100 rounded-xl flex items-center justify-center border border-zinc-200 group-hover:bg-zinc-200 transition-colors">
                    <i class="ph ph-wallet text-2xl text-black"></i>
                </div>
            </div>
            <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Keuntungan</p>
            <p class="text-2xl font-black text-green-600">Rp 1.200.000</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2 space-y-8">
            <div class="bg-white p-8 rounded-3xl card-shadow border border-gray-50">
                <h3 class="text-sm font-bold text-zinc-900 uppercase tracking-wide mb-6">Pemasukan & Pengeluaran Mingguan</h3>
                <div class="h-[280px] w-full"><canvas id="barChart"></canvas></div>
            </div>

            <div class="bg-white rounded-3xl card-shadow border border-gray-50 overflow-hidden">
                <div class="p-6 border-b border-gray-50 flex justify-between items-center">
                    <h3 class="text-sm font-bold text-zinc-900 uppercase tracking-wide">Transaksi Terakhir</h3>
                    <a href="{{ url('/riwayat') }}" class="text-xs font-bold text-[#334155] hover:underline uppercase">Lihat Semua</a>
                </div>
                <table class="w-full text-left">
                    <thead class="bg-zinc-50 text-zinc-400 text-[10px] uppercase tracking-widest border-b border-zinc-100">
                        <tr>
                            <th class="px-6 py-4 font-bold">Keterangan</th>
                            <th class="px-6 py-4 text-center font-bold">Nama</th>
                            <th class="px-6 py-4 font-bold">Tanggal</th>
                            <th class="px-6 py-4 text-right font-bold">Nominal</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-50">
                        <tr class="hover:bg-zinc-50/50 transition-all cursor-pointer">
                            <td class="px-6 py-4 text-sm font-medium text-gray-900">Pembayaran bulanan kost</td>
                            <td class="px-6 py-4 text-sm text-center text-gray-600">Misael Feodora</td>
                            <td class="px-6 py-4 text-sm text-zinc-500">12 Jan 2026</td>
                            <td class="px-6 py-4 text-sm font-bold text-green-600 text-right">RP 1.200.000</td>
                        </tr>
                        <tr class="hover:bg-zinc-50/50 transition-all cursor-pointer">
                            <td class="px-6 py-4 text-sm font-medium text-gray-900">Pembayaran bulanan kost</td>
                            <td class="px-6 py-4 text-sm text-center text-gray-600">Misael Feodora</td>
                            <td class="px-6 py-4 text-sm text-zinc-500">12 Jan 2026</td>
                            <td class="px-6 py-4 text-sm font-bold text-green-600 text-right">RP 1.200.000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="space-y-8">
            <div class="bg-white p-6 rounded-3xl card-shadow border border-gray-50">
                <h3 class="text-sm font-bold text-zinc-900 uppercase tracking-wide mb-6">Lewat Jatuh Tempo</h3>
                <div class="space-y-3">
                    <div class="flex items-center justify-between p-3 border border-zinc-100 rounded-2xl bg-zinc-50/50 hover:bg-white transition-all">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-zinc-200 flex items-center justify-center text-zinc-600 font-bold">M</div>
                            <div><p class="text-sm font-bold text-zinc-900">Michael</p><p class="text-[10px] font-bold text-zinc-400 uppercase">2 hari lalu</p></div>
                        </div>
                        <span class="px-2.5 py-1 bg-white border border-zinc-200 text-xs font-black text-gray-900 rounded-lg shadow-sm">KMR 120</span>
                    </div>
                    <div class="flex items-center justify-between p-3 border border-zinc-100 rounded-2xl bg-zinc-50/50 hover:bg-white transition-all">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-zinc-200 flex items-center justify-center text-zinc-600 font-bold">M</div>
                            <div><p class="text-sm font-bold text-zinc-900">Michael</p><p class="text-[10px] font-bold text-zinc-400 uppercase">5 hari lalu</p></div>
                        </div>
                        <span class="px-2.5 py-1 bg-white border border-zinc-200 text-xs font-black text-gray-900 rounded-lg shadow-sm">KMR 100</span>
                    </div>
                </div>
            </div>

            <div class="bg-white p-8 rounded-3xl card-shadow border border-gray-50 flex flex-col items-center">
                <h3 class="text-sm font-bold text-zinc-900 uppercase tracking-wide mb-8 self-start">Okupansi Kamar</h3>
                <div class="relative w-40 h-40 mb-8">
                    <canvas id="donutChart"></canvas>
                </div>
                <div class="w-full space-y-2">
                    <div class="flex items-center justify-between px-3 py-2 bg-zinc-50 rounded-xl">
                        <span class="flex items-center gap-2 text-xs font-bold text-zinc-600 uppercase tracking-wider"><div class="w-2 h-2 bg-zinc-300 rounded-sm"></div> Tersedia</span>
                        <span class="text-sm font-black text-zinc-900">20</span>
                    </div>
                    <div class="flex items-center justify-between px-3 py-2 bg-zinc-900 rounded-xl">
                        <span class="flex items-center gap-2 text-xs font-bold text-zinc-200 uppercase tracking-wider"><div class="w-2 h-2 bg-white rounded-sm"></div> Terisi</span>
                        <span class="text-sm font-black text-white">80</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        const formatRupiah = (number) => new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(number);

        const barCtx = document.getElementById('barChart').getContext('2d');
        new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: ['Sat', 'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri'],
                datasets: [
                    { label: 'In', data: [4500000, 3200000, 3100000, 4800000, 1500000, 3800000, 3700000], backgroundColor: '#18181B', borderRadius: 4, barPercentage: 0.6, categoryPercentage: 0.5 },
                    { label: 'Out', data: [2000000, 1000000, 2500000, 3500000, 2100000, 2300000, 3000000], backgroundColor: '#E4E4E7', borderRadius: 4, barPercentage: 0.6, categoryPercentage: 0.5 }
                ]
            },
            options: {
                responsive: true, maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: { 
                    y: { beginAtZero: true, grid: { color: '#F1F5F9', drawBorder: false }, ticks: { display: false } }, 
                    x: { grid: { display: false }, ticks: { font: { family: 'Plus Jakarta Sans', size: 11, weight: '600' }, color: '#94A3B8' } } 
                }
            }
        });

        const donutCtx = document.getElementById('donutChart').getContext('2d');
        new Chart(donutCtx, {
            type: 'doughnut',
            data: { 
                labels: ['Tersedia', 'Terisi'], 
                datasets: [{ 
                    data: [20, 80], 
                    backgroundColor: ['#E4E4E7', '#18181B'], 
                    borderWidth: 0, 
                    hoverOffset: 10,
                    cutout: '75%'
                }] 
            },
            options: { responsive: true, maintainAspectRatio: false, plugins: { legend: { display: false } } }
        });
    </script>
@endsection