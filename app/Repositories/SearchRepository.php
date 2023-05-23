<?php
namespace App\Repositories;

use App\Constant;
use App\Interfaces\ISearchRepository;
use App\Models\InformationType;
use App\Models\Post;
use App\Models\User;

class SearchRepository implements ISearchRepository
{
    public function searchMajorUser($data)
    {
        return User::where('major', $data)->get();
    }

    public function searchInformationType($data)
    {
        return InformationType::where('content', $data)->get();
    }

    public function searchFilter(array $data)
    {
        return Post::
                    orWhere('position', $data['position'])
                    ->orWhere('working', $data['working'])
                    ->orWhere('major', $data['major'])
                    ->orderBy('id','DESC')
                    ->paginate(8);
    }

    public function searchUserByRole($role)
    {
        return User::where('role_id', $role)->get();
    }

    public function StatisticalPost($action, $from, $to)
    {
        return Post::where('status', $action)
            ->where('created_at', '>=', $from)
            ->where('created_at', '<=', $to)->count();
    }
}
