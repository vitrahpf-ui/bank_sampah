@extends('layouts.app')

@section('title', 'Dashboard Petugas | sampahPay')

@push('scripts')
<script>
    // Konfigurasi warna & font (bawaan runtime, boleh diabaikan saat slicing)
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    pine: '#2D5A2A',
                    leaf: '#3E9468',
                    lime: '#E9F29C',
                    paper: '#F9F8F4',
                    mint: '#D9EEE2',
                    rose: '#FBDADA'
                },
                fontFamily: {
                    sans: ['Inter', 'sans-serif'],
                    display: ['Poppins', 'sans-serif']
                }
            }
        }
    }

</script>
@endpush

@section('content')
<main class="px-8 py-10">
    <!-- Banner sapaan -->
    <section class="flex items-center justify-between rounded-2xl bg-lime px-8 py-8">
        <div>
            <p class="text-[10px] font-bold uppercase tracking-widest text-pine">Selasa, 3 November 2026</p>
            <h1 class="mt-3 font-display text-[28px] font-semibold text-pine">Halo, Budi.</h1>
            <p class="mt-3 text-sm text-gray-600">Berikut ringkasan aktivitas bank sampah hari ini.</p>
        </div>
        <a href="input-setoran.html"
            class="rounded-lg bg-pine px-5 py-3 text-sm font-semibold text-white hover:bg-pine/90">+ Input Setoran</a>
    </section>

    <!-- Kartu statistik -->
    <section class="mt-6 grid grid-cols-2 gap-4 xl:grid-cols-4">
        <div class="rounded-xl bg-white p-5 shadow-sm ring-1 ring-black/5">
            <p class="text-[13px] text-gray-600">Setoran hari ini</p>
            <p class="mt-3 font-display text-2xl font-semibold text-pine">1</p>
            <p class="mt-3 text-[11px] text-gray-500">transaksi tercatat</p>
        </div>
        <div class="rounded-xl bg-white p-5 shadow-sm ring-1 ring-black/5">
            <p class="text-[13px] text-gray-600">Total berat</p>
            <p class="mt-3 font-display text-2xl font-semibold text-pine">2,5 kg</p>
            <p class="mt-3 text-[11px] text-gray-500">khusus sampah kilogram</p>
        </div>
        <div class="rounded-xl bg-white p-5 shadow-sm ring-1 ring-black/5">
            <p class="text-[13px] text-gray-600">Total nilai</p>
            <p class="mt-3 font-display text-2xl font-semibold text-pine">Rp 8.750</p>
            <p class="mt-3 text-[11px] text-gray-500">nilai setoran hari ini</p>
        </div>
        <div class="rounded-xl bg-white p-5 shadow-sm ring-1 ring-black/5">
            <p class="text-[13px] text-gray-600">Menunggu persetujuan</p>
            <p class="mt-3 font-display text-2xl font-semibold text-pine">3</p>
            <p class="mt-3 text-[11px] text-gray-500">permintaan tarik saldo →</p>
        </div>
    </section>

    <div class="mt-6 flex gap-3">
        <a href="input-setoran.html"
            class="inline-flex items-center gap-2 rounded-lg bg-pine px-5 py-2.5 text-sm font-semibold text-white">Input
            Setoran Baru <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="M5 12h14M12 5l7 7-7 7" /></svg></a>
        <a href="riwayat-setoran.html"
            class="rounded-lg border border-leaf bg-white px-5 py-2.5 text-sm font-semibold text-pine hover:bg-paper">Riwayat
            Setoran</a>
    </div>

    <!-- Setoran terbaru -->
    <section class="mt-10">
        <div class="mb-3 flex items-center justify-between">
            <h3 class="text-sm font-semibold text-pine">Setoran terbaru</h3><a href="riwayat-setoran.html"
                class="text-sm font-semibold text-leaf">Lihat semua</a>
        </div>
        <div class="overflow-hidden rounded-xl bg-white ring-1 ring-black/5">
            <table class="w-full text-left text-[13px]">
                <thead class="bg-[#EEF0E6] text-[10px] font-semibold uppercase tracking-wider text-gray-500">
                    <tr>
                        <th class="px-5 py-3">Tanggal</th>
                        <th class="px-5 py-3">Nasabah</th>
                        <th class="px-5 py-3">Rincian</th>
                        <th class="px-5 py-3 text-right">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-t border-black/5">
                        <td class="px-5 py-4">3 Nov 2026</td>
                        <td class="px-5 py-4">
                            <p class="font-semibold text-pine">Siti Rahma</p>
                            <p class="text-[11px] text-gray-500">SP-0012</p>
                        </td>
                        <td class="px-5 py-4">Plastik PET</td>
                        <td class="px-5 py-4 text-right font-semibold text-pine">Rp 8.750</td>
                    </tr>
                    <tr class="border-t border-black/5">
                        <td class="px-5 py-4">2 Nov 2026</td>
                        <td class="px-5 py-4">
                            <p class="font-semibold text-pine">Andi Pratama</p>
                            <p class="text-[11px] text-gray-500">SP-0013</p>
                        </td>
                        <td class="px-5 py-4">Plastik PET</td>
                        <td class="px-5 py-4 text-right font-semibold text-pine">Rp 7.000</td>
                    </tr>
                    <tr class="border-t border-black/5">
                        <td class="px-5 py-4">1 Nov 2026</td>
                        <td class="px-5 py-4">
                            <p class="font-semibold text-pine">Rina Lestari</p>
                            <p class="text-[11px] text-gray-500">SP-0014</p>
                        </td>
                        <td class="px-5 py-4">Besi</td>
                        <td class="px-5 py-4 text-right font-semibold text-pine">Rp 120.000</td>
                    </tr>
                    <tr class="border-t border-black/5">
                        <td class="px-5 py-4">27 Okt 2026</td>
                        <td class="px-5 py-4">
                            <p class="font-semibold text-pine">Siti Rahma</p>
                            <p class="text-[11px] text-gray-500">SP-0012</p>
                        </td>
                        <td class="px-5 py-4">Kardus, Botol kaca</td>
                        <td class="px-5 py-4 text-right font-semibold text-pine">Rp 16.800</td>
                    </tr>
                    <tr class="border-t border-black/5">
                        <td class="px-5 py-4">25 Okt 2026</td>
                        <td class="px-5 py-4">
                            <p class="font-semibold text-pine">Dewi Anggraini</p>
                            <p class="text-[11px] text-gray-500">SP-0015</p>
                        </td>
                        <td class="px-5 py-4">Minyak jelantah</td>
                        <td class="px-5 py-4 text-right font-semibold text-pine">Rp 24.000</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</main>
@endsection
