<!DOCTYPE html>
<html lang="en">

<head>
    <title>Đăng nhập</title>

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

<body>

    <div class="header-w3l">
        <h1>Đăng nhập</h1>
    </div>
    <div class="main-w3layouts-agileinfo">
        <div class="wthree-form">
            <h2>Điền đầy đủ các thông tin trước khi đăng nhập</h2>
            <form action="{{ route('.handle-Login')}}" method="POST">
                @csrf
                <div class="form-sub-w3">
                    <input type="text" name="username" placeholder="Tên đăng nhập " class="@error('username') is-invalid @enderror"/>
                    <div class="icon-w3">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </div>
                    @error('username')
                    <div style="color:red;">{{ $message }}</div><br>
                    @enderror
                </div>
                <div class="form-sub-w3">
                    <input type="password" name="password" placeholder="Mật khẩu" />
                    <div class="icon-w3">
                        <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                    </div>
                    @error('password')
                    <div style="color:red;">{{ $message }}</div><br>
                    @enderror
                </div>
                <label class="anim">
                    <input type="checkbox" name="remember_token" class="checkbox">
                    <span>Nhớ mật khẩu</span>
                    <a href="#">Quên mật khẩu</a>
                </label>
                @if(session('Error'))
                <p style="color:red">{{session('Error')}}</p>
                @endif
                <div class="clear"></div>
                <div class="submit-agileits">
                    <input type="submit" value="Đăng nhập">
                </div>
            </form>
            <div class="icon-flat-form">
                <a href="/login-facebook/Facebook" class="fa fa-facebook"></a>
                <a href="/login-google/Google" class="fa fa-google"></a>
            </div>

        </div>

    </div>
</body>
</html>
