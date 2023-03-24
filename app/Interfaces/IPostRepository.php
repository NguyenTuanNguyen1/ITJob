<?php

namespace App\Interfaces;

interface IPostRepository
{
    public function all();
    public function create(array $data);
    public function find($id);
    public function update(array $data);
    public function delete($id);
    public function storage($id);
    public function trashed();
    public function restore($id);
}