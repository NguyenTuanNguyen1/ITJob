<?php

namespace App\Http\Controllers\CMS;

use App\Constant;
use App\Http\Controllers\Controller;
use App\Interfaces\ITicketRepository;
use App\Mail\ReplyMail;
use App\Trait\Service;
use Illuminate\Http\Request;

/**
 * @property ITicketRepository $ticket_repo
 */
class ContactController extends Controller
{
    use Service;
    public function __construct
    (
        ITicketRepository $ticketRepository
    )
    {
        $this->ticket_repo = $ticketRepository;
    }

    public function index()
    {
        $contact = $this->ticket_repo->all(Constant::TICKET_CONTACT);
        return response()->json([
            'data' => $contact
        ]);
    }

    public function show($id)
    {
        $contact = $this->ticket_repo->find($id);
        if (empty($contact))
        {
            return response()->json([
                'result' => false,
                'message' => 'Không tìm thấy'
            ]);
        }
        return response()->json([
            'data' => $contact
        ]);
    }

    public function store(Request $request)
    {
        $input = $request->all();

        try {
            $input['type_id'] = Constant::TICKET_CONTACT;
            $contact = $this->ticket_repo->create($input);
            if (empty($contact)) {
                return response()->json([
                    'result' => false,
                ]);
            }
            return response()->json([
                'result' => true,
            ]);
        }catch (\Exception $e)
        {
            return response()->json([
                'result' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function delete(Request $request)
    {
        $input = $request->all();

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

//    public function trashed()
//    {
//        $contact = $this->ticket_repo->trashed();
//        return response()->json([
//            'data' => $contact
//        ]);
//    }

    public function reply(Request $request)
    {
        $input = $request->all();

        $this->ticket_repo->reply($input['id']);
        $this->sendMailUser($input['email'], new ReplyMail($input['data']));
    }

    public function replied()
    {
        $contact = $this->ticket_repo->replied();
        return response()->json([
            'data' => $contact
        ]);
    }
}
