<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {

    }

    public function handle_login(Request $request)
    {
        $user = [
            'username'  => $request->username,
            'password'  => $request->password,

        ];

        $admin = [
            'username'  => $request->username,
            'password'  => $request->password,
            // 'loaitaikhoan_id' => 2,
        ];

        //remember_token dùng để ghi nhớ đăng nhập
        if(Auth::attempt($user, $request->has('remember_token')))
        {
            //return View('User.Menu',compact(['Post','New']));
            return 'hello';
        }
        else if(Auth::attempt($admin, $request->has('remember_token')))
        {
            //return view('Admin.Menu');
        }
        else
        {
            return redirect()->back()->with("Error","Đăng nhập không thành công!");
        }

    }
}
