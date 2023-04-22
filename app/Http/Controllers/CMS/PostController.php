<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class PostController extends Controller
{
    public function index()
    {
        return view('user.job.post');
    }

    public function store(){

    }
}
