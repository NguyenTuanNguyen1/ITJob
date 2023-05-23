<?php

namespace App\Http\Controllers;

use App\Constant;
use App\Interfaces\ICompanyRepository;
use App\Interfaces\IPostRepository;
use App\Interfaces\IUserRepository;
use App\Repositories\BackendRepository;
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
        $posts = $this->post_repo->all();
        $companys = $this->user_repo->getUserByCondition('role_id', Constant::ROLE_COMPANY);
        return view('layout.index')->with('posts', $posts)
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

    public function test2()
    {
        return view('chat2');
    }

    public function test($from_user_id, Request $request)
    {
        $messages = $this->back_repo->getMessage($from_user_id, 19);
        if ($request->ajax())
        {
            return response()->json([
                'message' => $messages,
                'to_user' => 19
            ]);
        }
        return view('messenger')->with('messages', $messages);
    }


}
