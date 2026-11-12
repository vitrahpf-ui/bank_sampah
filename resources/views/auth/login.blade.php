<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login – sampahPay</title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Poppins:wght@500;600;700&display=swap"
        rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        forest: {
                            DEFAULT: '#2F5629',
                            dark: '#1E3A1A'
                        },
                        lime: '#EAF1A0',
                        leaf: '#3B8A4F',
                        paper: '#FAF8F3',
                    },
                    fontFamily: {
                        head: ['Poppins', 'system-ui', 'sans-serif'],
                        body: ['Inter', 'system-ui', 'sans-serif'],
                    },
                },
            },
        }

    </script>
</head>

<body class="font-body antialiased">
    <svg width="0" height="0" class="absolute" aria-hidden="true">
        <defs>
            <symbol id="i-logo" viewBox="0 0 32 32">
                <circle cx="16" cy="16" r="16" fill="#EAF1A0" />
                <path d="M9.5 21.5c0-6.5 4.5-10.5 12-10.5 0 7.5-4 12-10.5 12-.6 0-1.1-.1-1.5-.2" fill="none"
                    stroke="#2F5629" stroke-width="1.8" stroke-linecap="round" />
                <path d="M9.5 22.5 16 16" stroke="#2F5629" stroke-width="1.8" stroke-linecap="round" />
            </symbol>
        </defs>
    </svg>

    <div class="grid min-h-screen md:grid-cols-[40%_60%] lg:grid-cols-2">

        <!-- ===== PANEL KIRI ===== -->
        <aside
            class="relative isolate hidden flex-col justify-between overflow-hidden bg-forest-dark p-8 text-white md:flex">
            <!-- Ganti dengan foto Anda: images/hero.jpg -->
            <img src="images/hero.jpg" alt="" class="absolute inset-0 -z-20 h-full w-full object-cover"
                onerror="this.remove()" />
            <div class="absolute inset-0 -z-10 bg-forest-dark/80"></div>

            <a href="{{ url('/') }}" class="text-xs font-semibold hover:text-lime">← Kembali ke Beranda</a>

            <div class="max-w-md pb-24">
                <div class="flex items-center gap-2.5 font-head text-xl font-semibold">
                    <svg class="h-7 w-7">
                        <use href="#i-logo" /></svg> sampahPay
                </div>
                <h1 class="mt-6 font-head text-4xl font-semibold leading-[1.35]">Sampah hari ini, harapan untuk esok.
                </h1>
                <p class="mt-5 max-w-xs text-xs leading-6 text-white/90">Setiap setoranmu adalah langkah nyata menuju
                    lingkungan yang lebih bersih.</p>
            </div>
            <span></span>
        </aside>

        <!-- ===== PANEL KANAN ===== -->
        <main class="flex items-center justify-center bg-paper px-6 py-12">
            <div class="w-full max-w-[326px] sm:max-w-sm">
                <a href="{{ url('/') }}" class="mb-8 block text-xs font-semibold text-forest md:hidden">← Kembali ke
                    Beranda</a>

                <div class="flex items-center gap-2.5 font-head text-lg font-semibold text-forest">
                    <svg class="h-7 w-7">
                        <use href="#i-logo" /></svg> sampahPay
                </div>
                <h2 class="mt-8 font-head text-[22px] font-semibold text-forest">Selamat datang kembali</h2>
                <p class="mt-2 text-xs text-slate-500">Masuk untuk melanjutkan langkah baikmu.</p>

                <form action="{{ route('login') }}" method="post" class="mt-6 space-y-4">
                    <div>
                        <label for="email" class="mb-1.5 block text-xs font-semibold text-forest">Email</label>
                        <input id="email" name="email" type="email" placeholder="name@email.com" autocomplete="email"
                            class="h-10 w-full rounded-lg border border-slate-200 bg-white px-3 text-xs placeholder:text-slate-400 focus:border-leaf focus:outline-none focus:ring-2 focus:ring-leaf/30" />
                    </div>

                    <div>
                        <label for="password" class="mb-1.5 block text-xs font-semibold text-forest">Password</label>
                        <div
                            class="flex h-10 overflow-hidden rounded-lg border border-slate-200 bg-white focus-within:border-leaf focus-within:ring-2 focus-within:ring-leaf/30">
                            <input id="password" name="password" type="password" autocomplete="current-password"
                                class="min-w-0 flex-1 bg-transparent px-3 text-xs focus:outline-none" />
                            <button type="button" id="toggle" aria-label="Tampilkan password"
                                class="grid w-10 place-items-center border-l border-slate-200 text-forest hover:bg-slate-50">
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12Z" />
                                    <circle cx="12" cy="12" r="3" />
                                </svg>
                            </button>
                        </div>
                        <a href="{{ route('password.request') }}" class="mt-3 block text-right text-xs font-semibold text-leaf hover:underline">Lupa
                            password?</a>
                    </div>

                    <button type="submit"
                        class="h-10 w-full rounded-lg bg-forest text-xs font-semibold text-white hover:bg-forest-dark">Masuk</button>
                </form>

                <p class="mt-5 text-center text-xs text-slate-500">
                    Belum punya akun? <a href="{{ route('register') }}" class="font-semibold text-leaf hover:underline">Daftar</a>
                </p>

               

            </div>
        </main>
    </div>

    <script>
        // Tampilkan / sembunyikan password
        const pw = document.getElementById('password');
        document.getElementById('toggle').addEventListener('click', () => {
            pw.type = pw.type === 'password' ? 'text' : 'password';
        });

    </script>
</body>

</html>
