<?php
namespace App\Repositories\Eloquent;

use App\Models\Cast;
use App\Repositories\CastRepositoryInterface;

class CastRepository extends BaseRepository implements CastRepositoryInterface{
    protected $model;
    public function __construct(Cast $model)
    {
        $this->model = $model;
    }
}
