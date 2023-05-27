<?php
namespace App\Interfaces;

interface ITicketRepository
{
    public function all($action);
    public function create(array $data);
    public function find($id);
    public function reply($id);
    public function delete($id);
    public function restore($id);
    public function replied();
    public function getTicketCondition($condition, $value);
}
