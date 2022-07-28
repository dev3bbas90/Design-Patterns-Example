<?php

namespace App\Http\Services;
use App\Traits\UploadFile;

use App\Repositories\PartnersRepositoryInterface;
class PartnersService

{
    use UploadFile;
    protected $PartnersService ;
    public function __construct(PartnersRepositoryInterface $PartnersService)
    {
        $this->PartnersService = $PartnersService;
    }
    public function store(array $data)
    {
        if(array_key_exists('image',$data))
        {
            $file  = $this->upload($data['image']);
            $data['image']=$file;
        }
        return $this->PartnersService->store($data);

    }
    public function all()
    {
        return $this->PartnersService->all();
    }
    public function update(int $id, array $data)
    {
        if(array_key_exists('image',$data))
        {
            $file  = $this->upload($data['image']);
            $data['image']=$file;
        }
        return $this->PartnersService->update($id,$data);

    }
    public function delete(int $id)
    {
        return $this->PartnersService->delete($id);
    }
}
