<?php
namespace App\Traits;
trait GenerateHall{
    public function generateHallView($hall)
    {
        $hall = $this->generateRows($hall->rows);
        return $hall;
    }
    public function generateRows($rows)
    {
        foreach($rows as $row)
        {
           $rows_array[]= $this->generateSeats($row->seats);
        }
        return $rows_array;
    }
    public function generateSeats($seats)
    {
        foreach($seats as $seat)
        {
            $seats_arry[] = $seat->availability ==0 ? '_': $seat->category->code ;
        }
        return $seats_arry;
    }
}
