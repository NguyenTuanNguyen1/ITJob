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

    public function create(array $data)
    {
        $user = new User();
        $user->name = $data['name'];
        $user->username = $data['username'];
        $user->email = $data['email'];
        $user->phone = $data['phone'];
        $user->address = $data['address'];
        $user->img_avatar = 'avatar.jpg';
        $user->role_id = $data['role_id'];
        $user->password = $data['password'];
        $user->save();
        return User::where('email',$data['email'])->first();
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
}
