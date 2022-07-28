<?php
namespace App\Repositories\Eloquent;

use App\Models\Program;
use App\Repositories\ProgramRepositoryInterface;

class ProgramRepository extends BaseRepository implements ProgramRepositoryInterface{
    protected $model;
    public function __construct(Program $model)
    {
        $this->model = $model;
    }
}
