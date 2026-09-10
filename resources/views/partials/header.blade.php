<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script src="https://unpkg.com/feather-icons"></script>

<script>
    feather.replace();
</script>

<!-- ========================= -->
<!-- STYLE NAVBAR GRADASI -->
<!-- ========================= -->

<style>
/* ========================= */
/* NAVBAR GRADASI BIRU */
/* ADA EFEK TRANSPARAN */
/* ========================= */

.navbar-gradient {

    background: linear-gradient(
        to right,
        rgba(30, 58, 138, 0.88) 0%,
        rgba(37, 99, 235, 0.78) 45%,
        rgba(79, 125, 240, 0.62) 75%,
        rgba(109, 151, 255, 0.42) 100%
    );

    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);

    border-bottom: 1px solid rgba(255,255,255,0.12);

    box-shadow: 0 4px 18px rgba(0,0,0,0.10);
}

/* ========================= */
/* MOBILE MENU */
/* ========================= */

.mobile-menu-gradient {

    background: linear-gradient(
        to bottom,
        rgba(30, 58, 138, 0.95),
        rgba(37, 99, 235, 0.88)
    );

    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
}

/* ========================= */
/* MENU */
/* ========================= */

.menu-link {

    position: relative;

    transition: all 0.3s ease;

    color: rgba(255,255,255,0.96);

    font-weight: 500;
}

.menu-link:hover {

    background: rgba(255,255,255,0.12);

    color: white;
}

/* ========================= */
/* EFEK GARIS */
/* ========================= */

.menu-link::after {

    content: '';

    position: absolute;

    left: 12px;

    bottom: 5px;

    width: 0%;

    height: 2px;

    background: white;

    transition: 0.3s ease;
}

.menu-link:hover::after {

    width: calc(100% - 24px);
}

/* ========================= */
/* SEARCH */
/* ========================= */

.search-glass {

    background: rgba(255,255,255,0.16);

    border: 1px solid rgba(255,255,255,0.18);

    color: white;

    width: 250px;

    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);

    transition: all 0.3s ease;
}

.search-glass::placeholder {

    color: rgba(255,255,255,0.88);
}

.search-glass:focus {

    outline: none;

    background: rgba(255,255,255,0.22);

    border: 1px solid rgba(255,255,255,0.30);
}

/* ========================= */
/* SEARCH BUTTON */
/* ========================= */

.search-button {

    background: rgba(255,255,255,0.14);

    border: 1px solid rgba(255,255,255,0.18);

    color: white;

    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);

    transition: all 0.3s ease;
}

.search-button:hover {

    background: rgba(255,255,255,0.22);
}
</style>

<section class="bg-white shadow-md z-50">

    <header>

        <div class="container mx-auto px-4 py-1 flex flex-col md:flex-row md:justify-between md:items-center">

            <!-- LOGO -->
            <div class="flex items-center space-x-2 mb-2 md:mb-2 mt-2">

                <div class="relative">

                    <img src="{{asset('images/logo salatiga putih.jpg')}}"
                        alt="Logo Desa"
                        class=" w-20 md:w-12 lg:w-20">

                </div>

                <div>

                    <h2 class="text-lg md:text-2xl font-bold text-blue-900 leading-tight mb-1">
                        Selamat Datang
                    </h2>

                    <h3 class="text-base font-semibold text-blue-900 leading-tight">
                        Bidang Pertanahan DPKP Kota Salatiga
                    </h3>

                </div>

            </div>

            <!-- TANGGAL -->
            <div
                class="w-full flex justify-between items-center text-blue-900 font-medium text-sm md:w-auto md:space-x-4 md:text-base mb-2 mt-2">

                <div class="flex items-center space-x-1">

                    <i class="far fa-calendar-alt"></i>

                    <span id="currentDateTime"></span>

                </div>

            </div>

        </div>

    </header>

</section>

<!-- ========================= -->
<!-- NAVBAR -->
<!-- ========================= -->

<nav class="navbar-gradient text-white sticky top-0 z-50"
    x-data="{ menuOpen: false }">

    <div class="container mx-auto px-4">

        <div class="flex justify-between items-center py-2">

            <!-- MENU -->
            <div :class="menuOpen ? 'block mobile-menu-gradient mt-3 rounded-lg py-3' : 'hidden'"
                class="w-full md:flex md:items-center md:space-x-4 md:w-auto absolute md:static left-0 top-full md:bg-transparent px-4 md:px-0">

<!-- HOME -->
<a href="/profildesa"
    class="menu-link flex items-center space-x-1 text-sm px-3 py-2 rounded-lg transition duration-300">

    <i class="fas fa-home"></i>
    <span>Home</span>

</a>

<!-- STRUKTUR ORGANISASI -->
<a href="/struktur-organisasi"
    class="menu-link flex items-center space-x-1 text-sm px-3 py-2 rounded-lg transition duration-300">

    <i class="fas fa-sitemap"></i>
    <span>Struktur Organisasi</span>

</a>
<!-- DATA PENDUDUK -->
<a href="/data-penduduk"
    class="menu-link flex items-center space-x-1 text-sm px-3 py-2 rounded-lg transition duration-300">

    <i class="fas fa-users"></i>
    <span>Data PSU Perumahan</span>

</a>

                <a href="/berita"
                    class="menu-link flex items-center space-x-1 text-sm px-3 py-2 rounded-lg transition duration-300">

                    <i class="fas fa-newspaper"></i>
                    <span>Portal Berita</span>

                </a>

<!-- GALERI -->
<a href="/galeri"
    class="menu-link flex items-center space-x-1 text-sm px-3 py-2 rounded-lg transition duration-300">

    <i class="fas fa-images"></i>
    <span>Galeri</span>

</a>

            </div>

            <!-- SEARCH -->
            <div class="hidden md:flex items-center space-x-2">

                <input type="text"
                    placeholder="Masukkan pencarian"
                    class="search-glass px-4 py-2 rounded-lg">

                <button
                    class="search-button p-2 rounded-lg transition duration-300">

                    <i class="fas fa-search"></i>

                </button>

            </div>

            <!-- MOBILE BUTTON -->
            <button @click="menuOpen = !menuOpen"
                class="md:hidden p-2 hover:bg-white/10 rounded transition duration-300">

                <i class="fas fa-bars"></i>

            </button>

        </div>

    </div>

</nav>

<script>
    function updateDateTime() {

        const now = new Date();

        const days = [
            'Minggu',
            'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu'
        ];

        const dayName = days[now.getDay()];

        const months = [
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        ];

        const monthName = months[now.getMonth()];

        const date = now.getDate();
        const year = now.getFullYear();

        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const seconds = String(now.getSeconds()).padStart(2, '0');

        const formattedDateTime =
            `${dayName}, ${date} ${monthName} ${year}, ${hours}:${minutes}:${seconds}`;

        document.getElementById('currentDateTime').textContent = formattedDateTime;
    }

    updateDateTime();

    setInterval(updateDateTime, 1000);
</script>