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

    public function create($user_id, array $data)
    {
        $data = new Information();
        $data->content = $data['content'];
//        $data->ticket_reply = $review['ticket_reply'];
        $data->user_id = $user_id;
        $data->type_id = $data['type_id'];

        $data->save();
        return $data;
    }

    public function find($id)
    {
        return Information::with('type')->where('user_id', $id)->get();
    }
    public function update($id,array $data)
    {
        return Information::where('user_id', $id)->update([
            'content' => $data['content'],
//            'ticket_reply' => $data['ticket_reply'],
            'user_id' => $data['user_id'],
            'type_id' => $data['type_id'],
        ]);
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
