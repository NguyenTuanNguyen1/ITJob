<?php

namespace App\Http\Controllers\CMS;

use App\Constant;
use App\Http\Controllers\Controller;
use App\Interfaces\IAdminRepository;
use App\Interfaces\ICompanyRepository;
use App\Interfaces\IInformationRepository;
use App\Interfaces\IPostRepository;
use App\Interfaces\ITicketRepository;
use App\Interfaces\IUserRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * @property IPostRepository $post_repo
 * @property IAdminRepository $admin_repo
 * @property IUserRepository $user_repo
 * @property ICompanyRepository $company_repo
 * @property IInformationRepository $infor_repo
 * @property ITicketRepository $ticket_repo
 */
class CompanyController extends Controller
{
    public function __construct
    (
        IPostRepository $postRepository,
        IAdminRepository $adminRepository,
        IUserRepository $userRepository,
        ICompanyRepository $companyRepository,
        IInformationRepository $informationRepository,
        ITicketRepository $ticketRepository
    )
    {
        $this->post_repo = $postRepository;
        $this->admin_repo = $adminRepository;
        $this->user_repo = $userRepository;
        $this->company_repo = $companyRepository;
        $this->infor_repo = $informationRepository;
        $this->ticket_repo = $ticketRepository;
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
//        $users = $this->user_repo->getMajorByUser($input['major'], Constant::ROLE_CANDIDATE);
        $users = $this->user_repo->all();
        return view('company.candidate')->with('candidates', $users);
    }

    public function post()
    {
        return view('user.job.post');
    }

    public function update(Request $request)
    {
        $input = $request->all();

        $this->company_repo->update($input['id'], $input);
        $information = $this->infor_repo->all();
        return redirect()->route('company.profile');
    }

    public function review(Request $request)
    {
        $review = $this->ticket_repo->getTicket(Constant::TICKET_REVIEW,Constant::TICKET_NOT_REPLY);
        return view('company.review')->with('reviews', $review);
    }

    public function replied(Request $request)
    {
        $input = $request->all();
        $review = $this->ticket_repo->getTicketReplied($input['id']);
        return view('company.review')->with('reviews', $review);
    }

    public function applied(Request $request)
    {
        $input = $request->all();
        dd($input);
    }
}
