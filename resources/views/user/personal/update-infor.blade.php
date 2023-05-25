<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @include('layout.page-css')
</head>

<body>
@include('sweetalert::alert')
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <form action="{{ Route('user.update.basic') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-square  mt-5" style="border-radius: 10px;"
                         src="{{ url('Images/')}}/{{ Auth::user()->img_avatar }}"
                         width="200px" height="200px">
                    <input type="text" name="name" value="{{ Auth::user()->name }}" required>
                    <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                    <button class="btn btn-sm btn-outline-success btn-round btn-icon" id="test">
                        <i class="fa fa-edit"></i>
                    </button>
                </div>
            </form>
        </div>
        <div class="col-md-9 border-right">
            <div class="tab1">
                <button class="tablinks" onclick="openCity(event, 'London')">Thông tin cá nhân</button>
                <button class="tablinks" onclick="openCity(event, 'France')">Thông tin thêm</button>
                <button class="tablinks" onclick="openCity(event, 'Paris')">Bình luận đánh giá</button>
            </div>

            <div id="London" class="tabcontent">
                <div class="p-3 py-5" style="color: black;">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <p class="text-right" style="font-size:30px">Chỉnh sửa thông tin cá nhân</p>
                    </div>
                    <form action="{{ Route('user.update') }}" method="post">
                        @csrf
                        <div id="profile">
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
                                    <label for="job-region">Chuyên ngành</label><br>
                                    <select class="selectpicker border rounded" style="width: 40%; padding: 10px;"
                                            id="job-region" data-style="btn-black"
                                            data-width="100%" data-live-search="true" title="Select Region"
                                            name="major">
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
                                    <select class="selectpicker border rounded" style="width: 40%; padding: 10px;"
                                            id="job-region" data-style="btn-black"
                                            data-width="100%" data-live-search="true" title="Select Region"
                                            name="position">
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
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Địa chỉ</label>
                                        <input type="text" class="form-control" name="address"
                                               value="{{ $user->address }}">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Mô tả</label>
                                        <textarea class="form-control textarea"
                                                  name="description">{{ $user->description }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary profile-button" type="submit">Chỉnh sửa</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id="Paris" class="tabcontent">
            <section class="content-item" id="comments">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <form action="{{ Route('review.create') }}" method="post" class="content-review">
                                @csrf
                                <button type="submit" class="btn btn-normal pull-right">Gửi</button>
                                <div class="row">
                                    <div class="col-sm-3 col-lg-2 hidden-xs">
                                        <img class="img-responsive" src="" alt="">
                                    </div>
                                    <div class="form-group col-xs-12 col-sm-9 col-lg-10">
                                        <textarea class="form-control" name="content" id="content" required></textarea>
                                    </div>
                                    <input name="from_user_id" type="hidden" id="from_user_id"
                                           value="{{ Auth::user()->id }}">
                                    <input name="to_user_id" type="hidden" id="to_user_id" value="{{ $user->id }}">
                                    <input name="id" type="hidden" id="id" value="{{ Auth::user()->id }}">
                                </div>
                            </form>

                            <h3>{{ $count_review }} bình luận</h3>

                            <div id="load-reviews">

                            </div>
                            @foreach($reviews as $review)
                                <div class="media">
                                    <a class="pull-left" href="">
                                        <img class="media-object"
                                             src="{{ url('Images') }}/{{ $review->from_user->img_avatar }}" alt="">
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">{{ $review->from_user->name }}</h4>
                                        <p>{{ $review->content }}</p>
                                        <ul class="list-unstyled list-inline media-detail pull-left"
                                            style="display: flex;">
                                            <li><i class="fa fa-calendar"></i>{{ $review->created_at->format('d-m-Y') }}
                                            </li>
                                            <li><i class="fa fa-thumbs-up"></i>13</li>
                                        </ul>
                                        <ul class="list-unstyled list-inline media-detail pull-right">
                                            <li class=""><a href="">Like</a></li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <div class="col-md-9 border-right">
            <div id="France" class="tabcontent">
                <div class="p-3 py-5" style="color: black;">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <p class="text-right" style="font-size:30px">Thông tin thêm</p>
                    </div>
                    <div class="row mt-3">
                        @foreach($information as $infor)
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ $infor->type->content }}</label>
                                    <input type="text" class="form-control" name="username"
                                           value="{{ $infor->content }}">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <form action="{{ Route('user.update.information') }}" method="post">
                            @csrf
                            <select class="selectpicker border rounded" style="width: 40%; padding: 10px;"
                                    id="job-region" data-style="btn-black"
                                    data-width="100%" data-live-search="true" title="Select Region" name="type_id">
                                @foreach($type_infor as $type)
                                    <option value="{{ $type->id }}">{{ $type->content }}</option>
                                @endforeach
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="content"
                                               style="width: 40%; padding: 10px;"
                                               name="content" required>
                                    </div>
                                </div>
                            </select>
                            <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary profile-button"> Cập nhật thông tin
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

    $(document).ready(() => {
        // $("#content").validate({
        //     rule: {
        //         content: "required"
        //     },
        //     messages: {
        //         content: "Vui lòng nhập nội dung"
        //     },
        //     errorElement: "p",
        //     errorPlacement: function (error, element) {
        //         var placement = $(element).data("error");
        //         if (placement) {
        //             $(placement).append(error);
        //         } else {
        //             error.insertAfter(element);
        //         }
        //     },
        // });
        load_data()

        $(".content-review").validate({
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

        $('.content-review').submit(function (e) {
            e.preventDefault();
            var data = {
                "_token": "{{ csrf_token() }}",
                "content": $('#content').val(),
                "from_user_id": $('#from_user_id').val(),
                "to_user_id": $('#to_user_id').val(),
                "id": $('#id').val()
            }
            $.ajax({
                url: "{{ Route('review.create') }}",
                type: 'POST',
                data: data,
                success: function (res) {
                    load_data()
                }
            })
        })

        function load_data() {
            var _li = '';
            $.get('http://itjob.vn/user/user-profile/{{Auth::user()->id}}', (res) => {
                var data = res.reviews;
                console.log(data)
                data.forEach(function (item) {
                    _li += '<div class="media" >'
                    _li += '<a class="pull-left" href="">';
                    _li += '<img class="media-object" src="{{ url('Images/') }}/' + item.from_user.img_avatar + '" alt="">';
                    _li += '</a>';
                    _li += '<div class="media-body">';
                    _li += '<h4 class="media-heading">' + item.from_user.name + '</h4>';
                    _li += '<p>' + item.content + '</p>';
                    _li += '<ul class="list-unstyled list-inline media-detail pull-left" style="display: flex;">';
                    _li += '<li><i class="fa fa-calendar"></i>';
                    _li += item.created_at;
                    _li += '</li>';
                    _li += '</ul>'
                    _li += '</div>';
                    _li += '</div>';
                    $('#load-reviews').html(_li);
                })
            });
        }
    });
</script>

</html>
