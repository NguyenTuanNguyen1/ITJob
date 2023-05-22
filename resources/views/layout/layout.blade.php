<!doctype html>
<html lang="en">

<head>
    <title>Trang chủ</title>
    @include('layout.page-css')
</head>
<!-- NAVBAR -->
<header class="site-navbar mt-3" id="top">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="site-logo col-6"><a href="">ItJob</a></div>
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
                    <!-- <li><a href="blog.html">Blog</a></li>
                    <li><a href="contact.html">Ticket</a></li>
                    <li class="d-lg-none"><a href="post-job.html"><span class="mr-2">+</span> Post a Job</a></li>
                    <li class="d-lg-none"><a href="login.html">Log In</a></li> -->
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
                        <span class=" icon-line-profile-male"></span>
                        {{ Auth::user()->username }}
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
            <!-- {{ Auth::user()->name }} -->
            @else
            <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
                <div class="ml-auto">
                    <a href="post-job.html" class="btn btn-outline-white border-width-2 d-none d-lg-inline-block"><span
                            class="mr-2 icon-add"></span>Đăng việc</a>
                    <a href="{{ Route('user.login') }}"
                        class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span
                            class="mr-2 icon-lock_outline"></span>Đăng nhập</a>
                    <a href="{{ Route('user.register') }}"
                        class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span
                            class="mr-2 icon-contacts"></span>Đăng kí</a>
                </div>
                <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span
                        class="icon-menu h3 m-0 p-0 mt-2"></span></a>
            </div>
            @endif
        </div>
    </div>
</header>

<!-- <section>
        
    </section> -->

<!-- HOME -->
@yield('index')
@yield('content')

<section class="site-section py-4" style="background-color:white;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-6 col-lg-3 col-md-6 text-center">
                <img src="board-master/images/logo_mailchimp.svg" alt="Image" class="img-fluid-m logo-1">
            </div>
            <div class="col-6 col-lg-3 col-md-6 text-center">
                <img src="board-master/images/logo_paypal.svg" alt="Image" class="img-fluid-m logo-2">
            </div>
            <div class="col-6 col-lg-3 col-md-6 text-center">
                <img src="board-master/images/logo_stripe.svg" alt="Image" class="img-fluid-m logo-3">
            </div>
            <div class="col-6 col-lg-3 col-md-6 text-center">
                <img src="board-master/images/logo_visa.svg" alt="Image" class="img-fluid-m logo-4">
            </div>

            <div class="col-6 col-lg-3 col-md-6 text-center">
                <img src="board-master/images/logo_apple.svg" alt="Image" class="img-fluid-m logo-5">
            </div>
            <div class="col-6 col-lg-3 col-md-6 text-center">
                <img src="board-master/images/logo_tinder.svg" alt="Image" class="img-fluid-m logo-6">
            </div>
            <div class="col-6 col-lg-3 col-md-6 text-center">
                <img src="board-master/images/logo_sony.svg" alt="Image" class="img-fluid-m logo-7">
            </div>
            <div class="col-6 col-lg-3 col-md-6 text-center">
                <img src="board-master/images/logo_airbnb.svg" alt="Image" class="img-fluid-m logo-8">
            </div>
        </div>
    </div>
</section>

<body>
    @yield('content')
    <!-- <div id="btnTop">
        <a href="#top">^</a>
    </div> --><a id="button"></a>
</body>

<footer class="site-footer">
    <!-- <a id="back-to-top" href="#" class="btn btn-danger btn-lg back-to-top" role="button"><i class="fas fa-chevron-up"></i></a> -->
    <!-- <a href="#top" class="smoothscroll scroll-top">
        <span class="icon-keyboard_arrow_up"></span>
    </a> -->
    <!-- <div id="btnTop">
        <a href="#top">^</a>
    </div> -->
    <div class="container">
        <div class="row mb-5">
            <div class="col-6 col-md-3 mb-4 mb-md-0">
                <h3>Tìm kiếm nhiều nhất</h3>
                <ul class="list-unstyled">
                    <li><a href="#">Web Design</a></li>
                    <li><a href="#">Graphic Design</a></li>
                    <li><a href="#">Web Developers</a></li>
                    <li><a href="#">Python</a></li>
                    <li><a href="#">HTML5</a></li>
                    <li><a href="#">CSS3</a></li>
                </ul>
            </div>
            <!-- <div class="col-6 col-md-3 mb-4 mb-md-0">
                <h3>Company</h3>
                <ul class="list-unstyled">
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Career</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Resources</a></li>
                </ul>
            </div> -->
            <div class="col-6 col-md-3 mb-4 mb-md-0">
                <h3>Hỗ trợ</h3>
                <ul class="list-unstyled">
                    <li><a href="#">Support</a></li>
                    <li><a href="#">Privacy</a></li>
                    <li><a href="#">Terms of Service</a></li>
                </ul>
            </div>
            <div class="col-6 col-md-3 mb-4 mb-md-0">
                <h3>Thông tin liên hệ</h3>
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
                        Copyright &copy;<script>
                        document.write(new Date().getFullYear());
                        </script>
                        All rights reserved | This template is made with <i class="icon-heart text-danger"
                            aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </small></p>
            </div>
        </div>
    </div>
</footer>
<script src="board-master/js/bootstrap.bundle.min.js"></script>
@include('layout.page-js')

</html>