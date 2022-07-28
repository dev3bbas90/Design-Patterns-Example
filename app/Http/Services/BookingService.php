<?php

namespace App\Http\Services;

use App\Repositories\BookingRepositoryInterface;
class BookingService
{
    protected $bookingRepository ;
    public function __construct(BookingRepositoryInterface $bookingRepository)
    {
        $this->BookingRepository = $bookingRepository;
    }
    public function store(array $data)
    {
        return $this->BookingRepository->store($data);
    }
    public function all()
    {
        return $this->BookingRepository->all();
    }
    public function update(int $id, array $data)
    {
        return $this->BookingRepository->update($id,$data);
    }
    public function delete(int $id)
    {
        return $this->BookingRepository->delete($id);
    }
    public function get($where)
    {
        return $this->BookingRepository->all(['*'],[],$where);
    }
}
