<!doctype html>
<html lang="en">
<head>
    <title>JobBoard &mdash; Website Template by Colorlib</title>
    @include('layout.page-css')
</head>
<!-- NAVBAR -->
<header class="site-navbar mt-3">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="site-logo col-6"><a href="">JobBoard</a></div>
            <nav class="mx-auto site-navigation">
                <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
                    <li><a href="" class="nav-link active">Home</a></li>
                    <li><a href="">About</a></li>
                    <li class="has-children">
                        <a href="">Job Listings</a>
                        <ul class="dropdown">
                            <li><a href="">Job Single</a></li>
                            <li><a href="">Post a Job</a></li>
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
                    <li><a href="blog.html">Blog</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <li class="d-lg-none"><a href="post-job.html"><span class="mr-2">+</span> Post a Job</a></li>
                    <li class="d-lg-none"><a href="login.html">Log In</a></li>
                </ul>
            </nav>

            <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
                <div class="ml-auto">
                    <a href="post-job.html" class="btn btn-outline-white border-width-2 d-none d-lg-inline-block"><span
                            class="mr-2 icon-add"></span>Post a Job</a>
                    <a href="login.html" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span
                            class="mr-2 icon-lock_outline"></span>Log In</a>
                </div>
                <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span
                        class="icon-menu h3 m-0 p-0 mt-2"></span></a>
            </div>

        </div>
    </div>
</header>

<!-- HOME -->

<section class="home-section section-hero overlay bg-image" id="home-section">
    <!-- style="background-image: url('images/hero_1.jpg');" -->
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-12">
                <div class="mb-5 text-center">
                    <h1 class="text-white font-weight-bold">The Easiest Way To Get Your Dream Job</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate est, consequuntur
                        perferendis.</p>
                </div>
                <form method="post" class="search-jobs-form">
                    <div class="row mb-5">
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                            <input type="text" class="form-control form-control-lg" placeholder="Job title, Company...">
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                            <select class="selectpicker" data-style="btn-white btn-lg" data-width="100%"
                                    data-live-search="true" title="Select Region">
                                <option>Anywhere</option>
                                <option>San Francisco</option>
                                <option>Palo Alto</option>
                                <option>New York</option>
                                <option>Manhattan</option>
                                <option>Ontario</option>
                                <option>Toronto</option>
                                <option>Kansas</option>
                                <option>Mountain View</option>
                            </select>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                            <select class="selectpicker" data-style="btn-white btn-lg" data-width="100%"
                                    data-live-search="true" title="Select Job Type">
                                <option>Part Time</option>
                                <option>Full Time</option>
                            </select>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                            <button type="submit" class="btn btn-primary btn-lg btn-block text-white btn-search">
                                <span class="icon-search icon mr-2"></span>Search Job
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 popular-keywords">
                            <h3>Trending Keywords:</h3>
                            <ul class="keywords list-unstyled m-0 p-0">
                                <li><a href="#" class="">UI Designer</a></li>
                                <li><a href="#" class="">Python</a></li>
                                <li><a href="#" class="">Developer</a></li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <a href="#next" class="scroll-button smoothscroll">
        <span class=" icon-keyboard_arrow_down"></span>
    </a>
</section>

<body>
@yield('content')

</body>

<footer class="site-footer">
    <a href="#top" class="smoothscroll scroll-top">
        <span class="icon-keyboard_arrow_up"></span>
    </a>

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
@include('layout.page-js')
</html>
