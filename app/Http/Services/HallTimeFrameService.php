<?php

namespace App\Http\Services;

use App\Repositories\HallTimeFrameRepositoryInterface;
use Carbon\CarbonPeriod;

class HallTimeFrameService
{
    protected $hallTimeFrameRepository ;
    public function __construct(HallTimeFrameRepositoryInterface $hallTimeFrameRepository)
    {
        $this->HallTimeFrameRepository = $hallTimeFrameRepository;
    }
    public function store(array $data)
    {
        return $this->HallTimeFrameRepository->store($data);
    }
    public function all()
    {
        return $this->HallTimeFrameRepository->all();
    }
    public function update(int $id, array $data)
    {
        return $this->HallTimeFrameRepository->update($id,$data);
    }
    public function delete(int $id)
    {
        return $this->HallTimeFrameRepository->delete($id);
    }
    public function get($data)
    {
        if($data['hall_id'] != NULL)
        {
            $where=['hall_id'=>$data['hall_id']];
            $time_frames = $this->HallTimeFrameRepository->query($where);

            if(array_key_exists('from_date',$data) && array_key_exists('to_date',$data)
            && $data['from_date'] != NULL && $data['to_date'] != null)
            {
                $periods = CarbonPeriod::create($data['from_date'],$data['to_date']);
                $periods = $this->generateDatesArray($periods);
                if($time_frames)
                {
                    $time_frames->whereDoesntHave('events',function($query) use ($periods){
                        $query->whereIn('date',$periods);
                    });
                }
            }
            return $time_frames->get();
        }
        return null;

    }
    public function generateDatesArray(CarbonPeriod $periods)
    {
        $dates=array();
        foreach($periods as $period)
        {
            array_push($dates,$period->format('Y-m-d'));
        }
        return $dates;
    }
}
