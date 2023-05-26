<?php

namespace App\Http\Controllers;

use App\Constant;
use App\Interfaces\IAdminRepository;
use App\Interfaces\IBackendRepository;
use App\Interfaces\IInformationRepository;
use App\Interfaces\IPostRepository;
use App\Interfaces\IReviewRepository;
use App\Interfaces\ISearchRepository;
use App\Interfaces\ITicketRepository;
use App\Interfaces\IUserRepository;
use App\Repositories\RoleRepostitory;
use Carbon\Carbon;
use Illuminate\Http\Request;

/**
 * @property IPostRepository $post_repo
 * @property IUserRepository $user_repo
 * @property IAdminRepository $admin_repo
 * @property ITicketRepository $ticket_repo
 * @property IInformationRepository $information_repo
 * @property IReviewRepository $review_repo
 * @property RoleRepostitory $role_repo
 * @property ISearchRepository $search_repo
 * @property IBackendRepository $back_repo
 */

class DashboardController extends Controller
{
    public function __construct
    (
        IUserRepository $userRepository,
        IPostRepository $postRepository,
        IAdminRepository $adminRepository,
        ITicketRepository $ticketRepository,
        IInformationRepository $informationRepository,
        IReviewRepository $reviewRepository,
        RoleRepostitory $roleRepository,
        ISearchRepository $searchRepository,
        IBackendRepository $backendRepository,

    )
    {
        $this->post_repo = $postRepository;
        $this->user_repo = $userRepository;
        $this->admin_repo = $adminRepository;
        $this->ticket_repo = $ticketRepository;
        $this->information_repo = $informationRepository;
        $this->review_repo = $reviewRepository;
        $this->role_repo = $roleRepository;
        $this->search_repo = $searchRepository;
        $this->back_repo = $backendRepository;
    }

    public function index(Request $request)
    {
        $input = $request->all();

        if (!$this->admin_repo->checkRole('role_id', $input['admin_id']))
        {
            abort(401);
        }

        $all_post = $this->post_repo->getPost(Constant::STATUS_APPROVED_POST);
        $post_approved = $this->post_repo->getPostByCondition('status', Constant::STATUS_APPROVED_POST);
        $not_post_approved = $this->post_repo->getPostByCondition('status', Constant::STATUS_NOT_APPROVED_POST);
        $approved_last_week = $this->post_repo->getPostApprovedLastWeek(Constant::STATUS_APPROVED_POST, Carbon::now()->subWeek());
        $post_trashed = $this->post_repo->trashed();

        if ($request->ajax())
        {
            return response()->json([
                'all_post' => count($all_post),
                'count_post_approved' => count($post_approved),
                'count_not_post_approved' => count($not_post_approved),
                'approved_last_week' => count($approved_last_week),
                'count_post_trashed' => count($post_trashed),
                'post_not_approved' => $not_post_approved,
                'post_trashed' => $post_trashed,
                'data' => $all_post
            ]);
        }

        return view('admin.dashboard.dashboard');
    }

    public function dashboard()
    {
        $post_approved = $this->post_repo->all(Constant::STATUS_APPROVED_POST);
        $post_not_approved = $this->post_repo->all(Constant::STATUS_NOT_APPROVED_POST);
        $admin = $this->user_repo->getUserByCondition('role_id',Constant::ROLE_ADMIN);
        $company = $this->user_repo->getUserByCondition('role_id',Constant::ROLE_COMPANY);
        $candidate = $this->user_repo->getUserByCondition('role_id',Constant::ROLE_CANDIDATE);
        $role = $this->role_repo->all();
        $information_type = $this->information_repo->all();
        $review = $this->review_repo->all();
        $report = $this->ticket_repo->getTicketCondition('type_id', Constant::TICKET_REPORT);
        $contact = $this->ticket_repo->getTicketCondition('type_id', Constant::TICKET_CONTACT);


        return view('admin.dashboard.tables');
    }

    public function account(Request $request)
    {
        $input = $request->all();

        if (!$this->admin_repo->checkRole('role_id', $input['admin_id']))
        {
            abort(401);
        }

        $all_user =$this->user_repo->all();
        $count_user_admin = $this->user_repo->getUserByCondition('role_id', Constant::ROLE_ADMIN);
        $count_user_company = $this->user_repo->getUserByCondition('role_id', Constant::ROLE_COMPANY);
        $count_user_candidate = $this->user_repo->getUserByCondition('role_id', Constant::ROLE_CANDIDATE);

        return view('admin.dashboard.account');
    }
}
