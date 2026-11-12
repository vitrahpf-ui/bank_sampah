<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>sampahPay – Bank Sampah Digital</title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Inter:wght@400;500;600&family=Outfit:wght@500;600;700&display=swap"
        rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        forest: {
                            DEFAULT: '#2F5629',
                            dark: '#244420'
                        },
                        lime: {
                            DEFAULT: '#EAF1A0',
                            soft: '#EEF3A8'
                        },
                        leaf: '#3B8A4F',
                    },
                    fontFamily: {
                        display: ['"Bebas Neue"', 'Impact', 'sans-serif'],
                        head: ['Outfit', 'system-ui', 'sans-serif'],
                        body: ['Inter', 'system-ui', 'sans-serif'],
                    },
                },
            },
        }

    </script>
</head>

<body class="font-body text-slate-600 bg-white antialiased">

    <!-- Ikon SVG yang dipakai ulang -->
    <svg width="0" height="0" class="absolute" aria-hidden="true">
        <defs>
            <symbol id="i-recycle" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"
                stroke-linecap="round" stroke-linejoin="round">
                <path
                    d="M7 19H4.8a1.8 1.8 0 0 1-1.6-2.6L5 13.5M11 19h6.2a1.8 1.8 0 0 0 1.6-2.6M14 16l-3 3 3 3M8.3 8.4 6.5 5.5a1.8 1.8 0 0 1 3.1-.1L11 7.5M10 7.5l1.2-3.2 3.2 1.2M17.5 10.2 20 14.5M18.6 10.2l-3.4.7.6-3.4" />
            </symbol>
            <symbol id="i-sprout" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"
                stroke-linecap="round" stroke-linejoin="round">
                <path
                    d="M7 20h10M10 20c5.5-2.5.8-6.4 3-10M9.5 9.4c1.1.9 1.8 2.2 1.9 3.6a6 6 0 0 0-.1-1.1c-.9-1.8-2.5-3-4.6-3.2a3 3 0 0 0 2.8.7ZM14.1 6a3.5 3.5 0 0 0-2.9 1.9M14.1 6a4.5 4.5 0 0 1 3.9 2.6M14.1 6c1.8.1 3.2 1.2 3.7 3" />
            </symbol>
            <symbol id="i-scale" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 3v18M6 21h12M5 6l-3 7a3.5 3.5 0 0 0 6 0L5 6Zm14 0-3 7a3.5 3.5 0 0 0 6 0l-3-7ZM5 6h14" />
            </symbol>
            <symbol id="i-wallet" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"
                stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="4" width="18" height="16" rx="2.5" />
                <path d="M3 9h18M8 13h8" />
            </symbol>
            <symbol id="i-pin" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 21s7-6.2 7-11.5A7 7 0 0 0 5 9.5C5 14.8 12 21 12 21Z" />
                <circle cx="12" cy="9.5" r="2.5" />
            </symbol>
            <symbol id="i-mail" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"
                stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="5" width="18" height="14" rx="2.5" />
                <path d="m3.5 7 8.5 6 8.5-6" />
            </symbol>
            <symbol id="i-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="M5 12h14M13 6l6 6-6 6" />
            </symbol>
            <symbol id="i-logo" viewBox="0 0 32 32">
                <circle cx="16" cy="16" r="16" fill="#EAF1A0" />
                <path d="M9.5 21.5c0-6.5 4.5-10.5 12-10.5 0 7.5-4 12-10.5 12-.6 0-1.100-.1-1.500-.2" fill="none"
                    stroke="#2F5629" stroke-width="1.8" stroke-linecap="round" />
                <path d="M9.500 22.500 16 16" stroke="#2F5629" stroke-width="1.8" stroke-linecap="round" />
            </symbol>
        </defs>
    </svg>

    <!-- ===== NAVBAR ===== -->
    <header class="bg-forest sticky top-0 z-50">
        <nav class="mx-auto flex h-[52px] max-w-[1440px] items-center justify-between px-7">
            <a href="#beranda" class="flex items-center gap-2.5 font-head text-[22px] font-bold text-white">
                <svg class="h-[26px] w-[26px]">
                    <use href="#i-logo" /></svg>
                sampahPay
            </a>
            <div class="flex items-center gap-5 text-sm font-semibold text-white">
                <a href="#beranda" class="hidden hover:text-lime sm:inline">Beranda</a>
                <a href="#tentang" class="hidden hover:text-lime sm:inline">Tentang</a>
                <a href="#kontak" class="hidden hover:text-lime sm:inline">Kontak</a>
                @guest
                <a href="{{ route('login') }}"
                    class="rounded-full bg-lime px-5 py-2 text-forest hover:bg-white">Login</a>
                @endguest

                @auth
                <a href="{{ match(auth()->user()->role) {
                'admin'   => route('admin.dashboard'),
                'petugas' => route('petugas.dashboard'),
                default   => route('nasabah.dashboard'),
            } }}" class="rounded-full bg-lime px-5 py-2 text-forest hover:bg-white">Beranda</a>
                @endauth
            </div>
        </nav>
    </header>

    <main>
        <!-- ===== HERO ===== -->
        <section id="beranda"
            class="relative isolate flex min-h-[420px] items-center justify-center overflow-hidden bg-forest-dark px-6 py-20 text-center md:min-h-[560px]">
            <!-- Ganti dengan foto Anda: images/hero.jpg -->
            <img src="images/hero.jpg " alt="" class="absolute inset-0 -z-20 h-full w-full object-cover"
                onerror="this.remove()" />
            <div class="absolute inset-0 -z-10 bg-forest-dark/75"></div>

            <div class="mx-auto max-w-[900px]">
                <p class="text-[11px] font-semibold uppercase tracking-[0.25em] text-white">Bank sampah digital</p>
                <h1 class="mt-5 font-display text-5xl uppercase leading-[1.05] tracking-wide text-white md:text-[64px]">
                    Langkah kecil untuk bumi yang lebih bersih
                </h1>
                <div class="mx-auto mt-5 h-0.5 w-14 bg-lime"></div>
                <p class="mx-auto mt-6 max-w-[600px] text-sm leading-7 text-white/90">
                    Sampah yang terpilah dengan baik adalah awal dari ekosistem yang sehat. Melalui platform sampahPay,
                    setiap kilogram sampah yang Anda setorkan akan didaur ulang secara bertanggung jawab sekaligus
                    memberikan nilai ekonomi langsung ke dompet Anda.
                </p>
                <div class="mt-7 flex flex-wrap justify-center gap-3">
                    <a href="#cara-kerja"
                        class="inline-flex items-center gap-2 rounded-full bg-lime px-6 py-2.5 text-sm font-semibold text-forest hover:bg-white">
                        Pelajari selengkapnya <svg class="h-4 w-4">
                            <use href="#i-arrow" /></svg>
                    </a>
                </div>
            </div>
        </section>

        <!-- ===== TENTANG KITA ===== -->
        <section id="tentang" class="grid bg-forest md:grid-cols-2">
            <div class="px-7 py-14 md:py-12">
                <p class="text-[10px] font-semibold uppercase tracking-[0.25em] text-white">Mengenal kami</p>
                <h2 class="mt-3 font-display text-5xl uppercase tracking-wide text-white">Tentang kita</h2>
                <div class="mt-6 max-w-[560px] space-y-0 text-sm leading-[1.85] text-white/90">
                    <p>Sampah yang terpilah dengan baik adalah awal dari ekosistem yang sehat. Melalui platform
                        sampahPay, setiap kilogram sampah yang Anda setorkan akan didaur ulang secara bertanggung jawab
                        sekaligus memberikan nilai ekonomi langsung ke dompet Anda.</p>
                    <p>Kami menghubungkan warga, petugas, dan pengelola bank sampah dalam satu platform sehingga setiap
                        setoran tercatat rapi, saldo bertambah otomatis, dan penarikan menjadi lebih mudah.</p>
                </div>
            </div>
            <div class="min-h-[280px] bg-gradient-to-br from-cyan-700 to-sky-900">
                <!-- Ganti dengan foto Anda: images/about.jpg -->
                <img src="images/about.jpg" alt="Sampah plastik di dalam laut" class="h-full w-full object-cover"
                    onerror="this.remove()" />
            </div>
        </section>

        <!-- ===== CARA KERJA ===== -->
        <section id="cara-kerja" class="mx-auto max-w-[1100px] px-6 pt-20">
            <div class="text-center">
                <p class="text-[10px] font-semibold uppercase tracking-[0.25em] text-leaf">Proses sederhana</p>
                <h2 class="mt-3 font-head text-4xl font-semibold text-forest">Cara kerja sampahPay</h2>
                <p class="mt-3 text-sm text-slate-500">Empat langkah mudah untuk mengubah sampah menjadi manfaat.</p>
            </div>

            <ol class="mt-12 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                <li class="rounded-2xl border border-slate-100 bg-white p-6 shadow-[0_2px_12px_rgba(0,0,0,0.06)]">
                    <span class="text-[10px] font-bold tracking-widest text-leaf">01</span>
                    <svg class="mt-4 h-6 w-6 text-leaf">
                        <use href="#i-sprout" /></svg>
                    <h3 class="mt-4 text-sm font-semibold text-forest">Daftar</h3>
                    <p class="mt-1 text-[13px] leading-[1.7] text-slate-500">Buat akun nasabah hanya dalam beberapa
                        menit.</p>
                    <a href="#"
                        class="mt-5 inline-flex items-center gap-1.5 text-[13px] font-semibold text-leaf hover:underline">
                        Mulai daftar <svg class="h-3.5 w-3.5">
                            <use href="#i-arrow" /></svg>
                    </a>
                </li>
                <li class="rounded-2xl border border-slate-100 bg-white p-6 shadow-[0_2px_12px_rgba(0,0,0,0.06)]">
                    <span class="text-[10px] font-bold tracking-widest text-leaf">02</span>
                    <svg class="mt-4 h-6 w-6 text-leaf">
                        <use href="#i-recycle" /></svg>
                    <h3 class="mt-4 text-sm font-semibold text-forest">Setor sampah ke petugas</h3>
                    <p class="mt-1 text-[13px] leading-[1.7] text-slate-500">Bawa sampah yang sudah dipilah ke lokasi.
                    </p>
                </li>
                <li class="rounded-2xl border border-slate-100 bg-white p-6 shadow-[0_2px_12px_rgba(0,0,0,0.06)]">
                    <span class="text-[10px] font-bold tracking-widest text-leaf">03</span>
                    <svg class="mt-4 h-6 w-6 text-leaf">
                        <use href="#i-scale" /></svg>
                    <h3 class="mt-4 text-sm font-semibold text-forest">Saldo bertambah otomatis</h3>
                    <p class="mt-1 text-[13px] leading-[1.7] text-slate-500">Petugas menimbang dan mencatat setoranmu.
                    </p>
                </li>
                <li class="rounded-2xl border border-slate-100 bg-white p-6 shadow-[0_2px_12px_rgba(0,0,0,0.06)]">
                    <span class="text-[10px] font-bold tracking-widest text-leaf">04</span>
                    <svg class="mt-4 h-6 w-6 text-leaf">
                        <use href="#i-wallet" /></svg>
                    <h3 class="mt-4 text-sm font-semibold text-forest">Tarik saldo</h3>
                    <p class="mt-1 text-[13px] leading-[1.7] text-slate-500">Ajukan penarikan kapan pun diperlukan.</p>
                </li>
            </ol>
            <hr class="mt-16 border-slate-200" />
        </section>

        <!-- ===== HARGA SAMPAH ===== -->
        <section class="mx-auto max-w-[1100px] px-6 pt-16">
            <div class="flex flex-wrap items-end justify-between gap-4">
                <div>
                    <p class="text-[10px] font-semibold uppercase tracking-[0.25em] text-leaf">Diperbarui 1 Nov 2026</p>
                    <h2 class="mt-3 font-head text-4xl font-semibold text-forest">Harga sampah hari ini</h2>
                </div>
                <a href="#"
                    class="rounded-lg bg-forest px-5 py-3 text-[13px] font-semibold text-white hover:bg-forest-dark">Daftar
                    untuk Menghitung Estimasi</a>
            </div>

            <div class="mt-10 grid gap-4 md:grid-cols-3">
                <!-- Kartu harga: ulangi struktur ini -->
                <div
                    class="flex items-center gap-4 rounded-2xl border border-slate-100 bg-white p-4 shadow-[0_2px_12px_rgba(0,0,0,0.06)]">
                    <span class="grid h-[50px] w-[50px] shrink-0 place-items-center rounded-xl bg-lime text-forest"><svg
                            class="h-6 w-6">
                            <use href="#i-recycle" /></svg></span>
                    <div class="flex-1">
                        <p class="text-[13px] font-semibold text-forest">Plastik PET</p>
                        <p class="font-head text-lg font-semibold text-forest">Rp 3.500</p>
                    </div>
                    <span class="self-end text-[11px] text-slate-400">per kg</span>
                </div>
                <div
                    class="flex items-center gap-4 rounded-2xl border border-slate-100 bg-white p-4 shadow-[0_2px_12px_rgba(0,0,0,0.06)]">
                    <span class="grid h-[50px] w-[50px] shrink-0 place-items-center rounded-xl bg-lime text-forest"><svg
                            class="h-6 w-6">
                            <use href="#i-recycle" /></svg></span>
                    <div class="flex-1">
                        <p class="text-[13px] font-semibold text-forest">Kardus</p>
                        <p class="font-head text-lg font-semibold text-forest">Rp 1.800</p>
                    </div>
                    <span class="self-end text-[11px] text-slate-400">per kg</span>
                </div>
                <div
                    class="flex items-center gap-4 rounded-2xl border border-slate-100 bg-white p-4 shadow-[0_2px_12px_rgba(0,0,0,0.06)]">
                    <span class="grid h-[50px] w-[50px] shrink-0 place-items-center rounded-xl bg-lime text-forest"><svg
                            class="h-6 w-6">
                            <use href="#i-recycle" /></svg></span>
                    <div class="flex-1">
                        <p class="text-[13px] font-semibold text-forest">Kertas HVS</p>
                        <p class="font-head text-lg font-semibold text-forest">Rp 2.200</p>
                    </div>
                    <span class="self-end text-[11px] text-slate-400">per kg</span>
                </div>
                <div
                    class="flex items-center gap-4 rounded-2xl border border-slate-100 bg-white p-4 shadow-[0_2px_12px_rgba(0,0,0,0.06)]">
                    <span class="grid h-[50px] w-[50px] shrink-0 place-items-center rounded-xl bg-lime text-forest"><svg
                            class="h-6 w-6">
                            <use href="#i-recycle" /></svg></span>
                    <div class="flex-1">
                        <p class="text-[13px] font-semibold text-forest">Besi</p>
                        <p class="font-head text-lg font-semibold text-forest">Rp 4.000</p>
                    </div>
                    <span class="self-end text-[11px] text-slate-400">per kg</span>
                </div>
                <div
                    class="flex items-center gap-4 rounded-2xl border border-slate-100 bg-white p-4 shadow-[0_2px_12px_rgba(0,0,0,0.06)]">
                    <span class="grid h-[50px] w-[50px] shrink-0 place-items-center rounded-xl bg-lime text-forest"><svg
                            class="h-6 w-6">
                            <use href="#i-recycle" /></svg></span>
                    <div class="flex-1">
                        <p class="text-[13px] font-semibold text-forest">Botol kaca</p>
                        <p class="font-head text-lg font-semibold text-forest">Rp 500</p>
                    </div>
                    <span class="self-end text-[11px] text-slate-400">per buah</span>
                </div>
                <div
                    class="flex items-center gap-4 rounded-2xl border border-slate-100 bg-white p-4 shadow-[0_2px_12px_rgba(0,0,0,0.06)]">
                    <span class="grid h-[50px] w-[50px] shrink-0 place-items-center rounded-xl bg-lime text-forest"><svg
                            class="h-6 w-6">
                            <use href="#i-recycle" /></svg></span>
                    <div class="flex-1">
                        <p class="text-[13px] font-semibold text-forest">Minyak jelantah</p>
                        <p class="font-head text-lg font-semibold text-forest">Rp 6.000</p>
                    </div>
                    <span class="self-end text-[11px] text-slate-400">per liter</span>
                </div>
            </div>
        </section>

        <!-- ===== STATISTIK ===== -->
        <section class="mt-20 bg-forest py-12">
            <div class="mx-auto grid max-w-[1100px] gap-8 px-6 text-center text-white md:grid-cols-3 md:gap-0">
                <div class="md:px-6">
                    <p class="font-head text-4xl font-semibold">191,25 kg</p>
                    <p class="mt-3 text-sm text-white/80">Sampah terkumpul</p>
                </div>
                <div class="md:border-x md:border-white/15 md:px-6">
                    <p class="font-head text-4xl font-semibold">8</p>
                    <p class="mt-3 text-sm text-white/80">Nasabah bergabung</p>
                </div>
                <div class="md:px-6">
                    <p class="font-head text-4xl font-semibold">Rp 30.000</p>
                    <p class="mt-3 text-sm text-white/80">Uang dibayarkan</p>
                </div>
            </div>
        </section>

        <!-- ===== CTA ===== -->
        <section class="mx-auto mt-14 max-w-[1100px] px-6">
            <div class="flex flex-wrap items-center justify-between gap-6 rounded-3xl bg-lime px-8 py-9 md:px-14">
                <div>
                    <p class="text-[10px] font-semibold uppercase tracking-[0.25em] text-leaf">Mulai sekarang</p>
                    <h2 class="mt-3 font-head text-3xl font-semibold text-forest md:text-4xl">Mulai langkah kecilmu hari
                        ini</h2>
                    <p class="mt-4 text-sm text-forest/80">Pilah sampahmu, setor, dan nikmati manfaatnya.</p>
                </div>
                <div class="flex gap-3">
                    <a href="{{ route('register') }}"
                        class="rounded-lg bg-forest px-5 py-3 text-[13px] font-semibold text-white hover:bg-forest-dark">Daftar
                        Sekarang</a>
                    <a href="{{ route('login') }}"
                        class="rounded-lg border border-forest/40 px-5 py-3 text-[13px] font-semibold text-forest hover:bg-white/50">Login</a>
                </div>
            </div>
        </section>

        <!-- ===== KONTAK ===== -->
        <section id="kontak" class="mx-auto grid max-w-[1100px] gap-12 px-6 py-24 md:grid-cols-2">
            <div>
                <p class="text-[10px] font-semibold uppercase tracking-[0.25em] text-leaf">Hubungi kami</p>
                <h2 class="mt-3 font-head text-4xl font-semibold text-forest">Mari berbincang</h2>
                <p class="mt-4 max-w-sm text-sm leading-7 text-slate-500">Punya pertanyaan tentang layanan sampahPay?
                    Tim kami siap membantu.</p>
                <ul class="mt-8 space-y-5 text-sm text-slate-600">
                    <li class="flex items-center gap-4"><svg class="h-5 w-5 text-leaf">
                            <use href="#i-pin" /></svg>Jl. Melati No. 12</li>
                    <li class="flex items-center gap-4"><svg class="h-5 w-5 text-leaf">
                            <use href="#i-mail" /></svg>halo@sampahpay.id</li>
                    <li class="flex items-center gap-4"><svg class="h-5 w-5 text-leaf">
                            <use href="#i-wallet" /></svg>0812-3456-7890</li>
                    <li class="flex items-center gap-4"><svg class="h-5 w-5 text-leaf">
                            <use href="#i-scale" /></svg>Senin–Sabtu, 08.00–16.00</li>
                </ul>
            </div>

            <form action="#" method="post" class="space-y-5">
                <div>
                    <label for="name" class="mb-2 block text-[13px] font-semibold text-forest">name</label>
                    <input id="name" name="name" type="text"
                        class="h-12 w-full rounded-xl border border-slate-200 px-4 text-sm focus:border-leaf focus:outline-none focus:ring-2 focus:ring-leaf/30" />
                </div>
                <div>
                    <label for="email" class="mb-2 block text-[13px] font-semibold text-forest">Email</label>
                    <input id="email" name="email" type="email"
                        class="h-12 w-full rounded-xl border border-slate-200 px-4 text-sm focus:border-leaf focus:outline-none focus:ring-2 focus:ring-leaf/30" />
                </div>
                <div>
                    <label for="pesan" class="mb-2 block text-[13px] font-semibold text-forest">Pesan</label>
                    <textarea id="pesan" name="pesan" rows="4"
                        class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm focus:border-leaf focus:outline-none focus:ring-2 focus:ring-leaf/30"></textarea>
                </div>
                <button type="submit"
                    class="h-12 w-full rounded-xl bg-forest text-[13px] font-semibold text-white hover:bg-forest-dark">Kirim
                    Pesan</button>
            </form>
        </section>
    </main>

    <!-- ===== FOOTER ===== -->
    <footer class="bg-forest">
        <div class="mx-auto flex max-w-[1440px] flex-wrap items-center justify-between gap-4 px-7 py-9 text-white">
            <div class="flex flex-wrap items-center gap-x-10 gap-y-3">
                <a href="#beranda" class="flex items-center gap-2.5 font-head text-[22px] font-bold">
                    <svg class="h-[26px] w-[26px]">
                        <use href="#i-logo" /></svg>
                    sampahPay
                </a>
                <nav class="flex gap-6 text-sm">
                    <a href="#beranda" class="hover:text-lime">Beranda</a>
                    <a href="#tentang" class="hover:text-lime">Tentang</a>
                    <a href="#kontak" class="hover:text-lime">Kontak</a>
                    <a href="#" class="hover:text-lime">Login</a>
                </nav>
            </div>
            <p class="text-xs text-white/80">© 2026 sampahPay. Untuk bumi yang lebih baik.</p>
        </div>
    </footer>

</body>

</html>
