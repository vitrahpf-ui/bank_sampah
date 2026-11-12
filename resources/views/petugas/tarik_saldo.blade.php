@extends('layouts.app')

@section('title', 'Tarik Saldo | sampahPay')

@push('scripts')

@endpush
@section('content')

<main class="px-8 py-10">
    <h1 class="font-display text-[28px] font-semibold text-pine">Permintaan Tarik Saldo</h1>
    <p class="mt-1 text-sm text-gray-500">Proses permintaan nasabah secara teliti.</p>

    <!-- Tab -->
    <div class="mt-6 flex border-b border-black/10"><button data-tab="pending"
            class="tab -mb-px border-b-2 px-5 py-3 text-[13px] font-semibold border-leaf text-leaf">Pending (<span
                id="jml">3</span>)</button><button data-tab="setuju"
            class="tab -mb-px border-b-2 px-5 py-3 text-[13px] font-semibold border-transparent text-gray-600">Disetujui</button><button
            data-tab="tolak"
            class="tab -mb-px border-b-2 px-5 py-3 text-[13px] font-semibold border-transparent text-gray-600">Ditolak
            &amp; Dibatalkan</button></div>

    <!-- Panel: Pending -->
    <section id="panel-pending" class="mt-6 grid gap-4 lg:grid-cols-2">
        <article class="kartu rounded-2xl bg-white p-5 shadow-sm ring-1 ring-black/5">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-[13px] font-semibold text-pine">Rina Lestari</p>
                    <p class="text-[11px] text-gray-500">SP-0014</p>
                </div>
                <span
                    class="inline-flex items-center gap-1.5 rounded-full bg-lime px-3 py-1.5 text-[11px] font-semibold text-pine"><svg
                        class="w-3 h-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M12 6v6l4 2" /></svg>Pending</span>
            </div>
            <p class="mt-4 font-display text-2xl font-semibold text-pine">Rp 100.000</p>
            <div class="mt-4 grid grid-cols-2 gap-4 text-[13px] text-gray-500">
                <div>Saldo saat ini<p class="mt-1 font-semibold">Rp 168.000</p>
                </div>
                <div>Diajukan<p class="mt-1 font-semibold">1 Nov 2026</p>
                </div>
            </div>
            <div class="mt-4 grid grid-cols-2 gap-3"><button data-aksi="tolak"
                    class="rounded-lg border border-leaf py-2.5 text-[13px] font-semibold text-pine hover:bg-paper">Tolak</button><button
                    data-aksi="setuju"
                    class="rounded-lg bg-pine py-2.5 text-[13px] font-semibold text-white hover:bg-pine/90">Setujui</button>
            </div>
        </article>
        <article class="kartu rounded-2xl bg-white p-5 shadow-sm ring-1 ring-black/5">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-[13px] font-semibold text-pine">Andi Pratama</p>
                    <p class="text-[11px] text-gray-500">SP-0013</p>
                </div>
                <span
                    class="inline-flex items-center gap-1.5 rounded-full bg-lime px-3 py-1.5 text-[11px] font-semibold text-pine"><svg
                        class="w-3 h-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M12 6v6l4 2" /></svg>Pending</span>
            </div>
            <p class="mt-4 font-display text-2xl font-semibold text-pine">Rp 25.000</p>
            <div class="mt-4 grid grid-cols-2 gap-4 text-[13px] text-gray-500">
                <div>Saldo saat ini<p class="mt-1 font-semibold">Rp 34.500</p>
                </div>
                <div>Diajukan<p class="mt-1 font-semibold">2 Nov 2026</p>
                </div>
            </div>
            <div class="mt-4 grid grid-cols-2 gap-3"><button data-aksi="tolak"
                    class="rounded-lg border border-leaf py-2.5 text-[13px] font-semibold text-pine hover:bg-paper">Tolak</button><button
                    data-aksi="setuju"
                    class="rounded-lg bg-pine py-2.5 text-[13px] font-semibold text-white hover:bg-pine/90">Setujui</button>
            </div>
        </article>
        <article class="kartu rounded-2xl bg-white p-5 shadow-sm ring-1 ring-black/5">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-[13px] font-semibold text-pine">Siti Rahma</p>
                    <p class="text-[11px] text-gray-500">SP-0012</p>
                </div>
                <span
                    class="inline-flex items-center gap-1.5 rounded-full bg-lime px-3 py-1.5 text-[11px] font-semibold text-pine"><svg
                        class="w-3 h-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M12 6v6l4 2" /></svg>Pending</span>
            </div>
            <p class="mt-4 font-display text-2xl font-semibold text-pine">Rp 50.000</p>
            <div class="mt-4 grid grid-cols-2 gap-4 text-[13px] text-gray-500">
                <div>Saldo saat ini<p class="mt-1 font-semibold">Rp 125.500</p>
                </div>
                <div>Diajukan<p class="mt-1 font-semibold">3 Nov 2026</p>
                </div>
            </div>
            <p class="mt-3 rounded-lg bg-[#EEF0E6] px-3 py-2.5 text-[13px] text-pine">“Untuk kebutuhan rumah”</p>
            <div class="mt-4 grid grid-cols-2 gap-3"><button data-aksi="tolak"
                    class="rounded-lg border border-leaf py-2.5 text-[13px] font-semibold text-pine hover:bg-paper">Tolak</button><button
                    data-aksi="setuju"
                    class="rounded-lg bg-pine py-2.5 text-[13px] font-semibold text-white hover:bg-pine/90">Setujui</button>
            </div>
        </article>
        <p id="kosong" class="hidden text-sm text-gray-500">Tidak ada permintaan yang menunggu.</p>
    </section>

    <!-- Panel: Disetujui -->
    <section id="panel-setuju" class="mt-6 hidden">
        <article class="w-full max-w-[360px] rounded-2xl bg-white p-5 shadow-sm ring-1 ring-black/5">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-[13px] font-semibold text-pine">Siti Rahma</p>
                    <p class="text-[11px] text-gray-500">SP-0012</p>
                </div><span
                    class="inline-flex items-center gap-1.5 rounded-full bg-mint px-3 py-1.5 text-[11px] font-semibold text-pine"><svg
                        class="w-3 h-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 6L9 17l-5-5" /></svg>Disetujui</span>
            </div>
            <p class="mt-4 font-display text-2xl font-semibold text-pine">Rp 30.000</p>
            <div class="mt-4 grid grid-cols-2 gap-4 text-[13px] text-gray-500">
                <div>Saldo saat ini<p class="mt-1 font-semibold">Rp 125.500</p>
                </div>
                <div>Diajukan<p class="mt-1 font-semibold">12 Okt 2026</p>
                </div>
            </div>
            <p class="mt-1 text-[11px] text-leaf">Diproses oleh Budi Santoso · 12 Okt 2026, 10.22</p>
        </article>
    </section>

    <!-- Panel: Ditolak & Dibatalkan -->
    <section id="panel-tolak" class="mt-6 hidden">
        <article class="w-full max-w-[360px] rounded-2xl bg-white p-5 shadow-sm ring-1 ring-black/5">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-[13px] font-semibold text-pine">Siti Rahma</p>
                    <p class="text-[11px] text-gray-500">SP-0012</p>
                </div><span
                    class="inline-flex items-center gap-1.5 rounded-full bg-rose px-3 py-1.5 text-[11px] font-semibold text-red-700"><svg
                        class="w-3 h-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 6L6 18M6 6l12 12" /></svg>Ditolak</span>
            </div>
            <p class="mt-4 font-display text-2xl font-semibold text-pine">Rp 20.000</p>
            <div class="mt-4 grid grid-cols-2 gap-4 text-[13px] text-gray-500">
                <div>Saldo saat ini<p class="mt-1 font-semibold">Rp 125.500</p>
                </div>
                <div>Diajukan<p class="mt-1 font-semibold">5 Okt 2026</p>
                </div>
            </div>
            <p class="mt-1 text-[11px] text-leaf">Diproses oleh Budi Santoso · 5 Okt 2026, 11.10</p>
        </article>
    </section>
</main>

@push('scripts_kedua')

<script>
    // Logika khusus halaman ini
    // Pindah tab
    document.querySelectorAll('.tab').forEach(t => t.addEventListener('click', () => {
        document.querySelectorAll('.tab').forEach(x => {
            x.classList.toggle('border-leaf', x === t);
            x.classList.toggle('text-leaf', x === t);
            x.classList.toggle('border-transparent', x !== t);
            x.classList.toggle('text-gray-600', x !== t);
        });
        ['pending', 'setuju', 'tolak'].forEach(k => document.getElementById('panel-' + k).classList.toggle(
            'hidden', k !== t.dataset.tab));
    }));
    // Setujui / Tolak: kartu hilang dari Pending dan angka ikut berkurang
    document.getElementById('panel-pending').addEventListener('click', e => {
        const b = e.target.closest('button[data-aksi]');
        if (!b) return;
        b.closest('.kartu').remove();
        const sisa = document.querySelectorAll('#panel-pending .kartu').length;
        document.getElementById('jml').textContent = sisa;
        document.getElementById('badge-tarik').textContent = sisa;
        document.getElementById('kosong').classList.toggle('hidden', sisa > 0);
    });

</script>

@endpush

@endsection
