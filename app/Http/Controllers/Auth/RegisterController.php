<?php

namespace App\Http\Controllers\Auth;

use App\Constant;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Interfaces\ICompanyRepository;
use App\Interfaces\IInformationRepository;
use App\Interfaces\IUserRepository;
use App\Mail\RegisterMail;
use App\Trait\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

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
        return view('user.auth.register');
    }

    public function handleRegister(RegisterRequest $request)
    {
        $input = $request->all();

        $input['password'] = Hash::make($input['password']);
        $user = $this->user_repo->create($input);
        $this->infor_repo->create($user['id'], (array)null);
        $this->sendMailUser($user, new RegisterMail($input['name']));
        switch ($input['role_id'])
        {
            case Constant::ROLE_CANDIDATE:
                Auth::login($user);
                toast('Đăng ký thành công', 'success');
                return redirect()->route('home');

            case Constant::ROLE_COMPANY:
                $this->company_repo->create($user['id'],(array)null);
                Auth::login($user);
                toast('Đăng ký thành công', 'success');
                return redirect()->route('home1');

            default:
                Auth::login($user);
                toast('Đăng ký thành công', 'success');
                return redirect()->route('home2');
        }
    }
}
