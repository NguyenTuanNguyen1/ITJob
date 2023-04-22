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
        $data->image = $review['image'];
        $data->form_user_id = $review['form_user_id'];
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
        Review::onlyTrashed()->get();
    }

    public function restore($id)
    {
        Review::onlyTrashed()->where('id', $id)->restore();
    }
}
