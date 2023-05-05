<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Interfaces\IInformationRepository;
use App\Interfaces\IPostRepository;
use App\Trait\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

/**
 * @property IPostRepository $post_repo
 * @property IInformationRepository $infor_repo
 */
class PostController extends Controller
{
    use Service;
    public function __construct
    (
        IPostRepository $postRepository,
        IInformationRepository $informationRepository
    )
    {
        $this->post_repo = $postRepository;
        $this->infor_repo = $informationRepository;
    }

    public function index()
    {
        return view('user.job.post');
    }

    public function show($id)
    {
        $post = $this->post_repo->find($id);
        return view('home')->with('post', $post);
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $post = $this->post_repo->create($input);
        if(empty($post))
        {
            return redirect()->back()->with('Error','Lỗi tạo bài viết');
        }
        toast('Đã tạo thành công', 'success');
        return redirect()->route('home');
    }

    public function update(Request $request)
    {
        $input = $request->all();

        $this->post_repo->update($input['id'], $input);
        toast('Đã cập nhật thành công', 'success');
        return response()->json([
            'result' => true
        ]);
    }

    public function delete(Request $request)
    {
        $input = $request->all();

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

    public function trashed()
    {
        $post = $this->post_repo->trashed();
        return response()->json([
            'data' => $post
        ]);
    }

    public function restore(Request $request)
    {
        $input = $request->all();

        $this->post_repo->restore($input['id']);
        return response()->json([
            'result' => true
        ]);
    }
}
