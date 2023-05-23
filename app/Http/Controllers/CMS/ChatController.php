<?php

namespace App\Http\Controllers\CMS;

use App\Events\Chat;
use App\Http\Controllers\Controller;
use App\Interfaces\ICompanyRepository;
use App\Interfaces\IPostRepository;
use App\Interfaces\IUserRepository;
use App\Models\Message;
use App\Repositories\BackendRepository;
use Illuminate\Http\Request;

/**
 * @property IPostRepository $post_repo
 * @property ICompanyRepository $company_repo
 * @property IUserRepository $user_repo
 * @property BackendRepository $back_repo
 */
class ChatController extends Controller
{
    public function __construct
    (
        IPostRepository $postRepository,
        ICompanyRepository $companyRepository,
        IUserRepository $userRepository,
        BackendRepository $backendRepository
    ) {
        $this->post_repo = $postRepository;
        $this->company_repo = $companyRepository;
        $this->user_repo = $userRepository;
        $this->back_repo = $backendRepository;
    }

    public function index()
    {
        return view('messenger.layout');
    }

    public function messenger($from_user_name, Request $request)
    {
        $messages = $this->back_repo->getMessage($from_user_name, 19);

        if ($request->ajax())
        {
            return response()->json([
                'message' => $messages,
                'to_user' => 19
            ]);
        }
        return view('messenger.chat')->with('messages', $messages);
    }

    public function chat(Request $request)
    {
        $input = $request->all();
        event(new Chat('', $input['message']));

        return Message::create([
            'message' => $input['message'],
            'from_user_id' => 1,
            'to_user_id' => 19
        ]);
    }
}
