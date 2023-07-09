@extends('layout.layout')
@section('detail')
    </header>

<body>
@include('sweetalert::alert')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<section class="site-section">
    <div class="container" style="background-color: white;padding: 10px;border-radius: 10px;">
        <div class="row align-items-center mb-3">
            <div class="col-lg-8 mb-4 mb-lg-0">
                <div class="d-flex align-items-center">
                    <div class="border p-2 d-inline-block mr-3 rounded">
                        <img src="{{ url('image_avatar/')}}/{{ $post->user->img_avatar}}" width="100" height="100">
                    </div>
                    <div>
                        <p style="color: black;font-weight: bold;font-size: 20px">{{ $post->title }}</p>
                        <div>
                            <span class="ml-0 mr-2 mb-2"><span
                                    class="icon-briefcase"></span> {{ $post->user->name }}</span>
                            <span class="m-2"><span class="icon-room mr-2"></span>{{ $post->workplace }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                @if(!Auth::check())
                    <div class="col-6">
                        <a href="{{ Route('user.login') }}" class="btn btn-block btn-primary btn-md">Đăng nhập</a>
                    </div>
                @elseif(Auth::check() && Auth::user()->id != $post->user_id)
                    <div class="row">
                        <div class="col-6">
                            <a class="btn btn-block btn-light btn-md " role="button" data-toggle="dropdown"
                               aria-expanded="false"><span
                                    class="icon-th-large mr-2 text-danger"></span>Chức năng</a>
                            <div class="dropdown-menu">
                                <button type="submit" id="report_post" class="dropdown-item" data-toggle="modal"
                                        data-target="#modalReportPost">Báo cáo bài viết
                                </button>
                            </div>
                        </div>
                    </div>
                @else

                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div id="detail-post">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="bg-light p-3 border rounded mb-4">
                    <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Chi tiết công việc</h3>
                    <ul class="list-unstyled pl-3 mb-0">
                        <li class="mb-2"><strong class="text-black">Đăng
                                ngày</strong> {{ $post->created_at->format('d-m-Y') }}</li>
                        <li class="mb-2"><strong class="text-black" style="color:red">Số lượng
                                :</strong> {{ $post->quantity }}</li>
                        <li class="mb-2"><strong class="text-black">Chuyên ngành:</strong> {{ $post->major }}
                        </li>
                        <li class="mb-2"><strong class="text-black">Cấp bậc:</strong> {{ $post->position }}
                        <li class="mb-2"><strong class="text-black">Kinh nghiệm:</strong> {{ $post->experience }}
                        <li class="mb-2"><strong class="text-black">Hình thức làm
                                việc:</strong> {{ $post->working }}
                        </li>
                    </ul>
                </div>
            </div>
            @if(!Auth::check())

            @elseif(Auth::check() && Auth::user()->id != $post->user_id)
                <div class="col-6" id="btn-applied">

                </div>
            @endif
        </div>
    </div>
</section>
@include('modal.post.edit')
@include('modal.report.report_post')
<div class="container" style="padding-top:10px">
    <div class="row mb-5 justify-content-center">
        <div class="col-md-7 text-center">
            <h2 class="section-title mb-2">Những công việc có thể bạn quan tâm</h2>
        </div>
    </div>

    <div class="row align-items-center justify-content-center">
        <div class="col-md-12">
            <ul class="job-listings mb-5">
                @foreach($post_majors as $post_major)
                    <li class="job-listing d-block d-sm-flex align-items-center">
                        <a href="{{env('APP_DOMAIN')}}/post/post-detail/{{ $post_major->id }}" data-value=""></a>
                        <div class="job-listing-logo">
                            <img src="{{ url('image_avatar/')}}/{{ $post_major->user->img_avatar}}"
                                 class="img-fluid pt-2 pr-2 pb-2">
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.min.js"></script>
<script>
    $(document).ready(() => {
        let _li = '';
        $.get('http://127.0.0.1:8000/post/post-detail/{{$post->id}}', (res) => {
            var data = res.post;
            console.log(data.requirements)
            _li += '<div class="mb-5">';
            _li += '<h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-align-left mr-3"></span>Mô tả công việc</h3>';
            _li += data.description;
            _li += '</div>';
            _li += '<div class="mb-5">';
            _li += '<h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-align-left mr-3"></span>Lợi ích</h3>';
            _li += ' ' + data.benefit + ' </span>';
            _li += '</div>';
            _li += '<div class="mb-5">';
            _li += '<h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-align-left mr-3"></span>Yêu cầu</h3>';
            _li += ' ' + data.requirements + ' </span>';
            _li += '</div>';
            $('#detail-post').html(_li).first();
        });
    });

    @if(Auth::check() && Auth::user()->role_id == 3)
    $.get('{{ Route('user.applied.post') }}?user_id={{ Auth::user()->id }}&post_id={{ $post->id  }}', function (e) {
        var html = '';
        if (e.result == false) {
            html = '<button type="button" id="UnApplied" value="{{ $post->id }},{{ Auth::user()->id }}" class="btn btn-success btn-block">Huỷ ứng tuyển</button>'
            $('#btn-applied').html(html)
        } else {
            html = '<button type="button" id="Applied" value="{{ $post->id }},{{ Auth::user()->id }}" class="btn btn-success btn-block ">Ứng tuyển ngay</button>'
            $('#btn-applied').html(html)
        }
    })
    @endif

    $('#btn-applied').on('click', '#Applied', function (e) {
        e.preventDefault()
        var text = $(this).text()
        var data = $(this).val().split(',')
        var value = {
            'post_id': data[0],
            'user_id': data[1],
            '_token': '{{ csrf_token() }}'
        }

        if (text == 'Ứng tuyển ngay') {
            $.ajax({
                url: '{{ Route('user.applied.post') }}',
                type: 'GET',
                data: value,
                success: function (res) {
                },
            })
        } else {
            $.ajax({
                url: '{{ Route('user.un.applied.post') }}',
                type: 'GET',
                data: value,
                success: function (res) {
                },
            })
        }

        $(this).text(function (i, v) {
            return v === 'Ứng tuyển ngay' ? 'Huỷ ứng tuyển' : 'Ứng tuyển ngay';
        })
    })

    $('#btn-applied').on('click', '#UnApplied', function (e) {
        e.preventDefault()
        var text = $(this).text()
        var data = $(this).val().split(',')
        var value = {
            'post_id': data[0],
            'user_id': data[1],
            '_token': '{{ csrf_token() }}'
        }
        if (text == 'Ứng tuyển ngay') {
            $.ajax({
                url: '{{ Route('user.applied.post') }}',
                type: 'GET',
                data: value,
                success: function (res) {
                },
            })
        } else {
            $.ajax({
                url: '{{ Route('user.un.applied.post') }}',
                type: 'GET',
                data: value,
                success: function (res) {
                },
            })
        }

        $(this).text(function (i, v) {
            return v === 'Huỷ ứng tuyển' ? 'Ứng tuyển ngay' : 'Huỷ ứng tuyển';
        })
    })

    $('#edit-post-modal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('New message to ' + recipient)
        modal.find('.modal-body input').val(recipient)
    })
</script>
@endsection
