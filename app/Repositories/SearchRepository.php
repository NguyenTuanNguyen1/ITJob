<?php
namespace App\Repositories;

use App\Interfaces\ISearchRepository;
use App\Models\InformationType;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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
        return Post::where('major', $data['major'])
                    ->orWhere('position', $data['position'])
                    ->orWhere('workplace', $data['workplace'])
                    ->orWhere('level', $data['level'])
                    ->orWhere('major', $data['major'])
                    ->orderBy('id','DESC')
                    ->whereNotNull('status')
                    ->paginate(8);
    }
}
