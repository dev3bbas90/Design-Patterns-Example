<?php
namespace App\Repositories;

interface  CategoryRepositoryInterface extends BaseRepositoryInterface{
    public function findByCode(string $code);
}
