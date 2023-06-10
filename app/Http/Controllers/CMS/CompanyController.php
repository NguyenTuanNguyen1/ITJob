<?php

namespace App\Http\Controllers\CMS;

use App\Constant;
use App\Http\Controllers\Controller;
use App\Interfaces\IAdminRepository;
use App\Interfaces\IPostRepository;
use App\Interfaces\IUserRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * @property IPostRepository $post_repo
 * @property IAdminRepository $admin_repo
 * @property IUserRepository $user_repo
 */
class CompanyController extends Controller
{
    public function __construct
    (
        IPostRepository $postRepository,
        IAdminRepository $adminRepository,
        IUserRepository $userRepository
    )
    {
        $this->post_repo = $postRepository;
        $this->admin_repo = $adminRepository;
        $this->user_repo = $userRepository;
    }

    public function index(Request $request)
    {
        $all_post = $this->post_repo->getPostByCondition('user_id', Auth::user()->id);

        $post_approved = array_filter($all_post->toArray(), function ($data){
            return $data['status'] == Constant::STATUS_APPROVED_POST;
        });

        $post_not_approved = array_filter($all_post->toArray(), function ($data){
            return $data['status'] == Constant::STATUS_NOT_APPROVED_POST;
        });

        return view('company.index')->with([
            'count_all_post' => count($all_post),
            'count_post_approved' => count($post_approved),
            'count_post_not_approved' => count($post_not_approved),
            'all_post' => $all_post,
            'post_approved' => $post_approved,
            'post_not_approved' => $post_not_approved
        ]);
    }

    public function candidate(Request $request)
    {
        $input = $request->all();

        $users = $this->user_repo->getMajorByUser($input['major'], Constant::ROLE_CANDIDATE);
        // dd($users);
        return view('company.candidate')->with('candidates', $users);
    }

    public function post()
    {
        return view('user.job.post');
    }

    public function update(Request $request)
    {
        $input = $request->all();

        if (!$this->admin_repo->checkRole(Constant::ROLE_COMPANY, $input['company_id']))
        {
            abort(401);
        }

        try {
            $this->post_repo->update($input['id'], $input);

            $this->ActivityLog(  "Bạn đã cập nhật thông tin cá nhân", $input['user_id']);

            return response()->json([
                'result' => true
            ]);
        }catch (\Exception $e)
        {
            return response()->json([
                'result' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}
