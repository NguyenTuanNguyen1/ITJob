<?php

use App\Models\Report;
use App\Repositories;

class ReportRepository implements IReportRepository
{

    public function all()
    {
        return Report::orderBy('id','DESC')->paginate(8);
    }

    public function create(array $data)
    {
        // TODO: Implement create() method.
    }

    public function find($id)
    {
        return Report::find($id)->get();
    }

    public function delete($id)
    {
        return Report::find($id)->delete();
    }

    public function storage($id)
    {
        // TODO: Implement storage() method.
    }

    public function trashed()
    {
        return Report::onlyTrashed()->get();
    }
    public function restore($id)
    {
        return Report::onlyTrashed()->where('id', $id)->restore();
    }
}