<?php

namespace App\Http\Services;

use App\Repositories\BookingRepositoryInterface;

class ReportService
{
    protected $bookingRepository;
    public function __construct(BookingRepositoryInterface $bookingRepository)
    {
        $this->bookingRepository = $bookingRepository;
    }

    public function booking($data)
    {
        return $this->bookingRepository->query()->paginate(10);
    }


}
