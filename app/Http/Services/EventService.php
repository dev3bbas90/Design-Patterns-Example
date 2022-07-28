<?php

namespace App\Http\Services;

use App\Repositories\EventRepositoryInterface;
use Carbon\CarbonPeriod;

class EventService
{
    protected $eventRepository ;
    public function __construct(EventRepositoryInterface $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }
    public function store(array $data)
    {
        $time_frames = $data['time_frames'];
        unset($data['time_frames']);
        $periods = CarbonPeriod::create($data['from_date'],$data['to_date']);
        foreach($periods as $date)
        {
            foreach($time_frames as $time_frame_id)
            {
               $this->eventRepository->store([
                    'hall_time_frame_id' => $time_frame_id,
                    'hall_id'            => $data['hall_id'] ,
                    'theater_id'            => $data['theater_id'] ,
                    'program_id'         => $data['program_id'],
                    'weekday_price'      => $data['weekday_price'],
                    'weekend_price'      => $data['weekend_price'],
                    'date'               => $date->format('Y-m-d')
                ]);
            }
        }
    }

    public function all($hall_program_id=null)
    {
        if($hall_program_id)
        {
            return $this->eventRepository->all(['*'],[],['hall_program_id'=>$hall_program_id]);
        }
        else
        {
            return $this->eventRepository->all();
        }
    }
    public function update(int $id, array $data)
    {
        return $this->eventRepository->update($id,$data);
    }
    public function delete(int $id)
    {
        return $this->eventRepository->delete($id);
    }
    public function get($where)
    {
        return $this->eventRepository->all(['*'],[],$where);
    }
}
