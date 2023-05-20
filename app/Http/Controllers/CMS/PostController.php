<?php

namespace App\Http\Controllers\CMS;

use App\Constant;
use App\Http\Controllers\Controller;
use App\Interfaces\IAdminRepository;
use App\Interfaces\IInformationRepository;
use App\Interfaces\IPostRepository;
use App\Trait\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

/**
 * @property IPostRepository $post_repo
 * @property IInformationRepository $infor_repo
 * @property IAdminRepository $admin_repo
 */
class PostController extends Controller
{
    use Service;
    public function __construct
    (
        IPostRepository $postRepository,
        IInformationRepository $informationRepository,
        IAdminRepository $adminRepository
    )
    {
        $this->post_repo = $postRepository;
        $this->infor_repo = $informationRepository;
        $this->admin_repo = $adminRepository;
    }

    public function index()
    {
        return view('user.job.post');
    }

    public function show($id)
    {
        $from = Carbon::now()->startOfWeek()->subWeek()->toDateString();
        $to = Carbon::now()->endOfWeek()->subWeek()->toDateString();

        $post = $this->post_repo->find($id);
        $post_majors = $this->post_repo->getMajorByPost(Constant::STATUS_APPROVED_POST, $post->major, $from, $to);
        return view('user.job.detail')
            ->with('post', $post)
            ->with('post_majors', $post_majors);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        if (!$this->admin_repo->checkRole(Constant::ROLE_CANDIDATE, $input['user_id']))
        {
            abort(401);
        }

        $post = $this->post_repo->create($input);
        $this->ActivityLog(  "Bạn đã đăng tin tuyển dụng*" . $post['id'], $input['user_id']);
        if(empty($post))
        {
            return redirect()->back()->with('Error','Lỗi tạo bài viết');
        }

        return redirect()->route('home');
    }

    public function update(Request $request)
    {
        $input = $request->all();

        $post = $this->post_repo->update($input['id'], $input);
        $this->ActivityLog(  "Bạn đã cập nhật tin tuyển dụng*" . $post['id'], $input['user_id']);

        return response()->json([
            'result' => true
        ]);
    }

    public function delete(Request $request)
    {
        $input = $request->all();

        if ($this->admin_repo->checkRole(Constant::ROLE_CANDIDATE, $input['user_id']))
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

    public function trashed(Request $request)
    {
        $input = $request->all();

        if ($this->admin_repo->checkRole(Constant::ROLE_CANDIDATE, $input['user_id']))
        {
            abort(401);
        }

        $post = $this->post_repo->trashed();
        return response()->json([
            'data' => $post
        ]);
    }

    public function restore(Request $request)
    {
        $input = $request->all();

        if ($this->admin_repo->checkRole(Constant::ROLE_CANDIDATE, $input['user_id']))
        {
            abort(401);
        }

        $this->post_repo->restore($input['id']);
        $this->ActivityLog(  "Bạn đã khôi phục bài viết*" . $input['id'] , $input['user_id']);
        return response()->json([
            'result' => true
        ]);
    }
}
