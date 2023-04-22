<?php
namespace App\Repositories;
use App\Interfaces\ITicketRepository;
use App\Models\Ticket;


class TicketRepository implements ITicketRepository
{

    public function all()
    {
        return Ticket::orderBy('id','DESC')->paginate(8);
    }

    public function create(array $type)
    {
        $data = new Ticket();
        $data->content = $type['content'];
        $data->image = $type['image'];
        $data->ticket_id = $type['ticket_id'];
        $data->user_id = $type['user_id'];
        $data->save();
        return $data;
    }

    public function find($id)
    {
        return Ticket::find($id)->get();
    }

    public function update($id, array $data)
    {
        $result = Ticket::find($id)->update([
            'content' => $data['content'],
            'image' => $data['image'],
            'ticket_id' => $data['ticket_id'],
            'user_id' => $data['user_id'],
        ]);
    }

    public function delete($id)
    {
        return Ticket::find($id)->delete();
    }

    public function storage($id)
    {
        // TODO: Implement storage() method.
    }

    public function trashed()
    {
        return Ticket::onlyTrashed()->get();
    }
    public function restore($id)
    {
        return Ticket::onlyTrashed()->where('id', $id)->restore();
    }
}
