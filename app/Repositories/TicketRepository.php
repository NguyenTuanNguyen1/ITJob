<?php

namespace App\Repositories;

use App\Constant;
use App\Interfaces\ITicketRepository;
use App\Models\Ticket;
use Carbon\Carbon;


class TicketRepository implements ITicketRepository
{

    public function all($action)
    {
        return Ticket::with('user')->where('type_id', $action)->orderBy('id', 'DESC')->get();
    }

    public function create(array $type)
    {
        $data = new Ticket();
        $data->username = $type['username'];
//        $data->subject = $type['subject'];
        $data->email = $type['email'];
        $data->content = $type['content'];
        $data->image = $type['image'];
        $data->type_id = $type['type_id'];
        $data->user_id = $type['user_id'];
        $data->post_id = $type['post_id'];
        $data->save();
        return $data;
    }

    public function find($id)
    {
        return Ticket::find($id)->get();
    }

    public function reply($id, array $data)
    {
        $ticket = new Ticket();

        return Ticket::find($id)->update([
            'status' => Constant::TICKET_REPLIED,
            'reply_user_id' => $data['admin_id']
        ]);
    }

    public function delete($id)
    {
        return Ticket::find($id)->delete();
    }

    public function restore($id)
    {
        return Ticket::onlyTrashed()->where('id', $id)->restore();
    }

    public function getTicketNotReply($action, $status)
    {
        return Ticket::with('user')
            ->where('type_id', $action)
            ->where('status', $status)
            ->orderByDesc('id')
            ->get();
    }

    public function getTicketReplyLastWeek($action, $status)
    {
        return Ticket::with('user')
            ->where('type_id', $action)
            ->where('status', $status)
            ->where('created_at', '>=', Carbon::now()->subWeek()->startOfWeek())
            ->where('created_at', '<=', Carbon::now()->subWeek()->endOfWeek())
            ->get();
    }
}
