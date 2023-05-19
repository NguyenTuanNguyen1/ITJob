<?php
namespace App\Interfaces;

interface ISearchRepository
{
    public function searchMajorUser($data);
    public function searchInformationType($data);
    public function searchFilter(array $data);
    public function searchUserByRole($role);
    public function StatisticalPost($action, $from, $to);
}
