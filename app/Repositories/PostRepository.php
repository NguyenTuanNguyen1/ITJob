<?php
namespace App\Repositories;

use App\Constant;
use App\Interfaces\IPostRepository;
use App\Models\Company;
use App\Models\Post;
use Carbon\Carbon;

class PostRepository implements IPostRepository
{
    public function getPost($action)
    {
        return Post::with('approved_user')->orderBy('id','DESC')->where('status', $action)->paginate(8);
    }

    public function all()
    {
        return Post::all();
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
        return Post::onlyTrashed()->with(['approved_user','delete_user'])->get();
    }

    public function restore($id)
    {
        return Post::onlyTrashed()->where('id', $id)->restore();
    }

    public function getMajorByPost($action, $major, $from, $to)
    {
        return Post::where('status', $action)
            ->where('major', $major)
            ->where('created_at', '>=', $from)
            ->where('created_at', '<=', $to)
            ->orderBy('id', 'DESC')
            ->paginate(8);
    }

    public function getPostByCondition($condition, $action)
    {
        return Post::where($condition, $action)->get();
    }

    public function getPostApprovedLastWeek($action, $from)
    {
        return Post::with('user')->with('approved_user')->where('status', $action)
            ->where('approved_date', '>=', $from)
            ->where('approved_date', '<=', Carbon::now())
            ->get();
    }
}
