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
        return Post::with('user')
            ->where('major', $data['major'])
            ->where('working', $data['working'])
            ->where('position', $data['position'])
            ->orderBy('id', 'DESC')
            ->paginate(8);
    }

    public function searchCompanyFilter(array $data)
    {
        return User::where('major', $data['major'])
            ->where('position', $data['position'])
            ->where('role_id', Constant::ROLE_CANDIDATE)
            ->get();
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
