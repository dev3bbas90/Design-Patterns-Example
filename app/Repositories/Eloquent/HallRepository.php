<?php
namespace App\Repositories\Eloquent;

use App\Models\Hall;
use App\Repositories\HallRepositoryInterface;

class HallRepository extends BaseRepository implements HallRepositoryInterface{
    protected $model;
    public function __construct(Hall $model)
    {
        $this->model = $model;
    }
}
