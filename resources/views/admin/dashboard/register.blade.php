@extends('admin.dashboard.layout')
@section('content')
    <div class="content">
        <div class="content" style="margin-top: 5px">
            <form action="{{ route('user.register') }}" method="post">
                @csrf
                <div class="form-sub-w3">
                    <input type="text" name="name" placeholder="Tên doanh nghiệp" />
                </div>
                @error('name')
                <div style="color:red;">{{ $message }}</div><br>
                @enderror
                <div class="form-sub-w3">
                    <input type="text" name="username" placeholder="Tên đăng nhập " />
                </div>
                @error('username')
                <div style="color:red;">{{ $message }}</div><br>
                @enderror
                <div class="form-sub-w3">
                    <input type="text" name="email" placeholder="Email"/>
                </div>
                @error('email')
                <div style="color:red;" >{{ $message }}</div><br>
                @enderror
                <div class="form-sub-w3">
                    <input type="text" name="phone" placeholder="Số điện thoại" />
                </div>
                @error('phone')
                <div style="color:red;">{{ $message }}</div><br>
                @enderror
                <div class="form-sub-w3">
                    <input type="text" name="address" placeholder="Địa chỉ" />
                </div>
                @error('address')
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
                <input type="hidden" name="role_id" value="1">
                <div class="clear"></div>
                <div class="submit-agileits">
                    <input type="submit" value="Đăng kí">
                </div>
            </form>
        </div>
    </div>
@endsection
