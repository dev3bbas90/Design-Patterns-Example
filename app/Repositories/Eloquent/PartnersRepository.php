<?php
namespace App\Repositories\Eloquent;

use App\Models\Partner;
use App\Repositories\PartnersRepositoryInterface;

class PartnersRepository extends BaseRepository implements PartnersRepositoryInterface{
    protected $model;
    public function __construct(Partner $model)
    {
        $this->model = $model;
    }
}
