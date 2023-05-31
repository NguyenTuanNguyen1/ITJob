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
                                    <p class="card-category">Tổng số liên hệ</p>
                                    <p class="card-title" id="count_contact">
                                    <p>{{ $count_contact }}
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
                                    <p class="card-title" id="count_contact_reply">
                                    <p>{{ $count_contact_reply }}
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
                                    <p class="card-title" id="count_contact_not_reply">
                                    <p>{{ $count_contact_not_reply }}
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
                        <h4 class="card-title"> Danh sách bài liên hệ chưa phản hồi</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>Người gửi</th>
                                <th>Nội dung</th>
                                <th>Ngày đăng</th>
                                <th class="text-center">Chức năng</th>
                                </thead>
                                <tbody id="contact_reply">
                                @foreach($contact_not_reply as $key => $not_reply)
                                    <tr>
                                        <td>{{ $not_reply->username }}</td>
                                        <td>{{ $not_reply->content }}</td>
                                        <td>{{ $not_reply->created_at->format('d-m-Y') }}</td>
                                        <td>
                                            <button class="btn btn-outline-danger" type="submit" style="margin: 5px"
                                                    data-value="123" data-toggle="modal"
                                                    data-target="#modalRepliedContact"
                                                    id="btn-reply" value="{{ $not_reply->id }}">Phản hồi
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
    @include('modal.contact.replied')
    <div class="content" style="margin-top: 5px">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Danh sách bài liên hệ đã phản hồi </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>Người gửi</th>
                                <th>Nội dung</th>
                                <th>Người phản hồi</th>
                                <th>Ngày đăng</th>
                                <th class="text-center">Chức năng</th>
                                </thead>
                                <tbody id="contact_replied">
                                @foreach($contact_reply as $key => $reply)
                                    <tr>
                                        <td>{{ $reply->username }}</td>
                                        <td>{{ $reply->content }}</td>
                                        <td>{{ $reply->reply_user_id }}</td>
                                        <td>{{ $reply->created_at->format('d-m-Y') }}</td>
                                        <td>
                                            <button class="btn btn-outline-success" type="submit" style="margin: 5px"
                                                    data-value="123" data-toggle="modal"
                                                    data-target="#modalDetailContact"
                                                    id="btn-replied" value="{{ $key }}">Chi tiết {{ $key }}
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
    @include('modal.contact.detail-replied')
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

        $('#contact_replied').on('click', '#btn-replied', function () {
            var data = $(this).val();


            var value = {
                'admin_id': {{ Auth::user()->id }}
            }
            {{--$.ajax({--}}
            {{--    url: "{{ Route('dashboard.contact') }}",--}}
            {{--    type: "GET",--}}
            {{--    data: value,--}}
            {{--    success: function (data) {--}}
            {{--        var categogy = data.contact_reply--}}
            {{--        categogy.forEach(function (item) {--}}
            {{--            _li += '<label for="recipient-name" class="col-form-label" style="font-weight: bold;">Người gửi :</label>';--}}
            {{--            _li += '<label>' + item.user_id + '</label><br>';--}}
            {{--            _li += '<label for="recipient-name" class="col-form-label" style="font-weight: bold;">Tiêu đề :</label><br>';--}}
            {{--            _li += '<label>' + item.subject + '</label><br>';--}}
            {{--            _li += '<label for="message-text" class="col-form-label" style="font-weight: bold;">Nội dung:</label><br>';--}}
            {{--            _li += '<label>' + item.content + '</label><br>';--}}
            {{--            ;--}}
            {{--            $('#replied').html(_li);--}}
            {{--        })--}}
            {{--    }--}}
            {{--})--}}
        })

        $('#contact_reply').on('click', '#btn-reply', function () {})
    });
</script>
