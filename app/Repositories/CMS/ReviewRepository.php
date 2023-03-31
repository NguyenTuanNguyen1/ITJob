<?php
namespace App\Repositories;

use App\Interfaces\IReviewRepository;
use App\Models\Review;

class ReviewRepository implements IReviewRepository
{

    public function all()
    {
        return Review::orderBy('id','DESC')->paginate(5);
    }

    public function create(array $review)
    {
        $data = new Review();
        $data->content = $review['content'];
        $data->user_id = $review['user_id'];

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
            'user_id' => $data['user_id'],
        ]);
    }
    public function delete($id)
    {
        return Review::find($id)->delete();
    }

    public function trashed()
    {
        return Review::withTrashed()->get();
    }

    public function storage($id)
    {
        // TODO: Implement storage() method.
    }

    public function restore($id)
    {
        return Review::withTrashed()->where('id', $id)->restore();
    }
}