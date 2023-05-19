<!DOCTYPE html>
<html lang="en">

<head>
    <title>Quên mật khẩu</title>
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
.login-now{
    color:white;
}
.login-now a{
    color:#00c6d7;
}
</style>

<body>
    <!--header-->
    <div class="header-w3l">
        <h1>Quên mật khẩu</h1>
    </div>
    <!--//header-->

    <!--main-->
    <div class="main-w3layouts-agileinfo">
        <!--form-stars-here-->
        <div class="wthree-form">
            <h2>Điền đầy đủ các thông tin</h2>
                <form action="{{ route('user.register') }}" method="post">
                    @csrf
                    <div class="form-sub-w3">
                        <input type="text" name="email" placeholder="Email"/>
                    </div>
                    @error('email')
                    <div style="color:red;" >{{ $message }}</div><br>
                    @enderror
                    <div class="clear"></div>
                    <div class="login-now" >
                        <p>Bạn đã có tài khoản <a href="#">đăng nhập ngay</a></p>
                    </div>
                    <div class="submit-agileits">
                        <input type="submit" value="Xác nhận">
                    </div>
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
    $(document).ready(() => {
        $("#contact").validate({
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

        $("#type").validate({
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
    })
</script>

<script>
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
