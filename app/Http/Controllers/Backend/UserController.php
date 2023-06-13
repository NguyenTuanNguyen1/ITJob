<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Interfaces\ICompanyRepository;
use App\Interfaces\IUserRepository;
use App\Trait\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

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

    public function applied(Request $request)
    {
        $input = $request->all();
        $this->appliedPost($input['user_id'], $input['post_id']);
        alert()->success('Bạn đã ứng tuyển thành công');
        return redirect()->route('post.detail',$input['post_id']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
