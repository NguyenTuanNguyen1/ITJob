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
                                    <p class="card-title">
                                    {{ $all_post }}
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
                                    <p class="card-title">
                                    {{ $count_post_approved }}
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
                                    <p class="card-title">
                                    {{ $count_not_post_approved }}
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
                                    <p class="card-title">
                                    {{ $count_post_trashed }}
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
                                @foreach($post_not_approved as $not_approved)
                                    <tbody>
                                    <tr>
                                        <td>{{ $not_approved->user->name }}</td>
                                        <td>{{ $not_approved->created_at->format('d-m-Y') }}</td>
                                        <td class="text-center">
                                            <button class="btn btn-outline-success" style="margin: 5px"
                                                    onclick="window.location='{{ Route('post.detail',['id' => $not_approved->id]) }}'">
                                                Chi tiết
                                            </button>
                                            <form action="{{ Route('admin.approved.post') }}" method="POST" id="btn-approved">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $not_approved->id }}">
                                                <button class="btn btn-outline-danger" type="submit">
                                                    Phê duyệt
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    </tbody>
                                @endforeach
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
                                <tbody>
                                @foreach($approved_last_week as $approved)
                                    <tr>
                                        <td>{{ $approved->user->name }}</td>
                                        <td>{{ $approved->created_at->format('d-m-Y') }}</td>
                                        <td>{{ $approved->approved_user->name }}</td>
                                        <td class="text-center">
                                            <button class="btn btn-outline-success" type="submit" style="margin: 5px"
                                                    onclick="window.location='{{ Route('post.detail',['id' => $approved->id]) }}'">
                                                Chi tiết
                                            </button>
                                            <form action="{{ Route('post.delete') }}" method="POST" id="btn-delete">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $approved->id }}">
                                                <button class="btn btn-outline-danger" type="submit">
                                                    Xoá
                                                </button>
                                            </form>
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
                                <tbody>
                                @foreach($post_trashed as $trashed)
                                    @if($trashed->user == null || $trashed->approved_user == null)

                                    @else
                                    <tr>
                                        <td>{{ $trashed->user->name }}</td>
                                        <td>{{ $trashed->deleted_at->format('d-m-Y') }}</td>
                                        <td>{{ $trashed->approved_user->name }}</td>
                                        <td class="text-center">
                                            <button class="btn btn-outline-success" type="submit" style="margin: 5px"
                                                    onclick="window.location='{{ Route('post.detail',['id' => $trashed->id]) }}'">
                                                Chi tiết
                                            </button>
                                            <form action="{{ Route('post.restore') }}" method="POST" id="btn-restore">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $trashed->id }}">
                                                <button class="btn btn-outline-dark" type="submit">
                                                    Khôi phục
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach
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

        $(document).on('click', '#btn-approved', function (e) {
            e.preventDefault();
            var data = $(this).serialize();
            console.log(data)
            Swal.fire({
                title: 'Bạn muốn phê duyệt bài viết?',
                icon: 'question',
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
                        data: data,
                        success: function () {
                            $('#btn-approved').submit()
                            window.location.reload('{{ Route('dashboard.index') }}');
                        }
                    })
                    // Swal.fire(
                    //     'Phê duyêt thành công!',
                    // )
                }
            })
        });

        $(document).on('click', '#btn-delete', function (e) {
            e.preventDefault();
            var data = $(this).serialize();
            console.log(data)
            Swal.fire({
                title: 'Bạn muốn xoá bài viết?',
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
                        type: 'POST',
                        data: data,
                        success: function () {
                            $('#btn-delete').submit()
                            window.location.reload('{{ Route('dashboard.index') }}');
                            $.get('{{ Route('mail.delete.post') }}/?id=' + data)
                        }
                    })
                }
            })
        })

        $(document).on('click', '#btn-restore', function (e) {
            e.preventDefault();
            var data = $(this).serialize();
            console.log(data)
            Swal.fire({
                title: 'Bạn có muốn khôi phục bài viết?',
                icon: 'question',
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
                        data: data,
                        success: function () {
                            $('#btn-restore').submit()
                            window.location.reload('{{ Route('dashboard.index') }}');
                            $.get('{{ Route('mail.restore.post') }}/?id=' + data)
                        }
                    })
                }
            })
        })
    });
</script>
