<?php

namespace App\Repositories;

use App\Interfaces\ICompanyRepository;
use App\Models\Company;

class CompanyRepository implements ICompanyRepository
{

    public function create($user_id, array $company)
    {
        $data = new Company();
        $data->type = $company['type'];
        $data->staff = $company['staff'];
        $data->headquarters = $company['headquarters'];
        $data->taxcode = $company['taxcode'];
        $data->website = $company['website'];
        $data->token = $company['token'];
        $data->business_license = $company['business_license'];
        $data->user_id = $user_id;
        $data->save();
        return $data;
    }

    public function update($id, array $data)
    {
        return Company::where('user_id', $id)->update([
            'type' => $data['type'],
            'staff' => $data['staff'],
            'headquarters' => $data['headquarters'],
            'taxcode' => $data['taxcode'],
            'website' => $data['website'],
            'token' => $data['token'],
            'business_license' => $data['business_license'],
        ]);
    }
}

