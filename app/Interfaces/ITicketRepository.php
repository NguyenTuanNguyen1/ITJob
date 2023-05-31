<?php
namespace App\Interfaces;

interface ITicketRepository
{
    public function all($action);
    public function create(array $data);
    public function find($id);
    public function reply($id, array $data);
    public function delete($id);
    public function getTicketNotReply($action, $status);
    public function getTicketReplyLastWeek($action, $status);
}
