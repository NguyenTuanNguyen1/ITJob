<?php
namespace App\Repositories;

use App\Interfaces\ITypeRepository;
use App\Models\InformationType;

class InformationTypeRepository implements ITypeRepository
{

    public function all()
    {
        return InformationType::orderBy('id','DESC')->paginate(8);
    }

    public function create(array $type)
    {
        $data = new InformationType();
        $data->content = $type['content'];
        $data->save();
        return $data;
    }

    public function find($id)
    {
        return InformationType::find('id')->get();
    }

    public function update($id, array $data)
    {
        $result = InformationType::find($id)->update([
            'content' => $data['content'],
        ]);
        return $result;
    }

    public function delete($id)
    {
        return InformationType::find($id)->delete();
    }

    public function storage($id)
    {
        // TODO: Implement storage() method.
    }

    public function trashed()
    {
        return InformationType::onlyTrashed()->get();
    }

    public function restore($id)
    {
        return InformationType::onlyTrashed()->where('id', $id)->restore();
    }
}
