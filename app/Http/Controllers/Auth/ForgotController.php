<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForgetPassword;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\UpdateRequest;
use App\Interfaces\IUserRepository;
use App\Mail\ForgotPassMail;
use App\Trait\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
 * @property IUserRepository $user_repo
 */
class ForgotController extends Controller
{
    use Service;

    public function __construct
    (
        IUserRepository $userRepository
    ) {
        $this->user_repo = $userRepository;
    }

    public function index()
    {
        return view('auth.forgot');
    }

    public function sendMailForgot(Request $request)
    {
        $input = $request->all();
        $this->sendMailUser($input, new ForgotPassMail($input['email']));

        return redirect()->back()->with('success',"Vui lòng kiểm tra Email để thục hiện thay đổi mật khẩu");
    }

    public function forgotPassWord($email)
    {
        return view('auth.resetPassword')->with('email', $email);
    }

    public function handleForgot(ForgetPassword $request)
    {
        $input = $request->all();
        $password = Hash::make($input['password']);
        $user = $this->user_repo->updatePassword($input['email'], $password);
        Auth::login($user);
        alert('Cập nhật mật khẩu thành công', null, 'success');
        return redirect()->route('home');
    }
}
