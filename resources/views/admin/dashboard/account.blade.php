@extends('admin.dashboard.layout')
@section('content')
    <link href="{{ url('profile/demo/demo.css')  }}" rel="stylesheet"/>
    <link href="{{ url('profile/css/paper-dashboard.css?v=2.0.1')  }}" rel="stylesheet"/>
    <link href="{{ url('profile/css/bootstrap.min.css')  }}" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
                                    <p class="card-category">Tổng số người dùng</p>
                                    <p class="card-title" id="all_user">
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
                                    <p class="card-category">Quản trị viên</p>
                                    <p class="card-title" id="count_user_admin"></p>
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
                                    <p class="card-category">Nhà tuyển dụng</p>
                                    <p class="card-title" id="count_user_company"></p>
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
                                    <p class="card-category">Ứng cử viên</p>
                                    <p class="card-title" id="count_user_candidate"></p>
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
                        <h4 class="card-title"> Quản trị viên</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>Tên hiển thị</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                                <th class="text-center">Chức năng</th>
                                </thead>
                                <tbody id="user_admin">

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
                        <h4 class="card-title"> Nhà tuyển dụng </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>Tên công ty</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                                <th>Chuyên ngành</th>
                                <th class="text-center">Chức năng</th>
                                </thead>
                                <tbody id="user_company">
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
                        <h4 class="card-title"> Ứng cử viên </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>Tên hiển thị</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                                <th class="text-center">Chức năng</th>
                                </thead>
                                <tbody id="user_candidate">
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
                        <h4 class="card-title"> Những tài khoản bạn đã xoá </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>Tên hiển thị</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                                <th class="text-center">Chức năng</th>
                                </thead>
                                <tbody id="user_trashed">

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
        var $tableAdmin = $("#user_admin")
        var $tableCompany = $("#user_company")
        var $tableCandidate = $("#user_candidate")
        var $tableTrashed = $("#user_trashed")

        load_data()
        load_count_user_admin()
        load_count_user_company()
        load_count_user_candidate()
        load_user_admin()
        load_user_company()
        load_user_candidate()
        load_user_trashed()

        function load_data() {
            $.get('http://itjob.vn/dashboard/account?admin_id={{ Auth::user()->id }}', function (res) {
                var _li = '';
                _li += res.all_user;
                $('#all_user').html(_li);
            });
        }

        function load_count_user_admin() {
            $.get('http://itjob.vn/dashboard/account?admin_id={{ Auth::user()->id }}', function (res) {
                var _li = '';
                _li += res.count_user_admin;
                $('#count_user_admin').html(_li);
            });
        }

        function load_count_user_company() {
            $.get('http://itjob.vn/dashboard/account?admin_id={{ Auth::user()->id }}', function (res) {
                var _li = '';
                _li += res.count_user_company;
                $('#count_user_company').html(_li);
            });
        }

        function load_count_user_candidate() {
            $.get('http://itjob.vn/dashboard/account?admin_id={{ Auth::user()->id }}', function (res) {
                var _li = '';
                _li += res.count_user_candidate;
                $('#count_user_candidate').html(_li);
            });
        }

        function load_user_admin() {
            $.get('http://itjob.vn/dashboard/account?admin_id={{ Auth::user()->id }}', function (res) {
                var _li = '';
                var data = res.user_admin;
                data.forEach(function (item) {
                    _li += '<tr>';
                    _li += '<td>' + item.name + '</td>';
                    _li += '<td>' + item.email + '</td>';
                    _li += '<td>' + item.phone + '</td>';
                    _li += '<td>' + item.email + '</td>';
                    _li += '<td class="text-center">';
                    _li += '<button class="btn btn-outline-success" type="submit" style="margin: 5px" id="btn-detail-admin" value="' + item.id + '">Chi tiết</button>';
                    _li += '<button class="btn btn-outline-danger" type="submit" id="btn-delete-admin" value="' + item.id + '">Xoá</button>';
                    _li += '</td>';
                    _li += '</tr>';
                    $('#user_admin').html(_li);
                })
            });
        }

        function load_user_company() {
            $.get('http://itjob.vn/dashboard/account?admin_id={{ Auth::user()->id }}', function (res) {
                var _li = '';
                var data = res.user_company;
                data.forEach(function (item) {
                    _li += '<tr>';
                    _li += '<td>' + item.name + '</td>';
                    _li += '<td>' + item.email + '</td>';
                    _li += '<td>' + item.phone + '</td>';
                    _li += '<td>' + item.address + '</td>';
                    _li += '<td>' + item.major + '</td>';
                    _li += '<td class="text-center">';
                    _li += '<button class="btn btn-outline-success" type="submit" style="margin: 5px" id="btn-detail-company" value="' + item.id + '">Chi tiết</button>';
                    _li += '<button class="btn btn-outline-danger" type="submit" id="btn-delete-company" value="' + item.id + '">Xoá</button>';
                    _li += '</td>';
                    _li += '</tr>';
                    $('#user_company').html(_li);
                })
            });
        }

        function load_user_candidate() {
            $.get('http://itjob.vn/dashboard/account?admin_id={{ Auth::user()->id }}', function (res) {
                var _li = '';
                var data = res.user_candidate;
                data.forEach(function (item) {
                    _li += '<tr>';
                    _li += '<td>' + item.name + '</td>';
                    _li += '<td>' + item.email + '</td>';
                    _li += '<td>' + item.phone + '</td>';
                    _li += '<td>' + item.email + '</td>';
                    _li += '<td class="text-center">';
                    _li += '<button class="btn btn-outline-success" type="submit" style="margin: 5px" id="btn-detail-candidate" value="' + item.id + '">Chi tiết</button>';
                    _li += '<button class="btn btn-outline-danger" type="submit" id="btn-delete-candidate" value="' + item.id + '">Xoá</button>';
                    _li += '</td>';
                    _li += '</tr>';
                    $('#user_candidate').html(_li);
                })
            });
        }

        function load_user_trashed() {
            $.get('http://itjob.vn/dashboard/account?admin_id={{ Auth::user()->id }}', function (res) {
                var _li = '';
                var data = res.user_trashed;
                data.forEach(function (item) {
                    console.log(item)
                    _li += '<tr>';
                    _li += '<td>' + item.name + '</td>';
                    _li += '<td>' + item.email + '</td>';
                    _li += '<td>' + item.phone + '</td>';
                    _li += '<td>' + item.email + '</td>';
                    _li += '<td class="text-center">';
                    _li += '<button class="btn btn-outline-success" type="submit" style="margin: 5px" id="btn-detail-trashed" value="' + item.id + '">Chi tiết</button>';
                    _li += '<button class="btn btn-outline-danger" type="submit" id="btn-restore-user" value="' + item.id + '">Khôi phục</button>';
                    _li += '</td>';
                    _li += '</tr>';
                    $('#user_trashed').html(_li);
                })
            });
        }

        $tableAdmin.on('click', '#btn-detail-admin', function (e) {
            e.preventDefault()
            var user_id = $('#btn-detail-admin').val();
            window.location.href = 'http://itjob.vn/dashboard/admin/user-profile/' + user_id;
        })

        $tableCompany.on('click', '#btn-detail-company', function (e) {
            e.preventDefault()
            var user_id = $('#btn-detail-company').val();
            console.log(user_id)
            window.location.href = 'http://itjob.vn/dashboard/admin/user-profile/' + user_id;
        })

        $tableCandidate.on('click', '#btn-detail-candidate', function (e) {
            e.preventDefault()
            var user_id = $('#btn-detail-candidate').val();
            window.location.href = 'http://itjob.vn/dashboard/admin/user-profile/' + user_id;
        })

        $tableTrashed.on('click', '#btn-detail-trashed', function (e) {
            e.preventDefault()
            var user_id = $('#btn-detail-trashed').val();
            window.location.href = 'http://itjob.vn/dashboard/admin/user-profile/' + user_id;
        })

        $tableAdmin.on('click', '#btn-delete-admin', function (e) {
            e.preventDefault()
            var value = {
                'id': $('#btn-delete-admin').val(),
                'status': 1,
                'admin_id': {{ Auth::user()->id }},
                '_token': '{{ csrf_token() }}'
            }
            var obj = $(this);
            Swal.fire({
                title: 'Bạn muốn xoá người dùng',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Không',
                confirmButtonText: 'Có',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ Route('admin.delete.user') }}',
                        type: 'POST',
                        data: value,
                        success: function (res) {
                            load_data()
                            load_count_user_admin()
                            load_user_trashed()
                            obj.parents("tr").remove();
                        }
                    })
                    Swal.fire(
                        'Đã xoá thành công!',
                    )
                }
            })
        })

        $tableCompany.on('click', '#btn-delete-company', function (e) {
            e.preventDefault()
            var value = {
                'id': $('#btn-delete-company').val(),
                'status': 1,
                'admin_id': {{ Auth::user()->id }},
                '_token': '{{ csrf_token() }}'
            }
            var obj = $(this);
            Swal.fire({
                title: 'Bạn muốn xoá người dùng',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Không',
                confirmButtonText: 'Có',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ Route('admin.delete.user') }}',
                        type: 'POST',
                        data: value,
                        success: function (res) {
                            load_data();
                            load_count_user_company();
                            load_user_trashed()
                            obj.parents("tr").remove();
                        }
                    })
                    Swal.fire(
                        'Đã xoá thành công!',
                    )
                }
            })
        })

        $tableCandidate.on('click', '#btn-delete-candidate', function (e) {
            e.preventDefault()
            var value = {
                'id': $('#btn-delete-candidate').val(),
                'status': 1,
                'admin_id': {{ Auth::user()->id }},
                '_token': '{{ csrf_token() }}'
            }
            var obj = $(this);
            Swal.fire({
                title: 'Bạn muốn xoá người dùng',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Không',
                confirmButtonText: 'Có',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ Route('admin.delete.user') }}',
                        type: 'POST',
                        data: value,
                        success: function (res) {
                            load_data();
                            load_count_user_candidate();
                            load_user_trashed()
                            obj.parents("tr").remove();
                        }
                    })
                    Swal.fire(
                        'Đã xoá thành công!',
                    )
                }
            })
        })

        $tableTrashed.on('click', '#btn-restore-user', function (e) {
            e.preventDefault()
            var value = {
                'id': $('#btn-restore-user').val(),
                'admin_id': {{ Auth::user()->id }},
                '_token': '{{ csrf_token() }}'
            }
            var obj = $(this);
            Swal.fire({
                title: 'Bạn muốn khôi phục người dùng',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Không',
                confirmButtonText: 'Có',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ Route('admin.restore.user') }}',
                        type: 'POST',
                        data: value,
                        success: function (res) {
                            load_data()
                            load_count_user_admin()
                            load_user_trashed()
                            load_user_admin()
                            load_user_candidate()
                            load_user_company()
                            obj.parents("tr").remove();
                        }
                    })
                    Swal.fire(
                        'Đã khôi phục thành công!',
                    )
                }
            })
        })
    });
</script>
