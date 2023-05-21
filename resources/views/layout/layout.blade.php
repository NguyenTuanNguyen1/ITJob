<!doctype html>
<html lang="en">
<head>
    <title>FINDING JOB</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {{--    <link rel="stylesheet" href="board-master/css/bootstrap-select.min.css">--}}
    @include('layout.page-css')
</head>
<body id="top">


<div class="site-wrap">
    <header class="site-navbar mt-3" id="top">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="site-logo col-6"><a href="{{ Route('home') }}">FINDING JOB</a></div>
                <nav class="mx-auto site-navigation">
                    <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
                        <li><a href="" class="nav-link active">Trang chủ</a></li>
                        <!-- <li><a href="">About</a></li> -->
                        <li class="has-children">
                            <a href="">Job Listings</a>
                            <ul class="dropdown">
                                <li><a href="">Việc theo dõi</a></li>
                                <li><a href="">Đăng công việc</a></li>
                            </ul>
                        </li>
                        <li class="has-children">
                            <a href="">Pages</a>
                            <ul class="dropdown">
                                <li><a href="">Services</a></li>
                                <li><a href="">Service Single</a></li>
                                <li><a href="">Blog Single</a></li>
                                <li><a href="portfolio.html">Portfolio</a></li>
                                <li><a href="portfolio-single.html">Portfolio Single</a></li>
                                <li><a href="testimonials.html">Testimonials</a></li>
                                <li><a href="faq.html">Frequently Ask Questions</a></li>
                                <li><a href="gallery.html">Gallery</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                @if(Auth::check())
                    <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
                        <div class="ml-auto">
                            <a href="#" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span
                                    class=" icon-line-newspaper"></span></a>
                            <a href="#" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span
                                    class=" icon-line-chat"></span></a>
                            <!-- <a href="#" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span
                                    class=" icon-line-profile-male"></span>Nguyen</a> -->
                            <a class="btn btn-success border-width-2 d-none d-lg-inline-block " href="#" role="button"
                               data-toggle="dropdown" aria-expanded="false">
                                <span class=" icon-line-profile-male"></span> {{ Auth::user()->username }}
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
                        <div class="ml-auto">
                        <a class="btn btn-success border-width-2 d-none d-lg-inline-block " href="{{ Route('user.login') }}" role="button"
                               data-toggle="dropdown" aria-expanded="false">
                                <span class=" icon-line-profile-male"></span>Đăng nhập
                            </a>
                            <a class="btn btn-success border-width-2 d-none d-lg-inline-block " href="{{ Route('user.register') }}" role="button"
                               data-toggle="dropdown" aria-expanded="false">
                                <span class=" icon-line-profile-male"></span>Đăng ký
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </header>

    <section>
        @yield('index')
    </section>
    @yield('content')

    <footer class="site-footer">

        <!-- <a href="#top" class="smoothscroll scroll-top">
          <span class="icon-keyboard_arrow_up"></span>
        </a>
   -->
        <div class="container">
            <div class="row mb-5">
                <div class="col-6 col-md-3 mb-4 mb-md-0">
                    <h3>Search Trending</h3>
                    <ul class="list-unstyled">
                        <li><a href="#">Web Design</a></li>
                        <li><a href="#">Graphic Design</a></li>
                        <li><a href="#">Web Developers</a></li>
                        <li><a href="#">Python</a></li>
                        <li><a href="#">HTML5</a></li>
                        <li><a href="#">CSS3</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md-3 mb-4 mb-md-0">
                    <h3>Company</h3>
                    <ul class="list-unstyled">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Career</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Resources</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md-3 mb-4 mb-md-0">
                    <h3>Support</h3>
                    <ul class="list-unstyled">
                        <li><a href="#">Support</a></li>
                        <li><a href="#">Privacy</a></li>
                        <li><a href="#">Terms of Service</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md-3 mb-4 mb-md-0">
                    <h3>Contact Us</h3>
                    <div class="footer-social">
                        <a href="#"><span class="icon-facebook"></span></a>
                        <a href="#"><span class="icon-twitter"></span></a>
                        <a href="#"><span class="icon-instagram"></span></a>
                        <a href="#"><span class="icon-linkedin"></span></a>
                    </div>
                </div>
            </div>

            <div class="row text-center">
                <div class="col-12">
                    <p class="copyright"><small>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                            All rights reserved | This template is made with <i class="icon-heart text-danger"
                                                                                aria-hidden="true"></i> by <a
                                href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </small></p>
                </div>
            </div>
        </div>
    </footer>
</div>
</body>
{{--<!-- SCRIPTS -->--}}
{{--<script src="board-master/js/jquery.min.js"></script>--}}
{{--<script src="board-master/js/bootstrap.bundle.min.js"></script>--}}
{{--<script src="board-master/js/isotope.pkgd.min.js"></script>--}}
{{--<script src="board-master/js/stickyfill.min.js"></script>--}}
{{--<script src="board-master/js/jquery.fancybox.min.js"></script>--}}
{{--<script src="board-master/js/jquery.easing.1.3.js"></script>--}}

{{--<script src="board-master/js/jquery.waypoints.min.js"></script>--}}
{{--<script src="board-master/js/jquery.animateNumber.min.js"></script>--}}
{{--<script src="board-master/js/owl.carousel.min.js"></script>--}}
{{--<script src="board-master/js/quill.min.js"></script>--}}


{{--<script src="board-master/js/bootstrap-select.min.js"></script>--}}

{{--<script src="board-master/js/custom.js"></script>--}}

</html>
