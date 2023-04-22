<?php

namespace App\Http\Controllers\Auth;

use App\Constant;
use App\Http\Controllers\Controller;
use App\Interfaces\ICompanyRepository;
use App\Interfaces\IUserRepository;
use App\Trait\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

/**
 * @property IUserRepository $user_repo
 * @property ICompanyRepository $company_repo
 */
class RegisterController extends Controller
{
    use Service;

    public function __construct
    (
        IUserRepository $userRepository,
        ICompanyRepository $companyRepository
    ) {
        $this->user_repo = $userRepository;
        $this->company_repo = $companyRepository;
    }

    public function index()
    {
        return view('auth.register');
    }

    public function handleRegister(Request $request)
    {
        $input = $request->all();

        $this->checkExist($request, Constant::CHECK_USERNAME);
        $this->checkExist($request, Constant::CHECK_EMAIL_EXIST);

        switch ($input['role_id'])
        {
            case Constant::ROLE_CANDIDATE:
                $input['password'] = Hash::make($input['password']);
                $input['img_avatar'] = $this->uploadImage($request);
                $user = $this->user_repo->create($input);

                if (empty($user)) {
                    return redirect()->back()->with('Error', 'Đăng ký thất bại');
                }

                Auth::login($user);
                toast('Đăng ký thành công', 'success');
                return redirect()->route('home');

            case Constant::ROLE_COMPANY:
                $input['password'] = Hash::make($input['password']);
                $input['img_avatar'] = $this->uploadImage($request);
                $user = $this->user_repo->create($input);
                $company = $this->company_repo->create($user['id'],(array)null);

                if (empty($user)) {
                    return redirect()->back()->with('Error', 'Đăng ký thất bại');
                }

                Auth::login($user);
                toast('Đăng ký thành công', 'success');
                return redirect()->route('home12');

            default:
                $input['password'] = Hash::make($input['password']);
                $input['role_id'] = Constant::ROLE_ADMIN;
                $input['img_avatar'] = $this->uploadImage($request);
                $user = $this->user_repo->create($input);

                if (empty($user))
                {
                    return redirect()->route('home');
                }

                Auth::login($user);
                toast('Đăng ký thành công', 'success');
                return redirect()->route('home');
        }
    }
}
