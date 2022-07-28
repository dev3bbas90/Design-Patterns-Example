<?php
namespace App\Repositories\Eloquent;

use App\Models\BookingDetail;
use App\Repositories\BookingDetailsRepositoryInterface;

class BookingDetailsRepository extends BaseRepository implements BookingDetailsRepositoryInterface{
    protected $model;
    public function __construct(BookingDetail $model)
    {
        $this->model = $model;
    }
}
