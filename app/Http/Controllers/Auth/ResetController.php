<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordRequest;
use App\Interfaces\IUserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 * @property IUserRepository $user_repo
 */
class ResetController extends Controller
{

    public function __construct
    (
        IUserRepository $userRepository
    )
    {
        $this->user_repo = $userRepository;
    }

    public function index()
    {

    }

    public function updatePassword(PasswordRequest $request)
    {
        $input = $request->all();
        $profile = $this->user_repo->find($input['id']);

        if ($input['password_old'] != null && $input['password'] == $input['password_confirmation'])
        {
            //Kiểm tra Mật khẩu cũ có giống với mật khẩu đã đăng ký
            if (Hash::check($input['password_old'],$profile['password']))
            {
                $profile['password'] = Hash::make($input['password']);
                $profile->save();

                toast('Cập nhật mật khẩu thành công','success');
                return redirect()->route('profile');
            }
            //dd(Hash::check($request->password_old,$profile->password));
            else {
                return redirect()->back()->with("Error","Xác nhận mật khẩu không chính xác");
            }
        }
        return redirect()->route('home');
    }
}
