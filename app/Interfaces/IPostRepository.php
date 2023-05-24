<?php

namespace App\Interfaces;

interface IPostRepository
{
    public function all($action);
    public function create(array $data);
    public function find($id);
    public function update($id,array $data);
    public function delete($id);
    public function storage($id);
    public function trashed();
    public function restore($id);
    public function getMajorByPost($action, $major, $from, $to);
    public function getPostByCondition($condition);
}
