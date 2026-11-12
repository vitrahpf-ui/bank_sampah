@extends('layouts.app')

@section('title', 'Dashboard Nasabah | sampahPay')

@push('scripts')
<script>
    /* Dipakai semua halaman nasabah: konfigurasi Tailwind, sidebar, header, ikon. */
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    forest: {
                        DEFAULT: '#2F5629',
                        dark: '#1E3A1A'
                    },
                    lime: {
                        DEFAULT: '#EAF1A0',
                        soft: '#F0F5BC'
                    },
                    leaf: '#3B8A4F',
                    active: '#3F9468',
                    paper: '#FAF8F3',
                    danger: '#B42318',
                },
                fontFamily: {
                    head: ['Poppins', 'system-ui', 'sans-serif'],
                    body: ['Inter', 'system-ui', 'sans-serif'],
                },
            },
        },
    };

    const USER = {
        name: 'Siti Rahma',
        initials: 'SR',
        role: 'Nasabah'
    };
    const rp = (n) => (n < 0 ? '-' : '') + 'Rp ' + Math.abs(n).toLocaleString('id-ID');
    window.rp = rp;
    window.setBadge = (n) => {
        const b = document.getElementById('bellBadge');
        if (b) b.classList.toggle('hidden', n <= 0), (b.textContent = n);
    };

    const ICONS = {
        home: '<path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><path d="M9 22V12h6v10"/>',
        book: '<path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/>',
        calc: '<rect width="16" height="20" x="4" y="2" rx="2"/><path d="M8 6h8M16 14v4M16 10h.01M12 10h.01M8 10h.01M12 14h.01M8 14h.01M12 18h.01M8 18h.01"/>',
        coin: '<circle cx="12" cy="12" r="10"/><path d="M16 8h-6a2 2 0 1 0 0 4h4a2 2 0 1 1 0 4H8M12 18V6"/>',
        bell: '<path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/><path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"/>',
        user: '<path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>',
        search: '<circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/>',
        filter: '<path d="M22 3H2l8 9.46V19l4 2v-8.54z"/>',
        trash: '<path d="M3 6h18M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/>',
        reset: '<path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"/><path d="M3 3v5h5"/>',
        plus: '<path d="M5 12h14M12 5v14"/>',
        arrow: '<path d="M5 12h14m-7-7 7 7-7 7"/>',
        back: '<path d="m15 18-6-6 6-6"/>',
        clock: '<circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/>',
        leaf: '<path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.5 19 2c1 2 2 4.2 2 8 0 5.500-4.800 10-10 10Z"/><path d="M2 21c0-3 1.900-5.400 5.100-6C9.500 14.500 12 13 13 12"/>',
        wallet: '<rect x="3" y="4" width="18" height="16" rx="2.5"/><path d="M3 9h18M8 14h8"/>',
        menu: '<path d="M4 6h16M4 12h16M4 18h16"/>',
    };

    function icon(name, cls) {
        return `<svg class="${cls || ''}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">${ICONS[name] || ''}</svg>`;
    }

    function hydrateIcons(root) {
        (root || document).querySelectorAll('i[data-icon]').forEach((el) => {
            const tpl = document.createElement('template');
            tpl.innerHTML = icon(el.dataset.icon, el.className);
            el.replaceWith(tpl.content.firstChild);
        });
    }
    window.hydrateIcons = hydrateIcons;

    const NAV = [
        ['beranda', 'Beranda', 'index.html', 'home'],
        ['tabungan', 'Buku Tabungan', 'tabungan.html', 'book'],
        ['kalkulator', 'Kalkulator', 'kalkulator.html', 'calc'],
        ['tarik', 'Tarik Saldo', 'tarik-saldo.html', 'coin'],
        ['notifikasi', 'Notifikasi', 'notifikasi.html', 'bell'],
        ['profil', 'Profil', 'profil.html', 'user'],
    ];

    document.addEventListener('DOMContentLoaded', () => {
        const side = document.getElementById('side'),
            scrim = document.getElementById('scrim');
        const toggle = (open) => {
            side.classList.toggle('-translate-x-full', !open);
            scrim.classList.toggle('hidden', !open);
        };
        document.getElementById('menuBtn').addEventListener('click', () => toggle(true));
        scrim.addEventListener('click', () => toggle(false));
        hydrateIcons();
        if (typeof window.pageInit === 'function') window.pageInit();
    });

