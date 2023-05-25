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
    ) {
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
            $review = $this->review_repo->create($input);
            if (empty($review)) {
                return response()->json([
                    'result' => false,
                    'message' => 'Tạo bài viết thất bại'
                ]);
            }
            if ($request->ajax()) {
                return response()->json([
                    'result' => true,
                    'message' => $request
                ]);
            }

            return redirect()->route('user.profile', $input['id']);
        } catch (\Exception $e) {
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
            $this->ActivityLog("Bạn đã chỉnh sửa nhận xét của mình tại " . $input['id'], $input['user_id']);
            toast('Chỉnh sửa thành công', 'success');
            return response()->json([
                'result' => true,
                'message' => 'Chỉnh sửa bài viết thành công'
            ]);
        } catch (\Exception $e) {
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
            $this->ActivityLog('Bạn đã xoá bài nhận xét', $input['user_id']);

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
        } catch (\Exception $e) {
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

            $this->ActivityLog('Bạn đã khôi phục bài nhận xét*' . $input['id'], $input['user_id']);

            return response()->json([
                'result' => true,
                'data' => $review
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'result' => false,
                'data' => $e->getMessage()
            ]);
        }
    }
}
