<?php
namespace App\Repositories;

interface  BookingRepositoryInterface extends BaseRepositoryInterface{
    public function findByToken($token);
}
