<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function handle_register(Request $request)
    {
        $emailExists = User::where('email',$request->email)->count();
        if ($emailExists > 0) {
            return redirect()->back()->with("Error","Tài khoản Gmail đã tồn tại!");
        }

        $userExists = User::where('username',$request->username)->count();
        if ($userExists >0) {
            return redirect()->back()->with("Error","Tài khoản người dùng đã tồn tại!");
        }

        $Users = User::create([
            'username'   =>  $request->username,
            'name'       =>  $request->name,
            'email'      =>  $request->email,
            'phone'      =>  $request->phone,
            'password'   =>  Hash::make($request->password),
            'type'       =>  $request->type,
            'img_avatar' =>  'Avatar.jpg',
            'status'     =>  1,
        ]);

        if(!empty($Users))
        {
            //Auth::Login($Users);
            return 'hello';
        }
        else
        {
            return 'loi';
        }
    }
}
