<?php
namespace App\Repositories\Eloquent;

use App\Models\Newsletter;
use App\Repositories\NewslettersRepositoryInterface;

class NewslettersRepository extends BaseRepository implements NewslettersRepositoryInterface{
    protected $model;
    public function __construct(Newsletter $model)
    {
        $this->model = $model;
    }
}
