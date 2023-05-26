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
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <div class="container1" id="imgBox">
                        <input type="file" name="image" id="file" onchange="loadFile(event)">
                        <label for="file">
                            <img src="http://127.0.0.1:8000/board-master/images/upload.png" class="upload-icon">
                        </label>
                    </div>
                    <div class="d-flex align-items-center text-center p-1 py-3">
                        <input type="text" name="name" value="Quang Thịnh Trần Lê" id=""
                            style="border-radius:5px;margin-right:4px">
                        <button class="btn btn-sm btn-outline-success btn-round btn-icon" id="test">
                            <i class="fa fa-edit"></i>
                        </button>
                    </div>
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
                        <form action="" method="post">
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
                                    @error('email')
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

                            <div class="mt-5 text-center"><button class="btn btn-primary profile-button"
                                    type="button">Lưu
                                    thông tin</button>
                            </div>
                        </form>
                    </div>

                    <div id="Paris" class="tabcontent">
                        <form action="" method="post">


                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <div class="d-flex" style="justify-content:space-between;">
                                        <label>Email</label>
                                        <div>
                                            <button class="btn btn-sm btn-outline-success btn-round btn-icon mb-3"
                                                id="test">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-success btn-round btn-icon mb-3"
                                                id="test">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </div>

                                    </div>

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
                            <div class="mt-5 text-center"><button class="btn btn-primary profile-button"
                                    type="button">Lưu
                                    thông tin</button>
                            </div>
                        </form>
                    </div>

                    <div id="Tokyo" class="tabcontent">
                        <section class="content-item" id="comments">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <form>
                                            <h3 class="pull-left">Bình luận mới</h3>
                                            <button type="submit" class="btn btn-success pull-right">Đăng</button>
                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-sm-3 col-lg-2 hidden-xs">
                                                        <img class="img-responsive"
                                                            src="https://bootdey.com/img/Content/avatar/avatar1.png"
                                                            alt="">
                                                    </div>
                                                    <div class="form-group col-xs-12 col-sm-9 col-lg-10">
                                                        <textarea class="form-control" id="message"
                                                            placeholder="Bình luận tại đây" required=""></textarea>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </form>

                                        <h3>4 Bình luận</h3>

                                        <!-- COMMENT 1 - START -->
                                        <div class="media">
                                            <a class="pull-left" href="#"><img class="media-object"
                                                    src="https://bootdey.com/img/Content/avatar/avatar1.png" alt=""></a>
                                            <div class="media-body">
                                                <h4 class="media-heading">John Doe</h4>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                                                <ul class="list-unstyled list-inline media-detail pull-left"
                                                    style="display: flex;">
                                                    <li><i class="fa fa-calendar"></i>27/02/2014</li>
                                                    <li><i class="fa fa-thumbs-up"></i>13</li>
                                                </ul>
                                                <ul class="list-unstyled list-inline media-detail pull-right">
                                                    <li class=""><a href="">Thích</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- COMMENT 1 - END -->

                                        <!-- COMMENT 2 - START -->
                                        <div class="media">
                                            <a class="pull-left" href="#"><img class="media-object"
                                                    src="https://bootdey.com/img/Content/avatar/avatar2.png" alt=""></a>
                                            <div class="media-body">
                                                <h4 class="media-heading">John Doe</h4>
                                                <p>Lorem ipsum dolor </p>
                                                <ul class="list-unstyled list-inline media-detail pull-left"
                                                    style="display: flex;">
                                                    <li><i class="fa fa-calendar"></i>27/02/2014</li>
                                                    <li><i class="fa fa-thumbs-up"></i>13</li>
                                                </ul>
                                                <ul class="list-unstyled list-inline media-detail pull-right">
                                                    <li class=""><a href="">Thích</a></li>

                                                </ul>
                                            </div>
                                        </div>
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
                                    <div class="mt-2 text-center"><button class="btn btn-primary profile-button"
                                            type="button">Xác nhận</button></div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    </div>
    </div>
    </div>
</body>
@include('layout.page-js')
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
var loadFile = function(event) {
    imgBox.style.backgroundImage = "url(" + URL.createObjectURL(event.target.files[0]) + ")";
}
</script>

</html>