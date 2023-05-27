<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @include('layout.page-css')

</head>
<style>
    .content-item {
        padding: 30px 0;
        background-color: #FFFFFF;
    }

    .content-item.grey {
        background-color: #F0F0F0;
        padding: 50px 0;
        height: 100%;
    }

    .content-item h2 {
        font-weight: 700;
        font-size: 35px;
        line-height: 45px;
        text-transform: uppercase;
        margin: 20px 0;
    }

    .content-item h3 {
        font-weight: 400;
        font-size: 20px;
        color: #555555;
        margin: 10px 0 15px;
        padding: 0;
    }

    .content-headline {
        height: 1px;
        text-align: center;
        margin: 20px 0 70px;
    }

    .content-headline h2 {
        background-color: #FFFFFF;
        display: inline-block;
        margin: -20px auto 0;
        padding: 0 20px;
    }

    .grey .content-headline h2 {
        background-color: #F0F0F0;
    }

    .content-headline h3 {
        font-size: 14px;
        color: #AAAAAA;
        display: block;
    }


    #comments {
        box-shadow: 0 -1px 6px 1px rgba(0, 0, 0, 0.1);
        background-color: #FFFFFF;
    }

    #comments form {
        margin-bottom: 30px;
    }

    #comments .btn {
        margin-top: 7px;
    }

    #comments form fieldset {
        clear: both;
    }

    #comments form textarea {
        height: 100px;
    }

    #comments .media {
        border-top: 1px dashed #DDDDDD;
        padding: 20px 0;
        margin: 0;
    }

    #comments .media > .pull-left {
        margin-right: 20px;
    }

    #comments .media img {
        max-width: 100px;
    }

    #comments .media h4 {
        margin: 0 0 10px;
    }

    #comments .media h4 span {
        font-size: 14px;
        float: right;
        color: #999999;
    }

    #comments .media p {
        margin-bottom: 15px;
        text-align: justify;
    }

    #comments .media-detail {
        margin: 0;
    }

    #comments .media-detail li {
        color: #AAAAAA;
        font-size: 12px;
        padding-right: 10px;
        font-weight: 600;
    }

    #comments .media-detail a:hover {
        text-decoration: underline;
    }

    #comments .media-detail li:last-child {
        padding-right: 0;
    }

    #comments .media-detail li i {
        color: #666666;
        font-size: 15px;
        margin-right: 10px;
    }
