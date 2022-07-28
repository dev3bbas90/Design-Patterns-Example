<?php

namespace App\Http\Services;

use App\Models\Hall;
use App\Models\Program;
use App\Repositories\BookingRepositoryInterface;
use App\Repositories\CastRepositoryInterface;
use App\Repositories\CastTypeRepositoryInterface;
use App\Repositories\ContactFormRepositoryInterface;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\EventRepositoryInterface;
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

class FrontService
{
    protected $bookingRepository ;
    protected $CastRepository ;
    protected $CastTypeRepository ;
    protected $CategoryRepository ;
    protected $EventRepository ;
    protected $EventSeatRepository ;
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
        ContactFormRepositoryInterface $ContactFormRepository,
        NewslettersRepositoryInterface $NewslettersRepository
         )
    {
        $this->BookingRepository            = $BookingRepository;
        $this->CastRepository               = $CastRepository;
        $this->CastTypeRepository           = $CastTypeRepository;
        $this->CategoryRepository           = $CategoryRepository;
        $this->EventRepository              = $EventRepository;
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
    public function index()
    {
        // $data['actors_category']   = $this->CastTypeRepository->all(['*'],['casts'],['title'=>'actors'])->first();
        $data['actors']            = $this->CastRepository->all(['*'],[],['cast_type_id'=>1]);
        $data['slider']            = $this->SliderRepository->all();
        $data['partner']           = $this->PartnersRepository->all();
        $data['theaters']          = $this->TheaterRepository->all();
        // $data['ProgramCategories'] = $this->ProgramCategoriesRepository->all(['*'],['latest_programs']);
        $data['ProgramCategories'] = $this->ProgramCategoriesRepository->query()->has('latest_programs')->get();
        return $data;
    }
    public function contact_submit(array $data)
    {
        return $this->ContactFormRepository->store($data);
    }

    public function newsletter(array $data)
    {
        return $this->NewslettersRepository->store($data);

    }

    public function programs()
    {
        $data['programs']   = $this->ProgramRepository->all(['*'],['category']);
        $data['theaters']   = $this->TheaterRepository->all();
        return $data;

    }
    public function program($program)
    {
        $data = [];
        $data['program']   = $this->ProgramRepository->all(['*'],['casts'],['title'=>$program])->first();
        $data['categories'] =$data['program']->casts->groupBy('cast_type_id');
        $data['events'] =$data['program']->events()->whereDate('date','>=',date('Y-m-d'))->orderBy('date','asc')->get()->groupBy('date')->take(7);
        return $data;

    }
    public function theaters()
    {
        $data['theaters']   = $this->TheaterRepository->all();
        $data['programs']    = $this->ProgramRepository->query()->whereHas('events',function($query){
            $query->whereDate('date','>=',date('Y-m-d'));
        })->get();
        return $data;
    }

    public function theater($theater)
    {
        $theater             = $this->TheaterRepository->all(['*'],[],['name'=>$theater])->first();
        $theater_programs    = $theater->validPrograms;
        $program_categories  = $this->ProgramCategoriesRepository->query()->whereHas('programs',function($query)use($theater_programs){
            $query->whereIn('id',$theater_programs->pluck('id')->toArray());
        })->get();
        $data['theater']= $theater;
        $data['theater_programs']= $theater_programs;
        $data['last_programs']= $theater->validPrograms()->orderBy('id','desc')->take(4)->get();
        $data['categories']= $program_categories;
        return $data;
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

        return $theater->time_frames->map(function($time_frame){
            $data['id']   = $time_frame->id;
            $data['from'] = $time_frame->from;
            $data['to']   = $time_frame->to;
            $data['hall'] = $time_frame->hall->code;
            return $data;
        });
    }
    public function bookign_seats($data)
    {
        $event= $this->EventRepository->all(['*'],['theater','hall','program'],[
            ['theater_id'        , $data['theater']],
            ['date'              , $data['date']],
            ['hall_time_frame_id', $data['time']],
            ['program_id'        , $data['program']],
        ])->first();
        $hall       = $this->HallRepository->find($event->id);
        $categories = $this->CategoryRepository->all();

    }
    public function generateHallView($hall)
    {
        $rows = $this->generateRows($hall->rows);
    }
    public function generateRows($rows)
    {
        foreach($rows as $row)
        {
            $this->generateSeats($row->seats);
        }
    }
    public function generateSeats($seats)
    {

    }


}
