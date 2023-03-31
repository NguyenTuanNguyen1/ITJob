<?php

use App\Models\Report;
use App\Repositories;

class ReportRepository implements IReportRepository
{

    public function all()
    {
        return Report::orderBy('id','DESC')->paginate(8);
    }

    public function create(array $report)
    {
        $data = new Report();
        $data->content = $report['content'];
        $data->user_id = $report['user_id'];
        $data->save();
        return $data;
    }

    public function find($id)
    {
        return Report::find($id)->get();
    }

    public function update($id, array $data)
    {
        $result = Report::find($id)->update([
            'content' => $data['content'],
            'user_id' => $data['user_id'],
        ]);
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