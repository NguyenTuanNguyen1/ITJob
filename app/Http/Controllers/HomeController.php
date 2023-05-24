<?php

namespace App\Http\Controllers;

use App\Constant;
use App\Interfaces\ICompanyRepository;
use App\Interfaces\IPostRepository;
use App\Interfaces\IUserRepository;
use App\Repositories\BackendRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

/**
 * @property IPostRepository $post_repo
 * @property ICompanyRepository $company_repo
 * @property IUserRepository $user_repo
 * @property BackendRepository $back_repo
 */
class HomeController extends Controller
{
    public function __construct
    (
        IPostRepository $postRepository,
        ICompanyRepository $companyRepository,
        IUserRepository $userRepository,
        BackendRepository $backendRepository
    ) {
        $this->post_repo = $postRepository;
        $this->company_repo = $companyRepository;
        $this->user_repo = $userRepository;
        $this->back_repo = $backendRepository;
    }

    public function index()
    {
        $posts = $this->post_repo->all(Constant::STATUS_APPROVED_POST);
        $companys = $this->user_repo->getUserByCondition('role_id', Constant::ROLE_COMPANY);
        $post_major = $this->post_repo->getMajorByPost(Constant::STATUS_APPROVED_POST, '',Carbon::now()->subMonth(),Carbon::now());
        return view('layout.index')
            ->with('posts', $posts)
            ->with('companys', $companys);
    }

    public function login()
    {
        return view('user.auth.login');
    }

    public function register()
    {
        return view('user.auth.register');
    }

    public function contact()
    {
        return view('layout.contact');
    }

    public function post()
    {
        return view('user.job.post');
    }

    public function test()
    {
        return view('user.job.update-infor');
    }
}
