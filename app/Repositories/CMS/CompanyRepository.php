<?php

namespace App\Repositories;

use App\Interfaces\ICompanyRepository;
use App\Models\Company;

class CompanyRepository implements ICompanyRepository
{

    public function all()
    {
        return Company::orderBy('id', 'DESC')->paginate(8);
    }

    public function create(array $company)
    {
        $data = new Company();
        $data->name = $company['name'];
        $data->username = $company['username'];
        $data->email = $company['email'];
        $data->phone = $company['phone'];
        $data->type = $company['type'];
        $data->staff = $company['staff'];
        $data->headquarters = $company['headquarters'];
        $data->taxcode = $company['taxcode'];
        $data->img_avatar = $company['img_avatar'];
        $data->address = $company['address'];
        $data->description = $company['description'];
        $data->password = $company['password'];
        $data->role_id = $company['role_id'];
        $data->save();
        return $data;
    }

    public function find($id)
    {
        return Company::find($id);
    }

    public function update($id, array $data)
    {
        $result = Company::find($id)->update([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'type' => $data['type'],
            'staff' => $data['staff'],
            'headquarters' => $data['headquarters'],
            'taxcode' => $data['taxcode'],
            'img_avatar' => $data['img_avatar'],
            'address' => $data['address'],
            'description' => $data['description'],
            'password' => $data['password'],
            'role_id' => $data['role_id'],
        ]);
        return $result;
    }

    public function delete($id)
    {
        return Company::find($id)->delete();
    }

    public function trashed()
    {
        Company::onlyTrashed()->get();
    }

    public function restore($id)
    {
        return Company::onlyTrashed()->where('id', $id)->restore();
    }
}

