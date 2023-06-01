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
        $data->email = $type['email'];
        $data->content = $type['content'];
        $data->image = $type['image'];
        $data->type_id = $type['type_id'];
        $data->user_id = $type['user_id'];
        $data->post_id = $type['post_id'];
        $data->save();
        return $data;
    }

    public function find($id,$action)
    {
        return Ticket::where('id', $id)
            ->where('status',Constant::TICKET_NOT_REPLY)
            ->where('type_id', $action)->first();
    }

    public function update($id)
    {
        return Ticket::where('id', $id)->update([
           'status' => Constant::TICKET_REPLIED
        ]);
    }

    public function reply(array $data)
    {
        $ticket = new Ticket();
        $ticket->username = $data['username'];
        $ticket->content = $data['content'];
        $ticket->image = $data['image'];
        $ticket->type_id = $data['type_id'];
        $ticket->status = Constant::TICKET_REPLIED;
        $ticket->user_id = $data['user_id'];
        $ticket->post_id = $data['post_id'];
        $ticket->ticket_id = $data['ticket_id'];
        $ticket->save();
        return $ticket;
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

    public function listReplied($id, $action)
    {
        return Ticket::with('user')
            ->where('ticket_id', $id)
            ->where('status',Constant::TICKET_REPLIED)
            ->where('type_id', $action)
            ->first();
    }
}
