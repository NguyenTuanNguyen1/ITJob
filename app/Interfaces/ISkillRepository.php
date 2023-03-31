<?php
use App\Interfaces;

interface ISkillRepository
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