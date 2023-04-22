<?php
namespace App\Repositories;

use App\Interfaces\IPostRepository;
use App\Models\Company;
use App\Models\Post;

class PostRepository implements IPostRepository
{
    public function all()
    {
        return Post::orderBy('id','DESC')->paginate(8);
    }

    public function create(array $post)
    {
        $data = new Post();
        $data->title = $post['title'];
        $data->requirements = $post['requirements'];
        $data->description = $post['description'];
        $data->benefit = $post['benefit'];
        $data->quantity = $post['quantity'];
        $data->position = $post['position'];
        $data->workplace = $post['workplace'];
        $data->level = $post['level'];
        $data->major = $post['major'];
        $data->status = $post['status'];
        $data->approved_user_id = $post['approved_user_id'];
        $data->skill_id = $post['skill_id'];
        $data->user_id = $post['user_id'];
        $data->save();
        return $data;
    }

    public function find($id)
    {
        return Post::find($id);
    }
    public function update($id,array $data)
    {
        $result = Post::find($id)->update([
            'title' => $data['title'],
            'requirements' => $data['requirements'],
            'description' => $data['description'],
            'benefit' => $data['benefit'],
            'quantity' => $data['quantity'],
            'position' => $data['position'],
            'workplace' => $data['workplace'],
            'level' => $data['level'],
            'major' => $data['major'],
            'status' => $data['status'],
            'approved_user_id' => $data['approved_user_id'],
            'skill_id' => $data['skill_id'],
            'user_id' => $data['user_id']
        ]);
        return $result;
    }
    public function delete($id)
    {
        return Post::find($id)->delete();
    }

    public function storage($id)
    {
        // TODO: Implement storage() method.
    }

    public function trashed()
    {
        Company::onlyTrashed()->get();
    }

    public function restore($id)
    {
        Company::onlyTrashed()->where('id', $id)->restore();
    }
}
