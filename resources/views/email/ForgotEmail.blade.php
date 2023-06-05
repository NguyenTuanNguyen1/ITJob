Xin chào {{ $email }}

<button class="btn-danger"><a href="{{Route('forgot.password.index',['email' => $email])}}" style="color: white">Đặt lại mật khẩu</a></button>
