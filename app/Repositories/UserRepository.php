<?php
namespace App\Repositories;

use App\Interfaces\IUserRepository;
use App\Models\Applied;
use App\Models\User;
use Illuminate\Support\Str;

class UserRepository implements IUserRepository
{

    public function all()
    {
        return User::orderBy('id', 'DESC')->get();
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
        $user->setRememberToken(Str::random(60));
        $user->save();
        return User::where('email',$data['email'])->first();
    }
    public function find($id)
    {
        return User::find($id);
    }

    public function update($id,array $data)
    {
        return User::find($id)->update([
            'username' => $data['username'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'position' => $data['position'],
            'major' => $data['major'],
            'description' => $data['description'],
        ]);
    }

    public function updateAvatarAndName($id, array $data)
    {
        return User::find($id)->update([
            'name' => $data['name'],
            'img_avatar' => $data['img_avatar'],
        ]);
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

    public function getMajorUser($role)
    {
        return User::whereNotNull('major')
            ->where('role_id', $role)
            ->get();
    }

    public function getUserByRole($role)
    {
        return User::where('role_id', $role)->get();
    }

    public function getUserByCondition($condition, $value)
    {
        return User::where($condition, $value)->get();
    }

    public function getUserApplied($post_id)
    {
        return Applied::where('post_id', $post_id)
            ->get();
    }

    public function getMajorByUser($major, $role)
    {
        return User::where('major', $major)
            ->where('role_id', $role)
            ->get();
    }
}
