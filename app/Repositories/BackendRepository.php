<?php

namespace App\Repositories;

use App\Constant;
use App\Interfaces\IAdminRepository;
use App\Interfaces\IBackendRepository;
use App\Models\Message;
use App\Models\User;

class BackendRepository implements IBackendRepository
{
    public function getMessage($from_user_id, $to_user_id)
    {
        return Message::where('from_user_id', $from_user_id)
                            ->orWhere('to_user_id', $from_user_id)
                            ->get();
    }
}
