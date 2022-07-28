<?php

namespace App\Http\Services;
use App\Traits\UploadFile;
use App\Repositories\CastRepositoryInterface;
use App\Repositories\ProgramRepositoryInterface;
use App\Repositories\TheaterRepositoryInterface;

class DashboardService

{
    use UploadFile;
    protected $CastRepository ;
    protected $ProgramRepository ;
    protected $TheaterRepository ;
    public function __construct(CastRepositoryInterface $CastRepository , ProgramRepositoryInterface $ProgramRepository ,TheaterRepositoryInterface $TheaterRepository)
    {
        $this->CastRepository = $CastRepository;
        $this->ProgramRepository = $ProgramRepository;
        $this->TheaterRepository = $TheaterRepository;
    }
    
    public function all()
    {
        $data['actors']     = $this->CastRepository->all(['name','image'],['casttype'],[['cast_type_id','1']]);
        $data['programs']   = $this->ProgramRepository->all();
        $data['theaters']    = $this->TheaterRepository->all();
        return $data;
    }
    
}
