<?php

namespace App\Http\Controllers\Backend;

use App\Constant;
use App\Http\Controllers\Controller;
use App\Interfaces\ICompanyRepository;
use App\Interfaces\IUserRepository;
use App\Trait\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Symfony\Component\Translation\t;

/**
 * @property IUserRepository $user_repo
 * @property ICompanyRepository $company_repo
 */
class UserController extends Controller
{
    use Service;

    public function __construct
    (
        IUserRepository $userRepository,
        ICompanyRepository $companyRepository
    )
    {
        $this->user_repo = $userRepository;
        $this->company_repo = $companyRepository;
    }

    public function handleUpdate(Request $request)
    {
        $input = $request->all();

        $this->checkExist($input['email'],Constant::CHECK_EMAIL_EXIST);
        $input['image'] = $this->uploadImage($request);

        switch ($input['role_id'])
        {
            case Constant::ROLE_CANDIDATE:
                $user = $this->user_repo->update($input['id'], $input);
                return redirect()->route('home');

            case Constant::ROLE_COMPANY:
                $user = $this->user_repo->update($input['id'], $input);
                $company = $this->company_repo->update($input['id'], $input);
                return redirect()->route('home');

            default:
                $user = $this->user_repo->update($input['id'], $input);
                return redirect()->route('home123');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
