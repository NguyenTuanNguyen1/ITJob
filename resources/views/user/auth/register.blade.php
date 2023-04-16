<!DOCTYPE html>
<html lang="en">

<head>
    <title>ĐĂNG KÝ</title>
    <script type="application/x-javascript">
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
    </script>
    @include('layout.page-css')
</head>

<style>
body {
    font-family: Arial;
}

/* Style the tab */
.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
    width: 50%;
}

/* Change background color of buttons on hover */
.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
}

/**
 * FilePond Custom Styles
 */
.filepond--drop-label {
    color: #4c4e53;
}

.filepond--label-action {
    text-decoration-color: #babdc0;
}

.filepond--panel-root {
    border-radius: 2em;
    background-color: #edf0f4;
    height: 1em;
}

.filepond--item-panel {
    background-color: #595e68;
}

.filepond--drip-blob {
    background-color: #7f8a9a;
}
</style>

<body>
    <!--header-->
    <div class="header-w3l">
        <h1>Đăng ký</h1>
    </div>
    <!--//header-->

    <!--main-->
    <div class="main-w3layouts-agileinfo">
        <!--form-stars-here-->
        <div class="wthree-form">
            <h2>Điền đầy đủ các thông tin trước khi đăng ký</h2>
            <div class="tab">
                <button class="tablinks" onclick="openCity(event, 'London')">Nhà tuyển dụng</button>
                <button class="tablinks" onclick="openCity(event, 'Paris')">Ứng viên</button>
            </div>

            <div id="London" class="tabcontent">

                <form action="{{ route('.handle-Register') }}" method="post">
                    @csrf
                    <div class="form-sub-w3">
                        <input type="text" name="name" placeholder="Tên doanh nghiệp" />
                    </div>
                    @error('name')
                    <div style="color:red;">{{ $message }}</div><br>
                    @enderror
                    <div class="form-sub-w3">
                        <input type="text" name="email" placeholder="Email" />
                    </div>
                    @error('email')
                    <div style="color:red;">{{ $message }}</div><br>
                    @enderror
                    <div class="form-sub-w3">
                        <input type="text" name="phone" placeholder="Số điện thoại" />
                    </div>
                    @error('phone')
                    <div style="color:red;">{{ $message }}</div><br>
                    @enderror
                    <div class="form-sub-w3">
                        <input type="text" name="tax-code" placeholder="Mã số thuế" />
                    </div>
                    <div class="form-sub-w3">
                        <input type="text" name="nameuser" placeholder="Tên hiển thị" />
                    </div>
                    <div class="form-sub-w3">
                        <input type="text" name="username" placeholder="Tên đăng nhập " />
                    </div>
                    @error('username')
                    <div style="color:red;">{{ $message }}</div><br>
                    @enderror
                    <div class="form-sub-w3">
                        <input type="password" name="password" placeholder="Mật khẩu " />
                    </div>
                    @error('password')
                    <div style="color:red;">{{ $message }}</div><br>
                    @enderror
                    <div class="form-sub-w3">
                        <input type="password" name="password_confirmation" placeholder="Nhập lại mật khẩu " />
                    </div>
                    @error('password_confirmation')
                    <div style="color:red;">{{ $message }}</div><br>
                    @enderror
                    @if(session('Error'))
                    <p style="color:red">{{session('Error')}}</p>
                    @endif
                    <div class="clear"></div>
                    <label for="">Thêm ảnh đại diện:</label>
                    <!--The classic file input element we'll enhance to a file pond-->
                    <input type="file" class="filepond" name="filepond" multiple data-max-file-size="3MB"
                        data-max-files="3" />
                    <!-- file upload itself is disabled in this pen -->
                    <div class="submit-agileits">
                        <input type="submit" value="Đăng kí">
                    </div>
                </form>
            </div>
            <div id="Paris" class="tabcontent">
                <form action="{{ route('.handle-Register') }}" method="post">
                    @csrf
                    <div class="form-sub-w3">
                        <input type="text" name="name" placeholder="Họ và tên " />
                    </div>
                    @error('name')
                    <div style="color:red;">{{ $message }}</div><br>
                    @enderror
                    <div class="form-sub-w3">
                        <input type="text" name="email" placeholder="Email " />
                    </div>
                    @error('email')
                    <div style="color:red;">{{ $message }}</div><br>
                    @enderror
                    <div class="form-sub-w3">
                        <input type="text" name="phone" placeholder="Số điện thoại " />
                    </div>
                    @error('phone')
                    <div style="color:red;">{{ $message }}</div><br>
                    @enderror
                    <div class="form-sub-w3">
                        <input type="text" name="username" placeholder="Tên đăng nhập " />
                    </div>
                    <div class="form-sub-w3">
                        <input type="text" name="username" placeholder="Tên hiển thị " />
                    </div>
                    @error('username')
                    <div style="color:red;">{{ $message }}</div><br>
                    @enderror
                    <div class="form-sub-w3">
                        <input type="password" name="password" placeholder="Mật khẩu " />
                    </div>
                    @error('password')
                    <div style="color:red;">{{ $message }}</div><br>
                    @enderror
                    <div class="form-sub-w3">
                        <input type="password" name="password_confirmation" placeholder="Nhập lại mật khẩu " />
                    </div>
                    @error('password_confirmation')
                    <div style="color:red;">{{ $message }}</div><br>
                    @enderror
                    @if(session('Error'))
                    <p style="color:red">{{session('Error')}}</p>
                    @endif
                    <label for="Thêm ảnh đại diện:"></label>
                    <div class="submit-agileits">
                        <input type="submit" value="Đăng kí">
                    </div>
                    <div class="clear"></div>
                </form>
            </div>



        </div>
        <!--//form-ends-here-->

    </div>
    <!--//main-->
    <!--footer-->
    <div class="footer">
        <p>&copy; 2017 Glassy Login Form. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a>
        </p>
    </div>
    <!--//footer-->
</body>
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
/*
We want to preview images, so we need to register the Image Preview plugin
*/
FilePond.registerPlugin(

    // encodes the file as base64 data
    FilePondPluginFileEncode,

    // validates the size of the file
    FilePondPluginFileValidateSize,

    // corrects mobile image orientation
    FilePondPluginImageExifOrientation,

    // previews dropped images
    FilePondPluginImagePreview
);

// Select the file input and use create() to turn it into a pond
FilePond.create(
    document.querySelector('input')
);
</script>

</html>
