<?php

namespace App\Repositories;

use App\Interfaces\ILeverepository;
use App\Models\Level;

class Levelrepository implements ILeverepository
{

    public function all()
    {
        return Level::orderBy('id', 'DESC')->paginate(8);
    }

    public function create(array $level)
    {
        $data = new Level();
        $data->name = $level['name'];
        $data->save();
        return $data;
    }

    public function find($id)
    {
        return Level::find($id)->get();
    }

    public function update($id, array $data)
    {
        $data = Level::find($id)->update([
            'name' => $data['name']
        ]);
        return $data;
    }

    public function delete($id)
    {
        return Level::find($id)->delete();
    }

    public function storage($id)
    {
        // TODO: Implement storage() method.
    }

    public function trashed()
    {
        return Level::onlyTrashed()->get();
    }

    public function restore($id)
    {
        return Level::onlyTrashed()->where('id', $id)->restore();
    }
}