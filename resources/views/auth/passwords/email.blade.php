<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Lupa Password - sampahPay</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@500;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<script>
  tailwind.config = { theme: { extend: {
    colors: { forest:'#2D5A2A', leaf:'#3E9468', lime:'#E9F29C', paper:'#F9F8F4' },
    fontFamily: { sans:['Inter','sans-serif'], head:['Poppins','sans-serif'] } } } }
</script>
</head>
<body class="min-h-screen bg-paper font-sans text-gray-800 antialiased">

  <!-- KONTEN HALAMAN -->
  <main class="relative flex min-h-screen items-center justify-center px-6 py-12">

    <!-- Link kembali ke beranda -->
    <a href="{{ url('/') }}" class="absolute left-8 top-8 text-xs font-semibold text-leaf hover:underline">← Kembali ke Beranda</a>

    <!-- Kartu -->
    <div class="w-full max-w-[380px] rounded-2xl bg-white px-8 py-10 shadow-sm ring-1 ring-black/5">

      <!-- Ikon amplop -->
      <div class="mx-auto grid h-14 w-14 place-items-center rounded-full bg-lime text-forest">
        <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 7l9 6 9-6"/>
        </svg>
      </div>

      <!-- Logo -->
      <div class="mt-5 flex items-center justify-center gap-2 font-head text-lg font-semibold text-forest">
        <span class="grid h-7 w-7 place-items-center rounded-full bg-lime">
          <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M11 20A7 7 0 0 1 9.800 6.100C15.500 5 17 4.500 19 2c1 2 2 4.200 2 8 0 5.500-4.800 10-10 10zM2 21c0-3 1.900-5.500 5-6.500 2.500-.8 5-2 7-4.500"/>
          </svg>
        </span>
        sampahPay
      </div>

      <!-- Judul & deskripsi -->
      <h1 class="mt-4 text-center font-head text-sm font-semibold text-forest">Lupa password?</h1>
      <p class="mx-auto mt-1 max-w-[280px] text-center text-xs leading-relaxed text-gray-500">
        Masukkan email akunmu. Kami akan mengirim tautan untuk membuat password baru.
      </p>

      <!-- Pesan berhasil resmi dari Laravel -->
      @if (session('status'))
        <div class="mt-5 rounded-lg bg-lime/60 px-3 py-2.5 text-center text-xs font-medium text-forest" role="status">
          {{ session('status') }}
        </div>
      @endif

      <!-- Form -->
      <form id="form-reset" method="POST" action="{{ route('password.email') }}" class="mt-6" novalidate>
        @csrf
        <label for="email" class="mb-1.5 block text-center text-xs font-semibold text-forest">Email terdaftar</label>
        <input id="email" name="email" type="email" value="{{ old('email') }}" required autocomplete="email" placeholder="nama@email.com"
               class="w-full rounded-lg border @error('email') border-red-500 @else border-gray-200 @enderror bg-white px-3 py-2.5 text-xs outline-none placeholder:text-gray-400 focus:border-leaf focus:ring-2 focus:ring-leaf/20">
        
        <!-- Error validasi resmi dari Laravel -->
        @error('email')
          <p class="mt-1.5 text-xs text-red-600 text-center">{{ $message }}</p>
        @enderror

        <button type="submit" id="btn-submit"
                class="mt-3 w-full rounded-lg bg-forest py-3 font-head text-xs font-semibold text-white transition hover:bg-forest/90 focus:outline-none focus:ring-2 focus:ring-forest/40">
          Kirim Tautan Reset
        </button>
      </form>

      <a href="{{ route('login') }}" class="mt-4 block text-center text-xs font-semibold text-forest/80 hover:text-forest">Kembali ke Login</a>
    </div>
  </main>

  <script>
    // Menambahkan indikator loading pada tombol saat form benar-benar dikirim ke Laravel
    const form = document.getElementById('form-reset');
    const btn = document.getElementById('btn-submit');

    form.addEventListener('submit', function () {
      btn.disabled = true;
      btn.innerText = 'Mengirim...';
      btn.classList.add('opacity-75', 'cursor-not-allowed');
    });
  </script>
</body>
</html>