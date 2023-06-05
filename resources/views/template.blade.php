<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SI Manajemen Rumah Sakit Wava Husada</title>

    <link rel="stylesheet" href="{{ url('assets/css/main/app.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/main/app-dark.css') }}">
    {{-- <link rel="shortcut icon" href="{{ url('assets/images/logo/hospital.svg') }}" type="image/x-icon"> --}}
    <link rel="shortcut icon" href="{{ url('assets/images/logo/hospital.png') }}" type="image/png">

    <link rel="stylesheet" href="{{ url('assets/css/shared/iconly.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>

<body class="theme-light">
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header position-relative">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="logo">
                            <a href="{{ url('dashboard') }}">
                                <i class="fa-solid fa-hospital"></i>
                                <span style="font-size: 20px;">SI RS Wava Husada</span>
                            </a>
                        </div>
                        <div class="sidebar-toggler  x">
                            <a href="#" class="sidebar-hide d-xl-none d-block">
                                <i class="bi bi-x bi-middle"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-item ">
                            <a href="{{ url('dashboard') }}" class='sidebar-link'>
                                <i class="fa-solid fa-gauge"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-title">Menu Utama</li>
                        <li class="sidebar-item ">
                            <a href="{{ route('pasien.index') }}" class='sidebar-link'>
                                <i class="fa-solid fa-user-injured"></i>
                                <span>Pasien</span>
                            </a>
                        </li>
                        <li class="sidebar-item ">
                            <a href="{{ route('tenaga-kesehatan.index') }}" class='sidebar-link'>
                                <i class="fa-solid fa-user-nurse"></i>
                                <span>Tenaga Kesehatan</span>
                            </a>
                        </li>
                        <li class="sidebar-item ">
                            <a href="{{ route('dokter.index') }}" class='sidebar-link'>
                                <i class="fa-solid fa-user-doctor"></i>
                                <span>Dokter</span>
                            </a>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="fa-solid fa-bed"></i>
                                <span>Kamar</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="{{ route('kamar.index') }}">Data Kamar</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{ route('jenis-kamar.index') }}">Jenis Kamar</a>
                                </li>

                            </ul>
                        </li>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="fa-solid fa-syringe"></i>
                                <span>Pemeriksaan Dokter</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="{{ route('pemeriksaan-dokter.index') }}">Pemeriksaan Dokter</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{ route('jenis-perawatan.index') }}">Jenis Perawatan</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{ route('obat.index') }}">Obat</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item ">
                            <a href="{{ route('pembayaran.index') }}" class='sidebar-link'>
                                <i class="fa-solid fa-wallet"></i>
                                <span>Pembayaran</span>
                            </a>
                        </li>
                        <li class="sidebar-item ">
                            <a href="{{ route('pengguna.index') }}" class='sidebar-link'>
                                <i class="fa-solid fa-users"></i>
                                <span>Pengguna</span>
                            </a>
                        </li>
                        <li class="sidebar-item ">
                            <a href="{{ route('pegawai.index') }}" class='sidebar-link'>
                                <i class="fa-solid fa-user"></i>
                                <span>Pegawai</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            @yield('content')

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2023 &copy; Bintang Adi R</p>
                    </div>
                    {{-- <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="https://saugi.me">Saugi</a></p>
                    </div> --}}
                </div>
            </footer>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <script src="{{ url('assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ url('assets/js/mazer.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap.js') }}"></script>
    <script src="{{ url('assets/js/app.js') }}"></script>

    <!-- Need: Apexcharts -->
    <script src="{{ url('assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ url('assets/js/pages/dashboard.js') }}"></script>

</body>

</html>
