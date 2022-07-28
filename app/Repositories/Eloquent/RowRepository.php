<?php
namespace App\Repositories\Eloquent;

use App\Models\Row;
use App\Repositories\RowRepositoryInterface;

class RowRepository extends BaseRepository implements RowRepositoryInterface{
    protected $model;
    public function __construct(Row $model)
    {
        $this->model = $model;
    }
}