</style>
<body>
@include('sweetalert::alert')
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <form action="{{ Route('user.update.basic') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="container1" id="imgBox">
                        <label for="file">
                            <img src="{{ url('image_avatar/') }}/{{ Auth::user()->img_avatar }}" width="200px"
                                 height="200px">
                        </label>
                        <input type="file" name="img_avatar" id="file" onchange="loadFile(event)">
                    </div>
                    <div class="d-flex align-items-center text-center p-1 py-3">
                        <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                        <input type="text" name="name" value="{{ $user->name }}" id=""
                               style="border-radius:5px;margin-right:4px">
                        <button class="btn btn-sm btn-outline-success btn-round btn-icon" id="test">
                            <i class="fa fa-edit"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-9 border-right">
            <div class="p-3 py-5">
                <div class="tab" style="display:flex;">
                    <button class="tablinks" onclick="openCity(event, 'London')">Thông tin cá nhân</button>
                    <button class="tablinks" onclick="openCity(event, 'Paris')">Thông tin thêm</button>
                    <button class="tablinks" onclick="openCity(event, 'Tokyo')">Bình luận đánh giá</button>
                    <button class="tablinks" onclick="openCity(event, 'France')">Đổi mật khẩu</button>
                </div>

                <div id="London" class="tabcontent" style="display:block">
                    <form action="{{ Route('user.update') }}" method="post">
                        @csrf
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tên đăng nhập</label>
                                    <input type="text" class="form-control" name="username"
                                           value="{{ $user->username }}">
                                </div>
                                @error('username')
                                <div style="color:red;">{{ $message }}</div>
                                <br>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Số điện thoại</label>
                                    <input type="text" class="form-control" name="phone" value="{{ $user->phone }}">
                                </div>
                                @error('phone')
                                <div style="color:red;">{{ $message }}</div>
                                <br>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" value="{{ $user->email }}">
                                @error('email')
                                <div style="color:red;">{{ $message }}</div>
                                <br>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label>Địa chỉ</label>
                                <input type="text" class="form-control" name="address" value="{{ $user->address }}">
                                @error('address')
                                <div style="color:red;">{{ $message }}</div>
                                <br>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label for="job-region">Chuyên ngành</label><br>
                                <select class="selectpicker border rounded" style=" padding: 10px;" id="job-region"
                                        data-style="btn-black" data-width="100%" data-live-search="true"
                                        title="Select Region" name="major">
                                    <option>IT/ Công nghệ phần mềm</option>
                                    <option>Kế toán</option>
                                    <option>Makerting</option>
                                    <option>Chế tạo máy</option>
                                    <option>Điện/ Điện tử</option>
                                    <option>Báo chí/ Truyền hình</option>
                                    <option>Bất động sản</option>
                                    <option>Công nghệ Ô tô</option>
                                    <option>Cơ khí</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label for="job-region">Vị trí</label><br>
                                <select class="selectpicker border rounded" style="padding: 10px;" id="job-region"
                                        data-style="btn-black" data-width="100%" data-live-search="true"
                                        title="Select Region" name="position">
                                    <option>Thực tập sinh</option>
                                    <option>Nhân viên</option>
                                    <option>Phó phòng</option>
                                    <option>Trưởng phòng</option>
                                    <option>Trợ lý</option>
                                    <option>Thư ký</option>
                                    <option>Giám Đốc</option>
                                    <option>Quản lý</option>
                                </select>
                            </div>
                        </div>

                        <div class="mt-5 text-center">
                            <button class="btn btn-primary profile-button"
                                    type="submit">Lưu
                                thông tin
                            </button>
                        </div>
                    </form>
                </div>

                <div id="Paris" class="tabcontent">
                    <div class="row" id="load-information">
                        <div class="col-md-12">
                            @foreach($type_infor as $type)
                                <form action="{{ Route('user.update.information') }}" method="post">
                                    @csrf
                                    <div class="d-flex" style="justify-content:space-between;">
                                        <label class="mt-4">{{ $type->content }}</label>
                                        <div>
                                            <button class="btn btn-sm btn-outline-success btn-round btn-icon mb-2 mt-4"
                                                    id="btn-infor"><i class="fa fa-edit"></i></button>
                                        </div>
                                    </div>
                                    <input type="hidden" class="form-control" name="id" value="{{ $user->id }}">
                                    <input type="hidden" class="form-control" name="type_id" value="{{ $type->id }}">

                                    @if($information->isNotEmpty())
                                        @foreach($information as $infor)
                                            @if($infor->type_id == $type->id)
                                                <input type="text" class="form-control" name="content"
                                                       value="{{ $infor->content }}">
                                            @else
                                                <input type="text" class="form-control" name="content"
                                                       value="">
                                            @endif
                                        @endforeach
                                    @else
                                        <input type="text" class="form-control" name="content" value="">
                                    @endif
                                </form>
                            @endforeach
                        </div>
                    </div>
                    {{--                    <div class="row mt-3 d-block">--}}
                    {{--                        <div class="col-md-12">--}}
                    {{--                            <label for="job-region">Thông tin thêm</label><br>--}}
                    {{--                            <form method="post" id="add-infor">--}}
                    {{--                                <div style="display:flex;justify-content: space-between">--}}
                    {{--                                    <select class="selectpicker border rounded" style="width: 50%; padding: 5px"--}}
                    {{--                                            id="information_type"--}}
                    {{--                                            data-style="btn-black" data-width="100%" data-live-search="true"--}}
                    {{--                                            title="Select Region">--}}
                    {{--                                        <input style="margin-left: 30px" type="text" id="content-information"--}}
                    {{--                                               class="form-control" name="content" value="" required>--}}
                    {{--                                    </select>--}}
                    {{--                                </div>--}}
                    {{--                                <div class="mt-3 text-center">--}}
                    {{--                                    <button class="btn btn-primary profile-button" type="submit">Lưu thông tin--}}
                    {{--                                    </button>--}}
                    {{--                                </div>--}}
                    {{--                            </form>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}

                </div>

                <div id="Tokyo" class="tabcontent">
                    <section class="content-item" id="comments">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h3>{{ $count_review }} bình luận</h3>
                                    <div id="load_review">
                                    </div>
                                    <hr>
                                    <form id="create-review">
                                        <h3 class="pull-left">Bình luận mới</h3>
                                        <fieldset>
                                            <div class="row">
                                                <div class="col-sm-3 col-lg-2 hidden-xs">
                                                    <img class="img-responsive"
                                                         src="{{ url('Images/') }}/{{ Auth::user()->img_avatar }}"
                                                         alt="">
                                                </div>
                                                <div class="form-group col-xs-12 col-sm-9 col-lg-10">
                                                    <textarea class="form-control" id="message"
                                                              placeholder="Bình luận tại đây" required=""></textarea>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <button type="submit" class="btn btn-success pull-right">Đăng</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div>
                    <div id="France" class="tabcontent">
                        <div class="col mt-3">
                            <form action="" method="post">
                                <div class="col-md-6" style="margin-left:25%">
                                    <label>Nhập mật khẩu hiện tại</label>
                                    <input type="password" class="inputpass" name="email" value="">
                                    @error('email')
                                    <div style="color:red;">{{ $message }}</div>
                                    <br>
                                    @enderror
                                </div>
                                <div class="col-md-6" style="margin-left:25%">
                                    <label>Nhập mật khẩu mới</label>
                                    <input type="password" class="inputpass" name="email" value="">
                                    @error('email')
                                    <div style="color:red;">{{ $message }}</div>
                                    <br>
                                    @enderror
                                </div>
                                <div class="col-md-6" style="margin-left:25%">
                                    <label>Nhập lại mật khẩu mới</label>
                                    <input type="password" class="inputpass" name="email" value="">
                                    @error('email')
                                    <div style="color:red;">{{ $message }}</div>
                                    <br>
                                    @enderror
                                </div>
                                <div class="mt-2 text-center">
                                    <button class="btn btn-primary profile-button"
                                            type="button">Xác nhận
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
</body>
@include('layout.page-js')
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script>
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>
<script>
    var imgBox = document.getElementById("imgBox");

    var loadFile = function (event) {
        imgBox.style.backgroundImage = "url(" + URL.createObjectURL(event.target.files[0]) + ")";
    }

    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    $(document).ready(() => {
        load_review()


        $("#content-information").validate({
            rule: {
                content: "required"
            },
            messages: {
                content: "Vui lòng nhập nội dung"
            },
            errorElement: "p",
            errorPlacement: function (error, element) {
                var placement = $(element).data("error");
                if (placement) {
                    $(placement).append(error);
                } else {
                    error.insertAfter(element);
                }
            },
        });

        function load_information() {
            var _li = '';
            var _ht = '';
            $.get('http://itjob.vn/user/user-profile/{{Auth::user()->id}}', (res) => {
                var data = res.type_infor;
                var type = res.information;
                console.log(type);
                data.forEach(function (item) {
                    _li += '<div class="col-md-12 m-3">'
                    _li += '    <div class="d-flex m-0" style="justify-content:space-between;">';
                    _li += '        <label>' + item.content + '</label>';
                    _li += '            <div>';
                    _li += '                <button class="btn btn-sm btn-outline-success btn-round btn-icon mb-3" id="btn-infor"> <i class="fa fa-edit"></i></button>';
                    _li += '                <button class="btn btn-sm btn-outline-success btn-round btn-icon mb-3" id="btn-infor"> <i class="fas fa-trash-alt"></i></button>';
                    _li += '            </div>';
                    _li += '    </div>';
                    _li += '<input type="text" class="form-control" name="content" value="">';
                    _li += '</div>';
                    $('#load-information').html(_li);
                })
            });
        }

        $('#delete-information').click(function (res) {
            alert('hello');
        })

        $('#add-infor').submit(function (e) {
            e.preventDefault();
            var value = {
                "id": {{ Auth::user()->id }},
                "content": $("#content-information").val(),
                "type_id": $("#information_type option:selected").val(),
                "_token": "{{ csrf_token() }}",
            }
            $.ajax({
                url: '{{ Route('user.update.information') }}',
                type: 'POST',
                data: value,
                success: function (res) {
                    load_information()
                }
            })
        })

        $('#create-review').submit(function (e) {
            e.preventDefault();
            var value = {
                "content": $("#message").val(),
                "from_user_id": {{ Auth::user()->id }},
                "to_user_id": {{ $user->id }},
                "_token": "{{ csrf_token() }}",
            }
            $.ajax({
                url: '{{ Route('review.create') }}',
                type: 'POST',
                data: value,
                success: function (res) {
                    load_review();
                }
            })
        })

        function load_review() {
            var _li = '';
            $.get('http://itjob.vn/user/user-profile/{{Auth::user()->id}}', (res) => {
                var data = res.reviews;
                data.forEach(function (item) {
                    _li += '<div class="media">';
                    _li += '<a class="pull-left" href="#"><img class="media-object" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt=""></a>';
                    _li += '<div class="media-body">';
                    _li += '<h4 class="media-heading">' + item.from_user_id + '</h4>';
                    _li += '<p>' + item.content + '</p>';
                    _li += '<ul class="list-unstyled list-inline media-detail pull-left" style="display: flex;">';
                    _li += '<li><i class="fa fa-calendar"></i>' + item.created_at + '</li>'
                    _li += '</ul>';
                    _li += '</div>'
                    _li += '</div>'
                    $('#load_review').html(_li);
                })
            });
        }
    });
</script>

</html>
