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

    public function create(array $user)
    {
        $data = new User();
        $data->name = $user['name'];
        $data->username = $user['username'];
        $data->email = $user['email'];
        $data->phone = $user['phone'];
        $data->address = $user['address'];
        $data->img_avatar = $user['img_avatar'];
        $data->position = $user['position'];
        $data->description = $user['description'];
        $data->password = $user['password'];
        $data->provider = $user['provider'];
        $data->token = $user['token'];
        $data->role_id = $user['role_id'];
        $data->skill_id = $user['skill_id'];
        $data->save();
        return $data;
    }
    public function find($id)
    {
        return User::find($id);
    }

    public function update($id,array $data)
    {
        $result = User::find($id)->update([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'img_avatar' => $data['img_avatar'],
            'position' => $data['position'],
            'description' => $data['description'],
            'password' => $data['password'],
            'provider' => $data['provider'],
            'token' => $data['token'],
            'role_id' => $data['role_id'],
            'skill_id' => $data['skill_id'],
        ]);
        return $result;
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