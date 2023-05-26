<!DOCTYPE html>
<html lang="en">

<head>
    {{--  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">--}}
    {{--  <link rel="icon" type="image/png" href="../assets/img/favicon.png">--}}
    <title>
        Hệ thống quản trị viên
    </title>
    {{--  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<link href="{{ url('profile/demo/demo.css')  }}" rel="stylesheet"/>
<link href="{{ url('profile/css/paper-dashboard.css?v=2.0.1')  }}" rel="stylesheet"/>
<link href="{{ url('profile/css/bootstrap.min.css')  }}" rel="stylesheet"/>

<body>
<div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
        <div class="logo">
            <a href="https://www.creative-tim.com" class="simple-text logo-mini">
                <div class="logo-image-small">
                    <img src="{{ url('Images/') }}/{{ Auth::user()->img_avatar }}">
                </div>
                <!-- <p>CT</p> -->
            </a>
            <a href="https://www.creative-tim.com" class="simple-text logo-normal">
                {{ Auth::user()->username }}
                <!-- <div class="logo-image-big">
                  <img src="../assets/img/logo-big.png">
                </div> -->
            </a>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="active ">
                    <a>
                        <i class="nc-icon nc-bank"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="{{ Route('user.profile',['id' => Auth::user()->id]) }}">
                        <i class="nc-icon nc-single-02"></i>
                        <p>Thông tin cá nhân</p>
                    </a>
                </li>
                <li>
                    <a href="{{ Route('admin.account',['admin_id' => Auth::user()->id]) }}">
                        <i class="nc-icon nc-tile-56"></i>
                        <p>Tài khoản</p>
                    </a>
                </li>
                <li>
                    <a href="{{ Route('user.register') }}">
                        <i class="nc-icon nc-tile-56"></i>
                        <p>Liên hệ</p>
                    </a>
                </li>
                <li>
                    <a href="{{ Route('user.register') }}">
                        <i class="nc-icon nc-book-bookmark"></i>
                        <p>Báo cáo</p>
                    </a>
                </li>
                <li>
                    <a href="{{ Route('user.register') }}">
                        <i class="nc-icon nc-badge"></i>
                        <p>Tạo tài khoản</p>
                    </a>
                </li>
                <li>
                    <a href="{{ Route('logout') }}">
                        <i class="nc-icon nc-lock-circle-open"></i>
                        <p>Đăng xuất</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <div class="navbar-toggle">
                        <button type="button" class="navbar-toggler">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </button>
                    </div>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                        aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navigation">
                    <form>
                        <div class="input-group no-border">
                            <input type="text" value="" class="form-control" placeholder="Tìm kiếm...">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="nc-icon nc-zoom-split"></i>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
{{--                <ul class="navbar-nav">--}}
{{--                    --}}{{--                        <li class="nav-item">--}}
{{--                    --}}{{--                            <a class="nav-link btn-magnify" href="javascript:;">--}}
{{--                    --}}{{--                                <i class="nc-icon nc-layout-11"></i>--}}
{{--                    --}}{{--                                <p>--}}
{{--                    --}}{{--                                    <span class="d-lg-none d-md-block">Stats</span>--}}
{{--                    --}}{{--                                </p>--}}
{{--                    --}}{{--                            </a>--}}
{{--                    --}}{{--                        </li>--}}
{{--                    <li class="nav-item btn-rotate dropdown">--}}
{{--                        <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink"--}}
{{--                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                            <i class="nc-icon nc-app"></i>--}}
{{--                        </a>--}}
{{--                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">--}}
{{--                            <a class="dropdown-item" href="{{ Route('user.profile',['id' => Auth::user()->id]) }}">Thông tin cá nhân</a>--}}
{{--                            <a class="dropdown-item" href="">Đổi mật khẩu</a>--}}
{{--                            <a class="dropdown-item" href="{{ Route('logout') }}">Đăng xuất</a>--}}
{{--                        </div>--}}
{{--                    </li>--}}
{{--                </ul>--}}
            </div>
        </nav>
        @yield('content')
    </div>
</div>
</body>

<script src="{{ url('profile/js/core/jquery.min.js') }}"></script>
<script src="{{ url('profile/js/core/popper.min.js') }}"></script>
<script src="{{ url('profile/js/core/bootstrap.min.js') }}"></script>
<script src="{{ url('profile/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Chart JS -->
<script src="{{ url('profile/js/plugins/chartjs.min.js') }}"></script>
<!--  Notifications Plugin    -->
<script src="{{ url('profile/js/plugins/bootstrap-notify.js') }}"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ url('profile/js/paper-dashboard.min.js?v=2.0.1') }}" type="text/javascript"></script>
<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
<script src="{{ url('profile/demo/demo.js')  }}"></script>
<script>
    $(document).ready(function () {
        // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
        demo.initChartsPages();
    });
</script>
</body>
</html>
