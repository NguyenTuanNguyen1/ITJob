<?php

namespace App\Http\Controllers\Auth;

use App\Constant;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Trait\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use Service;
    public function index()
    {
        return view('user.auth.login');
    }

    public function handleLogin(LoginRequest $request)
    {
        $input = $request->all();
        $user = [
            'username' => $input['username'],
            'password' => $input['password'],
            'role_id' => Constant::ROLE_CANDIDATE
        ];

        $company = [
            'username' => $input['username'],
            'password' => $input['password'],
            'role_id' => Constant::ROLE_COMPANY
        ];

        $admin = [
            'username' => $input['username'],
            'password' => $input['password'],
            'role_id' => Constant::ROLE_ADMIN
        ];

        if (Auth::attempt($user, $input['remember_token']))
        {
            toast('Đăng nhập thành công', 'success');
            return redirect()->route('home');
        }
        elseif (Auth::attempt($company, $input['remember_token']))
        {
            toast('Đăng nhập thành công', 'success');
            return redirect()->route('home');
        }
        elseif (Auth::attempt($admin, $input['remember_token']))
        {
            $user = $this->user_repo->getUserByCondition('username', $input['username']);
             $test = $request->header();
             dd($test);
            $this->ActivityLog('Bạn đã đăng nhập', $user[0]->id);
            toast('Đăng nhập thành công', 'success');
            return redirect()->route('home');
        }
        else {
            return redirect()->back()->with('Error', 'Đăng nhập thất bại');
        }
    }
}
