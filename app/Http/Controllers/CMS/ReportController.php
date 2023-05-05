<?php

namespace App\Http\Controllers\CMS;

use App\Constant;
use App\Http\Controllers\Controller;
use App\Interfaces\ITicketRepository;
use App\Mail\ReplyMail;
use App\Trait\Service;
use Illuminate\Http\Request;

class ReportController extends Controller
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
        $report = $this->ticket_repo->all(Constant::TICKET_REPORT);
        return response()->json([
            'data' => $report
        ]);
    }
    public function show($id)
    {
        $report = $this->ticket_repo->find($id);
        return response()->json([
            'data' => $report
        ]);
    }

    public function store(Request $request)
    {
        $input = $request->all();

        try {
            $input['type_id'] = Constant::TICKET_REPORT;
            $report = $this->ticket_repo->create($input);
            if (empty($report)) {
                return response()->json([
                    'result' => false,
                ]);
            }
            toast('Đã tạo thành công', 'success');
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
            $report = $this->ticket_repo->delete($input['id']);
            if (empty($report)) {
                return response()->json([
                    'result' => true
                ]);
            }
            return response()->json([
                'result' => false
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

    public function replied()
    {
        $contact = $this->ticket_repo->replied();
        return response()->json([
            'data' => $contact
        ]);
    }
}
