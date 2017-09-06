<html>
<head>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    <script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <title>@yield('title')</title>
    <style>
        .space { margin-top: 75px; }
        .navbar-fixed-left {
            width: 140px;
            position: fixed;
            border-radius: 0;
            height: 100%;
        }

        .navbar-fixed-left .navbar-nav > li {
            float: none;  /* Cancel default li float: left */
            width: 139px;
        }

        .navbar-fixed-left + .container {
            padding-left: 160px;
        }

        /* On using dropdown menu (To right shift popuped) */
        .navbar-fixed-left .navbar-nav > li > .dropdown-menu {
            margin-top: -50px;
            margin-left: 140px;
        }
    </style>
</head>
<body>
    <div class="navbar navbar-inverse navbar-fixed-left">
        <a class="navbar-brand" href="#">UPT asrama ITB</a>
        <ul class="nav navbar-nav">
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Proyek<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="{{URL::to('/logistik/proyek')}}">Lihat proyek</a></li>
                    <li><a href="{{URL::to('/logistik/proyek/tambah')}}">Tambah proyek</a></li>
                </ul>
            </li>
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Gudang<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="{{URL::to('/logistik/barang')}}">Lihat barang</a></li>
                    <li><a href="{{URL::to('/logistik/barang/tambah')}}">Tambah barang</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="container">
        <div class="row">
            @yield('content')
        </div>
    </div>
</body>
    @yield('js')
</html>
