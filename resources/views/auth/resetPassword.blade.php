<form action="{{ Route('handle.forgot') }}" class="modal-content animate" method="post">
    @csrf
    <div class="container" style="background-color:#d1ecf1;color:#0c5460">
        <label><b>Đặt lại mật khẩu</b></label>
    </div>
    <div class="container">
        <label for="psw"><b>Mật khẩu mới</b></label>
        <input type="password" placeholder="Nhập mật khẩu" name="password"
               class="@error('password') is-invalid @enderror">
        @error('password')
        <div style="color:red;">{{ $message }}</div><br>
        @enderror

        <label for="psw-repeat"><b>Xác nhận mật khẩu</b></label>
        <input type="password" placeholder="Xác nhận mật khẩu" name="password_confirmation"
               class="@error('password_confirmation') is-invalid @enderror">
        @error('password_confirmation')
        <div style="color:red;">{{ $message }}</div><br>
        @enderror
        <input type="text" name="email" value="{{ $email }}">
    </div>
    <button type="submit">Đặt lại mật khẩu</button>
</form>
