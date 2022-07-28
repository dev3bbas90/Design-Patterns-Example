<?php
namespace App\Repositories\Eloquent;

use App\Models\Seat;
use App\Repositories\SeatRepositoryInterface;

class SeatRepository extends BaseRepository implements SeatRepositoryInterface{
    protected $model;
    public function __construct(Seat $model)
    {
        $this->model = $model;
    }
    public function findByCode($code)
    {
        $arrayCode =explode("_",$code);
        return $this->model->where('code',$arrayCode[1])->whereHas('row',function($query)use($arrayCode){
            $query->where('code',$arrayCode[0]);
        })->first();
    }
}
