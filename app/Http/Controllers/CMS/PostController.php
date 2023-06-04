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
use Illuminate\Support\Facades\Auth;
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

    public function all(Request $request)
    {
        $post_approved = $this->post_repo->all(Constant::STATUS_APPROVED_POST);
        $post_not_approved = $this->post_repo->all(Constant::STATUS_NOT_APPROVED_POST);

        if ($request->ajax())
        {
            return  response()->json([
                'message_approved' => 'Có tất cả ' . count($post_approved) . ' bài viết được phê duyệt',
                'message_not_approved' => 'Có tất cả ' . count($post_not_approved) . ' bài viết chưa được phê duyệt',
                'approved' => $post_approved,
                'not_approved' => $post_not_approved
            ]);
        }

        return view('user.job.post');
    }

    public function show($id, Request $request)
    {
        $from = Carbon::now()->startOfWeek()->subWeek()->toDateString();
        $to = Carbon::now()->endOfWeek()->subWeek()->toDateString();
        $post = $this->post_repo->find($id);
        $post_majors = $this->post_repo->getMajorByPost(Constant::STATUS_APPROVED_POST, $post->major, $from, $to);

        if ($request->ajax()) {
            return response()->json([
                'post' => $post,
                'post_majors' => $post_majors,
            ]);
        }

        return view('user.job.detail',[
            'post' => $post,
            'post_majors' => $post_majors,
            'auth' => is_null(Auth::user()) ? null : Auth::user()->id
        ]);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        if (!$this->admin_repo->checkRole(Constant::ROLE_CANDIDATE, $input['user_id']))
        {
            abort(401);
        }

        $post = $this->post_repo->create($input);
        if(empty($post))
        {
            return redirect()->back()->with('Error','Lỗi tạo bài viết');
        }

        return redirect()->route('company.index');
    }

    public function update(Request $request)
    {
        $input = $request->all();
        $this->post_repo->update($input['id'], $input);
        alert('Cập nhật thành công', null, 'success');
        return redirect()->route('post.detail', $input['id']);
    }

    public function delete(Request $request)
    {
        $input = $request->all();

        if (!$this->admin_repo->checkRole(Constant::ROLE_CANDIDATE, $input['user_id']))
        {
            abort(401);
        }

        $this->post_repo->delete($input['id']);
        $this->ActivityLog(  "Bạn đã xoá bài tuyển dụng " , $input['user_id']);

        return response()->json([
            'result' => true
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

        if (!$this->admin_repo->checkRole(Constant::ROLE_CANDIDATE, $input['user_id']))
        {
            abort(401);
        }

        $this->post_repo->restore($input['id']);
        $this->ActivityLog(  "Bạn đã khôi phục bài viết*" . $input['id'] , Auth::user()->id);
        return response()->json([
            'result' => true
        ]);
    }

}
