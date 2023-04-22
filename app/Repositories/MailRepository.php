<?php
namespace App\Repositories;

use App\Interfaces\IMailRepository;
use App\Models\Mail;

class MailRepository implements IMailRepository
{

    public function all()
    {
        return Mail::orderBy('id','DESC')->paginate(8);
    }

    public function create(array $mail)
    {
        $data = new Mail();
        $data->email = $mail['email'];
        $data->sent_user_id = $mail['sent_user_id'];
        $data->save();
        return $data;
    }

    public function find($id)
    {
        return Mail::find($id);
    }
    public function update($id, array $data)
    {
        $result = Mail::find($id)->update([
            'email' => $data['email'],
            'sent_user_id' => $data['sent_user_id'],
        ]);
        return $result;
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
        Mail::onlyTrashed()->get();
    }

    public function restore($id)
    {
        Mail::onlyTrashed()->where('id', $id)->restore();
    }
}