<!DOCTYPE html>
<html lang="en">

<head>
    <title>Đăng nhập</title>

    <script type="application/x-javascript">
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ url('Login/css/lg-res.css') }}" type="text/css" media="all" />
</head>

<body>

<div class="header-w3l">
    <h1>Đăng nhập</h1>
</div>
<div class="main-w3layouts-agileinfo">
    <div class="wthree-form">
        <h2>Điền đầy đủ các thông tin trước khi đăng nhập</h2>
        <form action="{{ route('handle.login')}}" method="POST">
            @csrf
            <div class="form-sub-w3">
                <input type="text" name="username" placeholder="Tên đăng nhập "
                       class="@error('username') is-invalid @enderror"/>
                <div class="icon-w3">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </div>
            </div>
             @error('username')
                <div style="color:red;">{{ $message }}</div>
                <br>
                @enderror
            <div class="form-sub-w3">
                <input type="password" name="password" placeholder="Mật khẩu"/>
                <div class="icon-w3">
                    <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                </div>
            </div>
               @error('password')
                <div style="color:red;">{{ $message }}</div>
                <br>
                @enderror
            <label class="anim">
                <input type="checkbox" name="remember_token" checked="checked" class="checkbox">
                <span>Nhớ mật khẩu</span>
                <a href="{{ route('send.forgot.mail') }}">Quên mật khẩu</a>
            </label>
            @if(session('Error'))
                <p style="color:red">{{session('Error')}}</p>
            @endif
            <div class="clear"></div>
            <div class="submit-agileits">
                <input type="submit" value="Đăng nhập">
            </div>
        </form>

        <form action="{{route('test-mail')}}">
             <button type="submit"> Mail2


        </button>
        </form>


        <div class="icon-flat-form">
            <a href="/login-facebook/Facebook"><i class="fab fa-facebook-square"></i></a>
            <a href="/login-google/Google" style="margin-top: 1px;margin-left: 15px;"><i
                    class="fab fa-google-plus-square" style="color: #ea3434;"></i></a>
        </div>

    </div>

</div>
</body>
</html>
