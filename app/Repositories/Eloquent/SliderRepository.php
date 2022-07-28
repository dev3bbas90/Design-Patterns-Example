<?php
namespace App\Repositories\Eloquent;

use App\Models\Slider;
use App\Repositories\SliderRepositoryInterface;

class SliderRepository extends BaseRepository implements SliderRepositoryInterface{
    protected $model;
    public function __construct(Slider $model)
    {
        $this->model = $model;
    }
}
