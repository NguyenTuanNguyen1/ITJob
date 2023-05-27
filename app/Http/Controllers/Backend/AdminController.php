<?php

namespace App\Http\Controllers\Backend;

use App\Constant;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Interfaces\IAdminRepository;
use App\Interfaces\IPostRepository;
use App\Interfaces\IUserRepository;
use App\Mail\NotificationDeleteUser;
use App\Trait\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $this->sendMailUser($user['email'],new NotificationDeleteUser());
        $this->ActivityLog(  "Bạn đã xoá người dùng%" . $user['username'] . '*' . $user['id'] , $input['admin_id']);
        $this->user_repo->delete($input['id']);

        return response()->json([
            'result' => true
        ]);
    }

    public function approved(Request $request)
    {
        $input = $request->all();
        $this->admin_repo->changeStatusPost($input['id'],$input['admin_id'] ,$input['status']);
        $this->ActivityLog(  "Bạn đã phê duyệt bài viết%". $input['id'], Auth::user()->id);
        return response()->json([
            'message' => 'Phê duyệt thành công'
        ]);
    }
}
