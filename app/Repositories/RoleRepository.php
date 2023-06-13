<?php
namespace App\Repositories;


use App\Models\Role;
use App\Interfaces\ITypeRepository;

class RoleRepostitory implements ITypeRepository
{
    public function all()
    {
        return Role::orderBy('id','DESC')->paginate(8);
    }

    public function create(array $type)
    {
        $data = new Role();
        $data->content = $type['content'];
        $data->save();
        return $data;
    }

    public function find($id)
    {
        return Role::find('id')->get();
    }

    public function update($id, array $data)
    {
        $result = Role::find($id)->update([
            'content' => $data['content'],
        ]);
        return $result;
    }

    public function delete($id)
    {
        return Role::find($id)->delete();
    }

    public function storage($id)
    {
        // TODO: Implement storage() method.
    }

    public function trashed()
    {
        return Role::onlyTrashed()->get();
    }

    public function restore($id)
    {
        return Role::onlyTrashed()->where('id', $id)->restore();
    }
}
