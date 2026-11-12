@extends('layouts.app')


@push('scripts')
<script>
    /* Dipakai semua halaman admin: konfigurasi Tailwind, sidebar, header, ikon, toast. */
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
        name: 'Ani Wijaya',
        initials: 'AW',
        role: 'Administrator'
    };
    window.rp = (n) => (n < 0 ? '-' : '') + 'Rp ' + Math.abs(n).toLocaleString('id-ID');

    const ICONS = {
        chart: '<path d="M3 3v18h18"/><path d="M18 17V9M13 17V5M8 17v-3"/>',
        book: '<path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/>',
        tag: '<path d="M12.6 2.6A2 2 0 0 0 11.2 2H4a2 2 0 0 0-2 2v7.2a2 2 0 0 0 .6 1.4l8.7 8.7a2.4 2.4 0 0 0 3.4 0l6.6-6.6a2.4 2.4 0 0 0 0-3.4z"/><circle cx="7.5" cy="7.5" r=".6" fill="currentColor"/>',
        users: '<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.9M16 3.1a4 4 0 0 1 0 7.8"/>',
        gear: '<circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.7 1.7 0 0 0 .3 1.8l.1.1a2 2 0 1 1-2.8 2.8l-.1-.1a1.7 1.7 0 0 0-1.800-.3 1.700 1.700 0 0 0-1 1.500V21a2 2 0 1 1-4 0v-.1a1.700 1.700 0 0 0-1.100-1.500 1.700 1.700 0 0 0-1.800.3l-.1.1a2 2 0 1 1-2.800-2.800l.1-.1a1.700 1.700 0 0 0 .3-1.800 1.700 1.700 0 0 0-1.500-1H3a2 2 0 1 1 0-4h.1a1.700 1.700 0 0 0 1.500-1.100 1.700 1.700 0 0 0-.3-1.800l-.1-.1a2 2 0 1 1 2.800-2.800l.1.1a1.700 1.700 0 0 0 1.800.3H9a1.700 1.700 0 0 0 1-1.500V3a2 2 0 1 1 4 0v.1a1.700 1.700 0 0 0 1 1.500 1.700 1.700 0 0 0 1.800-.3l.1-.1a2 2 0 1 1 2.800 2.800l-.1.1a1.700 1.700 0 0 0-.3 1.800V9a1.700 1.700 0 0 0 1.500 1H21a2 2 0 1 1 0 4h-.1a1.700 1.700 0 0 0-1.500 1z"/>',
        leaf: '<path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.5 19 2c1 2 2 4.2 2 8 0 5.500-4.800 10-10 10Z"/><path d="M2 21c0-3 1.900-5.400 5.100-6C9.500 14.500 12 13 13 12"/>',
        search: '<circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/>',
        plus: '<path d="M5 12h14M12 5v14"/>',
        arrow: '<path d="M5 12h14m-7-7 7 7-7 7"/>',
        up: '<path d="M7 17 17 7M7 7h10v10"/>',
        down: '<path d="M7 7l10 10M17 7v10H7"/>',
        pencil: '<path d="M17 3a2.85 2.85 0 1 1 4 4L7.500 20.500 2 22l1.500-5.500Z"/>',
        download: '<path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4M7 10l5 5 5-5M12 15V3"/>',
        check: '<path d="M20 6 9 17l-5-5"/>',
        menu: '<path d="M4 6h16M4 12h16M4 18h16"/>',
    };

    function icon(name, cls) {
        return `<svg class="${cls || ''}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">${ICONS[name] || ''}</svg>`;
    }
    window.hydrateIcons = (root) => {
        (root || document).querySelectorAll('i[data-icon]').forEach((el) => {
            const t = document.createElement('template');
            t.innerHTML = icon(el.dataset.icon, el.className);
            el.replaceWith(t.content.firstChild);
        });
    };

    /* Notifikasi singkat di pojok kanan bawah */
    window.toast = (msg) => {
        const el = document.createElement('div');
        el.setAttribute('role', 'status');
        el.className =
            'no-print fixed bottom-5 right-5 z-50 flex max-w-[calc(100vw-2.5rem)] items-center gap-2 rounded-lg bg-forest px-4 py-3 text-xs font-semibold text-white shadow-lg';
        el.innerHTML = icon('check', 'h-4 w-4 shrink-0') + '<span></span>';
        el.lastChild.textContent = msg;
        document.body.appendChild(el);
        setTimeout(() => el.remove(), 3500);
    };

    // Menu admin (Log Aktivitas sengaja tidak ada)
    const NAV = [
        ['dashboard', 'Dashboard', 'index.html', 'chart'],
        ['laporan', 'Laporan Bulanan', 'laporan.html', 'book'],
        ['harga', 'Harga Sampah', 'harga.html', 'tag'],
        ['pengguna', 'Kelola Pengguna', 'pengguna.html', 'users'],
        ['profil', 'Profil', '#', 'gear'],
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

<main id="content" class="mx-auto max-w-[960px] p-5 md:p-6">


    <!-- Kartu ringkasan -->
    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
        <article class="rounded-2xl border border-slate-100 bg-white p-5 shadow-sm">
            <p class="text-xs text-forest">Sampah Bulan Ini</p>
            <p class="mt-3 font-head text-2xl font-semibold text-forest">34,5 kg</p>
            <p class="mt-3 flex items-center gap-1.5 text-[10px] text-slate-500"><svg class="h-3 w-3"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                    stroke-linejoin="round" aria-hidden="true">
                    <path d="M7 17 17 7M7 7h10v10" /></svg>73% dibanding bulan lalu</p>
        </article>
        <article class="rounded-2xl border border-slate-100 bg-white p-5 shadow-sm">
            <p class="text-xs text-forest">Nilai Setoran Bulan Ini</p>
            <p class="mt-3 font-head text-2xl font-semibold text-forest">Rp 135.750</p>
            <p class="mt-3 flex items-center gap-1.5 text-[10px] text-slate-500"><svg class="h-3 w-3"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                    stroke-linejoin="round" aria-hidden="true">
                    <path d="M7 17 17 7M7 7h10v10" /></svg>3 transaksi</p>
        </article>
        <article class="rounded-2xl border border-slate-100 bg-white p-5 shadow-sm">
            <p class="text-xs text-forest">Total Saldo Nasabah</p>
            <p class="mt-3 font-head text-2xl font-semibold text-forest">Rp 739.600</p>
            <p class="mt-3 flex items-center gap-1.5 text-[10px] text-slate-500"><svg class="h-3 w-3"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                    stroke-linejoin="round" aria-hidden="true">
                    <path d="M7 17 17 7M7 7h10v10" /></svg>seluruh nasabah</p>
        </article>
        <article class="rounded-2xl border border-slate-100 bg-white p-5 shadow-sm">
            <p class="text-xs text-forest">Nasabah Aktif</p>
            <p class="mt-3 font-head text-2xl font-semibold text-forest">8</p>
            <p class="mt-3 flex items-center gap-1.5 text-[10px] text-slate-500"><svg class="h-3 w-3"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                    stroke-linejoin="round" aria-hidden="true">
                    <path d="M7 17 17 7M7 7h10v10" /></svg>akun aktif</p>
        </article>
        <article class="rounded-2xl border border-slate-100 bg-white p-5 shadow-sm">
            <p class="text-xs text-forest">Penarikan Pending</p>
            <p class="mt-3 font-head text-2xl font-semibold text-forest">3</p>
            <p class="mt-3 flex items-center gap-1.5 text-[10px] text-slate-500"><svg class="h-3 w-3"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                    stroke-linejoin="round" aria-hidden="true">
                    <path d="M7 7l10 10M17 7v10H7" /></svg>diproses petugas</p>
        </article>
    </div>

    <!-- Grafik tren -->
    <section class="mt-6 rounded-2xl border border-slate-100 bg-white p-5 shadow-sm">
        <div class="flex flex-wrap items-start justify-between gap-3">
            <div>
                <h2 class="text-xs font-semibold text-forest">Tren volume sampah masuk</h2>
                <p class="mt-1 text-xs text-forest">Volume bulanan berdasarkan data setoran.</p>
            </div>
            <div class="flex gap-2">
                <label><span class="sr-only">Rentang waktu</span>
                    <select id="range"
                        class="h-10 rounded-lg border border-slate-200 bg-white px-3 text-xs font-medium text-forest focus:border-leaf focus:outline-none focus:ring-2 focus:ring-leaf/30">
                        <option value="3">3 bulan</option>
                        <option value="6" selected>6 bulan</option>
                    </select></label>
                <label><span class="sr-only">Jenis sampah</span>
                    <select id="jenis"
                        class="h-10 rounded-lg border border-slate-200 bg-white px-3 text-xs font-medium text-forest focus:border-leaf focus:outline-none focus:ring-2 focus:ring-leaf/30"></select></label>
            </div>
        </div>

        <div id="chart" class="mt-6 flex items-end gap-3 overflow-x-auto border-b border-slate-200 pb-3" role="img"
            aria-label="Grafik batang volume sampah per bulan"></div>
        <p class="mt-3 text-[10px] text-slate-500">Grafik utama menampilkan unit sesuai filter. Botol kaca (buah) dan
            minyak jelantah (liter) dihitung terpisah saat dipilih.</p>
    </section>

    <!-- Aktivitas + laporan -->
    <div class="mt-6 grid gap-4 lg:grid-cols-[1.7fr_1fr]">
        <section>
            <h2 class="text-xs font-semibold text-forest">Aktivitas terbaru</h2>
            <ul
                class="mt-3 divide-y divide-slate-100 overflow-hidden rounded-xl border border-slate-100 bg-white shadow-sm">
                <li><a href="harga.html" class="flex items-center gap-3 px-4 py-3.5 hover:bg-slate-50">
                        <span class="h-1.5 w-1.5 rounded-full bg-leaf"></span>
                        <span class="flex-1"><span class="block text-xs font-semibold text-forest">Ubah
                                Harga</span><span class="text-[10px] text-slate-500">Harga Plastik PET diperbarui · 3
                                Nov 2026, 09.15</span></span>
                        <svg class="h-4 w-4 text-forest" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M5 12h14m-7-7 7 7-7 7" /></svg></a></li>
                <li><a href="pengguna.html" class="flex items-center gap-3 px-4 py-3.5 hover:bg-slate-50">
                        <span class="h-1.5 w-1.5 rounded-full bg-leaf"></span>
                        <span class="flex-1"><span class="block text-xs font-semibold text-forest">Penarikan
                                Diproses</span><span class="text-[10px] text-slate-500">Permintaan TR-001 sedang
                                diproses petugas · 3 Nov 2026, 10.20</span></span>
                        <svg class="h-4 w-4 text-forest" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M5 12h14m-7-7 7 7-7 7" /></svg></a></li>
                <li><a href="laporan.html" class="flex items-center gap-3 px-4 py-3.5 hover:bg-slate-50">
                        <span class="h-1.5 w-1.5 rounded-full bg-leaf"></span>
                        <span class="flex-1"><span class="block text-xs font-semibold text-forest">Setoran
                                Baru</span><span class="text-[10px] text-slate-500">ST-1103 dicatat oleh Budi Santoso ·
                                3 Nov 2026, 10.20</span></span>
                        <svg class="h-4 w-4 text-forest" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M5 12h14m-7-7 7 7-7 7" /></svg></a></li>
            </ul>
        </section>

        <aside class="self-start rounded-2xl bg-lime p-5">
            <p class="text-xs font-semibold text-forest">Laporan bulan ini</p>
            <p class="mt-2 text-[11px] leading-5 text-forest/80">Lihat rekap setoran November 2026 lengkap dengan
                rincian per jenis sampah.</p>
            <a href="laporan.html"
                class="mt-4 inline-flex items-center gap-2 rounded-lg bg-forest px-4 py-2.5 text-xs font-semibold text-white hover:bg-forest-dark">Buka
                Laporan <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M5 12h14m-7-7 7 7-7 7" /></svg></a>
        </aside>
    </div>
</main>

@push('scripts_kedua')
<script>
    const MONTHS = ['Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov'];
    const DATA = {
        'Plastik PET': {
            unit: 'kg',
            v: [5, 4, 6, 12, 9, 4.5]
        },
        'Kardus': {
            unit: 'kg',
            v: [6, 5, 6, 15, 11, 0]
        },
        'Kertas HVS': {
            unit: 'kg',
            v: [4, 3, 3, 10, 7, 0]
        },
        'Besi': {
            unit: 'kg',
            v: [6, 5, 5, 25, 17, 30]
        },
        'Botol kaca': {
            unit: 'buah',
            v: [12, 8, 10, 40, 30, 0]
        },
        'Minyak jelantah': {
            unit: 'liter',
            v: [3, 2, 4, 9, 6, 0]
        },
    };
    // "Semua Jenis" = jumlah semua jenis berunit kg
    const kgTypes = Object.values(DATA).filter((d) => d.unit === 'kg');
    const ALL = {
        unit: 'kg',
        v: MONTHS.map((_, i) => kgTypes.reduce((s, d) => s + d.v[i], 0))
    };

    function render() {
        const n = Number(document.getElementById('range').value);
        const key = document.getElementById('jenis').value;
        const src = key === 'Semua Jenis' ? ALL : DATA[key];
        const vals = src.v.slice(-n),
            labels = MONTHS.slice(-n);
        const max = Math.max(...vals, 1);

        document.getElementById('chart').innerHTML = vals.map((v, i) => `
        <div class="flex min-w-[48px] flex-1 flex-col items-center gap-2">
          <div class="flex h-[170px] items-end">
            <div class="w-8 rounded-t bg-active" style="height:${Math.max(Math.round(v / max * 170), v > 0 ? 4 : 0)}px"
              title="${labels[i]}: ${v} ${src.unit}"></div>
          </div>
          <span class="text-[10px] text-slate-500">${labels[i]}</span>
        </div>`).join('');
    }

    window.pageInit = () => {
        const sel = document.getElementById('jenis');
        sel.innerHTML = ['Semua Jenis', ...Object.keys(DATA)].map((k) => `<option>${k}</option>`).join('');
        document.getElementById('range').addEventListener('change', render);
        sel.addEventListener('change', render);
        render();
    };

</script>
@endpush

@endsection
