<footer class="relative bg-gradient-to-br from-slate-950 via-blue-950 to-slate-900 text-white overflow-hidden">

    <!-- Efek Background -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-0 w-96 h-96 bg-blue-500 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-cyan-500 rounded-full blur-3xl"></div>
    </div>

    <div class="relative container mx-auto px-6 py-16">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">

            <!-- Tentang Desa -->
            <div>

                <div class="flex items-center gap-3 mb-5">

                    <img src="{{ asset('images/logo salatiga putih.JPG') }}"
                        alt="Logo Pemerintah Kota Salatiga"
                        class="w-14 h-14 rounded-full border-2 border-white/20 shadow-lg">

                    <div>
                        <h3 class="text-2xl font-bold">
                            Bidang Pertanahan DPKP Kota Salatiga
                        </h3>


                    </div>

                </div>



            </div>

            <!-- Navigasi -->
            <div>

                <h4 class="text-lg font-bold mb-5">
                    Menu Utama
                </h4>

                <ul class="space-y-3 text-gray-300">

                    <li>
                        <a href="/profildesa"
                            class="hover:text-cyan-400 transition">
                            Home
                        </a>
                    </li>

                    <li>
                        <a href="/struktur-organisasi"
                            class="hover:text-cyan-400 transition">
                            Struktur Organisasi
                        </a>
                    </li>

                    <li>
                        <a href="/data-penduduk"
                            class="hover:text-cyan-400 transition">
                            Data PSU Perumahan
                        </a>
                    </li>

                    <li>
                        <a href="/berita"
                            class="hover:text-cyan-400 transition">
                            Portal Berita
                        </a>
                    </li>

                    <li>
                        <a href="/galeri"
                            class="hover:text-cyan-400 transition">
                            Galeri 
                        </a>
                    </li>

                </ul>

            </div>

            <!-- Layanan -->
            <div>

                <h4 class="text-lg font-bold mb-5">
                    Layanan
                </h4>

                <ul class="space-y-3 text-gray-300">





                    <li>
                        <a href="/admin/login"
                            target="_blank"
                            class="hover:text-cyan-400 transition">
                            Login Admin
                        </a>
                    </li>

                </ul>

            </div>

            <!-- Kontak -->
            <div>

                <h4 class="text-lg font-bold mb-5">
                    Hubungi Kami
                </h4>

                <div class="space-y-4 text-gray-300">

                    <div class="flex items-start gap-3">
                        <i class="fas fa-map-marker-alt mt-1 text-cyan-400"></i>
                        <span>
                            Bidang Pertanahan DPKP Salatiga
                        </span>
                    </div>

                    <div class="flex items-center gap-3">
                        <i class="fas fa-phone text-cyan-400"></i>
                        <span>0812-3456-7890</span>
                    </div>

                    <div class="flex items-center gap-3">
                        <i class="fas fa-envelope text-cyan-400"></i>
                        <span>info@pertanahandpkp.id</span>
                    </div>

                </div>

                <!-- Sosial Media -->
                <div class="flex gap-3 mt-6">

                    <a href="#"
                        class="w-10 h-10 flex items-center justify-center rounded-full bg-white/10 hover:bg-blue-600 transition">

                        <i class="fab fa-facebook-f"></i>

                    </a>

                    <a href="#"
                        class="w-10 h-10 flex items-center justify-center rounded-full bg-white/10 hover:bg-pink-600 transition">

                        <i class="fab fa-instagram"></i>

                    </a>

                    <a href="#"
                        class="w-10 h-10 flex items-center justify-center rounded-full bg-white/10 hover:bg-red-600 transition">

                        <i class="fab fa-youtube"></i>

                    </a>

                    <a href="#"
                        class="w-10 h-10 flex items-center justify-center rounded-full bg-white/10 hover:bg-sky-500 transition">

                        <i class="fab fa-twitter"></i>

                    </a>

                </div>

            </div>

        </div>

        <!-- Bottom Footer -->
        <div class="border-t border-white/10 mt-12 pt-6">

            <div class="flex flex-col md:flex-row justify-between items-center gap-4">

                <p class="text-gray-400 text-sm">
                    © {{ date('Y') }} Bidang Pertanahan. All Rights Reserved.
                </p>

                <p class="text-gray-500 text-sm">
                    Dibangun dengan ❤️ untuk pelayanan masyarakat yang lebih baik
                </p>

            </div>

        </div>

    </div>

</footer>