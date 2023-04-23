<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Interfaces\IReviewRepository;
use App\Trait\Service;
use Illuminate\Http\Request;

/**
 * @property IReviewRepository $review_repo
 */
class ReviewController extends Controller
{
    use Service;
    public function __construct
    (
        IReviewRepository $reviewRepository
    )
    {
        $this->review_repo = $reviewRepository;
    }

    public function index()
    {
        $review = $this->review_repo->all();
        return response()->json([
            'data' => $review
        ]);
    }

    public function show($id)
    {
        $review = $this->review_repo->find($id);
        return view('home')->with('review', $review);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $input['image'] = $this->uploadImage($request);

        $review = $this->review_repo->create($input);
        if (empty($review)) {
            return redirect()->back()->with('Error', 'Lỗi tạo bài viết');
        }
        toast('Đã tạo thành công', 'success');
        return redirect()->route('home');
    }

    public function update(Request $request)
    {
        $input = $request->all();
        $this->review_repo->update($input['id'], $input);
        toast('Chỉnh sửa thành công', 'success');
        return redirect()->route('home');
    }

    public function trashed()
    {
        $review = $this->review_repo->trashed();
        return response()->json([
           'data' => $review
        ]);
    }

    public function delete(Request $request)
    {
        $input = $request->all();
        $review = $this->review_repo->delete($input['id']);
        if (empty($review)) {
            toast('Đã xoá thành công', 'success');
            return redirect()->route('home');
        }
        return redirect()->back()->with('Error', 'Lỗi xoá bài viết');
    }

    public function restore($id)
    {
        $review = $this->review_repo->restore($id);
        return response()->json([
            'result' => true,
            'data' => $review
        ]);
    }
}
