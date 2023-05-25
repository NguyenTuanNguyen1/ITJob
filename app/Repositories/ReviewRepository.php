<?php
namespace App\Repositories;

use App\Interfaces\IReviewRepository;
use App\Models\Review;

class ReviewRepository implements IReviewRepository
{

    public function all()
    {
        return Review::orderBy('id','DESC')->paginate(8);
    }

    public function create(array $review)
    {
        $data = new Review();
        $data->content = $review['content'];
        $data->from_user_id = $review['from_user_id'];
        $data->to_user_id = $review['to_user_id'];
        $data->save();
        return $data;
    }

    public function find($id)
    {
        return Review::find($id);
    }
    public function update($id,array $data)
    {
        $result = Review::find($id)->update([
            'content' => $data['content'],
            'image' => $data['image'],
            'form_user_id' => $data['form_user_id'],
            'to_user_id' => $data['to_user_id'],
        ]);
        return $result;
    }
    public function delete($id)
    {
        return Review::find($id)->delete();
    }

    public function storage($id)
    {
        // TODO: Implement storage() method.
    }

    public function trashed()
    {
        return Review::onlyTrashed()->get();
    }

    public function restore($id)
    {
        return Review::onlyTrashed()->where('id', $id)->restore();
    }

    public function getReviewByUser($to_user_id)
    {
        return Review::with('from_user')->where('to_user_id', $to_user_id)->get();
    }
}