</script>
@endpush


@section('content')
<main id="content" class="mx-auto max-w-[920px] p-5 md:p-6">
    <div class="flex items-start justify-between">
        <div>
            <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-forest">Selasa, 3 November 2026</p>
            <h2 class="mt-3 font-head text-3xl font-semibold text-forest">Halo, {{ auth()->user()->name }}.</h2>
            <p class="mt-2 text-xs text-slate-500">Terima kasih sudah ikut menjaga bumi hari ini.</p>
        </div>
        <svg class="hidden h-14 w-14 text-leaf/80 sm:block" viewBox="0 0 24 24" fill="none" stroke="currentColor"
            stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.5 19 2c1 2 2 4.2 2 8 0 5.500-4.800 10-10 10Z" />
            <path d="M2 21c0-3 1.900-5.400 5.100-6C9.500 14.500 12 13 13 12" /></svg>
    </div>

    <!-- Saldo + pintasan -->
    <div class="mt-6 grid gap-4 lg:grid-cols-[1.55fr_1fr]">
        <section class="rounded-2xl bg-lime p-6">
            <div class="flex items-start justify-between">
                <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-forest">Saldo Tabungan</p>
                <svg class="h-4 w-4 text-forest" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <rect x="3" y="4" width="18" height="16" rx="2.5" />
                    <path d="M3 9h18M8 14h8" /></svg>
            </div>
            <p class="mt-8 font-head text-4xl font-semibold text-forest">Rp 125.500</p>
            <p class="mt-2 text-xs text-forest/80">Tersedia Rp 75.500 · Rp 50.000 ditahan</p>
            <a href="tarik-saldo.html"
                class="mt-6 inline-flex items-center gap-2 rounded-lg bg-forest px-4 py-2.5 text-xs font-semibold text-white hover:bg-forest-dark">
                Tarik Saldo <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M5 12h14m-7-7 7 7-7 7" /></svg>
            </a>
        </section>

        <div class="grid gap-4">
            <a href="kalkulator.html"
                class="flex items-center gap-3 rounded-2xl border border-slate-100 bg-white p-4 shadow-sm hover:border-leaf/40">
                <span class="grid h-10 w-10 place-items-center rounded-xl bg-lime text-forest"><svg class="h-5 w-5"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                        stroke-linejoin="round" aria-hidden="true">
                        <rect width="16" height="20" x="4" y="2" rx="2" />
                        <path d="M8 6h8M16 14v4M16 10h.01M12 10h.01M8 10h.01M12 14h.01M8 14h.01M12 18h.01M8 18h.01" />
                    </svg></span>
                <span class="flex-1"><span
                        class="block text-[9px] font-semibold uppercase tracking-widest text-slate-400">Pintasan</span>
                    <span class="text-xs font-semibold text-forest">Kalkulator Estimasi</span></span>
                <svg class="h-4 w-4 text-forest" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M5 12h14m-7-7 7 7-7 7" /></svg>
            </a>
            <a href="tabungan.html"
                class="flex items-center gap-3 rounded-2xl border border-slate-100 bg-white p-4 shadow-sm hover:border-leaf/40">
                <span class="grid h-10 w-10 place-items-center rounded-xl bg-lime text-forest"><svg class="h-5 w-5"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                        stroke-linejoin="round" aria-hidden="true">
                        <path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.5 19 2c1 2 2 4.2 2 8 0 5.500-4.800 10-10 10Z" />
                        <path d="M2 21c0-3 1.900-5.400 5.100-6C9.500 14.500 12 13 13 12" /></svg></span>
                <span class="flex-1"><span
                        class="block text-[9px] font-semibold uppercase tracking-widest text-slate-400">Dampakmu</span>
                    <span class="text-xs font-semibold text-forest">50,25 kg disetor</span></span>
                <svg class="h-4 w-4 text-forest" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M5 12h14m-7-7 7 7-7 7" /></svg>
            </a>
        </div>
    </div>

    <!-- Info penarikan tertunda -->
    <a href="tabungan.html" class="mt-4 flex items-center gap-3 rounded-2xl bg-lime-soft px-5 py-3.5">
        <svg class="h-5 w-5 text-forest" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
            stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <circle cx="12" cy="12" r="10" />
            <path d="M16 8h-6a2 2 0 1 0 0 4h4a2 2 0 1 1 0 4H8M12 18V6" /></svg>
        <span class="flex-1"><span class="block text-xs font-semibold text-forest">Permintaan tarik saldo Rp 50.000
                menunggu persetujuan</span>
            <span class="text-[10px] text-slate-500">Lihat status permintaanmu</span></span>
        <svg class="h-4 w-4 text-forest" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
            stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="M5 12h14m-7-7 7 7-7 7" /></svg>
    </a>

    <!-- Aktivitas terbaru -->
    <section class="mt-8">
        <div class="flex items-end justify-between">
            <div>
                <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-leaf">Aktivitas terbaru</p>
                <h3 class="mt-1 font-head text-sm font-semibold text-forest">Transaksi terakhir</h3>
            </div>
            <a href="tabungan.html"
                class="inline-flex items-center gap-1.5 text-xs font-semibold text-leaf hover:underline">Lihat semua
                <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                    stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M5 12h14m-7-7 7 7-7 7" /></svg></a>
        </div>

        <div class="mt-4 overflow-x-auto rounded-xl border border-slate-200 bg-white">
            <table class="w-full min-w-[560px] text-left text-xs">
                <thead class="bg-[#EEF0E3] text-[10px] font-semibold uppercase tracking-wider text-forest">
                    <tr>
                        <th class="px-5 py-3">Tanggal</th>
                        <th class="px-5 py-3">Rincian</th>
                        <th class="px-5 py-3">Status</th>
                        <th class="px-5 py-3 text-right">Nominal</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <tr>
                        <td class="px-5 py-3.5 text-forest">3 Nov 2026</td>
                        <td class="px-5 py-3.5">
                            <p class="font-semibold text-forest">Setoran Sampah</p>
                            <p class="text-[10px] text-slate-400">ST-1103</p>
                        </td>
                        <td class="px-5 py-3.5 font-semibold text-leaf">Tercatat</td>
                        <td class="px-5 py-3.5 text-right font-semibold text-leaf">+Rp 8.750</td>
                    </tr>
                    <tr>
                        <td class="px-5 py-3.5 text-forest">3 Nov 2026</td>
                        <td class="px-5 py-3.5">
                            <p class="font-semibold text-forest">Penarikan Saldo</p>
                            <p class="text-[10px] text-slate-400">TR-001</p>
                        </td>
                        <td class="px-5 py-3.5"><span
                                class="inline-flex items-center gap-1 rounded-full bg-lime px-2.5 py-1 text-[10px] font-semibold text-forest"><svg
                                    class="h-3 w-3" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"
                                    aria-hidden="true">
                                    <circle cx="12" cy="12" r="10" />
                                    <path d="M12 6v6l4 2" /></svg>Pending</span></td>
                        <td class="px-5 py-3.5 text-right font-semibold text-danger">-Rp 50.000</td>
                    </tr>
                    <tr>
                        <td class="px-5 py-3.5 text-forest">27 Okt 2026</td>
                        <td class="px-5 py-3.5">
                            <p class="font-semibold text-forest">Setoran Sampah</p>
                            <p class="text-[10px] text-slate-400">ST-1027</p>
                        </td>
                        <td class="px-5 py-3.5 font-semibold text-leaf">Tercatat</td>
                        <td class="px-5 py-3.5 text-right font-semibold text-leaf">+Rp 16.800</td>
                    </tr>
                    <tr>
                        <td class="px-5 py-3.5 text-forest">18 Okt 2026</td>
                        <td class="px-5 py-3.5">
                            <p class="font-semibold text-forest">Setoran Sampah</p>
                            <p class="text-[10px] text-slate-400">ST-1018</p>
                        </td>
                        <td class="px-5 py-3.5 font-semibold text-leaf">Tercatat</td>
                        <td class="px-5 py-3.5 text-right font-semibold text-leaf">+Rp 18.000</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</main>

@endsection
