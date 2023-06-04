@extends('admin.dashboard.layout')
@section('content')
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
                                    <p class="card-category">Tổng số bài viết</p>
                                    <p class="card-title" id="all_post">
                                    <p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-refresh"></i>
                            Tuần trước
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
                                    <p class="card-category">Đã phê duyệt</p>
                                    <p class="card-title" id="count_post_approved">
                                    <p>
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
                                    <p class="card-category">Chưa phê duyệt</p>
                                    <p class="card-title" id="count_post_not_approved">
                                    <p>
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
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-favourite-28 text-primary"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Bài viết đã xoá</p>
                                    <p class="card-title" id="count_post_trashed">
                                    <p>
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
        </div>
    </div>

    <div class="content" style="margin-top: 5px">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Danh sách bài viết chưa phê duyệt</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>Tên công ty</th>
                                <th>Ngày đăng</th>
                                <th class="text-center">Chức năng</th>
                                </thead>
                                <tbody id="post-not-approved">
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
                        <h4 class="card-title"> Danh sách bài viết trong tuần qua </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>Tên công ty</th>
                                <th>Ngày đăng</th>
                                <th>Phê duyệt</th>
                                <th class="text-center">Chức năng</th>
                                </thead>
                                <tbody id="post-approved">
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
                        <h4 class="card-title"> Danh sách bài viết đã xoá </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>Tên công ty</th>
                                <th>Ngày xoá</th>
                                <th>Phê duyệt</th>
                                <th class="text-center">Chức năng</th>
                                </thead>
                                <tbody id="post-trashed">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
        var $tablePost = $("#post-approved")
        var $tableTrashed = $("#post-trashed")
        var $tableNotApproved = $("#post-not-approved")

        load_data()
        load_data_not_approved()
        load_data_trashed()
        load_all_post()
        load_approved_post()
        load_not_approved_post()
        load_post_trahsed()

        function load_data_not_approved() {
            $.get('http://itjob.vn/dashboard/admin?admin_id={{ Auth::user()->id }}', function (res) {
                var _li ='';
                var data = res.post_not_approved;
                console.log(data)
                data.forEach(function (item) {
                    _li += '<tr>';
                    _li += '<td>' + item.user.name +'</td>';
                    _li += '<td>' + item.created_at +'</td>';
                    _li += '<td class="text-center">';
                    _li += '<button class="btn btn-outline-success" type="submit" style="margin: 5px" id="btn-detail" value="' + item.id +'">Chi tiết</button>';
                    _li += '<button class="btn btn-outline-danger" type="submit" id="btn-approved" value="' + item.id +'">Phê duyệt</button>';
                    _li += '</td>';
                    _li += '</tr>';
                    $('#post-not-approved').html(_li);
                })
            })
        }

        function load_data() {
            $.get('http://itjob.vn/dashboard/admin?admin_id={{ Auth::user()->id }}', function (res) {
                var _li ='';
                var data = res.approved_last_week;
                data.forEach(function (item) {
                    _li += '<tr>';
                    _li += '<td>' + item.user.name +'</td>';
                    _li += '<td>' + item.created_at +'</td>';
                    _li += '<td>' + item.approved_user.username +'</td>';
                    _li += '<td class="text-center">';
                    _li += '<button class="btn btn-outline-success" type="submit" style="margin: 5px" id="btn-detail" value="' + item.id +'">Chi tiết</button>';
                    _li += '<button class="btn btn-outline-danger" type="submit" id="btn-delete" value="' + item.id +'">Xoá bài viết</button>';
                    _li += '</td>';
                    _li += '</tr>';
                    $('#post-approved').html(_li);
                })
            })
        }

        function load_data_trashed() {
            $.get('http://itjob.vn/dashboard/admin?admin_id={{ Auth::user()->id }}', function (res) {
                var _li ='';
                var data = res.post_trashed;
                data.forEach(function (item) {
                    _li += '<tr>';
                    _li += '<td>' + item.user.name +'</td>';
                    _li += '<td>' + item.deleted_at +'</td>';
                    _li += '<td>' + item.approved_user.name +'</td>';
                    _li += '<td class="text-center">';
                    _li += '<button class="btn btn-outline-success" type="submit" style="margin: 5px" id="btn-detail" value="' + item.id +'">Chi tiết</button>';
                    _li += '<button class="btn btn-outline-dark" type="submit" id="btn-restore" value="' + item.id +'">Khôi phục</button>';
                    _li += '</td>';
                    _li += '</tr>';
                    $('#post-trashed').html(_li);
                })
            })
        }

        function load_all_post() {
            $.get('http://itjob.vn/dashboard/admin?admin_id={{ Auth::user()->id }}', function (res) {
                var _li ='';
                _li += res.all_post;
                $('#all_post').html(_li);
            });
        }

        function load_approved_post() {
            $.get('http://itjob.vn/dashboard/admin?admin_id={{ Auth::user()->id }}', function (res) {
                var _li ='';
                _li += res.count_post_approved;
                $('#count_post_approved').html(_li);
            });
        }

        function load_not_approved_post() {
            $.get('http://itjob.vn/dashboard/admin?admin_id={{ Auth::user()->id }}', function (res) {
                var _li ='';
                _li += res.count_not_post_approved;
                $('#count_post_not_approved').html(_li);
            });
        }

        function load_post_trahsed() {
            $.get('http://itjob.vn/dashboard/admin?admin_id={{ Auth::user()->id }}', function (res) {
                var _li ='';
                _li += res.count_post_trashed;
                $('#count_post_trashed').html(_li);
            });
        }

        $tablePost.on('click', '#btn-detail', function (e) {
            e.preventDefault()
            var post_id = $('#btn-detail').val();
            window.location.href = 'http://itjob.vn/post/post-detail/' + post_id + '';
        })

        $tablePost.on('click', '#btn-delete', function (e) {
            e.preventDefault()
            var value = {
                'id': $('#btn-delete').val(),
                'user_id': {{ Auth::user()->id }},
                '_token': '{{ csrf_token() }}'
            }
            var obj = $(this);
            Swal.fire({
                title: 'Bạn chắc chắn muốn xoá bài viết ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Không',
                confirmButtonText: 'Có',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ Route('post.delete') }}',
                        type: 'GET',
                        data: value,
                        success: function (res) {
                            obj.parents("tr").remove();
                            load_data();
                            load_post_trahsed();
                        }
                    })
                    Swal.fire(
                        'Xoá thành công!',
                    )
                }
            })
        })

        $tableTrashed.on('click', '#btn-detail', function (e) {
            e.preventDefault()
            var post_id = $('#btn-detail').val();
            window.location.href = 'http://itjob.vn/post/post-detail/' + post_id + '';
        })

        $tableTrashed.on('click', '#btn-restore', function (e) {
            e.preventDefault()
            var value = {
                'id': $('#btn-restore').val(),
                'user_id': {{ Auth::user()->id }},
                '_token': '{{ csrf_token() }}'
            }
            console.log(value)
            var obj = $(this);
            Swal.fire({
                title: 'Bạn muốn khôi phục bài viết ?',
                icon: 'success',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Không',
                confirmButtonText: 'Có',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ Route('post.restore') }}',
                        type: 'POST',
                        data: value,
                        success: function (res) {
                            obj.parents("tr").remove();
                            load_data();
                            load_post_trahsed();
                        }
                    })
                    Swal.fire(
                        'Khôi phục thành công!',
                    )
                }
            })
        })

        $tableNotApproved.on('click', '#btn-detail', function (e) {
            e.preventDefault()
            var post_id = $('#btn-detail').val();
            window.location.href = 'http://itjob.vn/post/post-detail/' + post_id + '';
        })

        $tableNotApproved.on('click', '#btn-approved', function (e) {
            e.preventDefault()
            var value = {
                'id': $('#btn-approved').val(),
                'status': 1,
                'admin_id': {{ Auth::user()->id }},
                '_token': '{{ csrf_token() }}'
            }
            console.log(value)
            var obj = $(this);
            Swal.fire({
                title: 'Bạn muốn khôi phục bài viết ?',
                icon: 'success',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Không',
                confirmButtonText: 'Có',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ Route('admin.approved.post') }}',
                        type: 'POST',
                        data: value,
                        success: function (res) {
                            obj.parents("tr").remove();
                            load_approved_post()
                            load_not_approved_post()
                            load_all_post();
                            load_data_not_approved();
                        }
                    })
                    Swal.fire(
                        'Khôi phục thành công!',
                    )
                }
            })
        })
    });
</script>
