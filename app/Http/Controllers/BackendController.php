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
use App\Models\Post;
use App\Models\User;
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
 */
class BackendController extends Controller
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
        RoleRepostitory $roleRepostitory,
        ISearchRepository $searchRepository,
        IBackendRepository $backendRepository
    )
    {
        $this->post_repo = $postRepository;
        $this->user_repo = $userRepository;
        $this->admin_repo = $adminRepository;
        $this->ticket_repo = $ticketRepository;
        $this->information_repo = $informationRepository;
        $this->review_repo = $reviewRepository;
        $this->role_repo = $roleRepostitory;
        $this->search_repo = $searchRepository;
        $this->back_repo = $backendRepository;
    }

    public function getAllPost()
    {
        $posts = $this->post_repo->all();
        $admin = $this->user_repo->getUserByCondition('role_id',Constant::ROLE_ADMIN);
        $company = $this->user_repo->getUserByCondition('role_id',Constant::ROLE_COMPANY);
        $candidate = $this->user_repo->getUserByCondition('role_id',Constant::ROLE_CANDIDATE);
        $role = $this->role_repo->all();
        $information_type = $this->information_repo->all();
        $review = $this->review_repo->all();
    }

    public function searchFilter(Request $request)
    {
        $input = $request->all();
        $posts = $this->search_repo->searchFilter($input)->toArray();
        $result = array_filter($posts['data'], function ($value){
            return $value['status'] == Constant::STATUS_APPROVED_POST;
        });
        $test = collect($result);
        return view('user.job.search_result')->with('posts', $test);
    }

    public function searchAjax()
    {
        $data = Post::search()->get();

        return response()->json([
            'message' => 'Đã tìm thấy ' . $data->count() . ' kết quả',
            'data' => $data,
        ]);
    }

    public function getPostByMajor(Request $request)
    {
        $input = $request->all();
        $posts = $this->post_repo->getMajorByPost(Constant::STATUS_APPROVED_POST, $input['major'],Carbon::now()->subMonth(),Carbon::now());
        if ($request->ajax())
        {
            return response()->json([
                'posts' => $posts
            ]);
        }

        return view('user.job.post_major')->with('posts', $posts);
    }

    public function searchAjaxName(Request $request)
    {
        $data = User::search()->get();

        return response()->json([
            'message' => 'Đã tìm thấy ' . $data->count() . ' kết quả',
            'data' => $data,
        ]);
    }
}
