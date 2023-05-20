@extends('layout.layout')
@section('index')
    <div class="container" style="padding-top:10px">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-12">

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
                                <option>Full Time</option>
                            </select>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                            <button type="submit" class="btn btn-primary btn-lg btn-block text-white btn-search">
                                <span class="icon-search icon mr-2"></span>Search Job
                            </button>
                        </div>
                    </div>
                </form>
                <ul class="job-listings mb-2">
                    @foreach($posts as $post)
                        <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                            <a href="{{env('APP_DOMAIN')}}/post/post-detail/{{ $post->id }}" data-value=""></a>
                            <div class="job-listing-logo">
                                <img src="board-master/images/job_logo_4.jpg"
                                     alt="Free Website Template by Free-Template.co" class="img-fluid">
                            </div>
                            <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                                <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                                    <strong>{{ $post->title }}</strong>
                                </div>
                                <div class="job-listing-location custom-width w-25 mb-3 mb-sm-0">
                                    <span class="icon-room"></span> {{ $post->workplace }}
                                </div>
                                <div class="job-listing-meta custom-width w-25">
                                    <div style="display: flex;justify-content: center">
                                        <span class="badge badge-success">{{ $post->major }}</span>
                                    </div>

                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
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
@endsection
