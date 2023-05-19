<?php

namespace App\Repositories;

use App\Constant;
use App\Interfaces\IAdminRepository;
use App\Models\User;

class AdminRepository implements IAdminRepository
{
    public function checkRole($role, $id)
    {
        $admin = User::where('id', $id)->where('role_id', $role)->get();
        if (empty($admin))
        {
            return false;
        }
        return true;
    }
}
