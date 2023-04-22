<?php
namespace App\Repositories;

use App\Interfaces\IUserRepository;
use App\Models\User;

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
        $data->major = $user['major'];
        $data->description = $user['description'];
        $data->status = $user['status'];
        $data->start = $user['start'];
        $data->password = $user['password'];
        $data->provider = $user['provider'];
        $data->remember_token = $user['remember_token'];
        $data->token = $user['token'];
        $data->role_id = $user['role_id'];
        $data->company_id = $user['company_id'];
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
            'major' => $data['major'],
            'description' => $data['description'],
            'status' => $data['status'],
            'start' => $data['start'],
            'password' => $data['password'],
            'provider' => $data['provider'],
            'remember_token' => $data['remember_token'],
            'token' => $data['token'],
            'role_id' => $data['role_id'],
            'company_id' => $data['company_id'],
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
