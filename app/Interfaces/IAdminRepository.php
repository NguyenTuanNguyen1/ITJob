<?php

namespace App\Interfaces;

interface IAdminRepository
{
    public function checkRole($role, $id);
}
