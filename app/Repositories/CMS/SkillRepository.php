<?php

use App\Models\Skill;
use App\Repositories;

class SkillRepository implements ISkillRepository
{

    public function all()
    {
        return Skill::orderBy('id', 'DESC')->paginate(8);
    }

    public function create(array $data)
    {
        // TODO: Implement create() method.
    }

    public function find($id)
    {
        return Skill::find($id);
    }

    public function update(array $data)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        return Skill::find($id)->delete();
    }

    public function trashed()
    {
        return Skill::onlyTrashed()->get();
    }

    public function storage($id)
    {
        // TODO: Implement storage() method.
    }

    public function restore($id)
    {
        return Skill::onlyTrashed()->where('id', $id)->restore();
    }
}