@extends('layouts.app')

@section('title', 'Buku Tabungan | sampahPay')

@push('scripts')


@endpush
@section('content')

<main class="px-8 py-10">
    <h1 class="font-display text-[28px] font-semibold text-pine">Riwayat Setoran</h1>
    <p class="mt-1 text-sm text-gray-500">Lihat, koreksi, atau hapus data setoran.</p>

    <div class="mt-6 flex gap-3">
        <div
            class="flex flex-1 items-center gap-2 rounded-lg border border-gray-200 bg-white px-3 py-2.5 text-gray-400 focus-within:border-leaf">
            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <circle cx="11" cy="11" r="8" />
                <path d="M21 21l-4.300-4.300" /></svg>
            <input id="cari" type="text" placeholder="Cari nama atau nomor transaksi"
                class="w-full text-sm text-gray-800 outline-none placeholder:text-gray-400"></div>
        <button
            class="rounded-lg border border-leaf bg-white px-4 py-2.5 text-[13px] font-semibold text-pine hover:bg-paper">Filter
            tanggal</button>
    </div>

    <div class="mt-4 overflow-hidden rounded-xl bg-white ring-1 ring-black/5">
        <table class="w-full text-left text-[13px]">
            <thead class="bg-[#EEF0E6] text-[10px] font-semibold uppercase tracking-wider text-gray-500">
                <tr>
                    <th class="px-5 py-3">Tanggal</th>
                    <th class="px-5 py-3">Nasabah</th>
                    <th class="px-5 py-3">Rincian</th>
                    <th class="px-5 py-3">Total</th>
                    <th class="px-5 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody id="isi">
                <tr class="baris border-t border-black/5">
                    <td class="px-5 py-4">3 Nov 2026</td>
                    <td class="px-5 py-4">
                        <p class="font-semibold text-pine">Siti Rahma</p>
                        <p class="text-[11px] text-gray-500">ST-1103</p>
                    </td>
                    <td class="px-5 py-4">Plastik PET</td>
                    <td class="px-5 py-4 font-semibold text-pine">Rp 8.750</td>
                    <td class="px-5 py-4"><span class="inline-flex gap-4 text-[13px] font-semibold"><a
                                href="input-setoran.html" class="inline-flex items-center gap-1 text-leaf"><svg
                                    class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 20h9M16.500 3.500a2.100 2.100 0 0 1 3 3L7 19l-4 1 1-4z" />
                                </svg>Edit</a><button class="hapus inline-flex items-center gap-1 text-red-600"><svg
                                    class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M3 6h18M8 6V4h8v2M19 6l-1 14H6L5 6M10 11v6M14 11v6" />
                                </svg>Hapus</button></span></td>
                </tr>
                <tr class="baris border-t border-black/5">
                    <td class="px-5 py-4">27 Okt 2026</td>
                    <td class="px-5 py-4">
                        <p class="font-semibold text-pine">Siti Rahma</p>
                        <p class="text-[11px] text-gray-500">ST-1027</p>
                    </td>
                    <td class="px-5 py-4">Kardus, Botol kaca <span
                            class="ml-1 rounded bg-[#EEF0E6] px-2 py-0.5 text-[10px] font-semibold text-pine">Dikoreksi</span>
                    </td>
                    <td class="px-5 py-4 font-semibold text-pine">Rp 16.800</td>
                    <td class="px-5 py-4"><span class="inline-flex gap-4 text-[13px] font-semibold"><a
                                href="input-setoran.html" class="inline-flex items-center gap-1 text-leaf"><svg
                                    class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 20h9M16.500 3.500a2.100 2.100 0 0 1 3 3L7 19l-4 1 1-4z" />
                                </svg>Edit</a><button class="hapus inline-flex items-center gap-1 text-red-600"><svg
                                    class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M3 6h18M8 6V4h8v2M19 6l-1 14H6L5 6M10 11v6M14 11v6" />
                                </svg>Hapus</button></span></td>
                </tr>
                <tr class="baris border-t border-black/5">
                    <td class="px-5 py-4">18 Okt 2026</td>
                    <td class="px-5 py-4">
                        <p class="font-semibold text-pine">Siti Rahma</p>
                        <p class="text-[11px] text-gray-500">ST-1018</p>
                    </td>
                    <td class="px-5 py-4">Minyak jelantah</td>
                    <td class="px-5 py-4 font-semibold text-pine">Rp 18.000</td>
                    <td class="px-5 py-4"><span class="inline-flex gap-4 text-[13px] font-semibold"><a
                                href="input-setoran.html" class="inline-flex items-center gap-1 text-leaf"><svg
                                    class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 20h9M16.500 3.500a2.100 2.100 0 0 1 3 3L7 19l-4 1 1-4z" />
                                </svg>Edit</a><button class="hapus inline-flex items-center gap-1 text-red-600"><svg
                                    class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M3 6h18M8 6V4h8v2M19 6l-1 14H6L5 6M10 11v6M14 11v6" />
                                </svg>Hapus</button></span></td>
                </tr>
                <tr class="baris border-t border-black/5">
                    <td class="px-5 py-4">8 Okt 2026</td>
                    <td class="px-5 py-4">
                        <p class="font-semibold text-pine">Siti Rahma</p>
                        <p class="text-[11px] text-gray-500">ST-1008</p>
                    </td>
                    <td class="px-5 py-4">Besi</td>
                    <td class="px-5 py-4 font-semibold text-pine">Rp 56.000</td>
                    <td class="px-5 py-4"><span class="inline-flex gap-4 text-[13px] font-semibold"><a
                                href="input-setoran.html" class="inline-flex items-center gap-1 text-leaf"><svg
                                    class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 20h9M16.500 3.500a2.100 2.100 0 0 1 3 3L7 19l-4 1 1-4z" />
                                </svg>Edit</a><button class="hapus inline-flex items-center gap-1 text-red-600"><svg
                                    class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M3 6h18M8 6V4h8v2M19 6l-1 14H6L5 6M10 11v6M14 11v6" />
                                </svg>Hapus</button></span></td>
                </tr>
                <tr class="baris border-t border-black/5">
                    <td class="px-5 py-4">22 Sep 2026</td>
                    <td class="px-5 py-4">
                        <p class="font-semibold text-pine">Siti Rahma</p>
                        <p class="text-[11px] text-gray-500">ST-0922</p>
                    </td>
                    <td class="px-5 py-4">Kertas HVS</td>
                    <td class="px-5 py-4 font-semibold text-pine">Rp 22.000</td>
                    <td class="px-5 py-4"><span class="inline-flex gap-4 text-[13px] font-semibold"><a
                                href="input-setoran.html" class="inline-flex items-center gap-1 text-leaf"><svg
                                    class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 20h9M16.500 3.500a2.100 2.100 0 0 1 3 3L7 19l-4 1 1-4z" />
                                </svg>Edit</a><button class="hapus inline-flex items-center gap-1 text-red-600"><svg
                                    class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M3 6h18M8 6V4h8v2M19 6l-1 14H6L5 6M10 11v6M14 11v6" />
                                </svg>Hapus</button></span></td>
                </tr>
                <tr class="baris border-t border-black/5">
                    <td class="px-5 py-4">4 Sep 2026</td>
                    <td class="px-5 py-4">
                        <p class="font-semibold text-pine">Siti Rahma</p>
                        <p class="text-[11px] text-gray-500">ST-0904</p>
                    </td>
                    <td class="px-5 py-4">Kardus, Botol kaca</td>
                    <td class="px-5 py-4 font-semibold text-pine">Rp 20.000</td>
                    <td class="px-5 py-4"><span class="inline-flex gap-4 text-[13px] font-semibold"><a
                                href="input-setoran.html" class="inline-flex items-center gap-1 text-leaf"><svg
                                    class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 20h9M16.500 3.500a2.100 2.100 0 0 1 3 3L7 19l-4 1 1-4z" />
                                </svg>Edit</a><button class="hapus inline-flex items-center gap-1 text-red-600"><svg
                                    class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M3 6h18M8 6V4h8v2M19 6l-1 14H6L5 6M10 11v6M14 11v6" />
                                </svg>Hapus</button></span></td>
                </tr>
                <tr class="baris border-t border-black/5">
                    <td class="px-5 py-4">20 Agu 2026</td>
                    <td class="px-5 py-4">
                        <p class="font-semibold text-pine">Siti Rahma</p>
                        <p class="text-[11px] text-gray-500">ST-0820</p>
                    </td>
                    <td class="px-5 py-4">Kardus</td>
                    <td class="px-5 py-4 font-semibold text-pine">Rp 13.950</td>
                    <td class="px-5 py-4"><span class="inline-flex gap-4 text-[13px] font-semibold"><a
                                href="input-setoran.html" class="inline-flex items-center gap-1 text-leaf"><svg
                                    class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 20h9M16.500 3.500a2.100 2.100 0 0 1 3 3L7 19l-4 1 1-4z" />
                                </svg>Edit</a><button class="hapus inline-flex items-center gap-1 text-red-600"><svg
                                    class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M3 6h18M8 6V4h8v2M19 6l-1 14H6L5 6M10 11v6M14 11v6" />
                                </svg>Hapus</button></span></td>
                </tr>
                <tr class="baris border-t border-black/5">
                    <td class="px-5 py-4">2 Nov 2026</td>
                    <td class="px-5 py-4">
                        <p class="font-semibold text-pine">Andi Pratama</p>
                        <p class="text-[11px] text-gray-500">ST-A01</p>
                    </td>
                    <td class="px-5 py-4">Plastik PET</td>
                    <td class="px-5 py-4 font-semibold text-pine">Rp 7.000</td>
                    <td class="px-5 py-4"><span class="inline-flex gap-4 text-[13px] font-semibold"><a
                                href="input-setoran.html" class="inline-flex items-center gap-1 text-leaf"><svg
                                    class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 20h9M16.500 3.500a2.100 2.100 0 0 1 3 3L7 19l-4 1 1-4z" />
                                </svg>Edit</a><button class="hapus inline-flex items-center gap-1 text-red-600"><svg
                                    class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M3 6h18M8 6V4h8v2M19 6l-1 14H6L5 6M10 11v6M14 11v6" />
                                </svg>Hapus</button></span></td>
                </tr>
                <tr class="baris border-t border-black/5">
                    <td class="px-5 py-4">1 Nov 2026</td>
                    <td class="px-5 py-4">
                        <p class="font-semibold text-pine">Rina Lestari</p>
                        <p class="text-[11px] text-gray-500">ST-R01</p>
                    </td>
                    <td class="px-5 py-4">Besi</td>
                    <td class="px-5 py-4 font-semibold text-pine">Rp 120.000</td>
                    <td class="px-5 py-4"><span class="inline-flex gap-4 text-[13px] font-semibold"><a
                                href="input-setoran.html" class="inline-flex items-center gap-1 text-leaf"><svg
                                    class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 20h9M16.500 3.500a2.100 2.100 0 0 1 3 3L7 19l-4 1 1-4z" />
                                </svg>Edit</a><button class="hapus inline-flex items-center gap-1 text-red-600"><svg
                                    class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M3 6h18M8 6V4h8v2M19 6l-1 14H6L5 6M10 11v6M14 11v6" />
                                </svg>Hapus</button></span></td>
                </tr>
            </tbody>
        </table>
        <p id="kosong" class="hidden px-5 py-6 text-sm text-gray-500">Tidak ada setoran yang cocok.</p>
    </div>
</main>



@push('scripts_kedua')
<script>
    // Logika khusus halaman ini
    // Cari nama / nomor transaksi
    document.getElementById('cari').addEventListener('input', e => {
        const q = e.target.value.toLowerCase().trim();
        let ada = 0;
        document.querySelectorAll('#isi .baris').forEach(r => {
            const cocok = r.textContent.toLowerCase().includes(q);
            r.classList.toggle('hidden', !cocok);
            if (cocok) ada++;
        });
        document.getElementById('kosong').classList.toggle('hidden', ada > 0);
    });
    // Hapus baris (dengan konfirmasi)
    document.getElementById('isi').addEventListener('click', e => {
        const b = e.target.closest('.hapus');
        if (b && confirm('Hapus data setoran ini?')) b.closest('.baris').remove();
    });

</script>

@endpush

@endsection
