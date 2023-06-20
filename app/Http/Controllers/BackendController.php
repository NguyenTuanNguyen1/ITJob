<?php

namespace App\Http\Controllers;

use App\Constant;
use App\Interfaces\IAdminRepository;
use App\Interfaces\ICompanyRepository;
use App\Interfaces\IInformationRepository;
use App\Interfaces\IPostRepository;
use App\Interfaces\ISearchRepository;
use App\Interfaces\ITicketRepository;
use App\Interfaces\IUserRepository;
use App\Mail\DeletePostMail;
use App\Mail\NotificationDeleteUser;
use App\Mail\NotificationRestoreUser;
use App\Mail\RestorePostMail;
use App\Models\Post;
use App\Models\User;
use App\Repositories\RoleRepository;
use App\Trait\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * @property IPostRepository $post_repo
 * @property IUserRepository $user_repo
 * @property IAdminRepository $admin_repo
 * @property ITicketRepository $ticket_repo
 * @property IInformationRepository $information_repo
 * @property RoleRepository $role_repo
 * @property ISearchRepository $search_repo
 * @property ICompanyRepository $company_repo
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
        RoleRepository $roleRepostitory,
        ISearchRepository $searchRepository,
        ICompanyRepository $companyRepository
    )
    {
        $this->post_repo = $postRepository;
        $this->user_repo = $userRepository;
        $this->admin_repo = $adminRepository;
        $this->ticket_repo = $ticketRepository;
        $this->information_repo = $informationRepository;
        $this->role_repo = $roleRepostitory;
        $this->search_repo = $searchRepository;
        $this->company_repo = $companyRepository;
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

    public function searchCompanyFilter(Request $request)
    {
        $input = $request->all();

        $users = $this->search_repo->searchCompanyFilter($input);

        return view('company.search_result')->with([
            'users' => $users,
        ]);
    }

    public function searchFilterDatetime(Request $request)
    {
        $input = $request->all();

        $posts = $this->search_repo->searchDatetimeFilter($input['from'], $input['to'], $input['user_id']);
        $all_post = $this->post_repo->getPostByCondition('user_id', Auth::user()->id);
        $post_approved = array_filter($all_post->toArray(), function ($data){
            return $data['status'] == Constant::STATUS_APPROVED_POST;
        });
        $post_not_approved = array_filter($all_post->toArray(), function ($data){
            return $data['status'] == Constant::STATUS_NOT_APPROVED_POST;
        });
        return view('company.searchDatetimeResult')->with([
            'posts' => $posts,
            'count_all_post' => count($all_post),
            'count_post_approved' => count($post_approved),
            'count_post_not_approved' => count($post_not_approved),
        ]);
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
        $company_outstanding = $this->company_repo->getPostOutstanding();

        if ($request->ajax())
        {
            return response()->json([
                'posts' => $posts
            ]);
        }

        return view('user.job.post_major')->with([
            'posts' => $posts,
            'company_outstanding' => $company_outstanding
        ]);
    }

    public function searchAjaxName(Request $request)
    {
        $data = User::search()->get();

        return response()->json([
            'message' => 'Đã tìm thấy ' . $data->count() . ' kết quả',
            'data' => $data,
        ]);
    }

    public function deletePostMail(Request $request)
    {
        $input = $request->all();
        $post = $this->post_repo->findTrashed($input['id']);
        $this->sendMailUser($post->user, new DeletePostMail(Carbon::now()));
    }

    public function restorePostMail(Request $request)
    {
        $input = $request->all();
        $post = $this->post_repo->find($input['id']);
        $this->sendMailUser($post->user, new RestorePostMail($post->user->name, $post->user->emai, $input['id']));
    }

    public function deleteUserMail(Request $request)
    {
        $input = $request->all();
        $user = $this->user_repo->storage($input['id']);
        $this->sendMailUser($user, new NotificationDeleteUser());
    }

    public function restoreUserMail(Request $request)
    {
        $input = $request->all();
        $user = $this->user_repo->find($input['id']);
        $this->sendMailUser($user, new NotificationRestoreUser($user->name, $user->email));
    }

    public function user(Request $request)
    {
        $input = $request->all();

        $user = $this->user_repo->find($input['id']);
        if (empty($user))
        {
            $user = $this->user_repo->storage($input['id']);
        }
        return response()->json([
           'user' => $user
        ]);
    }

    public function post(Request $request)
    {
        $input = $request->all();

        $post = $this->post_repo->find($input['id']);
        if (empty($post))
        {
            $post = $this->post_repo->findTrashed($input['id']);
        }
        return response()->json([
            'post' => $post
        ]);
    }

    public function ticket(Request $request)
    {
        $input = $request->all();

        $ticket = $this->ticket_repo->find($input['id']);
        if (empty($ticket))
        {
            $ticket = $this->ticket_repo->trashed($input['id']);
        }
        return response()->json([
            'ticket' => $ticket
        ]);
    }

    public function searchHistory(Request $request)
    {
        $input = $request->all();

        $history = $this->search_repo->searchHistoryDatetimeFilter($input['from'], $input['to']);
        return view('admin.dashboard.searchDatetimeResultHistory')->with('history',$history);
    }
}
