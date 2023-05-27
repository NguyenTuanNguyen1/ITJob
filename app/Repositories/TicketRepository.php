<?php
namespace App\Repositories;
use App\Constant;
use App\Interfaces\ITicketRepository;
use App\Models\Ticket;


class TicketRepository implements ITicketRepository
{

    public function all($action)
    {
        return Ticket::where('ticket_id', $action)->orderBy('id','DESC')->paginate(8);
    }

    public function create(array $type)
    {
        $data = new Ticket();
        $data->username = $type['username'];
        $data->subject = $type['subject'];
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

    public function reply($id)
    {
        return Ticket::find($id)->update([
            'status' => Constant::TICKET_REPLIED,
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
    public function replied()
    {
        return Ticket::where('status',Constant::TICKET_REPLIED)->get();
    }

    public function getTicketCondition($condition, $value)
    {
        return Ticket::where($condition, $value)->get();
    }
}
