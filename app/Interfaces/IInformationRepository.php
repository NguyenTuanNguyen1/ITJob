<?php

namespace App\Interfaces;

interface IInformationRepository
{
    public function all();

    public function create(array $data);

    public function find($id);

    public function update($id,array $data);

    public function delete($id);
    public function trashed();
    public function storage($id);

    public function restore($id);
}