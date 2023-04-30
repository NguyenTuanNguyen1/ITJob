<?php

namespace App\Trait;

use App\Constant;
use App\Models\InformationType;
use App\Models\Role;
use App\Models\Skill;
use App\Models\TicketType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

trait Service
{
    public function uploadImage(Request $request)
    {
        $data['image'] = $request->image;
//        dd($data['image']);
        $nameImage = Str::random(6);
        if ($request->has("image") != null) {
            $fileName = "{$nameImage}.jpg";
            $request->file('image')->storeAs('anh', $fileName, 'public');
            $data['image'] = "$fileName";
            return $data['image'];
        }
    }

    public function checkExist($data, $action)
    {
        switch ($action){
            case Constant::CHECK_SKILL:
                $skillExists = Skill::where('content',$data['content'])->count();
                if ($skillExists > 0) return true;
                return false;

            case Constant::TYPE_INFORMATION:
                $informationTypeExist = InformationType::where('content',$data['content'])->count();
                if ($informationTypeExist > 0) return true;
                return false;

            case Constant::TYPE_TICKET:
                $ticketTypeExists = TicketType::where('content',$data['content'])->count();
                if ($ticketTypeExists > 0) return true;
                return false;

            case Constant::TYPE_ROLE:
                $roleExist = Role::where('content',$data['content'])->count();
                if ($roleExist > 0) return true;
                return false;
        }
    }

    public function sendMailUser($user, $mailable)
    {
        if (self::isValidMail($user['email']))
        {
            Mail::to($user['email'])->send($mailable);
        }
    }

    function isValidMail($email)
    {
        if (!strpos($email, '@')) {
            return false;
        }

        list($user, $domain) = explode('@', $email);

        if (!checkdnsrr($domain)) {
            return false;
        }

        $email_dummies =  array(
            'example.com',
            'example.org',
            'example.net'
        );
        foreach ($email_dummies as $email_dummy) {
            if (str_contains($email, $email_dummy)) {
                return false;
            }
        }
        return true;
    }
}
