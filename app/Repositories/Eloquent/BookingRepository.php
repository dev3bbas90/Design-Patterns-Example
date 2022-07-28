<?php
namespace App\Repositories\Eloquent;

use App\Models\Booking;
use App\Repositories\BookingRepositoryInterface;

class BookingRepository extends BaseRepository implements BookingRepositoryInterface{
    protected $model;
    public function __construct(Booking $model)
    {
        $this->model = $model;
    }
    public function findByToken($token)
    {
        return $this->model->where('token',$token)->firstOrFail();
    }
}
