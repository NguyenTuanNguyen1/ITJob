<?php

namespace App\Http\Controllers\Backend;

use App\Constant;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Interfaces\IAdminRepository;
use App\Interfaces\IPostRepository;
use App\Interfaces\IUserRepository;
use App\Trait\Service;
use Illuminate\Http\Request;

/**
 * @property IAdminRepository $admin_repo
 * @property IPostRepository $post_repo
 * @property IUserRepository $user_repo
 */
class AdminController extends Controller
{
    use Service;
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

    public function deletePostByAdmin(Request $request)
    {
        $input = $request->all();

        if (!$this->admin_repo->checkRole(Constant::ROLE_ADMIN, ['user_id']))
        {
            abort(401);
        }

        $this->ActivityLog(  'Bạn đã xoá bài tuyển dụng*' . $input['id'] , $input['user_id']);

        $post = $this->post_repo->delete($input['id']);
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

    public function deleteUserByAdmin(Request $request)
    {
        $input = $request->all();

        if (!$this->admin_repo->checkRole(Constant::ROLE_ADMIN, $input['admin_id']))
        {
            abort(401);
        }

        $user = $this->user_repo->find($input['id']);

        $this->ActivityLog(  "Bạn đã xoá người dùng%" . $user['username'] . '*' . $user['id'] , $input['user_id']);
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
