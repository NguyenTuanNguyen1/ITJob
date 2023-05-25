<?php
namespace App\Interfaces;

interface IReviewRepository
{
    public function all();
    public function create(array $review);
    public function find($id);
    public function update($id,array $data);
    public function delete($id);
    public function storage($id);
    public function trashed();
    public function restore($id);
    public function getReviewByUser($to_user_id);
}
