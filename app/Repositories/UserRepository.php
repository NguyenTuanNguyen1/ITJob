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
        $data->img_avatar = 'avatar.jpg';
        $data->position = null;
        $data->major = null;
        $data->description = null;
        $data->status = null;
        $data->start = null;
        $data->password = null;
        $data->provider = null;
        $data->remember_token = null;
        $data->token = null;
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
//            'password' => $data['password'],
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
