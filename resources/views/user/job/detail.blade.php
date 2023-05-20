@extends('layout.layout')
@section('content')
    @include('sweetalert::alert')
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet"/>
    <link href="{{ url('assets/libs/toastr/build/toastr.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('board-master/css/custom-bs.css') }}">
    <link rel="stylesheet" href="{{ url('board-master/css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ url('board-master/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ url('board-master/fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ url('board-master/fonts/line-icons/style.css') }}">
    <link rel="stylesheet" href="{{ url('board-master/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ url('board-master/css/animate.min.css') }}">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ url('board-master/css/style.css') }}">

    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image"
             id="home-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1 class="text-white font-weight-bold">Product Designer</h1>
                    <div class="custom-breadcrumbs">
                        <a href="#">Home</a> <span class="mx-2 slash">/</span>
                        <a href="#">Job</a> <span class="mx-2 slash">/</span>
                        <span class="text-white"><strong>Product Designer</strong></span>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="site-section">
        <div class="container">
            <div class="row align-items-center mb-5">
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <div class="d-flex align-items-center">
                        <div class="border p-2 d-inline-block mr-3 rounded">
                            <img src="{{ url('Images/')}}/{{ $post->getImageAttribute()}}" width="100" height="100">
                        </div>
                        <div>
                            <h2>Product Designer </h2>
                            <div>
                                <span class="ml-0 mr-2 mb-2"><span class="icon-briefcase mr-2"></span> {{ $post->getNameAttribute() }}</span>
                                <span class="m-2"><span class="icon-room mr-2"></span>{{ $post->workplace }}</span>
                                <span class="m-2"><span class="icon-clock-o mr-2"></span><span
                                        class="text-primary">{{ $post->position }}</span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-6">
                            <a href="#" class="btn btn-block btn-light btn-md"><span
                                    class="icon-heart-o mr-2 text-danger"></span>Save Job</a>
                        </div>
                        <div class="col-6">
                            <a href="#" class="btn btn-block btn-primary btn-md">Apply Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="mb-5">
                        <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span
                                class="icon-align-left mr-3"></span>Mô tả công việc</h3>
                        <p> {{ $post->title }}</p>
                    </div>
                    <div class="mb-5">
                        <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span
                                class="icon-rocket mr-3"></span>Lợi ích</h3>
                        <ul class="list-unstyled m-0 p-0">
                            {{ $post->benefit }}
                        </ul>
                    </div>

                    <div class="mb-5">
                        <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-book mr-3"></span>Yêu
                            cầu công việc</h3>
                        {{ $post->requirements }}
                    </div>

                    {{--            <div class="mb-5">--}}
                    {{--              <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-turned_in mr-3"></span>Other Benifits</h3>--}}
                    {{--              <ul class="list-unstyled m-0 p-0">--}}
                    {{--                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span>Necessitatibus quibusdam facilis</span></li>--}}
                    {{--                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span>Velit unde aliquam et voluptas reiciendis non sapiente labore</span></li>--}}
                    {{--                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span>Commodi quae ipsum quas est itaque</span></li>--}}
                    {{--                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit</span></li>--}}
                    {{--                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span>Deleniti asperiores blanditiis nihil quia officiis dolor</span></li>--}}
                    {{--              </ul>--}}
                    {{--            </div>--}}

                    <div class="row mb-5">
                        <div class="col-6">
                            <form action="{{ Route('user.applied.post') }}" method="post">
                                @csrf
                                <input value="{{ Auth::user()->id }}" name="user_id" type="hidden">
                                <input value="{{ $post->id }}" name="post_id" type="hidden">
                                <button type="submit" class="btn btn-block btn-primary btn-md" id="applied">Ứng tuyển
                                    ngay
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="bg-light p-3 border rounded mb-4">
                        <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Chi tiết công việc</h3>
                        <ul class="list-unstyled pl-3 mb-0">
                            <li class="mb-2"><strong class="text-black">Đăng
                                    ngày</strong> {{ $post->created_at->format('d-m-Y') }}</li>
                            <li class="mb-2"><strong class="text-black">Số lượng :</strong> {{ $post->quantity }}</li>
                            <li class="mb-2"><strong class="text-black">Chuyên ngành:</strong> {{ $post->major }}
                            </li>
                            <li class="mb-2"><strong class="text-black">Cấp bậc:</strong> {{ $post->level }}</li>
                            {{--                <li class="mb-2"><strong class="text-black">Job Location:</strong> New ork City</li>--}}
                            {{--                <li class="mb-2"><strong class="text-black">Salary:</strong> $60k - $100k</li>--}}
                            {{--                <li class="mb-2"><strong class="text-black">Gender:</strong>ny</li>--}}
                            {{--                  <li class="mb-2"><strong class="text-black">Application Deadline:</strong> April 28, 2019</li> A--}}
                        </ul>
                    </div>

                    {{--            <div class="bg-light p-3 border rounded">--}}
                    {{--              <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Share</h3>--}}
                    {{--              <div class="px-3">--}}
                    {{--                <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-facebook"></span></a>--}}
                    {{--                <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-twitter"></span></a>--}}
                    {{--                <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>--}}
                    {{--                <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-pinterest"></span></a>--}}
                    {{--              </div>--}}
                    {{--            </div>--}}

                </div>
            </div>
        </div>
    </section>

    <div class="container" style="padding-top:10px">
        <div class="row mb-5 justify-content-center">
            <div class="col-md-7 text-center">
                <h2 class="section-title mb-2">22,392 Related Jobs</h2>
            </div>
        </div>

        <div class="row align-items-center justify-content-center">
            <div class="col-md-12">
                <ul class="job-listings mb-5">
                    @foreach($post_majors as $post_major)
                        <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                            <a href="{{env('APP_DOMAIN')}}/post/post-detail/{{ $post_major->id }}" data-value=""></a>
                            <div class="job-listing-logo">
                                <img src="{{ url('Images/')}}/{{ $post_major->getImageAttribute()}}"
                                     width="70" height="50" class="img-fluid">
                            </div>
                            <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                                <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                                    <strong>{{ $post_major->title }}</strong>
                                </div>
                                <div class="job-listing-location custom-width w-25 mb-3 mb-sm-0">
                                    <span class="icon-room"></span> {{ $post_major->workplace }}
                                </div>
                                <div class="job-listing-meta custom-width w-25">
                                    <div style="display: flex;justify-content: center">
                                        <span class="badge badge-success">{{ $post_major->major }}</span>
                                    </div>

                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    @include('layout.page-js')
@endsection
