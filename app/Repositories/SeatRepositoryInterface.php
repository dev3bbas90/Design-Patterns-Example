<?php
namespace App\Repositories;

interface  SeatRepositoryInterface extends BaseRepositoryInterface{
    public function findByCode($code);
}
