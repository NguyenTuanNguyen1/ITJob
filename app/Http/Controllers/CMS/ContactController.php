<?php

namespace App\Http\Controllers;

use App\Constant;
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
        return response()->json([
            'data' => $contact
        ]);
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $input['type_id'] = Constant::TICKET_CONTACT;
        $contact = $this->ticket_repo->create($input);
        if (empty($contact)) {
            return redirect()->back()->with('Error', 'Lỗi tạo bài viết');
        }
        toast('Đã tạo thành công', 'success');
        return redirect()->route('home');
    }

//    public function update(Request $request)
//    {
//        $input = $request->all();
//        $this->ticket_repo->update($input['id'], $input);
////        toast('Chỉnh sửa thành công', 'success');
//        return redirect()->route('home');
//    }

    public function delete(Request $request)
    {
        $input = $request->all();
        $contact = $this->ticket_repo->delete($input['id']);
        if (empty($contact)) {
            toast('Đã xoá thành công', 'success');
            return redirect()->route('home');
        }
        return redirect()->back()->with('Error', 'Lỗi xoá bài viết');
    }

    public function trashed()
    {
        $contact = $this->ticket_repo->trashed();
        return response()->json([
            'data' => $contact
        ]);
    }

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
