<?php
namespace App\Repositories\Eloquent;

use App\Models\ProgramCategory;

use App\Repositories\ProgramCategoriesRepositoryInterface;

class ProgramCategoriesRepository extends BaseRepository implements ProgramCategoriesRepositoryInterface{
    protected $model;
    public function __construct(ProgramCategory $model)
    {
        $this->model = $model;
    }
}
