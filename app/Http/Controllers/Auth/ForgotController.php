<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Interfaces\IUserRepository;
use App\Mail\ForgotPassMail;
use App\Trait\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

/**
 * @property IUserRepository $user_repo
 */
class ForgotController extends Controller
{
    use Service;

    public function __construct
    (
        IUserRepository $userRepository
    )
    {
        $this->user_repo = $userRepository;
    }

    public function index()
    {
        return view('user.auth.forgot');
    }

    public function sendMailForgot(Request $request)
    {
        $input = $request->all();
        $this->sendMailUser($input, new ForgotPassMail(null, null));
    }

    public function getPass($token)
    {
        $user = null;
        //Kiểm tra token
        if($user['token'] == $token)
        {
            return view('ResetPass',compact('user'));
        }
        abort(403, 'Lỗi không thấy trang');
    }

    public function handleForgot($token, Request $request)
    {
        $user = null;
        //Cập nhật mật khẩu mới
        $user['password'] = Hash::make($request->password);
        if($user)
        {
            toast('Cập nhật mật khẩu thành công','success');
        }

//        Auth::login($user);
//        $user->save();
        return redirect()->route('home');
    }
}
