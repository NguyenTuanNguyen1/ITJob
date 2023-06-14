@extends('company.layout')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    {{--    <div class="col-6">--}}
    {{--        <a class="btn btn-block btn-light btn-md " role="button" data-toggle="dropdown"--}}
    {{--           aria-expanded="false"><span--}}
    {{--                class="icon-th-large mr-2 text-danger"></span>Chức năng</a>--}}
    {{--        <div class="dropdown-menu">--}}
    {{--            <button type="submit" class="dropdown-item" data-toggle="modal"--}}
    {{--                    data-target="#modalReportPost">Báo cáo bài viết--}}
    {{--            </button>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    <div id="report_user">


        @foreach($reviews as $review)
            <div class="app-card app-card-notification shadow-sm mb-4">
                <div class="app-card-header px-4 py-3">
                    <div class="row g-3 align-items-center">
                        <div class="col-12 col-lg-auto text-center text-lg-start">
                            <img class="profile-image"
                                 src="{{ url('image_avatar') }}/{{ $review->from_user->img_avatar }}"
                                 alt="">
                        </div>
                        <div class="col-12 col-lg-auto text-lg-start" style="padding: 0">
                            <div class="notification-type mb-2">
                                <label
                                    style="font-size: 19px;font-weight: bold">{{ $review->from_user->username }}</label>
                            </div>
                            <label style="font-size: 15px">{{ $review->created_at->format('d-m-Y') }}</label>
                        </div>
                        <div class="col-6">
                            <a class="btn btn-light" role="button" data-toggle="dropdown"
                               aria-expanded="false"><i class="fas fa-bars"></i></a>
                            <div class="dropdown-menu">
                                <button type="submit" class="dropdown-item" data-toggle="modal"
                                        value="{{ $review->from_user_id }}"
                                        data-target="#modalCompanyReport" id="company_report_user">Báo cáo
                                </button>
                                <form action="{{ Route('report.delete') }}" method="get">
                                    <input type="hidden" name="id" value="{{ $review->id }}">
                                    <input type="hidden" name="role_id" value="{{ Auth::user()->role_id }}">
                                    <button type="submit" class="dropdown-item" data-toggle="modal"
                                            data-target="#modalReportPost">Xoá đánh giá
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="app-card-body p-4">
                    <div class="notification-content">{{ $review->content }}</div>
                </div>
            </div>

        @endforeach
    </div>
    @include('modal.report.company_report')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(() => {
            $('#report_user').on('click', '#company_report_user', function () {
                var value = {'id': $(this).val()}
                // console.log(value)
                var _li = '';
                _li = '<input type="hidden" name="to_user_id" value="'+ value.id +'">';
                $('#company-report').html(_li)
            })
        })
    </script>
@endsection
