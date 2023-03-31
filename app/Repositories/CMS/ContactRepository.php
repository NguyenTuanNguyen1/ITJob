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

    public function create(array $contact)
    {
        $data = new Contact();
        $data->name = $contact['name'];
        $data->email = $contact['email'];
        $data->content = $contact['content'];
        $data->user_id = $contact['user_id'];
        $data->save();
        return $data;
    }

    public function find($id)
    {
        return Contact::find($id)->get();
    }
    public function update($id, array $data)
    {
        $result = Contact::find($id)->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'content' => $data['content'],
            'user_id' => $data['user_id'],
        ]);
        return $result;
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