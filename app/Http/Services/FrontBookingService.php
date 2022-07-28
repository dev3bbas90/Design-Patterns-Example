<?php

namespace App\Http\Services;

use App\Repositories\BookingRepositoryInterface;
use App\Repositories\CastRepositoryInterface;
use App\Repositories\CastTypeRepositoryInterface;
use App\Repositories\ContactFormRepositoryInterface;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\EventRepositoryInterface;
use App\Repositories\BookingDetailsRepositoryInterface;
use App\Repositories\HallRepositoryInterface;
use App\Repositories\HallTimeFrameRepositoryInterface;
use App\Repositories\PartnersRepositoryInterface;
use App\Repositories\ProgramCategoriesRepositoryInterface;
use App\Repositories\ProgramRepositoryInterface;
use App\Repositories\RowRepositoryInterface;
use App\Repositories\SeatRepositoryInterface;
use App\Repositories\SliderRepositoryInterface;
use App\Repositories\TheaterRepositoryInterface;
use App\Repositories\NewslettersRepositoryInterface;
use App\Traits\GenerateHall;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class FrontBookingService
{
    use GenerateHall;
    protected $BookingRepository ;
    protected $CastRepository ;
    protected $CastTypeRepository ;
    protected $CategoryRepository ;
    protected $EventRepository ;
    protected $BookingDetailsRepository ;
    protected $HallRepository ;
    protected $HallTimeFrameRepository ;
    protected $PartnersRepository ;
    protected $ProgramCategoriesRepository ;
    protected $ProgramRepository ;
    protected $RowRepository ;
    protected $SeatRepository ;
    protected $SliderRepository ;
    protected $TheaterRepository ;
    protected $ContactFormRepository ;
    protected $NewslettersRepository ;


    public function __construct(
        BookingRepositoryInterface $BookingRepository ,
        CastRepositoryInterface   $CastRepository ,
        CastTypeRepositoryInterface $CastTypeRepository ,
        CategoryRepositoryInterface $CategoryRepository ,
        EventRepositoryInterface $EventRepository ,
        HallRepositoryInterface $HallRepository ,
        HallTimeFrameRepositoryInterface $HallTimeFrameRepository ,
        PartnersRepositoryInterface $PartnersRepository ,
        ProgramCategoriesRepositoryInterface $ProgramCategoriesRepository,
        ProgramRepositoryInterface $ProgramRepository ,
        RowRepositoryInterface $RowRepository ,
        SeatRepositoryInterface $SeatRepository ,
        SliderRepositoryInterface $SliderRepository,
        TheaterRepositoryInterface $TheaterRepository,
        BookingDetailsRepositoryInterface $BookingDetailsRepository,
        ContactFormRepositoryInterface $ContactFormRepository,
        NewslettersRepositoryInterface $NewslettersRepository
         )
    {
        $this->BookingRepository            = $BookingRepository;
        $this->CastRepository               = $CastRepository;
        $this->CastTypeRepository           = $CastTypeRepository;
        $this->CategoryRepository           = $CategoryRepository;
        $this->EventRepository              = $EventRepository;
        $this->BookingDetailsRepository     = $BookingDetailsRepository;
        $this->HallRepository               = $HallRepository;
        $this->HallTimeFrameRepository      = $HallTimeFrameRepository;
        $this->PartnersRepository           = $PartnersRepository;
        $this->ProgramCategoriesRepository  = $ProgramCategoriesRepository;
        $this->ProgramRepository            = $ProgramRepository;
        $this->RowRepository                = $RowRepository;
        $this->SeatRepository               = $SeatRepository;
        $this->SliderRepository             = $SliderRepository;
        $this->TheaterRepository            = $TheaterRepository;
        $this->ContactFormRepository        = $ContactFormRepository;
        $this->NewslettersRepository        = $NewslettersRepository;
    }
    public function booking($data)
    {
        $program  = $this->ProgramRepository->find($data['program']);
        $theaters = $program->theaters;
        $events=[];
        if(array_key_exists('theater',$data))
        {
            $theaters = $this->TheaterRepository->all(['*'],[],['id'=>$data['theater']]);
            $events   = $this->get_events(['theater'=>$data['theater'],'program'=>$data['program']]);
        }
        $data['program']   = $program;
        $data['theaters']  = $theaters;
        $data['events']    = $events;
        return $data;
    }
    public function get_events($data)
    {
        $theater = $this->TheaterRepository->find($data['theater']);
        $events  = $theater->validEvents()->where('program_id',$data['program'])->select('date')->distinct()->orderBy('date','asc')->get()->pluck('date')->toArray();
        return $events;
    }
    public function get_time_frames($data)
    {
        $theater = $this->TheaterRepository->find($data['theater']);
        $events  = $theater
        ->validEvents()
        ->where('program_id',$data['program'])
        ->whereDate('date',$data['date'])
        ->pluck('hall_time_frame_id')
        ->toArray();

        return $theater->time_frames->whereIn('id',$events)->map(function($time_frame){
            $data['id']   = $time_frame->id;
            $data['from'] = $time_frame->from;
            $data['to']   = $time_frame->to;
            $data['hall'] = $time_frame->hall->code;
            return $data;
        });
    }
    public function booking_seats($data)
    {
        $event= $this->EventRepository->all(['*'],['theater','hall','program'],[
            ['theater_id'        , $data['theater']],
            ['date'              , $data['date']],
            ['hall_time_frame_id', $data['time']],
            ['program_id'        , $data['program']],
            ])->first();
        $hall = $this->HallRepository->find($event->hall_id);
        $category_object = $this->generateCategories($event);
        $legends         = $this->generateLegends();
        $categories      = $this->CategoryRepository->all();
        $hallView        = $this->generateHallView($hall);
        $hallString      = $this->getStrings($hallView);
        $bookingSeats    = $this->getBoookedSeats($event);
        $return['event'] = $event ;
        $return['hall']  = $hall ;
        $return['category_object'] = $category_object ;
        $return['categories']      = $categories ;
        $return['legends']         = $legends ;
        $return['hallView']        = $hallView ;
        $return['hallString']      = $hallString ;
        $return['bookingSeats']    = $bookingSeats ;
      return $return;
    }
    public function checkout($data)
    {
        // dd($data);
       //get and validate seat availability
        DB::beginTransaction();
        $data['token']=Str::uuid();
        $booking     = $this->BookingRepository->store($data);
        $unavailable_seats=[];
        foreach($data['seats'] as $key=>$seat)
        {
            $event = $this->EventRepository->find($data['event_id']);
            $seat_object = $this->SeatRepository->findBycode($seat);
            if($this->validateSeats($seat_object->id,$event->id))
            {
                $booking_detail['seat_id']    = $seat_object->id;
                $booking_detail['event_id']   = $event->id;
                $booking_detail['token']      = Str::uuid();
                $booking_detail['booking_id'] = $booking->id;
                $booking_detail['price']      = $this->getCategoryPrice($seat_object->category,$event);
                $booking_detail['code']       = $data['keys'][$key];
                $this->BookingDetailsRepository->store($booking_detail);
            }
            else
            {
                $unavailable_seats[] = $seat;
            }
        }
        if(count($unavailable_seats)>0)
        {
            DB::rollBack();
            return [
                'unavailable_seats'=>$unavailable_seats,
                'check' =>false,
                'url'  =>null
            ];
        }
        DB::commit();
        return [
            'unavailable_seats'=>$unavailable_seats,
            'check' =>true,
             'url' =>route('booking_details',$booking->token)
        ];
    }
    public function booking_details($token)
    {
        $data['booking'] =$this->BookingRepository->findByToken($token);
        return $data;
    }

    private function validateSeats($seat,$event)
    {
        $eventSeat= $this->BookingDetailsRepository->all(['id'],[],[
            ['seat_id',$seat],
            ['event_id',$event]
        ])->count();
        return $eventSeat>0 ? false:true;
    }
    private function getStrings($hallView)
    {
        $array =[];
        foreach($hallView as $key=>$item)
        {
            $array[$key] = implode("",$item);
        }
        return $array;
    }
    private function getBoookedSeats($event)
    {
        $array=[];
        foreach($event->seats as $eventSeat)
        {
            $array[]=$eventSeat->seat->row->code.'_'.$eventSeat->seat->code;
        }
        return $array;
    }
    private function generateCategories($event)
    {
        foreach($this->CategoryRepository->all() as $category)
        {
            $data[$category->code]['price']=  $this->getCategoryPrice($category,$event);
            $data[$category->code]['classes']= str_replace(' ','-',$category->name);
            $data[$category->code]['category']= $category->name;
        }
        return $data;
    }
    private function getCategoryPrice($category,$event)
    {
        $day = date('D',strtotime($event->date));
        if($day == 'Thu' || $day == 'Fri')
        {
            return $event->weekend_price +$event->weekend_price* $category->price_raise/100;
        }
        return $event->weekday_price +$event->weekday_price* $category->price_raise/100;
    }
    private function generateLegends()
    {
        return $this->CategoryRepository->all()->map(function($category){
            $data[]  = $category->code;
            $data[]  = 'available';
            $data[]  = $category->name;
            return $data;
        });
    }


}
