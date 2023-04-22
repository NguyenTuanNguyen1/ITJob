<?php

namespace App\Trait;

use App\Constant;
use App\Models\InformationType;
use App\Models\Skill;
use App\Models\TicketType;
use App\Models\User;
use Illuminate\Http\Request;
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

    public function checkExist(Request $request, $action)
    {
        switch ($action){
            case Constant::CHECK_EMAIL_EXIST;
                $emailExists = User::where('email',$request->email)->count();
                if ($emailExists > 0) {
                    return redirect()->back()->with("Error","Tài khoản Gmail đã tồn tại!");
                }
                break;

            case Constant::CHECK_USERNAME:
                $userExists = User::where('username',$request->username)->count();
                if ($userExists >0) {
                    return redirect()->back()->with("Error","Tài khoản người dùng đã tồn tại!");
                }
                break;

            case Constant::CHECK_INFORMATION_TYPE:
                $informationTypeExists = InformationType::where('content',$request->content)->count();
                if ($informationTypeExists > 0) {
                    return redirect()->back()->with("Error","Nội dung đã tồn tại!");
                }
                break;

            case Constant::CHECK_TICKET_TYPE:
                $ticketTypeExists = TicketType::where('content',$request->content)->count();
                if ($ticketTypeExists > 0) {
                    return redirect()->back()->with("Error","Nội dung đã tồn tại!");
                }
                break;

            case Constant::CHECK_SKILL:
                $skillExists = Skill::where('content',$request->content)->count();
                if ($skillExists > 0) {
                    return redirect()->back()->with("Error","Nội dung đã tồn tại!");
                }
                break;
        }
    }
}
