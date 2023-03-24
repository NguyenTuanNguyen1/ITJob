<?php
namespace App\Interfaces;

interface IMailRepository
{
    public function all();
    public function create(array $data);
    public function find($id);
    public function delete($id);
    public function storage($id);
    public function trashed();
    public function restore($id);
}