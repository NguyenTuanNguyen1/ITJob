<?php
namespace App\Repositories;

use App\Models\TicketType;
use App\Interfaces\ITypeRepository;


class TicketTypeRepository implements ITypeRepository
{

    public function all()
    {
        return TicketType::orderBy('id','DESC')->paginate(8);
    }

    public function create(array $type)
    {
        $data = new TicketType();
        $data->content = $type['content'];
        $data->save();
        return $data;
    }

    public function find($id)
    {
        return TicketType::find($id)->get();
    }

    public function update($id, array $data)
    {
        $result = TicketType::find($id)->update([
            'content' => $data['content'],
        ]);
    }

    public function delete($id)
    {
        return TicketType::find($id)->delete();
    }

    public function storage($id)
    {
        // TODO: Implement storage() method.
    }

    public function trashed()
    {
        return TicketType::onlyTrashed()->get();
    }
    public function restore($id)
    {
        return TicketType::onlyTrashed()->where('id', $id)->restore();
    }
}