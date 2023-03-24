<?php

use App\Interfaces\IUserRepository;
use App\Models\User;
use App\Repositories;

class UserRepository implements IUserRepository
{

    public function all()
    {
        return User::orderBy('id', 'DESC')->paginate(8);
    }

    public function create(array $data)
    {
        // TODO: Implement create() method.
    }

    public function find($id)
    {
        return User::find($id);
    }

    public function update(array $data)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        return User::find($id)->delete();
    }

    public function trashed()
    {
        return User::onlyTrashed()->get();
    }

    public function restore($id)
    {
        return User::onlyTrashed()->where('id', $id)->restore();
    }

    public function findEmail($email)
    {
        // TODO: Implement findEmail() method.
    }
}