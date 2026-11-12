<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Buat Password Baru - sampahPay</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@600;700&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com/3.4.17"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            sans: ['Inter', 'system-ui', 'sans-serif'],
            brand: ['Poppins', 'sans-serif'],
          },
          colors: {
            leaf: { DEFAULT: '#2f5233', dark: '#264429', soft: '#e6efa8' },
            cream: '#faf9f5',
            link: '#2a8a6a',
          },
        },
      },
    };
  </script>
</head>

<body class="relative flex min-h-screen items-center justify-center bg-cream p-6 font-sans text-[#2b3a2c]">

  <a href="{{ url('/') }}" class="absolute left-6 top-7 text-xs font-semibold text-link hover:underline sm:left-12">
    ← Kembali ke Beranda
  </a>

  <main class="w-full max-w-[308px] rounded-2xl border border-[#efefea] bg-white p-7 shadow-sm">

    <div class="mx-auto mb-5 flex h-12 w-12 items-center justify-center rounded-full bg-leaf-soft">
      <svg class="h-[26px] w-[26px]" viewBox="0 0 24 24" fill="none" stroke="#2f5233" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
        <path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"/>
        <path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"/>
      </svg>
    </div>

    <div class="mb-1.5 flex items-center justify-center gap-2">
      <span class="flex h-5 w-5 items-center justify-center rounded-full bg-leaf-soft">
        <svg class="h-3 w-3" viewBox="0 0 24 24" fill="none" stroke="#2f5233" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
          <path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"/>
          <path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"/>
        </svg>
      </span>
      <span class="font-brand text-[15px] font-semibold text-leaf">sampahPay</span>
    </div>

    <h1 class="mb-5 text-center text-[11px] font-bold">Buat password baru</h1>

    <form id="resetForm" action="{{ route('password.update') }}" method="POST" novalidate>
      @csrf
      <input type="hidden" name="token" value="{{ $token }}">
      <input type="hidden" name="email" value="{{ old('email', $email) }}">

      <label for="password" class="mb-1.5 block text-[11px] font-semibold">Password baru</label>
      <input
        type="password" id="password" name="password"
        autocomplete="new-password" minlength="8" required
        class="mb-3 h-7 w-full rounded-lg border border-gray-200 bg-white px-2.5 text-xs outline-none focus:border-leaf focus:ring-4 focus:ring-leaf/10">

      <label for="confirm" class="mb-1.5 block text-[11px] font-semibold">Konfirmasi password</label>
      <input
        type="password" id="confirm" name="password_confirmation"
        autocomplete="new-password" required
        class="mb-3 h-7 w-full rounded-lg border border-gray-200 bg-white px-2.5 text-xs outline-none focus:border-leaf focus:ring-4 focus:ring-leaf/10">

      <p id="error" role="alert" class="-mt-1 mb-2 {{ $errors->any() ? '' : 'hidden' }} text-[11px] text-red-700">{{ $errors->first() }}</p>

      <button
        type="submit"
        class="mt-1 h-7 w-full rounded-lg bg-leaf text-[11px] font-bold text-white hover:bg-leaf-dark focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-leaf">
        Simpan Password
      </button>
    </form>
  </main>

  <script>
    const form = document.getElementById("resetForm");
    const error = document.getElementById("error");

    function showError(message) {
      error.textContent = message;
      error.classList.remove("hidden");
    }

    form.addEventListener("submit", function (e) {
      const pw = document.getElementById("password").value;
      const confirm = document.getElementById("confirm").value;

      if (pw.length < 8) {
        e.preventDefault();
        showError("Password minimal 8 karakter.");
        return;
      }
      if (pw !== confirm) {
        e.preventDefault();
        showError("Konfirmasi password tidak sama.");
        return;
      }

      error.classList.add("hidden");
    });
  </script>
</body>
</html>
