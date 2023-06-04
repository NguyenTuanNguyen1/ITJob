@extends('company.layout')
@section('content')
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            {{--            <div class="position-relative mb-3">--}}
            {{--                <div class="row g-3 justify-content-between">--}}
            {{--                    <div class="col-auto">--}}
            {{--                        <div class="page-utilities">--}}
            {{--                            <select class="form-select form-select-sm w-auto">--}}
            {{--                                <option selected value="option-1">All</option>--}}
            {{--                                <option value="option-2">News</option>--}}
            {{--                                <option value="option-3">Product</option>--}}
            {{--                                <option value="option-4">Project</option>--}}
            {{--                                <option value="option-4">Billing</option>--}}
            {{--                            </select>--}}
            {{--                        </div><!--//page-utilities-->--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            @foreach($candidates as $candidate)
                <div class="app-card app-card-notification shadow-sm mb-4">
                    <div class="app-card-header px-4 py-3">
                        <div class="row g-3 align-items-center">
                            <div class="col-12 col-lg-auto text-center text-lg-start">
                                <img class="profile-image" src="{{ url('image_avatar') }}/{{ $candidate->img_avatar }}" alt="">
                            </div><!--//col-->
                            <div class="col-12 col-lg-auto text-center text-lg-start">
                                <div class="notification-type mb-2">{{ $candidate->username }}</div>
                                <h4 class="notification-title mb-1">{{ $candidate->position }}</h4>

                            </div><!--//col-->
                        </div><!--//row-->
                    </div><!--//app-card-header-->
                    <div class="app-card-body p-4">
                        <div class="notification-content">{{ $candidate->description }}</div>
                    </div><!--//app-card-body-->
                    <div class="app-card-footer px-4 py-3">
                        <a class="action-link" href="{{ Route('profile.user',['id' => $candidate->id]) }}">Xem chi tiết
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-right ms-2"
                                 fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                            </svg>
                        </a>
                    </div><!--//app-card-footer-->
                </div><!--//app-card-->
            @endforeach

        </div><!--//container-fluid-->
    </div><!--//app-content-->
@endsection
