<?php

namespace App\Http\Controllers\CMS;

use App\Constant;
use App\Http\Controllers\Controller;
use App\Interfaces\IAdminRepository;
use App\Interfaces\ITicketRepository;
use App\Mail\ReplyMail;
use App\Trait\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

/**
 * @property ITicketRepository $ticket_repo
 * @property IAdminRepository $admin_repo
 */
class ReportController extends Controller
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

    public function index()
    {
//        $report = $this->ticket_repo->all(Constant::TICKET_REPORT);
//        return response()->json([
//            'data' => $report
//        ]);
    }
    public function show(Request $request)
    {
        $input = $request->all();

        $report= $this->ticket_repo->find($input['id']);

        return response()->json([
            'data' => $report,
        ]);
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $path = [];
        $report = $this->ticket_repo->createReportPost($input);

        $nameImage = Str::random(6);
        if ($files = $request->file('image')) {
            foreach ($files as $file) {
                $fileName = "{$nameImage}.jpg";
                $path[] = $file->move('Images', $fileName, 'public');
                $this->saveImageReport($fileName, $report['id']);
            }
        }

        alert('Đã gửi thành công', null, 'success');
        return redirect()->route('post.detail', ['id' => $input['post_id']]);

    }

    public function user(Request $request)
    {
        $input = $request->all();

//        $path = [];
        $report = $this->ticket_repo->createReportUser($input);

        $nameImage = Str::random(6);
        if ($files = $request->file('image')) {
            foreach ($files as $file) {
                $fileName = "{$nameImage}.jpg";
                $file->move('Images', $fileName, 'public');
                $this->saveImageReport($fileName, $report['id']);
            }
        }

        alert('Đã gửi thành công', null, 'success');
        return redirect()->route('post.detail', ['id' => $input['post_id']]);
    }

    public function delete(Request $request)
    {
        $input = $request->all();

        $this->ticket_repo->delete($input['id']);
        $this->ActivityLog('Bạn đã xoá bản báo cáo bài viết*' . $input['id'], Auth::user()->id);

        return redirect()->route('dashboard.report');
    }

    public function reply(Request $request)
    {
        $input = $request->all();

        $this->ticket_repo->reply($input['id']);
        $this->ActivityLog('Bạn đã phản hồi bản báo cáo bài viết*', $input['admin_id']);

        return response()->json([
            'result' => true
        ]);
    }

    public function replied(Request $request)
    {
        $input = $request->all();

        $report_post = $this->ticket_repo->listReplied($input['id'],Constant::TICKET_REPORT_REPLIED ,Constant::TICKET_REPORT_POST);
        $report_user = $this->ticket_repo->listReplied($input['id'],Constant::TICKET_REPORT_REPLIED ,Constant::TICKET_REPORT_USER);
        return response()->json([
            'data' => $report_post,
            'result' => $report_user
        ]);
    }

    public function image(Request $request)
    {
        $input = $request->all();
        $images = $this->admin_repo->getImageReportByCondition($input['id']);

        return response()->json([
            'images' => $images,
        ]);
    }
}
