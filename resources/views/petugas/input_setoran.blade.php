@extends('layouts.app')

@section('title', 'Input Setoran | sampahPay')

@push('scripts')

@endpush
@section('content')

 <main class="px-8 py-10">
        <h1 class="font-display text-[28px] font-semibold text-pine">Input Setoran</h1>
        <p class="mt-1 text-sm text-gray-500">Catat sampah yang dibawa nasabah dengan teliti.</p>

        <!-- Langkah 1: pilih nasabah -->
        <section class="mt-8">
          <div class="flex gap-3"><span class="grid h-7 w-7 shrink-0 place-items-center rounded-full bg-pine text-xs font-bold text-white">1</span>
            <div><h3 class="text-sm font-semibold text-pine">Pilih Nasabah</h3><p class="text-[13px] text-gray-500">Cari berdasarkan nama, nomor anggota, atau nomor HP.</p></div></div>
          <div class="relative mt-3 rounded-xl bg-white p-5 shadow-sm ring-1 ring-black/5">
            <div class="flex items-center gap-2 rounded-lg border border-gray-200 px-3 py-2.5 text-gray-400 focus-within:border-leaf"><svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.300-4.300"/></svg>
              <input id="cari" type="text" autocomplete="off" placeholder="Cari Siti Rahma atau SP-0012" class="w-full text-sm text-gray-800 outline-none placeholder:text-gray-400"></div>
            <ul id="hasil" class="mt-2 hidden overflow-hidden rounded-lg border border-gray-200 text-sm"></ul>
            <p id="terpilih" class="mt-3 hidden text-sm font-semibold text-pine"></p>
          </div>
        </section>

        <!-- Langkah 2: item setoran -->
        <section class="mt-8">
          <div class="flex gap-3"><span class="grid h-7 w-7 shrink-0 place-items-center rounded-full bg-pine text-xs font-bold text-white">2</span>
            <div><h3 class="text-sm font-semibold text-pine">Item Setoran</h3><p class="text-[13px] text-gray-500">Harga mengikuti daftar harga aktif saat ini.</p></div></div>
          <div class="mt-3 rounded-xl bg-white p-5 shadow-sm ring-1 ring-black/5">
            <div id="baris"></div>
            <div class="mt-3 border-t border-black/5 pt-4">
              <button id="tambah" type="button" class="inline-flex items-center gap-2 rounded-lg border border-leaf px-4 py-2 text-[13px] font-semibold text-pine hover:bg-paper">+ Tambah Item</button></div>
            <div class="mt-4 flex items-center justify-between rounded-lg bg-lime px-5 py-5"><span class="text-[13px] text-gray-600">Total setoran</span><span id="total" class="font-display text-2xl font-semibold text-pine">Rp 0</span></div>
          </div>
        </section>

        <div class="mt-6 flex items-center justify-end gap-6">
          <a href="beranda.html" class="text-[13px] font-semibold text-pine">Batal</a>
          <button id="lanjut" disabled class="inline-flex items-center gap-2 rounded-lg bg-pine px-5 py-3 text-sm font-semibold text-white disabled:cursor-not-allowed disabled:opacity-50">Lanjut ke Konfirmasi <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg></button>
        </div>
      </main>

@push('scripts_kedua')

<script>
// Logika khusus halaman ini
const HARGA = { 'Plastik PET':3500, 'Kardus':1500, 'Botol kaca':800, 'Besi':8000, 'Kertas HVS':2200, 'Minyak jelantah':6000 };
const NASABAH = [ {n:'Siti Rahma',id:'SP-0012'}, {n:'Andi Pratama',id:'SP-0013'}, {n:'Rina Lestari',id:'SP-0014'}, {n:'Dewi Anggraini',id:'SP-0015'} ];
const rp = n => 'Rp ' + n.toLocaleString('id-ID');
let nasabah = null;
const $ = id => document.getElementById(id);

// Pencarian nasabah
$('cari').addEventListener('input', e => {
  const q = e.target.value.toLowerCase().trim();
  const hasil = q ? NASABAH.filter(x => (x.n + x.id).toLowerCase().includes(q)) : [];
  $('hasil').innerHTML = hasil.map(x => `<li><button type="button" data-id="${x.id}" class="w-full px-4 py-2.5 text-left hover:bg-paper"><b class="text-pine">${x.n}</b> <span class="text-gray-500">${x.id}</span></button></li>`).join('');
  $('hasil').classList.toggle('hidden', !hasil.length);
});
$('hasil').addEventListener('click', e => {
  const b = e.target.closest('button'); if (!b) return;
  nasabah = NASABAH.find(x => x.id === b.dataset.id);
  $('terpilih').textContent = 'Nasabah: ' + nasabah.n + ' (' + nasabah.id + ')';
  $('terpilih').classList.remove('hidden'); $('hasil').classList.add('hidden'); $('cari').value = '';
  hitung();
});

// Baris item
function tambahBaris() {
  const d = document.createElement('div');
  d.className = 'baris flex flex-wrap items-start gap-4 py-3';
  d.innerHTML = `
    <div class="w-56"><label class="mb-1.5 block text-[13px] font-semibold text-pine">Jenis sampah</label>
      <select class="jenis w-full rounded-lg border border-gray-200 bg-white px-3 py-2.5 text-sm outline-none focus:border-leaf">${Object.keys(HARGA).map(k => `<option>${k}</option>`).join('')}</select></div>
    <div class="w-48"><label class="mb-1.5 block text-[13px] font-semibold text-pine">Jumlah (kg)</label>
      <input type="number" min="0" step="0.1" value="0" class="jumlah w-full rounded-lg border border-gray-200 px-3 py-2.5 text-sm outline-none focus:border-leaf"></div>
    <div class="w-28"><p class="mb-1.5 text-[11px] text-gray-500">Harga</p><p class="harga pt-2 text-[13px] font-semibold text-pine"></p></div>
    <div class="ml-auto text-right"><p class="mb-1.5 text-[11px] text-gray-500">Subtotal</p><p class="sub pt-2 text-[13px] font-semibold text-pine"></p></div>
    <button type="button" class="hapus text-red-600" aria-label="Hapus item"><svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18M8 6V4h8v2M19 6l-1 14H6L5 6M10 11v6M14 11v6"/></svg></button>`;
  $('baris').appendChild(d); hitung();
}
$('tambah').addEventListener('click', tambahBaris);
$('baris').addEventListener('input', hitung);
$('baris').addEventListener('click', e => { if (e.target.closest('.hapus') && document.querySelectorAll('.baris').length > 1) { e.target.closest('.baris').remove(); hitung(); } });

function hitung() {
  let total = 0;
  document.querySelectorAll('.baris').forEach(r => {
    const h = HARGA[r.querySelector('.jenis').value], s = Math.round(h * (parseFloat(r.querySelector('.jumlah').value) || 0));
    r.querySelector('.harga').textContent = rp(h); r.querySelector('.sub').textContent = rp(s); total += s;
  });
  $('total').textContent = rp(total);
  $('lanjut').disabled = !(nasabah && total > 0);
}
tambahBaris();
</script>

@endpush

@endsection