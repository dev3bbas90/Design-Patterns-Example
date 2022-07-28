<?php

namespace App\Http\Services;
use App\Traits\UploadFile;

use App\Repositories\CastRepositoryInterface;
class CastService

{
    use UploadFile;
    protected $CastRepository ;
    public function __construct(CastRepositoryInterface $CastRepository)
    {
        $this->CastRepository = $CastRepository;
    }
    public function store(array $data)
    {
        if(array_key_exists('image',$data))
        {
            $file  = $this->upload($data['image']);
            $data['image']=$file;
        }
        return $this->CastRepository->store($data);

    }
    public function all()
    {
        return $this->CastRepository->all();
    }
    public function update(int $id, array $data)
    {
        if(array_key_exists('image',$data))
        {
            $file  = $this->upload($data['image']);
            $data['image']=$file;
        }
        return $this->CastRepository->update($id,$data);

    }
    public function delete(int $id)
    {
        return $this->CastRepository->delete($id);
    }
}
