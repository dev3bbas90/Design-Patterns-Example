<?php
namespace App\Repositories\Eloquent;

use App\Models\HallTimeFrame;
use App\Repositories\HallTimeFrameRepositoryInterface;

class HallTimeFrameRepository extends BaseRepository implements HallTimeFrameRepositoryInterface{
    protected $model;
    public function __construct(HallTimeFrame $model)
    {
        $this->model = $model;
    }
}
