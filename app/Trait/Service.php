<?php

namespace App\Trait;

use App\Constant;
use App\Interfaces\IUserRepository;
use App\Models\Activity;
use App\Models\Applied;
use App\Models\InformationType;
use App\Models\Role;
use App\Models\Skill;
use App\Models\TicketType;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

trait Service
{
    public function __construct
    (
        IUserRepository $userRepository,
    ) {
        $this->user_repo = $userRepository;
    }

    public function uploadImage(Request $request)
    {
        $data['image'] = $request->image;
//        dd($data['image']);
        $nameImage = Str::random(6);
        if ($request->has("image") != null) {
            $fileName = "{$nameImage}.jpg";
            $request->file('image')->storeAs('image_avatar', $fileName, 'public');
            $data['image'] = "$fileName";
            return $data['image'];
        }
    }


    public function uploadMultipleImage(Request $request)
    {
//        $path = [];
//        $image = [];
        /** @var TYPE_NAME $path */
        /** @var TYPE_NAME $image */
        $nameImage = Str::random(6);
        if ($files = $request->file('image')) {
            foreach ($files as $file) {
                $fileName = "{$nameImage}.jpg";
                $path[] = $file->move('image_avatar', $fileName, 'public');
                //$file->move(public_path('/anh'), end($filename));

                $image[] = $fileName;
            }
        }
    }

    public function checkExist($data, $action)
    {
        switch ($action) {
            case Constant::TYPE_INFORMATION:
                $informationTypeExist = InformationType::where('content', $data['content'])->count();
                if ($informationTypeExist > 0) {
                    return true;
                }
                return false;

            case Constant::TYPE_TICKET:
                $ticketTypeExists = TicketType::where('content', $data['content'])->count();
                if ($ticketTypeExists > 0) {
                    return true;
                }
                return false;

            case Constant::TYPE_ROLE:
                $roleExist = Role::where('content', $data['content'])->count();
                if ($roleExist > 0) {
                    return true;
                }
                return false;
        }
    }

    public function sendMailUser($user, $mailable)
    {
        if (self::isValidMail($user['email'])) {
            Mail::to($user['email'])->send($mailable);
        }
    }

    public function sendMailByRole($role, $mailable)
    {
        $users = $this->user_repo->getUserByRole($role);
        foreach ($users as $user) {
            if (self::isValidMail($user->email)) {
                Mail::to($user->email)->send($mailable);
            }
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

        $email_dummies = array(
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

    public function ActivityLog($message, $user_id)
    {
        return Activity::insert([
            'content' => Carbon::now()->format('d-m-Y H:i') . ' : ' . $message,
            'user_id' => $user_id
        ]);
    }

    public function appliedPost($user_id, $post_id)
    {
        return Applied::insert([
            'user_id' => $user_id,
            'post_id' => $post_id
        ]);
    }
}
