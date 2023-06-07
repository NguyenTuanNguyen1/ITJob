<?php

namespace App\Http\Controllers\Backend;

use App\Constant;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\RegisterRequest;
use App\Interfaces\IAdminRepository;
use App\Interfaces\IPostRepository;
use App\Interfaces\ITicketRepository;
use App\Interfaces\IUserRepository;
use App\Mail\NotificationDeleteUser;
use App\Trait\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * @property IAdminRepository $admin_repo
 * @property IPostRepository $post_repo
 * @property IUserRepository $user_repo
 * @property ITicketRepository $ticket_repo
 */
class AdminController extends Controller
{
    use Service;

    public function __construct
    (
        IAdminRepository $adminRepository,
        IPostRepository $postRepository,
        IUserRepository $userRepository,
        ITicketRepository $ticketRepository
    ) {
        $this->admin_repo = $adminRepository;
        $this->post_repo = $postRepository;
        $this->user_repo = $userRepository;
        $this->ticket_repo = $ticketRepository;
    }

    public function deletePostByAdmin(Request $request)
    {
        $input = $request->all();

        if (!$this->admin_repo->checkRole($input['admin_id'], Constant::ROLE_ADMIN)) {
            abort(401);
        }

        $this->ActivityLog('Bạn đã xoá bài tuyển dụng*' . $input['id'], $input['user_id']);

        $post = $this->post_repo->delete($input['id']);
        if (empty($post)) {
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

        if (!$this->admin_repo->checkRole($input['admin_id'], Constant::ROLE_ADMIN)) {
            abort(401);
        }

        $user = $this->user_repo->find($input['id']);
        $this->sendMailUser($user, new NotificationDeleteUser());
        $this->ActivityLog("Bạn đã xoá người dùng%" . $user['username'] . '*' . $user['id'], $input['admin_id']);
        $this->user_repo->delete($input['id']);

        return response()->json([
            'result' => true
        ]);
    }

    public function restoreUserByAdmin(Request $request)
    {
        $input = $request->all();
        $user = $this->user_repo->storage($input['id']);
        $this->user_repo->restore($user['email']);
        $this->ActivityLog("Bạn đã khôi phục người dùng%" . $user['username'] . '*' . $user['id'], $input['admin_id']);
        $this->sendMailUser($user, new NotificationDeleteUser());

        return response()->json([
            'result' => true
        ]);
    }

    public function approved(Request $request)
    {
        $input = $request->all();

        if (!$this->admin_repo->checkRole($input['admin_id'], Constant::ROLE_ADMIN)) {
            abort(401);
        }
        $this->admin_repo->changeStatusPost($input['id'], $input['admin_id'], $input['status']);
        $this->ActivityLog("Bạn đã phê duyệt bài viết%" . $input['id'], Auth::user()->id);
        return response()->json([
            'message' => 'Phê duyệt thành công'
        ]);
    }

    public function repliedContact(Request $request)
    {
        $input = $request->all();

        if (!$this->admin_repo->checkRole($input['admin_id'], Constant::ROLE_ADMIN)) {
            abort(401);
        }

        $input['type_id'] = Constant::TICKET_CONTACT;
        $input['image'] = $input['post_id'] = null;

        $this->ticket_repo->update($input['ticket_id']);
        $this->ticket_repo->reply($input);

        $this->ActivityLog('Bạn đã phản hồi liên hệ của người dùng%' . $input['user_id'], $input['admin_id']);
        alert('Bạn đã phản hồi liên hệ', null, 'success');
        return redirect()->route('dashboard.contact', ['admin_id' => $input['admin_id']]);
    }

    public function repliedReport(Request $request)
    {
        $input = $request->all();

        if (!$this->admin_repo->checkRole($input['admin_id'], Constant::ROLE_ADMIN)) {
            abort(401);
        }

        $input['type_id'] = Constant::TICKET_REPORT;
        $input['image'] = null;
        $this->ticket_repo->update($input['ticket_id']);
        $this->ticket_repo->reply($input);

        $this->ActivityLog('Bạn đã phản hồi báo cáo của người dùng%' . $input['user_id'], $input['admin_id']);
        alert('Bạn đã phản hồi báo cáo', null, 'success');
        return redirect()->route('dashboard.report', ['admin_id' => $input['admin_id']]);
    }
}
