<?php

namespace App\Repositories;

use App\Constant;
use App\Interfaces\IAdminRepository;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;

class AdminRepository implements IAdminRepository
{
    public function checkRole($id, $role)
    {
        $admin = User::where('id', $id)->where('role_id', $role)->get();
        if (empty($admin))
        {
            return false;
        }
        return true;
    }
    public function changeStatusPost($id, $user_id, $status)
    {
        return Post::find($id)->update([
            'approved_user_id' => $user_id,
            'status' => $status,
            'approved_date' => Carbon::now()
        ]);
    }
}
