@extends('layouts.app')

@section('title', 'Kalkulator Estimasi | sampahPay')

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
    <a href="index.html" class="inline-flex items-center gap-1 text-xs font-semibold text-leaf hover:underline"><svg
            class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
            stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="m15 18-6-6 6-6" /></svg>Kembali</a>
    <h2 class="mt-5 font-head text-3xl font-semibold text-forest">Kalkulator Estimasi</h2>
    <p class="mt-2 text-xs text-slate-500">Hitung perkiraan nilai sampah sebelum kamu menyetorkannya.</p>

    <div class="mt-6 grid items-start gap-4 lg:grid-cols-[1.6fr_1fr]">
        <!-- Daftar item -->
        <section class="rounded-2xl border border-slate-100 bg-white p-5 shadow-sm">
            <div class="flex items-center justify-between">
                <h3 class="text-xs font-semibold text-forest">Item sampah</h3>
                <button type="button" id="reset"
                    class="inline-flex items-center gap-1.5 text-xs font-semibold text-forest hover:underline"><svg
                        class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                        stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8" />
                        <path d="M3 3v5h5" /></svg>Reset</button>
            </div>
            <div id="items" class="mt-4 space-y-3"></div>
            <button type="button" id="add"
                class="mt-3 inline-flex items-center gap-2 rounded-lg border border-leaf/60 px-4 py-2 text-xs font-semibold text-forest hover:bg-lime/40"><svg
                    class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                    stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M5 12h14M12 5v14" /></svg>Tambah Baris</button>
        </section>

        <!-- Ringkasan -->
        <aside class="rounded-2xl bg-lime p-5">
            <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-forest">Estimasi total</p>
            <p id="total" class="mt-4 font-head text-3xl font-semibold text-forest">Rp 0</p>
            <p id="count" class="mt-4 text-xs text-forest"></p>
            <p class="mt-1 text-[10px] leading-4 text-forest/80">Estimasi saja. Nilai akhir mengikuti hasil timbangan
                petugas dan harga saat setor.</p>
            <a href="../index.html"
                class="mt-5 block rounded-lg border border-leaf/60 py-2.5 text-center text-xs font-semibold text-forest hover:bg-white/50">Lihat
                Daftar Harga</a>
        </aside>
    </div>
</main>


@push('scripts_kedua')
<script>
    const PRICES = {
        'Plastik PET': {
            price: 3500,
            unit: 'kg'
        },
        'Kardus': {
            price: 1800,
            unit: 'kg'
        },
        'Kertas HVS': {
            price: 2200,
            unit: 'kg'
        },
        'Besi': {
            price: 4000,
            unit: 'kg'
        },
        'Botol kaca': {
            price: 500,
            unit: 'buah'
        },
        'Minyak jelantah': {
            price: 6000,
            unit: 'liter'
        },
    };
    let rows = [{
        type: 'Plastik PET',
        qty: 1
    }];

    const sub = (r) => Math.round(PRICES[r.type].price * (Number(r.qty) || 0));

    function updateTotals() {
        rows.forEach((r, i) => {
            const el = document.getElementById('sub-' + i);
            if (el) el.textContent = rp(sub(r));
        });
        document.getElementById('total').textContent = rp(rows.reduce((s, r) => s + sub(r), 0));
        const n = new Set(rows.filter((r) => Number(r.qty) > 0).map((r) => r.type)).size;
        document.getElementById('count').textContent = n + ' jenis sampah dipilih';
    }

    function render() {
        document.getElementById('items').innerHTML = rows.map((r, i) => `
        <div class="flex items-end gap-3 border-b border-slate-100 pb-3">
          <label class="w-[38%]"><span class="mb-1.5 block text-xs font-semibold text-forest">Jenis sampah</span>
            <select data-i="${i}" data-f="type" class="h-10 w-full rounded-lg border border-slate-200 bg-white px-2 text-xs focus:border-leaf focus:outline-none focus:ring-2 focus:ring-leaf/30">
              ${Object.keys(PRICES).map((k) => `<option ${k === r.type ? 'selected' : ''}>${k}</option>`).join('')}
            </select></label>
          <label class="flex-1"><span class="mb-1.5 block text-xs font-semibold text-forest">Jumlah (${PRICES[r.type].unit})</span>
            <input data-i="${i}" data-f="qty" type="number" min="0" step="any" value="${r.qty}" class="h-10 w-full rounded-lg border border-slate-200 bg-white px-3 text-xs focus:border-leaf focus:outline-none focus:ring-2 focus:ring-leaf/30" /></label>
          <div class="w-20 pb-2 text-right"><p class="text-[9px] text-slate-400">Subtotal</p><p id="sub-${i}" class="text-xs font-semibold text-forest"></p></div>
          <button type="button" data-del="${i}" aria-label="Hapus baris" class="pb-2.5 text-danger hover:opacity-70"><i data-icon="trash" class="h-4 w-4"></i></button>
        </div>`).join('');
        hydrateIcons(document.getElementById('items'));
        updateTotals();
    }

    window.pageInit = () => {
        const box = document.getElementById('items');
        box.addEventListener('input', (e) => {
            const t = e.target;
            if (t.dataset.f !== 'qty') return;
            rows[t.dataset.i].qty = t.value;
            updateTotals();
        });
        box.addEventListener('change', (e) => {
            const t = e.target;
            if (t.dataset.f !== 'type') return;
            rows[t.dataset.i].type = t.value;
            render();
        });
        box.addEventListener('click', (e) => {
            const b = e.target.closest('[data-del]');
            if (!b) return;
            rows.splice(Number(b.dataset.del), 1);
            if (!rows.length) rows = [{
                type: 'Plastik PET',
                qty: 1
            }];
            render();
        });
        document.getElementById('add').addEventListener('click', () => {
            rows.push({
                type: 'Plastik PET',
                qty: 1
            });
            render();
        });
        document.getElementById('reset').addEventListener('click', () => {
            rows = [{
                type: 'Plastik PET',
                qty: 1
            }];
            render();
        });
        render();
    };

</script>
@endpush

@endsection
