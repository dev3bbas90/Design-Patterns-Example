<?php

namespace App\Http\Services;
use App\Traits\UploadFile;

use App\Repositories\SliderRepositoryInterface;
class SliderService

{
    use UploadFile;
    protected $SliderService ;
    public function __construct(SliderRepositoryInterface $SliderService)
    {
        $this->SliderService = $SliderService;
    }
    public function store(array $data)
    {
        if(array_key_exists('image',$data))
        {
            $file  = $this->upload($data['image']);
            $data['image']=$file;
        }
        return $this->SliderService->store($data);

    }
    public function all()
    {
        return $this->SliderService->all();
    }
    public function update(int $id, array $data)
    {
        if(array_key_exists('image',$data))
        {
            $file  = $this->upload($data['image']);
            $data['image']=$file;
        }
        return $this->SliderService->update($id,$data);

    }
    public function delete(int $id)
    {
        return $this->SliderService->delete($id);
    }
}
