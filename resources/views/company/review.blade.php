@extends('company.layout')
@section('content')
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            @foreach($reviews as $review)
                <div class="app-card app-card-notification shadow-sm mb-4">
                    <div class="app-card-header px-4 py-3">
                        <div class="row g-3 align-items-center">
                            <div class="col-12 col-lg-auto text-center text-lg-start">
                                <img class="profile-image" src="{{ url('image_avatar') }}/{{ $review->from_user->img_avatar }}"
                                     alt="">
                            </div>
                            <div class="col-12 col-lg-auto text-center text-lg-start">
                                <div class="notification-type mb-2">
                                    <label style="font-size: 19px;font-weight: bold">{{ $review->from_user->username }}</label>
                                </div>
                                <label style="font-size: 15px">{{ $review->created_at->format('d-m-Y') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="app-card-body p-4">
                        <div class="notification-content">{{ $review->content }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
