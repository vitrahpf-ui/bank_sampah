@extends('layouts.app')

@section('title', 'Tarik Saldo | sampahPay')

@push('scripts')


@endpush
@section('content')

 <main id="content" class="mx-auto max-w-[920px] p-5 md:p-6">
      <a href="index.html" class="inline-flex items-center gap-1 text-xs font-semibold text-leaf hover:underline"><svg
          class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
          stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
          <path d="m15 18-6-6 6-6" /></svg>Kembali</a>
      <h2 class="mt-5 font-head text-3xl font-semibold text-forest">Tarik Saldo</h2>
      <p class="mt-2 text-xs text-slate-500">Ajukan penarikan saldo tabunganmu dengan mudah.</p>

      <div class="mt-6 grid items-start gap-4 lg:grid-cols-[1.6fr_1fr]">
        <form id="form" class="rounded-2xl border border-slate-100 bg-white p-5 shadow-sm" novalidate>
          <label for="nominal" class="mb-1.5 block text-xs font-semibold text-forest">Nominal penarikan</label>
          <input id="nominal" type="number" min="0" inputmode="numeric" placeholder="0"
            class="h-10 w-full rounded-lg border border-slate-200 px-3 text-xs focus:border-leaf focus:outline-none focus:ring-2 focus:ring-leaf/30" />
          <p id="err" role="alert" class="mt-1.5 hidden text-[11px] text-danger"></p>

          <div class="mt-3 flex flex-wrap gap-2 text-[11px] font-medium text-forest">
            <button type="button" data-amt="25000"
              class="rounded-full border border-leaf/50 px-3 py-1 hover:bg-lime/40">25rb</button>
            <button type="button" data-amt="50000"
              class="rounded-full border border-leaf/50 px-3 py-1 hover:bg-lime/40">50rb</button>
            <button type="button" data-amt="100000"
              class="rounded-full border border-leaf/50 px-3 py-1 hover:bg-lime/40">100rb</button>
            <button type="button" data-amt="75500"
              class="rounded-full border border-leaf/50 px-3 py-1 hover:bg-lime/40">Tarik semua saldo</button>
          </div>

          <div class="mt-5 grid gap-4 sm:grid-cols-2">
            <label><span class="mb-1.5 block text-xs font-semibold text-forest">Metode pencairan</span>
              <select id="metode"
                class="h-10 w-full rounded-lg border border-slate-200 bg-white px-2 text-xs focus:border-leaf focus:outline-none focus:ring-2 focus:ring-leaf/30">
                <option>Bank</option>
                <option>E-Wallet</option>
              </select></label>
            <label><span id="tujuanLabel" class="mb-1.5 block text-xs font-semibold text-forest">Pilih bank</span>
              <select id="tujuan"
                class="h-10 w-full rounded-lg border border-slate-200 bg-white px-2 text-xs focus:border-leaf focus:outline-none focus:ring-2 focus:ring-leaf/30"></select></label>
          </div>

          <label class="mt-4 block"><span id="noLabel" class="mb-1.5 block text-xs font-semibold text-forest">Nomor
              rekening</span>
            <input id="rek" type="text" inputmode="numeric" placeholder="Masukkan nomor rekening"
              class="h-10 w-full rounded-lg border border-slate-200 px-3 text-xs focus:border-leaf focus:outline-none focus:ring-2 focus:ring-leaf/30" /></label>

          <label class="mt-4 block"><span class="mb-1.5 block text-xs font-semibold text-forest">Catatan
              (opsional)</span>
            <textarea rows="4"
              class="w-full rounded-lg border border-slate-200 px-3 py-2 text-xs focus:border-leaf focus:outline-none focus:ring-2 focus:ring-leaf/30"></textarea></label>

          <button type="submit"
            class="mt-4 h-10 w-full rounded-lg bg-forest text-xs font-semibold text-white hover:bg-forest-dark">Kirim
            Permintaan</button>
          <p id="ok" role="status"
            class="mt-3 hidden rounded-lg bg-lime-soft px-3 py-2 text-xs font-semibold text-forest"></p>
        </form>

        <aside class="rounded-2xl bg-lime p-5">
          <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-forest">Saldo tersedia</p>
          <p class="mt-4 font-head text-3xl font-semibold text-forest">Rp 75.500</p>
          <dl class="mt-4 space-y-2 border-t border-forest/20 pt-3 text-xs text-forest">
            <div class="flex justify-between">
              <dt>Total saldo</dt>
              <dd class="font-semibold">Rp 125.500</dd>
            </div>
            <div class="flex justify-between">
              <dt>Saldo ditahan</dt>
              <dd class="font-semibold">Rp 50.000</dd>
            </div>
          </dl>
          <p class="mt-3 border-t border-forest/20 pt-3 text-[10px] leading-4 text-forest/80">Saldo ditahan adalah
            permintaan yang masih menunggu persetujuan petugas.</p>
        </aside>
      </div>
    </main>

@push('scripts_kedua')

 <script>
    const AVAILABLE = 75500;
    const TUJUAN = {
      Bank: {
        label: 'Pilih bank',
        no: 'Nomor rekening',
        ph: 'Masukkan nomor rekening',
        opts: ['Bank BCA', 'Bank BRI', 'Bank BNI', 'Bank Mandiri']
      },
      'E-Wallet': {
        label: 'Pilih e-wallet',
        no: 'Nomor e-wallet',
        ph: 'Masukkan nomor HP e-wallet',
        opts: ['GoPay', 'OVO', 'DANA', 'ShopeePay']
      },
    };

    window.pageInit = () => {
      const $ = (id) => document.getElementById(id);

      const setMetode = () => {
        const t = TUJUAN[$('metode').value];
        $('tujuanLabel').textContent = t.label;
        $('noLabel').textContent = t.no;
        $('rek').placeholder = t.ph;
        $('tujuan').innerHTML = t.opts.map((o) => `<option>${o}</option>`).join('');
      };
      $('metode').addEventListener('change', setMetode);
      setMetode();

      document.querySelectorAll('[data-amt]').forEach((b) =>
        b.addEventListener('click', () => {
          $('nominal').value = Math.min(Number(b.dataset.amt), b.dataset.amt === '75500' ? AVAILABLE : Infinity);
          $('err').classList.add('hidden');
        })
      );

      $('form').addEventListener('submit', (e) => {
        e.preventDefault();
        const v = Number($('nominal').value);
        let msg = '';
        if (!v || v <= 0) msg = 'Masukkan nominal penarikan.';
        else if (v > AVAILABLE) msg = 'Nominal melebihi saldo tersedia (' + rp(AVAILABLE) + ').';
        else if (!$('rek').value.trim()) msg = 'Masukkan nomor tujuan pencairan.';

        $('err').textContent = msg;
        $('err').classList.toggle('hidden', !msg);
        $('ok').classList.add('hidden');
        if (msg) return;

        // TODO: kirim ke backend
        $('ok').textContent = 'Permintaan ' + rp(v) + ' terkirim. Menunggu persetujuan petugas.';
        $('ok').classList.remove('hidden');
        e.target.reset();
        setMetode();
      });
    };
  </script>

@endpush

@endsection
