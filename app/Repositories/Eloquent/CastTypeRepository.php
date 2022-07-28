<?php
namespace App\Repositories\Eloquent;

use App\Models\CastType;
use App\Repositories\CastTypeRepositoryInterface;

class CastTypeRepository extends BaseRepository implements CastTypeRepositoryInterface{
    protected $model;
    public function __construct(CastType $model)
    {
        $this->model = $model;
    }
}


