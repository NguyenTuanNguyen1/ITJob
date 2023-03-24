<?php

use App\Interfaces\IContactRepository;
use App\Models\Contact;
use App\Repositories;

class ContactRepository implements IContactRepository
{

    public function all()
    {
        return Contact::orderBy('id','DESC')->paginate(8);
    }

    public function create(array $data)
    {
        // TODO: Implement create() method.
    }

    public function find($id)
    {
        return Contact::find($id)->get();
    }

    public function delete($id)
    {
        return Contact::find($id)->delete();
    }

    public function storage($id)
    {
        // TODO: Implement storage() method.
    }

    public function trashed()
    {
        return Contact::onlyTrashed()->get();
    }

    public function restore($id)
    {
        return Contact::onlyTrashed()->where('id', $id)->restore();
    }
}