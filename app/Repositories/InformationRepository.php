<?php
namespace App\Repositories;

use App\Interfaces\IInformationRepository;
use App\Models\Information;

class InformationRepository implements IInformationRepository
{

    public function all()
    {
        return Information::orderBy('id','DESC')->paginate(5);
    }

    public function create(array $review)
    {
        $data = new Information();
        $data->content = $review['content'];
        $data->ticket_reply = $review['ticket_reply'];
        $data->user_id = $review['user_id'];
        $data->type_id = $review['type_id'];

        $data->save();
        return $data;
    }

    public function find($id)
    {
        return Information::find($id);
    }
    public function update($id,array $data)
    {
        $result = Information::find($id)->update([
            'content' => $data['content'],
            'ticket_reply' => $data['ticket_reply'],
            'user_id' => $data['user_id'],
            'type_id' => $data['type_id'],
        ]);
        return $result;
    }
    public function delete($id)
    {
        return Information::find($id)->delete();
    }

    public function trashed()
    {
        return Information::withTrashed()->get();
    }

    public function storage($id)
    {
        // TODO: Implement storage() method.
    }

    public function restore($id)
    {
        return Information::withTrashed()->where('id', $id)->restore();
    }
}
