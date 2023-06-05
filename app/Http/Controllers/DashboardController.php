<?php

namespace App\Http\Controllers;

use App\Constant;
use App\Interfaces\IAdminRepository;
use App\Interfaces\IBackendRepository;
use App\Interfaces\ICompanyRepository;
use App\Interfaces\IInformationRepository;
use App\Interfaces\IPostRepository;
use App\Interfaces\IReviewRepository;
use App\Interfaces\ISearchRepository;
use App\Interfaces\ITicketRepository;
use App\Interfaces\IUserRepository;
use App\Repositories\InformationTypeRepository;
use App\Repositories\RoleRepostitory;
use App\Trait\Service;
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
 * @property InformationTypeRepository $type_repo
 * @property ICompanyRepository $company_repo
 */
class DashboardController extends Controller
{
    use Service;
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
        ICompanyRepository $companyRepository,
        InformationTypeRepository $typeRepository
    ) {
        $this->post_repo = $postRepository;
        $this->user_repo = $userRepository;
        $this->admin_repo = $adminRepository;
        $this->ticket_repo = $ticketRepository;
        $this->information_repo = $informationRepository;
        $this->review_repo = $reviewRepository;
        $this->role_repo = $roleRepository;
        $this->search_repo = $searchRepository;
        $this->back_repo = $backendRepository;
        $this->company_repo = $companyRepository;
        $this->type_repo = $typeRepository;
    }

    public function index(Request $request)
    {
        $input = $request->all();

//        if (!$this->admin_repo->checkRole($input['admin_id'],Constant::ROLE_ADMIN))
//        {
//            abort(401);
//        }

        $all_post = $this->post_repo->all();
        $post_approved = $this->post_repo->getPostByCondition('status', Constant::STATUS_APPROVED_POST);
        $not_post_approved = $this->post_repo->getPostByCondition('status', Constant::STATUS_NOT_APPROVED_POST);
        $approved_last_week = $this->post_repo->getPostApprovedByDateTime(Constant::STATUS_APPROVED_POST,
            Carbon::now()->subWeek()->startOfWeek(), Carbon::now()->subWeek()->endOfWeek());
        $post_trashed = $this->post_repo->trashed();

        if ($request->ajax()) {
            return response()->json([
                'all_post' => count($all_post),
                'count_post_approved' => count($post_approved),
                'count_not_post_approved' => count($not_post_approved),
                'approved_last_week' => $approved_last_week,
                'count_post_trashed' => count($post_trashed),
                'post_not_approved' => $not_post_approved,
                'post_trashed' => $post_trashed,
            ]);
        }

        return view('admin.dashboard.dashboard');
    }

    public function dashboard()
    {
        $post_approved = $this->post_repo->all(Constant::STATUS_APPROVED_POST);
        $post_not_approved = $this->post_repo->all(Constant::STATUS_NOT_APPROVED_POST);
        $admin = $this->user_repo->getUserByCondition('role_id', Constant::ROLE_ADMIN);
        $company = $this->user_repo->getUserByCondition('role_id', Constant::ROLE_COMPANY);
        $candidate = $this->user_repo->getUserByCondition('role_id', Constant::ROLE_CANDIDATE);
        $role = $this->role_repo->all();
        $information_type = $this->information_repo->all();
        $review = $this->review_repo->all();
//        $report = $this->ticket_repo->getTicketCondition('type_id', Constant::TICKET_REPORT);
//        $contact = $this->ticket_repo->getTicketCondition('type_id', Constant::TICKET_CONTACT);


        return view('admin.dashboard.tables');
    }

    public function account(Request $request)
    {
        $input = $request->all();

        if (!$this->admin_repo->checkRole($input['admin_id'],Constant::ROLE_ADMIN))
        {
            abort(401);
        }

        $all_user = $this->user_repo->all();
        $user_admin = $this->user_repo->getUserByCondition('role_id', Constant::ROLE_ADMIN);
        $user_company = $this->user_repo->getUserByCondition('role_id', Constant::ROLE_COMPANY);
        $user_candidate = $this->user_repo->getUserByCondition('role_id', Constant::ROLE_CANDIDATE);

        if ($request->ajax()) {
            return response()->json([
                'all_user' => count($all_user),
                'count_user_admin' => count($user_admin),
                'count_user_company' => count($user_company),
                'count_user_candidate' => count($user_candidate),
                'user_admin' => $user_admin,
                'user_company' => $user_company,
                'user_candidate' => $user_candidate
            ]);
        }

        return view('admin.dashboard.account');
    }

    public function profile($id, Request $request)
    {
        $user = $this->user_repo->find($id);
        $company = $this->company_repo->find($id);
        $information = $this->information_repo->find($id);
        $type = $this->type_repo->all();
        $review = $this->review_repo->getReviewByUser($id);
        if ($request->ajax()) {
            return response()->json([
                'information' => $information,
                'user' => $user,
                'company' => $company,
                'reviews' => $review,
                'count_review' => count($review)
            ]);
        }

        return view('admin.dashboard.profile')
            ->with([
                'user' => $user,
                'company' => $company,
                'information' => $information,
                'type_infor' => $type,
                'reviews' => $review,
                'count_review' => count($review)
            ]);
    }

    public function contact(Request $request)
    {
        $input = $request->all();

        if (!$this->admin_repo->checkRole($input['admin_id'],Constant::ROLE_ADMIN))
        {
            abort(401);
        }

        $contact_not_reply = $this->ticket_repo->getTicketNotReply(Constant::TICKET_CONTACT,Constant::TICKET_NOT_REPLY);
        $contact_reply = $this->ticket_repo->getTicketReplyLastWeek(Constant::TICKET_CONTACT, Constant::TICKET_REPLIED);

        return view('admin.dashboard.contact')->with([
            'count_contact' => count($contact_not_reply) + count($contact_reply),
            'count_contact_not_reply' => count($contact_not_reply),
            'count_contact_reply' => count($contact_reply),
            'contact_not_reply' => $contact_not_reply,
            'contact_reply' => $contact_reply
        ]);
    }

    public function report(Request $request)
    {
        $input = $request->all();

        if (!$this->admin_repo->checkRole($input['admin_id'],Constant::ROLE_ADMIN))
        {
            abort(401);
        }

        $report_not_reply = $this->ticket_repo->getTicketNotReply(Constant::TICKET_REPORT,Constant::TICKET_NOT_REPLY);
        $report_reply = $this->ticket_repo->getTicketReplyLastWeek(Constant::TICKET_REPORT, Constant::TICKET_REPLIED);

//        $value = [];
//        foreach ($report_not_reply as $data)
//        {
//            foreach (explode('|', $data->image) as $test)
//            {
//                $value[] = $test;
//            }
//        }
//        dd($value);

        return view('admin.dashboard.report')->with([
            'count_report' => count($report_not_reply) + count($report_reply),
            'count_report_not_reply' => count($report_not_reply),
            'count_report_reply' => count($report_reply),
            'report_not_reply' => $report_not_reply,
            'report_reply' => $report_reply
        ]);
    }

    public function history(Request $request)
    {
        $input = $request->all();

        $history = $this->admin_repo->history($input['id']);
//        $value = [];
//        foreach ($history as $data)
//        {
//            $value[] = explode('%', $data->content);
////            $value[] = $data->content;
//        }
//        dd(isset($input['test']));
////        list($t, $t1) = explode('%', $t);

        return view('admin.dashboard.history')->with('history', $history);
    }

    public function register()
    {
        return view('admin.dashboard.register');
    }
}
