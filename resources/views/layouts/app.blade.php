<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'sampahPay')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@500;600;700&display=swap"
        rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        forest: '#2D5A2A',
                        pine: '#2D5A2A',
                        leaf: '#3E9468',
                        lime: '#E9F29C',
                        paper: '#F9F8F4',
                        mint: '#D9EEE2',
                        rose: '#FBDADA'
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        display: ['Poppins', 'sans-serif']
                    }
                }
            }
        }

    </script>
    @stack('scripts')

</head>

<body class="bg-paper font-body text-slate-600 antialiased" data-page="dashboard" data-title="Dashboard"
    data-crumb="Admin">

    <div class="min-h-screen md:pl-[200px]">

        <!-- ===== SIDEBAR ===== -->
        <aside id="side"
            class="fixed inset-y-0 left-0 z-40 flex w-[200px] -translate-x-full flex-col bg-forest p-3 text-white transition-transform md:translate-x-0">
            <a href="index.html" class="flex items-center gap-2.5 px-2 py-3 font-head text-lg font-semibold">
                <span class="grid h-7 w-7 place-items-center rounded-full bg-lime text-forest"><svg class="h-4 w-4"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                        stroke-linejoin="round" aria-hidden="true">
                        <path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.5 19 2c1 2 2 4.2 2 8 0 5.500-4.800 10-10 10Z" />
                        <path d="M2 21c0-3 1.900-5.400 5.100-6C9.500 14.500 12 13 13 12" /></svg></span>sampahPay
            </a>
            <!-- nav admin -->
            @if(auth()->check() && auth()->user()->role === 'admin')
            <nav class="mt-5 flex flex-1 flex-col gap-1" aria-label="Menu admin">
                <a href="index.html" aria-current="page"
                    class="flex items-center gap-3 rounded-lg px-3 py-2 text-xs font-semibold bg-active text-white">
                    <svg class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M3 3v18h18" />
                        <path d="M18 17V9M13 17V5M8 17v-3" /></svg>Dashboard</a>
                <a href="laporan.html"
                    class="flex items-center gap-3 rounded-lg px-3 py-2 text-xs font-semibold text-white/90 hover:bg-white/10">
                    <svg class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z" />
                        <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z" /></svg>Laporan Bulanan</a>
                <a href="harga.html"
                    class="flex items-center gap-3 rounded-lg px-3 py-2 text-xs font-semibold text-white/90 hover:bg-white/10">
                    <svg class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path
                            d="M12.6 2.6A2 2 0 0 0 11.2 2H4a2 2 0 0 0-2 2v7.2a2 2 0 0 0 .6 1.4l8.7 8.7a2.4 2.4 0 0 0 3.4 0l6.6-6.6a2.4 2.4 0 0 0 0-3.4z" />
                        <circle cx="7.5" cy="7.5" r=".6" fill="currentColor" /></svg>Harga Sampah</a>
                <a href="pengguna.html"
                    class="flex items-center gap-3 rounded-lg px-3 py-2 text-xs font-semibold text-white/90 hover:bg-white/10">
                    <svg class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                        <circle cx="9" cy="7" r="4" />
                        <path d="M22 21v-2a4 4 0 0 0-3-3.9M16 3.1a4 4 0 0 1 0 7.8" /></svg>Kelola Pengguna</a>
                <a href="#"
                    class="flex items-center gap-3 rounded-lg px-3 py-2 text-xs font-semibold text-white/90 hover:bg-white/10">
                    <svg class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <circle cx="12" cy="12" r="3" />
                        <path
                            d="M19.4 15a1.7 1.7 0 0 0 .3 1.8l.1.1a2 2 0 1 1-2.8 2.8l-.1-.1a1.7 1.7 0 0 0-1.800-.3 1.700 1.700 0 0 0-1 1.500V21a2 2 0 1 1-4 0v-.1a1.700 1.700 0 0 0-1.100-1.500 1.700 1.700 0 0 0-1.800.3l-.1.1a2 2 0 1 1-2.800-2.800l.1-.1a1.700 1.700 0 0 0 .3-1.800 1.700 1.700 0 0 0-1.500-1H3a2 2 0 1 1 0-4h.1a1.700 1.700 0 0 0 1.500-1.100 1.700 1.700 0 0 0-.3-1.800l-.1-.1a2 2 0 1 1 2.800-2.800l.1.1a1.700 1.700 0 0 0 1.800.3H9a1.700 1.700 0 0 0 1-1.500V3a2 2 0 1 1 4 0v.1a1.700 1.700 0 0 0 1 1.500 1.700 1.700 0 0 0 1.800-.3l.1-.1a2 2 0 1 1 2.800 2.800l-.1.1a1.700 1.700 0 0 0-.3 1.800V9a1.700 1.700 0 0 0 1.500 1H21a2 2 0 1 1 0 4h-.1a1.700 1.700 0 0 0-1.500 1z" />
                    </svg>Profil</a>
            </nav>
            <!-- nav petugas -->
            @elseif(auth()->check() && auth()->user()->role === 'petugas')
            <nav class="flex flex-col gap-1">
                <a href="beranda.html"
                    class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-[13px] font-medium bg-leaf text-white"><svg
                        class="w-4 h-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                        <path d="M9 22V12h6v10" /></svg><span class="leading-tight">Beranda</span></a>
                <a href="input-setoran.html"
                    class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-[13px] font-medium text-white/90 hover:bg-white/10"><svg
                        class="w-4 h-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M12 8v8M8 12h8" /></svg><span class="leading-tight">Input Setoran</span></a>
                <a href="tarik-saldo.html"
                    class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-[13px] font-medium text-white/90 hover:bg-white/10"><svg
                        class="w-4 h-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10" />
                        <path
                            d="M15 9.500a3 3 0 0 0-3-1.500c-1.700 0-3 1-3 2.250s1.300 2 3 2 3 .800 3 2-1.300 2.250-3 2.250a3 3 0 0 1-3-1.500M12 6v2M12 16v2" />
                    </svg><span class="leading-tight">Tarik Saldo</span><span id="badge-tarik"
                        class="ml-1 grid h-[18px] min-w-[18px] place-items-center rounded-full bg-lime px-1 text-[10px] font-bold text-pine">3</span></a>
                <a href="riwayat-setoran.html"
                    class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-[13px] font-medium text-white/90 hover:bg-white/10"><svg
                        class="w-4 h-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 12a9 9 0 1 0 3-6.700L3 8" />
                        <path d="M3 3v5h5M12 7v5l4 2" /></svg><span class="leading-tight">Riwayat Setoran</span></a>
                <a href="#"
                    class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-[13px] font-medium text-white/90 hover:bg-white/10"><svg
                        class="w-4 h-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9M10.300 21a1.940 1.940 0 0 0 3.400 0" />
                    </svg><span class="leading-tight">Notifikasi</span></a>
                <a href="#"
                    class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-[13px] font-medium text-white/90 hover:bg-white/10"><svg
                        class="w-4 h-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="8" r="4" />
                        <path d="M4 21a8 8 0 0 1 16 0" /></svg><span class="leading-tight">Profil</span></a>
            </nav>
            <!-- nav nasabah -->
            @else
            <nav class="mt-5 flex flex-1 flex-col gap-1" aria-label="Menu nasabah">
                <a href="{{ route('nasabah.dashboard') }}" aria-current="page"
                    class="flex items-center gap-3 rounded-lg px-3 py-2 text-xs font-semibold bg-active text-white">
                    <svg class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                        <path d="M9 22V12h6v10" /></svg>Beranda</a>
                <a href="{{ route('nasabah.riwayat') }}"
                    class="flex items-center gap-3 rounded-lg px-3 py-2 text-xs font-semibold text-white/90 hover:bg-white/10">
                    <svg class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z" />
                        <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z" /></svg>Buku Tabungan</a>
                <a href="{{ route('nasabah.kalkulator') }}"
                    class="flex items-center gap-3 rounded-lg px-3 py-2 text-xs font-semibold text-white/90 hover:bg-white/10">
                    <svg class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <rect width="16" height="20" x="4" y="2" rx="2" />
                        <path d="M8 6h8M16 14v4M16 10h.01M12 10h.01M8 10h.01M12 14h.01M8 14h.01M12 18h.01M8 18h.01" />
                    </svg>Kalkulator</a>
                <a href="{{ route('nasabah.tarik_saldo') }}"
                    class="flex items-center gap-3 rounded-lg px-3 py-2 text-xs font-semibold text-white/90 hover:bg-white/10">
                    <svg class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M16 8h-6a2 2 0 1 0 0 4h4a2 2 0 1 1 0 4H8M12 18V6" /></svg>Tarik Saldo</a>
                <a href="{{ route('nasabah.notifikasi') }}"
                    class="flex items-center gap-3 rounded-lg px-3 py-2 text-xs font-semibold text-white/90 hover:bg-white/10">
                    <svg class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9" />
                        <path d="M10.3 21a1.94 1.94 0 0 0 3.4 0" /></svg>Notifikasi</a>
                <a href="profil.html"
                    class="flex items-center gap-3 rounded-lg px-3 py-2 text-xs font-semibold text-white/90 hover:bg-white/10">
                    <svg class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                        <circle cx="12" cy="7" r="4" /></svg>Profil</a>
            </nav>
            @endif

            <!-- logout -->
            <form method="POST" action="{{ route('logout') }}" class="mb-2 px-2">
                @csrf
                <button type="submit"
                    class="flex w-full items-center gap-2.5 rounded-lg px-2 py-2 text-xs font-medium text-white/80 hover:bg-white/10 hover:text-white">
                    <svg class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                        <path d="M16 17l5-5-5-5M21 12H9" />
                    </svg>
                    <span>Keluar</span>
                </button>
            </form>


            <div class="flex items-center gap-2.5 border-t border-white/15 px-2 pb-2 pt-4">
                <span
                    class="grid h-8 w-8 place-items-center rounded-full bg-lime text-[11px] font-bold text-forest">AW</span>
                <div class="leading-tight">
                    <p class="text-xs font-semibold">{{ auth()->user()->name }}</p>
                    <p class="text-[10px] text-white/70">
                        {{ match(auth()->user()->role) {'admin'   => 'ADMINISTRATOR','petugas' => 'PETUGAS',default   => 'NASABAH',} }}
                    </p>
                </div>
            </div>
        </aside>
        <div id="scrim" class="fixed inset-0 z-30 hidden bg-black/40 md:hidden"></div>

        <!-- ===== HEADER ===== -->
        <header
            class="sticky top-0 z-20 flex h-[68px] items-center justify-between border-b border-slate-200 bg-white px-5 md:px-6">
       
        </header>


        <!-- ===== KONTEN HALAMAN ===== -->
        @yield('content')
    </div>

    @stack('scripts_kedua')
</body>

</html>
