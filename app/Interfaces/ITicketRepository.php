<?php
namespace App\Interfaces;

use App\Constant;
use App\Models\Ticket;

interface ITicketRepository
{
    public function all($action);
    public function create(array $data);
    public function find($id, $action);
    public function delete($id);
    public function update($id);
    public function reply(array $data);
    public function getTicketNotReply($action, $status);
    public function getTicketReplyLastWeek($action, $status);
    public function listReplied($id, $action);
}
