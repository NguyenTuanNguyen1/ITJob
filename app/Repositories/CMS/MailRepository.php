<?php
namespace App\Repositories;

use App\Interfaces\IMailRepository;
use App\Models\Company;
use App\Models\Mail;

class MailRepository implements IMailRepository
{

    public function all()
    {
        return Mail::orderBy('id','DESC')->paginate(8);
    }

    public function create(array $data)
    {
        // TODO: Implement create() method.
    }

    public function find($id)
    {
        return Mail::find($id);
    }

    public function delete($id)
    {
        return Mail::find($id)->delete();
    }

    public function storage($id)
    {
        return Mail::where('sent_user_id',$id);
    }

    public function trashed()
    {
        Company::onlyTrashed()->get();
    }

    public function restore($id)
    {
        Company::onlyTrashed()->where('id', $id)->restore();
    }
}