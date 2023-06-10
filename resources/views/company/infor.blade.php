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
                <img style="border-radius:5px;" src="{{ url('image_avatar/') }}/{{ $user->img_avatar }}" width="200px" height="200px">
                <div class="d-flex align-items-center text-center p-1 py-3">
                    <label>{{ $user->name }}</label>
                </div>
            </div>
        </div>
        <div class="col-md-9 border-right">
            <div class="p-3 py-5">
                <div class="tab" style="display:flex;">
                    <button class="tablinks" onclick="openCity(event, 'London')">Thông tin cá nhân</button>
                    @if($user->role_id == 2)
                    <button class="tablinks" onclick="openCity(event, 'VietNam')">Thông tin công ty</button>
                    @endif
                    <button class="tablinks" onclick="openCity(event, 'Paris')">Thông tin thêm</button>
                    <button class="tablinks" onclick="openCity(event, 'Tokyo')">Bình luận đánh giá</button>
                </div>

                <div id="London" class="tabcontent" style="display:block">
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tên đăng nhập</label><br>
                                <label style="font-weight: 900;">{{ $user->username }}</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Số điện thoại</label><br>
                                <label style="font-weight: 900;">{{ $user->phone }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label>Email</label><br>
                            <label style="font-weight: 900;">{{ $user->email }}</label>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label>Địa chỉ</label><br>
                            <label style="font-weight: 900;">{{ $user->address }}</label>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label for="job-region">Chuyên ngành</label><br>
                            <label style="font-weight: 900;">{{ $user->major }}</label>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label for="job-region">Vị trí</label><br>
                            <label style="font-weight: 900;">{{ $user->position }}</label>
                        </div>
                    </div>
                </div>
                @if($user->role_id == 2)
                    <div id="VietNam" class="tabcontent" style="display:block">
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Trụ sở chính : </label>
                                    <label style="font-weight: bold">{{ $company->headquarters }}</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Số nhân viên : </label><br>
                                    <label style="font-weight: bold">{{ $company->staff }}</label><br>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label>Mã số thuế : </label>
                                <label style="font-weight: bold">{{ $company->taxcode }}</label>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label>Mô tả : </label>
                                <label style="font-weight: bold">{{ $company->description }}</label>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label>Website : </label>
                                <label style="font-weight: bold"><a
                                        href="{{ $company->website }}">{{ $company->website }}</a></label><br>
                            </div>
                        </div>
                    </div>
                @endif
                <div id="Paris" class="tabcontent">
                    <div class="row" id="load-information">
                        <div class="col-md-12">
                            @foreach($information as $infor)
                                <label class="mt-4">{{ $infor->type->content }}</label><br>
                                <label style="font-weight: 900;">{{ $infor->content }}</label>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div id="Tokyo" class="tabcontent">
                    <section class="content-item" id="comments">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12">
                                    @if(!Auth::check())
                                        <button type="submit" class="btn btn-success pull-right"><a
                                                href="{{ Route('user.login') }}" style="color: white">Đăng nhập</a>
                                        </button>
                                    @elseif(Auth::user()->id != $user->id)
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
                                                             src="{{ url('image_avatar/') }}/{{ Auth::user()->img_avatar }}"
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
                                    @else

                                    @endif
                                </div>
                            </div>
                        </div>
                    </section>
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

        $('#create-review').submit(function (e) {
            e.preventDefault();
            var value = {
                "content": $("#message").val(),
                {{--"from_user_id": {{ Auth::user()->id }},--}}
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
            $.get('http://itjob.vn/profile/profile/{{ $user->id}}', (res) => {
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
