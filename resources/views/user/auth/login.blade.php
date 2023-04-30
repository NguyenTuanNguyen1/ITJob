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
    @include('layout.page-css')

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
                @error('username')
                <div style="color:red;">{{ $message }}</div>
                <br>
                @enderror
            </div>
            <div class="form-sub-w3">
                <input type="password" name="password" placeholder="Mật khẩu"/>
                <div class="icon-w3">
                    <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                </div>
                @error('password')
                <div style="color:red;">{{ $message }}</div>
                <br>
                @enderror
            </div>
            <label class="anim">
                <input type="checkbox" name="remember_token" class="checkbox">
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

        <button>
            <a id="register">dang ki</a>
        </button>

        <div class="icon-flat-form">
            <a href="/login-facebook/Facebook"><i class="fab fa-facebook-square"></i></a>
            <a href="/login-google/Google" style="margin-top: 1px;margin-left: 15px;"><i
                    class="fab fa-google-plus-square" style="color: #ea3434;"></i></a>
        </div>

    </div>

</div>
</body>
@include('layout.page-js')
<script>
    $(document).ready(() => {

        $('#register').on('click', () => {
            window.location.replace('http://itjob.vn/user/user-register')
        });

        $('#login').on('click', () => {
            window.location.replace('http://itjob.vn/user/user-login')
        })

        // $('#home').on('click', () => {
        //     window.location.replace('http://itjob.vn')
        // })

        //Review
        function load_data_review() {
            $.get('http://itjob.vn/api/review/list-review', (res) => {
                if (res.data !== '') {
                    let category = res.data;
                    let _li = '';
                    category.forEach(function (item) {
                        {{--_li += '<tr>';--}}
                        {{--_li += '<th scope="row" >' + item.title + '</th>';--}}
                        {{--_li += '<th scope="row">' + item.content + '</th>';--}}
                        {{--_li +=--}}
                        {{--    '<th scope="col"> <img width="50%" height="60px" src = "{{ url('anh/')}}/' + item.image + '"> </th>';--}}
                        {{--_li += '<th> <button id="edit" data-id=" ' + item.id + ' "> Sửa </button>';--}}
                        {{--_li += '<button id="delete" data-id=" ' + item.id + ' " > Xoá </button> </th>';--}}
                        {{--_li += '</tr>';--}}
                    });
                    $('#list-post').html(_li);
                }
            });
        }

        //Review
        function load_data_type() {
            $.get('http://itjob.vn/api/type/list-type', (res) => {
                if (res.data !== '') {
                    let category = res.data;
                    let _li = '';
                    category.forEach(function (item) {
                        {{--_li += '<tr>';--}}
                        {{--_li += '<th scope="row" >' + item.title + '</th>';--}}
                        {{--_li += '<th scope="row">' + item.content + '</th>';--}}
                        {{--_li +=--}}
                        {{--    '<th scope="col"> <img width="50%" height="60px" src = "{{ url('anh/')}}/' + item.image + '"> </th>';--}}
                        {{--_li += '<th> <button id="edit" data-id=" ' + item.id + ' "> Sửa </button>';--}}
                        {{--_li += '<button id="delete" data-id=" ' + item.id + ' " > Xoá </button> </th>';--}}
                        {{--_li += '</tr>';--}}
                    });
                    $('#list-post').html(_li);
                }
            });
        }

        //Contact
        function load_data_contact() {
            $.get('http://itjob.vn/api/contact/list-contact', (res) => {
                if (res.data !== '') {
                    let category = res.data;
                    let _li = '';
                    category.forEach(function (item) {
                        {{--_li += '<tr>';--}}
                        {{--_li += '<th scope="row" >' + item.title + '</th>';--}}
                        {{--_li += '<th scope="row">' + item.content + '</th>';--}}
                        {{--_li +=--}}
                        {{--    '<th scope="col"> <img width="50%" height="60px" src = "{{ url('anh/')}}/' + item.image + '"> </th>';--}}
                        {{--_li += '<th> <button id="edit" data-id=" ' + item.id + ' "> Sửa </button>';--}}
                        {{--_li += '<button id="delete" data-id=" ' + item.id + ' " > Xoá </button> </th>';--}}
                        {{--_li += '</tr>';--}}
                    });
                    $('#list-post').html(_li);
                }
            });
        }

        //Report
        function load_data_report() {
            $.get('http://itjob.vn/api/report/list-report', (res) => {
                if (res.data !== '') {
                    let category = res.data;
                    let _li = '';
                    category.forEach(function (item) {
                        {{--_li += '<tr>';--}}
                        {{--_li += '<th scope="row" >' + item.title + '</th>';--}}
                        {{--_li += '<th scope="row">' + item.content + '</th>';--}}
                        {{--_li +=--}}
                        {{--    '<th scope="col"> <img width="50%" height="60px" src = "{{ url('anh/')}}/' + item.image + '"> </th>';--}}
                        {{--_li += '<th> <button id="edit" data-id=" ' + item.id + ' "> Sửa </button>';--}}
                        {{--_li += '<button id="delete" data-id=" ' + item.id + ' " > Xoá </button> </th>';--}}
                        {{--_li += '</tr>';--}}
                    });
                    $('#list-post').html(_li);
                }
            });
        }

        function load_data_trashed_review(){
            $.get('http://itjob.vn/api/review/review-trashed', (res) => {
                if (res.data !== '') {
                    let category = res.data;
                    let _li = '';
                    category.forEach(function (item) {
                        {{--_li += '<tr>';--}}
                        {{--_li += '<th scope="row" >' + item.title + '</th>';--}}
                        {{--_li += '<th scope="row">' + item.content + '</th>';--}}
                        {{--_li +=--}}
                        {{--    '<th scope="col"> <img width="50%" height="60px" src = "{{ url('anh/')}}/' + item.image + '"> </th>';--}}
                        {{--_li += '<th> <button id="edit" data-id=" ' + item.id + ' "> Sửa </button>';--}}
                        {{--_li += '<button id="delete" data-id=" ' + item.id + ' " > Xoá </button> </th>';--}}
                        {{--_li += '</tr>';--}}
                    });
                    $('#list-post').html(_li);
                }
            });
        }

        function load_data_trashed_type(){
            $.get('http://itjob.vn/api/type/type-trashed', (res) => {
                if (res.data !== '') {
                    let category = res.data;
                    let _li = '';
                    category.forEach(function (item) {
                        {{--_li += '<tr>';--}}
                        {{--_li += '<th scope="row" >' + item.title + '</th>';--}}
                        {{--_li += '<th scope="row">' + item.content + '</th>';--}}
                        {{--_li +=--}}
                        {{--    '<th scope="col"> <img width="50%" height="60px" src = "{{ url('anh/')}}/' + item.image + '"> </th>';--}}
                        {{--_li += '<th> <button id="edit" data-id=" ' + item.id + ' "> Sửa </button>';--}}
                        {{--_li += '<button id="delete" data-id=" ' + item.id + ' " > Xoá </button> </th>';--}}
                        {{--_li += '</tr>';--}}
                    });
                    $('#list-post').html(_li);
                }
            });
        }

        function load_data_contact_replied(){
            $.get('http://itjob.vn/api/contact/list-contact-replied', (res) => {
                if (res.data !== '') {
                    let category = res.data;
                    let _li = '';
                    category.forEach(function (item) {
                        {{--_li += '<tr>';--}}
                        {{--_li += '<th scope="row" >' + item.title + '</th>';--}}
                        {{--_li += '<th scope="row">' + item.content + '</th>';--}}
                        {{--_li +=--}}
                        {{--    '<th scope="col"> <img width="50%" height="60px" src = "{{ url('anh/')}}/' + item.image + '"> </th>';--}}
                        {{--_li += '<th> <button id="edit" data-id=" ' + item.id + ' "> Sửa </button>';--}}
                        {{--_li += '<button id="delete" data-id=" ' + item.id + ' " > Xoá </button> </th>';--}}
                        {{--_li += '</tr>';--}}
                    });
                    $('#list-post').html(_li);
                }
            });
        }

        function load_data_report_replied(){
            $.get('http://itjob.vn/api/report/list-report-replied', (res) => {
                if (res.data !== '') {
                    let category = res.data;
                    let _li = '';
                    category.forEach(function (item) {
                        {{--_li += '<tr>';--}}
                        {{--_li += '<th scope="row" >' + item.title + '</th>';--}}
                        {{--_li += '<th scope="row">' + item.content + '</th>';--}}
                        {{--_li +=--}}
                        {{--    '<th scope="col"> <img width="50%" height="60px" src = "{{ url('anh/')}}/' + item.image + '"> </th>';--}}
                        {{--_li += '<th> <button id="edit" data-id=" ' + item.id + ' "> Sửa </button>';--}}
                        {{--_li += '<button id="delete" data-id=" ' + item.id + ' " > Xoá </button> </th>';--}}
                        {{--_li += '</tr>';--}}
                    });
                    $('#list-post').html(_li);
                }
            });
        }
    });
</script>
</html>
