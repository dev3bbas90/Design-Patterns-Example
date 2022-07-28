<?php

namespace App\Http\Services;

use App\Repositories\TheaterRepositoryInterface;
use App\Traits\UploadFile;

class TheaterService
{
    use UploadFile;
    protected $theaterRepository ;
    public function __construct(TheaterRepositoryInterface $theaterRepository)
    {
        $this->theaterRepository = $theaterRepository;
    }
    public function store(array $data)
    {
        if(array_key_exists('image',$data))
        {
            $file  = $this->upload($data['image']);
            $data['image']=$file;
        }
        return $this->theaterRepository->store($data);
    }
    public function all()
    {
        return $this->theaterRepository->all();
    }
    public function update(int $id, array $data)
    {
        if(array_key_exists('image',$data))
        {
            $file  = $this->upload($data['image']);
            $data['image']=$file;
        }
        return $this->theaterRepository->update($id,$data);
    }
    public function delete(int $id)
    {
        return $this->theaterRepository->delete($id);
    }
}
