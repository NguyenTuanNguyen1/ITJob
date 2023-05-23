<?php
namespace App\Repositories;

use App\Constant;
use App\Interfaces\IPostRepository;
use App\Models\Company;
use App\Models\Post;

class PostRepository implements IPostRepository
{
    public function all()
    {
        return Post::orderBy('id','DESC')->where('status', Constant::STATUS_APPROVED_POST)->paginate(8);
    }

    public function create(array $data)
    {
        $post = new Post();
        $post->title = $data['title'];
        $post->requirements = $data['requirements'];
        $post->description = $data['description'];
        $post->benefit = $data['benefit'];
        $post->experience = $data['experience'];
        $post->working = $data['working'];
        $post->quantity = $data['quantity'];
        $post->position = $data['position'];
        $post->workplace = $data['workplace'];
        $post->major = $data['major'];
        $post->image = $data['image'];
        $post->user_id = $data['user_id'];
        $post->save();
        return Post::where('title', $data['title'])->first();
    }

    public function find($id)
    {
        return Post::find($id);
    }
    public function update($id,array $data)
    {
        return Post::find($id)->update([
            'title' => $data['title'],
            'requirements' => $data['requirements'],
            'description' => $data['description'],
            'benefit' => $data['benefit'],
            'quantity' => $data['quantity'],
            'position' => $data['position'],
            'workplace' => $data['workplace'],
            'experience' => $data['experience'],
            'working' => $data['working'],
            'major' => $data['major'],
            'image' => $data['image'],
            'status' => $data['status'],
            'approved_user_id' => $data['approved_user_id'],
            'user_id' => $data['user_id']
        ]);
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

    public function getMajorByPost($action, $major, $from, $to)
    {
        return Post::where('major', $major)
            ->where('created_at', '>=', $from)
            ->where('created_at', '<=', $to)
            ->where('status', $action)
            ->orderBy('id','DESC')
            ->paginate(8);
    }

    public function getPostByCondition($condition)
    {

    }
}
