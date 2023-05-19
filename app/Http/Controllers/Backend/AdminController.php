<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Interfaces\IAdminRepository;
use App\Interfaces\IPostRepository;
use App\Interfaces\IUserRepository;
use Illuminate\Http\Request;

/**
 * @property IAdminRepository $admin_repo
 * @property IPostRepository $post_repo
 * @property IUserRepository $user_repo
 */
class AdminController extends Controller
{
    public function __construct
    (
        IAdminRepository $adminRepository,
        IPostRepository $postRepository,
        IUserRepository $userRepository
    )
    {
        $this->admin_repo = $adminRepository;
        $this->post_repo = $postRepository;
        $this->user_repo = $userRepository;
    }

    public function deletePostByAdmin(AdminRequest $request)
    {
        $input = $request->all();

        if (!$this->admin_repo->checkAdmin($input['user_id']))
        {
            abort(401);
        }

        $post = $this->post_repo->delete($input['id']);
        $this->ActivityLog(  "Bạn đã xoá bài tuyển dụng " , $input['user_id']);
        if (empty($post))
        {
            return response()->json([
                'result' => true
            ]);
        }
        return response()->json([
            'result' => false
        ]);
    }

    public function deleteUserByAdmin(AdminRequest $request)
    {
        $input = $request->all();

        if (!$this->admin_repo->checkAdmin($input['user_id']))
        {
            abort(401);
        }
        $this->ActivityLog(  "Bạn đã xoá người dùng " . $input['id'] , $input['user_id']);
        $user = $this->user_repo->delete($input['id']);
        if (empty($user))
        {
            return response()->json([
                'result' => true
            ]);
        }
        return response()->json([
            'result' => false
        ]);
    }


}
