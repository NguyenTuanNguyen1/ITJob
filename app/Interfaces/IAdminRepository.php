<?php

namespace App\Interfaces;

interface IAdminRepository
{
    public function checkRole($id, $role);
    public function changeStatusPost($id, $user_id, $status);
}
