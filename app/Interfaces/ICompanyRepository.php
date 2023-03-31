<?php

namespace App\Interfaces;

interface ICompanyRepository
{
    public function all();
    public function create(array $data);
    public function find($id);
    public function update($id,array $data);
    public function delete($id);
    public function trashed();
    public function restore($id);
}