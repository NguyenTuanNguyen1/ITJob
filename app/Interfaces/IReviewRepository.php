<?php

namespace App\Interfaces;

interface IReviewRepository
{
    public function all();

    public function create(array $data);

    public function find($id);

    public function update(array $data);

    public function delete($id);
    public function trashed();
    public function storage($id);

    public function restore($id);
}