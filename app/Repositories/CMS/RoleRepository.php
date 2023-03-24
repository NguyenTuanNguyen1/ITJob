<?php

namespace App\Repositories;

use App\Interfaces\IRoleRepository;
use App\Models\Role;

class RoleRepository implements IRoleRepository
{

    public function all()
    {
        return Role::orderBy('id', 'DESC')->paginate(8);
    }

    public function create(array $role)
    {
        $data = new Role();
        $data->name = $role['name'];
        $data->save();
        return $data;
    }

    public function find($id)
    {
        return Role::find($id);
    }

    public function delete($id)
    {
        return Role::find($id)->delete();
    }

    public function update(array $data)
    {
        // TODO: Implement update() method.
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