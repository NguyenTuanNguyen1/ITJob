@extends('layout.layout')
@section('content')
    {{--@include('layout.page-css')--}}
    <!-- CSS Files -->
    {{--<link href="{{ url('profile/css/bootstrap.min.css')  }}" rel="stylesheet" />--}}
    {{--<link href="{{ url('profile/css/paper-dashboard.css?v=2.0.1')  }}" rel="stylesheet" />--}}
    <link href="{{ url('profile/demo/demo.css')  }}" rel="stylesheet"/>
    <div class="row">
        <div class="col-md-4">
            <div class="card card-user">
                <div class="card-body">
                    <div class="author">
                            <img class="avatar border-gray" src="{{ url('Images/')}}/{{ $user->img_avatar }}" alt="...">
                            <h5 class="title">{{ $user->name }}</h5>
                    </div>
                    <p> {{ $user->position }} </p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <ul class="list-unstyled team-members">
                        <li>
                            <div class="row">
                                <div class="col-md-7 col-7">
                                    DJ Khaled
                                </div>
                                <div class="col-md-3 col-3 text-right">
{{--                                    <btn class="btn btn-sm btn-outline-success btn-round btn-icon" id="test"><i--}}
{{--                                            class="fa fa-linkedin"></i></btn>--}}
{{--                                    <button class="btn btn-sm btn-outline-success btn-round btn-icon" id="test">--}}
{{--                                        <i class="fa fa-linkedin"></i>--}}
                                    </button>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card card-user">
                <div class="card-header">
                    <h5 class="card-title">Thông tin cá nhân</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="col-md-5 pr-1">
                                <div class="form-group">
                                    <label>Tên đăng nhập</label>
                                    <input type="text" class="form-control" name="username" value="{{ $user->username }}">
                                </div>
                            </div>
                            <div class="col-md-4 pl-1">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5 pr-1">
                                <div class="form-group">
                                    <label>Địa chỉ</label>
                                    <input type="text" class="form-control" name="address" value="{{ $user->address }}">
                                </div>
                            </div>
                            <div class="col-md-4 pl-1">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Lĩnh vực</label>
                                    <input type="email" class="form-control" name="email" value="{{ $user->major }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Mô tả</label>
                                    <textarea class="form-control textarea">{{ $user->description }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="card-header">
                            <h5 class="card-title">Thông tin thêm</h5>
                        </div>
                        <div class="card-body" id="information">
{{--                            @foreach($information as $info)--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-5 pr-1">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label>{{$info->type->content}} :</label>--}}
{{--                                            <input type="text" class="form-control" name="content" value="{{$info->content}}">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endforeach--}}
                        </div>

                        <div class="row">
                            <div class="update ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary btn-round">Chỉnh sửa thông tin</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('layout.page-js')

    <script>
        $(document).ready(() => {
            let _li = '';
            $('#test').click(function (res) {
                console.log(123);
            })

            load_data()

            function load_data() {
                $.get('http://itjob.vn/user/user-profile/{{Auth::user()->id}}', (res) => {
                    var data = res.information;
                    console.log(data)
                    data.forEach(function (item) {
                        _li += '<div class="row">';
                        _li += '<div class="col-md-5 pr-1">';
                        _li += '<div class="form-group">';
                        _li += '<label>' + item.type.content + ' :</label>';
                        _li += '<input type="text" class="form-control" name="content" value="' + item.content + '">'
                        _li += '<button class="btn btn-sm btn-outline-success btn-round btn-icon" id="test"> <i class="fa fa-linkedin"></i>'
                        _li += '</div>';
                        _li += '</div>';
                        _li += '</div>'
                        $('#information').html(_li).first();
                    })
                });
            }


        });
    </script>
@endsection
