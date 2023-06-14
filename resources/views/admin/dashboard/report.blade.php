@extends('admin.dashboard.layout')
@section('content')
    @include('sweetalert::alert')
    <link href="{{ url('profile/demo/demo.css')  }}" rel="stylesheet"/>
    <link href="{{ url('profile/css/paper-dashboard.css?v=2.0.1')  }}" rel="stylesheet"/>
    <link href="{{ url('profile/css/bootstrap.min.css')  }}" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- End Navbar -->
    <div class="content">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-globe text-warning"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Báo cáo bài viết</p>
                                    <p class="card-title">
                                    <p>{{ $count_report_post }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-refresh"></i>
                            Hiện tại
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-globe text-warning"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Báo cáo người dùng</p>
                                    <p class="card-title">
                                    <p>{{ $count_report_user }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-refresh"></i>
                            Hiện tại
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-money-coins text-success"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Đã phản hồi</p>
                                    <p class="card-title">
                                    <p>{{ $count_report_reply }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-calendar-o"></i>
                            Hiện tại
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-vector text-danger"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Chưa phản hồi</p>
                                    <p class="card-title">
                                    <p>{{ $count_report_not_reply }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-clock-o"></i>
                            Hiện tại
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content" style="margin-top: 5px">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Danh sách báo cáo bài viết chưa phản hồi</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>Người gửi</th>
                                <th>Nội dung</th>
                                <th>Ảnh</th>
                                <th>Ngày đăng</th>
                                <th class="text-center">Chức năng</th>
                                </thead>
                                <tbody id="report_reply">
                                @foreach($report_post_not_reply as $post_not_reply)
                                    <tr>
                                        <td>{{ $post_not_reply->from_user->name }}</td>
                                        <td style="width:50%">{{ $post_not_reply->content }}</td>
                                        <td>
                                            @foreach($images as $img)
                                                @if($img->ticket_id == $post_not_reply->id)
                                                    <button class="btn btn-outline-success" type="submit"
                                                            value="{{ $img->ticket_id }}"
                                                            data-toggle="modal" data-target="#modalReportImage"
                                                            id="btn-post-images">
                                                        <img src="{{ url('Images')}}/{{ $img->image }}"
                                                             width="50px" height="50px">
                                                    </button>
                                                    @break
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>{{ $post_not_reply->created_at->format('d-m-Y') }}</td>
                                        <td>
                                            <button class="btn btn-outline-danger" type="submit" style="margin: 5px"
                                                    data-toggle="modal" data-target="#modalReport"
                                                    id="btn-reply" value="{{ $post_not_reply->id }}">Phản hồi
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content" style="margin-top: 5px">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Danh sách báo cáo người dùng chưa phản hồi</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>Người gửi</th>
                                <th>Nội dung</th>
                                <th>Ảnh</th>
                                <th>Ngày đăng</th>
                                <th class="text-center">Chức năng</th>
                                </thead>
                                <tbody id="report_user_reply">
                                @foreach($report_user_not_reply as $user_not_reply)
                                    <tr>
                                        <td>{{ $user_not_reply->from_user->name }}</td>
                                        <td style="width:50%">{{ $user_not_reply->content }}</td>
                                        <td>
                                            @foreach($images as $img)
                                                @if($img->ticket_id == $user_not_reply->id)
                                                    <button class="btn btn-outline-success" type="submit"
                                                            value="{{ $img->ticket_id }}"
                                                            data-toggle="modal" data-target="#modalReportImage"
                                                            id="btn-user-images">
                                                        <img src="{{ url('Images')}}/{{ $img->image }}"
                                                             width="50px" height="50px">
                                                    </button>
                                                    @break
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>{{ $user_not_reply->created_at->format('d-m-Y') }}</td>
                                        <td>
                                            <button class="btn btn-outline-danger" type="submit" style="margin: 5px"
                                                    data-toggle="modal" data-target="#modalReportUser"
                                                    id="btn-user-reply" value="{{ $user_not_reply->id }}">Phản hồi
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('modal.report.slides_show')
    @include('modal.report.report')
    @include('modal.report.report_user')
    @include('modal.report.detail-report')
    <div class="content" style="margin-top: 5px">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Danh sách báo cáo bài viết đã phản hồi </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>Người gửi</th>
                                <th>Nội dung</th>
                                <th>Ảnh</th>
                                <th>Ngày đăng</th>
                                <th class="text-center">Chức năng</th>
                                </thead>
                                <tbody id="report_replied">
                                @foreach($report_post_reply as $post_reply)
                                    <tr>
                                        <td>{{ $post_reply->from_user->name }}</td>
                                        <td>{{ $post_reply->content }}</td>
                                        <td>
                                            @foreach($images as $img)
                                                @if($img->ticket_id == $post_reply->id)
                                                    <button class="btn btn-outline-success" type="submit"
                                                            value="{{ $img->ticket_id }}"
                                                            data-toggle="modal" data-target="#modalReportImage"
                                                            id="btn-post-images">
                                                        <img src="{{ url('Images')}}/{{ $img->image }}"
                                                             width="50px" height="50px">
                                                    </button>
                                                    @break
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>{{ $post_reply->created_at->format('d-m-Y') }}</td>
                                        <td class="d-flex">
                                            <button class="btn btn-outline-success" type="submit" style="margin: 5px"
                                                    data-value="123" data-toggle="modal"
                                                    data-target="#modalDetailReport"
                                                    id="btn-replied" value="{{ $post_reply->id }}">Phản hồi
                                            </button>
                                            <button class="btn btn-outline-warning" type="submit" style="margin: 5px"
                                                    onclick="window.location='{{ Route('report.delete',['id' => $post_reply->id]) }}'">
                                                Xoá
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content" style="margin-top: 5px">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Danh sách báo cáo người dùng đã phản hồi </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>Người gửi</th>
                                <th>Nội dung</th>
                                <th>Ảnh</th>
                                <th>Ngày đăng</th>
                                <th class="text-center">Chức năng</th>
                                </thead>
                                <tbody id="report_user_replied">
                                @foreach($report_user_reply as $user_reply)
                                    <tr>
                                        <td>{{ $user_reply->from_user->name }}</td>
                                        <td>{{ $user_reply->content }}</td>
                                        <td>
                                            @foreach($images as $img)
                                                @if($img->ticket_id == $user_reply->id)
                                                    <button class="btn btn-outline-success" type="submit"
                                                            value="{{ $img->ticket_id }}"
                                                            data-toggle="modal" data-target="#modalReportImage"
                                                            id="btn-user-images">
                                                        <img src="{{ url('Images')}}/{{ $img->image }}"
                                                             width="50px" height="50px">
                                                    </button>
                                                    @break
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>{{ $user_reply->created_at->format('d-m-Y') }}</td>
                                        <td class="d-flex">
                                            <button class="btn btn-outline-success" type="submit" style="margin: 5px"
                                                    data-value="123" data-toggle="modal"
                                                    data-target="#modalDetailReportUser"
                                                    id="btn-user-replied" value="{{ $user_reply->id }}">Phản hồi
                                            </button>
                                            <button class="btn btn-outline-warning" type="submit" style="margin: 5px"
                                                    onclick="window.location='{{ Route('report.delete',['id' => $user_reply->id]) }}'">
                                                Xoá
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('modal.contact.detail-reply')
    @include('modal.report.detail-report-user')
@endsection
<script src="{{ url('profile/js/core/jquery.min.js') }}"></script>
<script src="{{ url('profile/js/core/popper.min.js') }}"></script>
<script src="{{ url('profile/js/core/bootstrap.min.js') }}"></script>
<script src="{{ url('profile/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
<!-- Chart JS -->
<script src="{{ url('profile/js/plugins/chartjs.min.js') }}"></script>
<!--  Notifications Plugin    -->
<script src="{{ url('profile/js/plugins/bootstrap-notify.js') }}"></script>


<script src="{{ url('profile/demo/demo.js')  }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function () {

        $('#report_reply').on('click', '#btn-reply', function () {
            var _li = '';
            var value = {'id': $(this).val()}
            $.ajax({
                url: "{{ Route('report.detail') }}",
                type: "GET",
                data: value,
                success: function (res) {
                    _li += '<input type="hidden" name="ticket_id" value="' + res.data.id + '">';
                    _li += '<input type="hidden" name="post_id" value="' + res.data.post_id + '">';
                    _li += '<input type="hidden" name="to_user_id" value="' + res.data.from_user_id + '">';
                    $('#replied_report').html(_li)
                }
            })
        })

        $('#report_user_reply').on('click', '#btn-user-reply', function () {
            var _li = '';
            var value = {'id': $(this).val()}
            $.ajax({
                url: "{{ Route('report.detail') }}",
                type: "GET",
                data: value,
                success: function (res) {
                    console.log(res)
                    _li += '<input type="hidden" name="ticket_id" value="' + res.data.id + '">';
                    _li += '<input type="hidden" name="from_user_id" value="' + res.data.from_user_id + '">';
                    _li += '<input type="hidden" name="to_user_id" value="' + res.data.to_user_id + '">';
                    $('#replied_user_report').html(_li)
                }
            })
        })

        $('#report_replied').on('click', '#btn-replied', function () {
            var _li = '';
            var value = {'id': $(this).val()}
            $.ajax({
                url: "{{ Route('report.replied') }}",
                type: "GET",
                data: value,
                success: function (res) {
                    console.log(res)
                    _li += '<label for="recipient-name" class="col-form-label" style="font-weight: bold;">Người gửi : ' + res.data.from_user.username + ' </label><br>';
                    _li += '<label for="recipient-name" class="col-form-label" style="font-weight: bold;">Nội dung : </label><br>'
                    _li += '<label>' + res.data.content + '</label>';
                    $('#detail-replied').html(_li)
                }
            })
        })

        $('#report_user_replied').on('click', '#btn-user-replied', function () {
            var _li = '';
            var value = {'id': $(this).val()}
            $.ajax({
                url: "{{ Route('report.replied') }}",
                type: "GET",
                data: value,
                success: function (res) {
                    console.log(res.result)
                    _li += '<label for="recipient-name" class="col-form-label" style="font-weight: bold;">Người gửi : ' + res.result.from_user.username + ' </label><br>';
                    _li += '<label for="recipient-name" class="col-form-label" style="font-weight: bold;">Nội dung : </label><br>'
                    _li += '<label>' + res.result.content + '</label>';
                    $('#detail-replied-user').html(_li)
                }
            })
        })

        $('#report_reply').on('click', '#btn-post-images', function () {
            var _li = '';
            var value = {'id': $(this).val()}
            $.ajax({
                url: "{{ Route('report.image') }}",
                type: "GET",
                data: value,
                success: function (res) {
                    var data = res.images;
                    var key = 0;
                    data.forEach(function (item) {
                        if (key == 0) {
                            _li += '<div class="carousel-item active">';
                            _li += '<img src="{{ url('Images')}}/' + item.image + '" class="d-block w-100" alt="...">';
                            _li += '</div>'
                        } else {
                            _li += '<div class="carousel-item">';
                            _li += '<img src="{{ url('Images')}}/' + item.image + '" class="d-block w-100" alt="...">';
                            _li += '</div>'
                        }
                        key += 1;
                        console.log(key)
                    })
                    $('#images').html(_li)
                }
            })
        })
        $('#report_replied').on('click', '#btn-post-images', function () {
            var _li = '';
            var value = {'id': $(this).val()}
            $.ajax({
                url: "{{ Route('report.image') }}",
                type: "GET",
                data: value,
                success: function (res) {
                    var data = res.images;
                    var key = 0;
                    data.forEach(function (item) {
                        if (key == 0) {
                            _li += '<div class="carousel-item active">';
                            _li += '<img src="{{ url('Images')}}/' + item.image + '" class="d-block w-100" alt="...">';
                            _li += '</div>'
                        } else {
                            _li += '<div class="carousel-item">';
                            _li += '<img src="{{ url('Images')}}/' + item.image + '" class="d-block w-100" alt="...">';
                            _li += '</div>'
                        }
                        key += 1;
                        console.log(key)
                    })
                    $('#images').html(_li)
                }
            })
        })
        $('#report_user_reply').on('click', '#btn-user-images', function () {
            var _li = '';
            var value = {'id': $(this).val()}
            $.ajax({
                url: "{{ Route('report.image') }}",
                type: "GET",
                data: value,
                success: function (res) {
                    var data = res.images;
                    var key = 0;
                    data.forEach(function (item) {
                        if (key == 0) {
                            _li += '<div class="carousel-item active">';
                            _li += '<img src="{{ url('Images')}}/' + item.image + '" class="d-block w-100" alt="...">';
                            _li += '</div>'
                        } else {
                            _li += '<div class="carousel-item">';
                            _li += '<img src="{{ url('Images')}}/' + item.image + '" class="d-block w-100" alt="...">';
                            _li += '</div>'
                        }
                        key += 1;
                        console.log(key)
                    })
                    $('#images').html(_li)
                }
            })
        })
        $('#report_user_replied').on('click', '#btn-user-images', function () {
            var _li = '';
            var value = {'id': $(this).val()}
            $.ajax({
                url: "{{ Route('report.image') }}",
                type: "GET",
                data: value,
                success: function (res) {
                    var data = res.images;
                    var key = 0;
                    data.forEach(function (item) {
                        if (key == 0) {
                            _li += '<div class="carousel-item active">';
                            _li += '<img src="{{ url('Images')}}/' + item.image + '" class="d-block w-100" alt="...">';
                            _li += '</div>'
                        } else {
                            _li += '<div class="carousel-item">';
                            _li += '<img src="{{ url('Images')}}/' + item.image + '" class="d-block w-100" alt="...">';
                            _li += '</div>'
                        }
                        key += 1;
                        console.log(key)
                    })
                    $('#images').html(_li)
                }
            })
        })
    });
</script>
