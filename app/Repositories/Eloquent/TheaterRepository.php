<?php
namespace App\Repositories\Eloquent;

use App\Models\Theater;
use App\Repositories\TheaterRepositoryInterface;

class TheaterRepository extends BaseRepository implements TheaterRepositoryInterface{
    protected $model;
    public function __construct(Theater $model)
    {
        $this->model = $model;
    }
}
