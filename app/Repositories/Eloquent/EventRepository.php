<?php
namespace App\Repositories\Eloquent;

use App\Models\Event;
use App\Repositories\EventRepositoryInterface;

class EventRepository extends BaseRepository implements EventRepositoryInterface{
    protected $model;
    public function __construct(Event $model)
    {
        $this->model = $model;
    }
}
