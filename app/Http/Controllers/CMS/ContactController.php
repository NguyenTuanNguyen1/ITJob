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

        if (!$this->admin_repo->checkRole(Constant::ROLE_ADMIN, $input['admin_id']))
        {
            abort(401);
        }

        try {
            $contact = $this->ticket_repo->delete($input['id']);
            if (empty($contact)) {
                return response()->json([
                    'result' => true,
                ]);
            }
            return response()->json([
                'result' => false,
            ]);
        }catch (\Exception $e)
        {
            return response()->json([
                'result' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function reply(Request $request)
    {
        $input = $request->all();

        $this->ticket_repo->reply($input['id']);
        $this->sendMailUser($input['email'], new ReplyMail($input['data']));
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
