<!DOCTYPE html><!--
* CoreUI - Free Bootstrap Admin Template
* @version v4.2.2
* @link https://coreui.io/product/free-bootstrap-admin-template/
* Copyright (c) 2023 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://github.com/coreui/coreui-free-bootstrap-admin-template/blob/main/LICENSE)
--><!-- Breadcrumb-->
<html lang="en">

<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>CoreUI Free Bootstrap Admin Template</title>
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendors styles-->
    <link rel="stylesheet" href="{{ asset('simplebar.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('simplebar2.css') }}"> --}}
    <!-- Main styles for this application-->
    <link href="{{ asset('style.css') }}" rel="stylesheet">
    <script src="{{ asset('coreui.bundle.min.js') }}"></script>
    <script src="{{ asset('simplebar.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
    <!-- End Google Tag Manager (noscript)-->
    <div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
        <div class="sidebar-brand d-none d-md-flex">
            <img src="{{ asset('logo_perusahaan.jpg') }}" width="90" height="90"
                class="sidebar-brand-full rounded-circle my-2">
            <img src="{{ asset('logo_perusahaan.jpg') }}" width="46" height="46"
                class="sidebar-brand-narrow rounded-circle">
        </div>
        <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
            <li class="nav-item"><a class="nav-link" href="{{ url('dashboard') }}">
                    <svg class="nav-icon">
                        <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-speedometer') }}"></use>
                    </svg> Dashboard</a></li>

            @if (auth()->user()->role == 'admin')
                <li class="nav-item"><a class="nav-link" href="{{ url('pengguna') }}">
                        <svg class="nav-icon">
                            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-people') }}"></use>
                        </svg> Kelola Pengguna</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="{{ url('barang') }}">
                        <svg class="nav-icon">
                            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-playlist-add') }}"></use>
                        </svg> Tambah Barang</a>
                </li>
            @elseif(auth()->user()->role == 'gudang')
                <li class="nav-item"><a class="nav-link" href="{{ url('barangMasuk') }}">
                        <svg class="nav-icon">
                            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-input') }}"></use>
                        </svg> Barang Masuk</a>
                </li>
                <li class="nav-group"><a class="nav-link" href="{{ url('barangKeluar') }}">
                        <svg class="nav-icon">
                            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-account-logout') }}">
                            </use>
                        </svg> Barang keluar</a>
                </li>
            @elseif(auth()->user()->role == 'direktur')
                <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                        <svg class="nav-icon">
                            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-spreadsheet') }}"></use>
                        </svg> Laporan</a>
                    <ul class="nav-group-items">
                        <li class="nav-item"><a class="nav-link" href="{{ route('indexhari') }}"><span
                                    class="nav-icon"></span>
                                Harian</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('indexbulan') }}"><span
                                    class="nav-icon"></span>
                                Bulanan</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('laporan') }}"><span
                                    class="nav-icon"></span>
                                Tahunan</a></li>
                    </ul>
                </li>
            @endif
        </ul>
        <div class="mb-2" style="display: flex; justify-content: center; align-items: center;">
            <form method="POST" action="{{ route('logout') }}" class="nav-link">
                @csrf
                <a href="route('logout')"
                    onclick="event.preventDefault();
                                                this.closest('form').submit();"
                    class="btn btn-danger text-white btn-block">{{ __('Keluar') }}
                </a>
            </form>
        </div>
        {{-- <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button> --}}
    </div>
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        <header class="header header-sticky mb-4 bg-light">
            <div class="container-fluid">
                <button class="header-toggler px-md-0 me-md-3" type="button"
                    onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
                    <svg class="icon icon-lg">
                        <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-menu') }}"></use>
                    </svg>
                </button>
                <a class="header-brand d-md-none" href="#">
                    <svg width="118" height="46" alt="CoreUI Logo">
                        <use xlink:href="{{ asset('assets/brand/coreui.svg#full') }}"></use>
                    </svg>
                </a>
            </div>
        </header>
        <div class="body flex-grow-1 px-3">
            <div class="container-lg">
                <section class="content">
                    @yield('content')
                </section>
            </div>
        </div>
        <footer class="footer">
        </footer>
    </div>
    <!-- CoreUI and necessary plugins-->




    <!-- Plugins and scripts required by this view-->
    {{-- <script src="vendors/chart.js/js/chart.min.js"></script>
    <script src="vendors/@coreui/chartjs/js/coreui-chartjs.js"></script>
    <script src="vendors/@coreui/utils/js/coreui-utils.js"></script> --}}


</body>

</html>
