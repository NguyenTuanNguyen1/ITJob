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
                    <img class="rounded-square  mt-5" style="border-radius: 10px;" src="http://surl.li/hgybd"
                        width="200px" height="200px"><span class="font-weight-bold">Amelly</span><span
                        class="text-black-50">amelly12@bbb.com</span><span>
                    </span>
                </div>
            </div>
            <div class="col-md-9 border-right">
                <div class="tab1">
                    <button class="tablinks" onclick="openCity(event, 'London')">Thông tin cá nhân</button>
                    <button class="tablinks" onclick="openCity(event, 'Paris')">Bình luận đánh giá</button>
                    <button class="tablinks" onclick="openCity(event, 'Tokyo')">Đổi mật khẩu</button>
                    <button class="tablinks" onclick="openCity(event, 'France')">Thông tin thêm</button>
                </div>
                <div id="London" class="tabcontent">
                    <div class="p-3 py-5" style="color: black;">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <p class="text-right" style="font-size:30px">Profile Settings</p>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6"><label class="labels">Name</label><input type="text"
                                    class="form-control" placeholder="first name" value=""></div>
                            <div class="col-md-6"><label class="labels">Surname</label><input type="text"
                                    class="form-control" value="" placeholder="surname"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">PhoneNumber</label><input type="text"
                                    class="form-control" placeholder="enter phone number" value=""></div>
                            <div class="col-md-12"><label class="labels">Address</label><input type="text"
                                    class="form-control" placeholder="enter address" value=""></div>
                            <div class="col-md-12"><label class="labels">Email ID</label><input type="text"
                                    class="form-control" placeholder="enter email id" value=""></div>
                            <div class="col-md-12"><label class="labels">Education</label><input type="text"
                                    class="form-control" placeholder="education" value=""></div>
                            <div class="col-md-12"><label class="labels">Education</label><input type="text"
                                    class="form-control" placeholder="education" value=""></div>
                            <div class="col-md-12">
                                <!-- <label class="labels">Education</label><input type="text"
                                class="form-control" placeholder="education" value=""> -->
                                <label class="labels" for="job-region">Chuyên ngành</label>
                                <select class="selectpicker1 border rounded" id="job-region" data-style="btn-black"
                                    data-width="100%" data-live-search="true" title="Select Region" name="major">
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
                            <div class="col-md-12">
                                <!-- <label class="labels">Education</label><input type="text"
                                class="form-control" placeholder="education" value=""> -->
                                <label class="labels" for="job-region">Chuyên ngành</label>
                                <select class="selectpicker1 border rounded" id="job-region" data-style="btn-black"
                                    data-width="100%" data-live-search="true" title="Select Region" name="major">
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
                            <div class="col-md-6"><label class="labels">Country</label><input type="text"
                                    class="form-control" placeholder="country" value=""></div>
                            <div class="col-md-6"><label class="labels">State/Region</label><input type="text"
                                    class="form-control" value="" placeholder="state"></div>
                        </div>
                        <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save
                                Profile</button></div>
                    </div>
                </div>

                <div id="Paris" class="tabcontent">
                    <section class="content-item" id="comments">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12">
                                    <form>
                                        <h3 class="pull-left">New Comment</h3>
                                        <button type="submit" class="btn btn-normal pull-right">Submit</button>
                                        <fieldset>
                                            <div class="row">
                                                <div class="col-sm-3 col-lg-2 hidden-xs">
                                                    <img class="img-responsive"
                                                        src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                                                </div>
                                                <div class="form-group col-xs-12 col-sm-9 col-lg-10">
                                                    <textarea class="form-control" id="message"
                                                        placeholder="Your message" required=""></textarea>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>

                                    <h3>4 Comments</h3>

                                    <!-- COMMENT 1 - START -->
                                    <div class="media">
                                        <a class="pull-left" href="#"><img class="media-object"
                                                src="https://bootdey.com/img/Content/avatar/avatar1.png" alt=""></a>
                                        <div class="media-body">
                                            <h4 class="media-heading">John Doe</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum
                                                dolor sit amet,
                                                consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur
                                                adipiscing elit.
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum
                                                dolor sit amet,
                                                consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur
                                                adipiscing elit.
                                            </p>
                                            <ul class="list-unstyled list-inline media-detail pull-left"
                                                style="display: flex;">
                                                <li><i class="fa fa-calendar"></i>27/02/2014</li>
                                                <li><i class="fa fa-thumbs-up"></i>13</li>
                                            </ul>
                                            <ul class="list-unstyled list-inline media-detail pull-right">
                                                <li class=""><a href="">Like</a></li>

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
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum
                                                dolor sit amet,
                                                consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur
                                                adipiscing elit.
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum
                                                dolor sit amet,
                                                consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur
                                                adipiscing elit.
                                            </p>
                                            <ul class="list-unstyled list-inline media-detail pull-left"
                                                style="display: flex;">
                                                <li><i class="fa fa-calendar"></i>27/02/2014</li>
                                                <li><i class="fa fa-thumbs-up"></i>13</li>
                                            </ul>
                                            <ul class="list-unstyled list-inline media-detail pull-right">
                                                <li class=""><a href="">Like</a></li>

                                            </ul>
                                        </div>
                                    </div>
                                    <!-- COMMENT 2 - END -->

                                    <!-- COMMENT 3 - START -->
                                    <div class="media">
                                        <a class="pull-left" href="#"><img class="media-object"
                                                src="https://bootdey.com/img/Content/avatar/avatar3.png" alt=""></a>
                                        <div class="media-body">
                                            <h4 class="media-heading">John Doe</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum
                                                dolor sit amet,
                                                consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur
                                                adipiscing elit.
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum
                                                dolor sit amet,
                                                consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur
                                                adipiscing elit.
                                            </p>
                                            <ul class="list-unstyled list-inline media-detail pull-left"
                                                style="display: flex;">
                                                <li><i class="fa fa-calendar"></i>27/02/2014</li>
                                                <li><i class="fa fa-thumbs-up"></i>13</li>
                                            </ul>
                                            <ul class="list-unstyled list-inline media-detail pull-right">
                                                <li class=""><a href="">Like</a></li>

                                            </ul>
                                        </div>
                                    </div>
                                    <!-- COMMENT 3 - END -->

                                    <!-- COMMENT 4 - START -->
                                    <div class="media">
                                        <a class="pull-left" href="#"><img class="media-object"
                                                src="https://bootdey.com/img/Content/avatar/avatar4.png" alt=""></a>
                                        <div class="media-body">
                                            <h4 class="media-heading">John Doe</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum
                                                dolor sit amet,
                                                consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur
                                                adipiscing elit.
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum
                                                dolor sit amet,
                                                consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur
                                                adipiscing elit.
                                            </p>
                                            <ul class="list-unstyled list-inline media-detail pull-left"
                                                style="display: flex;">
                                                <li><i class="fa fa-calendar"></i>27/02/2014</li>
                                                <li><i class="fa fa-thumbs-up"></i>13</li>
                                            </ul>
                                            <ul class="list-unstyled list-inline media-detail pull-right">
                                                <li class=""><a href="">Like</a></li>

                                            </ul>
                                        </div>
                                    </div>
                                    <!-- COMMENT 4 - END -->

                                </div>
                            </div>
                        </div>
                    </section>
                </div>

                <div id="Tokyo" class="tabcontent">
                    <p>Đổi mật khẩu</p>
                </div>
                <div id="France" class="tabcontent">
                    <p>Thông tin thêm</p>
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

</html>