<?php

namespace App\Interfaces;

interface IBackendRepository
{
    public function getMessage($from_user_id, $to_user_id);
}
