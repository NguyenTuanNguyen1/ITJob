<?php

namespace App\Http\Controllers\Auth;

use App\Constant;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Interfaces\ICompanyRepository;
use App\Interfaces\IInformationRepository;
use App\Interfaces\IUserRepository;
use App\Models\User;
use App\Trait\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
 * @property IUserRepository $user_repo
 * @property ICompanyRepository $company_repo
 * @property IInformationRepository $infor_repo
 */
class RegisterController extends Controller
{
    use Service;

    public function __construct
    (
        IUserRepository $userRepository,
        ICompanyRepository $companyRepository,
        IInformationRepository $informationRepository
    ) {
        $this->user_repo = $userRepository;
        $this->company_repo = $companyRepository;
        $this->infor_repo = $informationRepository;
    }

    public function index()
    {
        return view('auth.register');
    }

    public function handleRegister(RegisterRequest $request)
    {
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $getUser = $this->user_repo->create($input);
        $this->infor_repo->create($getUser['id'], (array)null);
        $this->ActivityLog('Bạn đã đăng ký thành công tài khoản', $getUser['id']);
//        $this->sendMailUser($user, new RegisterMail($input['name']));
        switch ($input['role_id']) {
            case Constant::ROLE_CANDIDATE:
                Auth::login($getUser);
                toast('Đăng ký thành công', 'success');
                return redirect()->route('home');

            case Constant::ROLE_COMPANY:
                $this->company_repo->create($getUser['id'], (array)null);
                Auth::login($getUser);
                toast('Đăng ký thành công', 'success');
                return redirect()->route('home1');

            default:
                Auth::login($getUser);
                toast('Đăng ký thành công', 'success');
                return redirect()->route('home2');
        }
    }
}
