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

        try {
            $input['image'] = $this->uploadImage($request);

            $review = $this->review_repo->create($input);
            if (empty($review)) {
                return response()->json([
                    'result' => false,
                    'message' => 'Tạo bài viết thất bại'
                ]);
            }
            return response()->json([
                'result' => true,
                'message' => 'Tạo bài viết thành công'
            ]);
        }catch (\Exception $e)
        {
            return response()->json([
                'result' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function update(Request $request)
    {
        $input = $request->all();

        try {
            $this->review_repo->update($input['id'], $input);
            toast('Chỉnh sửa thành công', 'success');
            return response()->json([
                'result' => true,
                'message' => 'Chỉnh sửa bài viết thành công'
            ]);
        }catch (\Exception $e)
        {
            return response()->json([
                'result' => false,
                'message' => $e->getMessage()
            ]);
        }
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

        try {
            $review = $this->review_repo->delete($input['id']);
            if (empty($review)) {
                return response()->json([
                    'result' => true,
                    'message' => 'Đã xoá bài viết thành công'
                ]);
            }
            return response()->json([
                'result' => false,
                'message' => 'Xoá bài viết thất bại'
            ]);
        }catch (\Exception $e)
        {
            return response()->json([
                'result' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function restore(Request $request)
    {
        $input = $request->all();

        try {
            $review = $this->review_repo->restore($input['id']);
            return response()->json([
                'result' => true,
                'data' => $review
            ]);
        }catch (\Exception $e)
        {
            return response()->json([
                'result' => false,
                'data' => $e->getMessage()
            ]);
        }
    }
}
