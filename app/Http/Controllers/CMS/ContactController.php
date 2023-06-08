<?php

namespace App\Http\Controllers\CMS;

use App\Constant;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\ContactRequest;
use App\Interfaces\IAdminRepository;
use App\Interfaces\ITicketRepository;
use App\Mail\ReplyMail;
use App\Trait\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * @property ITicketRepository $ticket_repo
 * @property IAdminRepository $admin_repo
 */
class ContactController extends Controller
{
    use Service;
    public function __construct
    (
        ITicketRepository $ticketRepository,
        IAdminRepository $adminRepository
    )
    {
        $this->ticket_repo = $ticketRepository;
        $this->admin_repo = $adminRepository;
    }

    public function view()
    {
        return view('layout.contact');
    }

    public function show(Request $request)
    {
        $input = $request->all();

        $contact = $this->ticket_repo->find($input['id'],Constant::TICKET_CONTACT);

        return response()->json([
            'data' => $contact
        ]);
    }

    public function store(ContactRequest $request)
    {
        $input = $request->all();

        $input['type_id'] = Constant::TICKET_CONTACT;
        $input['image'] = $input['post_id']  = null;
        $input['user_id'] = is_null(Auth::user()->id) ?: Auth::user()->id;

        $contact = $this->ticket_repo->create($input);
        if (empty($contact)) {
            alert('Bạn đã gửi tin nhắn thất bại', null,'error');
            return redirect()->route('contact.index');
        }
        alert('Bạn đã gửi tin nhắn thành công', null,'success');
        return redirect()->route('contact.index');
    }

    public function delete(Request $request)
    {
        $input = $request->all();

        $this->ticket_repo->delete($input['id']);
        $this->ActivityLog('Bạn đã xoá bản báo cáo bài viết*' . $input['id'], Auth::user()->id);

        return redirect()->route('dashboard.contact');
    }

    public function replied(Request $request)
    {
        $input = $request->all();

        $contact = $this->ticket_repo->listReplied($input['id'], Constant::TICKET_CONTACT);
        return response()->json([
            'data' => $contact
        ]);
    }
}
