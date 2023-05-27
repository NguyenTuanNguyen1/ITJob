<?php

namespace App\Interfaces;

interface IAdminRepository
{
    public function checkRole($role, $id);
    public function changeStatusPost($id, $user_id, $status);
}
