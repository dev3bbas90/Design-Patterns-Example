<?php

namespace App\Http\Services;

use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\HallRepositoryInterface;
use App\Repositories\RowRepositoryInterface;
use App\Repositories\SeatRepositoryInterface;
use App\Repositories\TheaterRepositoryInterface;
use App\Traits\GenerateColumns;
use App\Traits\GenerateHall;
use Illuminate\Support\Facades\DB;


class HallService
{
    use GenerateColumns,GenerateHall;
    protected $hallRepository ;
    protected $rowRepository ;
    protected $categoryRepository;
    protected $theaterRepository;
    protected $seatRepository;
    public function __construct(
        HallRepositoryInterface $hallRepository,
        RowRepositoryInterface $rowRepository,
        CategoryRepositoryInterface $categoryRepository,
        SeatRepositoryInterface $seatRepository,
        TheaterRepositoryInterface $theaterRepository
        )
    {
        $this->hallRepository = $hallRepository;
        $this->rowRepository = $rowRepository;
        $this->categoryRepository = $categoryRepository;
        $this->seatRepository = $seatRepository;
        $this->theaterRepository = $theaterRepository;
    }
    public function store(array $data)
    {
        $seats = json_decode($data['seats']);
        unset($data['seats']);
        unset($seats[0]);
        $hall  = $this->hallRepository->store($data);
        $rowsArray = $this->mappingRows($seats,$data['rows_no'], $hall->id);
        foreach($rowsArray as $row_data)
        {
            $row    = $this->rowRepository->store($row_data);
            $colsArray   = $this->mappingCols($row_data['seats'],$row->id);
            foreach($colsArray as $col)
            {
                $col = $this->seatRepository->store($col);
            }
        }

    }
    public function all()
    {
        return $this->hallRepository->all();
    }
    public function get($where)
    {
        return $this->hallRepository->all(['*'],[],$where);
    }
    public function edit($hall)
    {
        $data['theaters']     = $this->theaterRepository->all();
        $data['categories']   = $this->categoryRepository->all();
        // $data['category_set'] = $this->generateHallView($hall);
        $data['hall']         = $hall;
        return $data;
    }
    public function update(int $id, array $data)
    {
        return $this->hallRepository->update($id,$data);
    }
    public function delete(int $id)
    {
        return $this->hallRepository->delete($id);
    }
    private function mappingRows(array $seats, $rows_no,$hall_id)
    {
        $labels = $this->generate($rows_no);
        $seats = array_map(function($seat,$key) use ($hall_id,$labels) {
            return array(
                'hall_id'  => $hall_id,
                'code'     => $labels[$key-1],
                'seats'    => $seat
            );
        }, $seats,array_keys($seats));
        return $seats;
    }
    private function mappingCols(array $seats, $row_id)
    {
        $seats = array_map(function($seat,$key) use ($row_id) {
            $availability = $seat == '_'?false:true;
            if($availability)
            {
                $category_id  = $this->categoryRepository->findByCode($seat)->id;
            }
            else {
                $category_id = $this->categoryRepository->all()->first()->id;
            }
            $data= array(
                'row_id'       => $row_id,
                'category_id'  => $category_id,
                'code'         => $key+1,
                'availability' => $availability,
            );
            return $data;
        }, $seats,array_keys($seats));
        return $seats;
    }

}
