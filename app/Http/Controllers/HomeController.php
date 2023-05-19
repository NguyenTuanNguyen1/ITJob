<?php

namespace App\Http\Controllers;
use App\Interfaces\IPostRepository;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class HomeController extends Controller
{
    public function __construct
    (
        IPostRepository $postRepository
    )
    {
        $this->post_repo = $postRepository;
    }

    public function index()
    {
        $posts = $this->post_repo->all();
        return view('layout.index')->with('posts', $posts);
    }

    public function login()
    {
        return View('user.auth.login');
    }

    public function register()
    {
        return View('user.auth.register');
    }

    public function test()
    {
        return View('user.job.post');
    }

    public function redirect_Google($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function redirect_Facebook($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    //Gọi hàm để tạo user
    public function callback_Google($provider)
    {
        $getInfo = Socialite::driver($provider)->user();
        //dd($getInfo->email);
        $isExist = User::where('email','=',$getInfo->email)->count();
        if($isExist > 0)
            return 'hi';
        else
        {
            //Tạo người dùng qua Google
            $user = $this->createUser($getInfo,$provider);
            $name=$getInfo->name;
            return 'hello';
        }
    }

    public function callback_Facebook($provider)
    {
        $getInfo = Socialite::driver($provider)->user();
       //dd($getInfo->email);
        $isExist = User::where('email','=',$getInfo->email)->count();
        if($isExist > 0)
            return 'hi';
        else
        {
            //Tạo người dùng qua Google
            $user = $this->createUser($getInfo,$provider);
            $name=$getInfo->name;
            return 'hello';
        }
    }

    //Tạo người dùng
    function createUser($getInfo,$provider)
    {
        $user = User::where('email', $getInfo->email)->first();
        if (!$user) {
            $user = User::create([
               'Username'     => $getInfo->name,
               'email'    => $getInfo->email,
               'provider' => $provider,
               'provider_id' => $getInfo->id
           ]);
         }
    }
}
