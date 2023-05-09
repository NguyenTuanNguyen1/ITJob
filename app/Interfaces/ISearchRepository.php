<?php
namespace App\Interfaces;

interface ISearchRepository
{
    public function searchMajorUser($data);
    public function searchInformationType($data);
    public function searchFilter(array $data);
}
