<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Pakar Skrining Gejala Kecanduan Game Online</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/select2/bootstrap-4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap-select/css/bootstrap-select.min.css') }}">
    <!-- TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/95z1wlpdzasy0ulf89wyn6yu2avjhespgwuamxxar1gnlmh5/tinymce/8/tinymce.min.js" referrerpolicy="origin" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">

    <link rel="shortcut icon" href="{{ asset('assets/images/SkriningApp.png') }}" type="image/x-icon">

    @yield('css')

    <style>
        @font-face {
            font-family: 'Gameplay';
            src: url('assets/gameplay/Gameplay.ttf');
        }

        /* --- PERBAIKAN LOGO & TEKS --- */
        .main-sidebar .brand-text {
            font-family: "Gameplay", sans-serif;
            text-transform: uppercase;
            color: #ffffff !important;
            letter-spacing: 1px;
            font-size: 1.1rem;
            transition: opacity 0.3s ease;
        }

        .brand-link {
            display: flex !important;
            align-items: center;
            padding: 0.8125rem 0.5rem !important;
            border-bottom: 1px solid rgba(255, 255, 255, 0.15) !important;
            transition: background 0.3s ease, padding 0.3s ease;
            white-space: nowrap;
            overflow: hidden;
        }
        
        .brand-link:hover {
            background: rgba(255, 255, 255, 0.05);
        }

        .brand-image {
            max-height: 33px;
            width: auto;
            border-radius: 4px;
            margin-left: 0.8rem;
            margin-right: 0.8rem;
            transition: margin 0.3s ease;
        }

        /* --- COLLAPSED SIDEBAR LOGO FIX --- */
        .sidebar-collapse .brand-link {
            justify-content: center !important;
            padding-left: 0 !important;
            padding-right: 0 !important;
        }

        .sidebar-collapse .brand-link .brand-image {
            margin-left: 0 !important;
            margin-right: 0 !important;
        }

        .sidebar-collapse .brand-link .brand-text {
            display: none !important;
        }

        /* --- CUSTOM MODERN SIDEBAR CSS --- */
        .main-sidebar {
            background: linear-gradient(180deg, #0383ef 0%, #024a9e 100%) !important;
            box-shadow: 4px 0 15px rgba(0, 0, 0, 0.1) !important;
            border-right: none !important;
        }

        .user-panel {
            border-bottom: 1px solid rgba(255, 255, 255, 0.15) !important;
            padding-bottom: 1.2rem !important;
            margin-top: 1rem !important;
        }
        
        .user-panel .image img {
            border: 2px solid rgba(255, 255, 255, 0.5);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .nav-sidebar .nav-item {
            margin-bottom: 5px;
        }

        .nav-sidebar .nav-link {
            border-radius: 12px !important;
            transition: all 0.3s ease-in-out !important;
            color: rgba(255, 255, 255, 0.85) !important;
            padding: 10px 15px !important;
            margin: 0 10px;
        }

        .nav-sidebar .nav-link:hover {
            background: rgba(255, 255, 255, 0.1) !important;
            color: #ffffff !important;
            transform: translateX(5px);
        }
        
        .nav-sidebar .nav-link:hover .nav-icon {
            transform: scale(1.15) rotate(-5deg);
        }

        .nav-sidebar .nav-link.active {
            background: rgba(255, 255, 255, 0.2) !important;
            color: #ffffff !important;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(5px);
            font-weight: 600;
            border-left: 4px solid #ffffff;
            border-radius: 0 12px 12px 0 !important;
            margin-left: 0;
            padding-left: 21px !important;
        }

        .nav-sidebar .nav-icon {
            transition: transform 0.3s ease;
        }

        .sidebar::-webkit-scrollbar {
            width: 5px;
        }
        
        .sidebar::-webkit-scrollbar-thumb {
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 10px;
        }
        
        .sidebar::-webkit-scrollbar-thumb:hover {
            background-color: rgba(255, 255, 255, 0.4);
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar elevation-4">
            
            <!-- Brand Logo (Sudah Diperbaiki Agar Sejajar) -->
            <a href="{{ route('home') }}" class="brand-link">
                <img src="{{ asset('assets/images/Logoo.png') }}" alt="Logo" class="brand-image">
                <span class="brand-text text-white">SkriningApp</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center">
                    <div class="image">
                        <img src="{{ asset('assets/images/user.png') }}" class="img-circle" alt="User Image">
                    </div>
                    <div class="info d-flex flex-column">
                        <a href="#" class="d-block text-white"><b>{{ auth()->user()->name }}</b></a>
                        <small class="d-block text-white" style="opacity: 0.8">{{ auth()->user()->role->name }}</small>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->segment(1) == 'dashboard' || request()->segment(1) == '' || request()->segment(1) == 'home' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-home"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>

                        @if (auth()->user()->role_id == 1)
                            <li class="nav-item">
                                <a href="{{ route('gejala.index') }}" class="nav-link {{ request()->segment(1) == 'gejala' ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-list"></i>
                                    <p>Data Gejala</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('kecanduan.index') }}" class="nav-link {{ request()->segment(1) == 'kecanduan' ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-book-medical"></i>
                                    <p>Data Tingkat Kecanduan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('aturan.index') }}" class="nav-link {{ request()->segment(1) == 'aturan' ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-check"></i>
                                    <p>Data Aturan (Rule)</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('profil.index') }}" class="nav-link {{ request()->segment(1) == 'profil' ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-info-circle"></i>
                                    <p>Data Tentang</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('artikel.index') }}" class="nav-link {{ request()->segment(1) == 'artikel' ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-newspaper"></i>
                                    <p>Data Artikel</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('hasil.index') }}" class="nav-link {{ request()->segment(1) == 'hasil' ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-list-alt"></i>
                                    <p>Data Hasil Skrining</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('pengguna.index') }}" class="nav-link {{ request()->segment(1) == 'pengguna' ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>Data Pengguna</p>
                                </a>
                            </li>
                        @elseif (auth()->user()->role_id == 2)
                            <li class="nav-item">
                                <a href="{{ route('diagnosis') }}" class="nav-link {{ request()->segment(1) == 'diagnosis' ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-list"></i>
                                    <p>Skrining</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('hasil.index') }}" class="nav-link {{ request()->segment(1) == 'hasil' ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-list-alt"></i>
                                    <p>Data Hasil Skrining</p>
                                </a>
                            </li>
                        @elseif (auth()->user()->role_id == 3)
                            <li class="nav-item">
                                <a href="{{ route('diagnosis') }}" class="nav-link {{ request()->segment(1) == 'diagnosis' ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-list-alt"></i>
                                    <p>Skrining</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('hasil.index') }}" class="nav-link {{ request()->segment(1) == 'hasil' ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-list-alt"></i>
                                    <p>Data Hasil Skrining</p>
                                </a>
                            </li>
                        @endif

                        <li class="nav-item">
                            <a href="{{ route('password') }}" class="nav-link {{ request()->segment(1) == 'password' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-unlock"></i>
                                <p>Ubah Password</p>
                            </a>
                        </li>
                        <li class="nav-item mt-3">
                            <a href="{{ route('logout') }}" class="nav-link text-danger" style="background: rgba(255, 255, 255, 0.16); font-weight: bold;">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>Logout</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <strong>Copyright &copy; @php echo date('Y') @endphp - <a href="#" class="text-primary">SkriningApp</a></strong>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <script src="{{ asset('assets/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>

    @yield('js')
</body>
</html>