<?php

namespace App\Http\Services;

use App\Repositories\ProgramRepositoryInterface;
use App\Traits\UploadFile;

class ProgramService
{
    use UploadFile;
    protected $programRepository ;
    public function __construct(ProgramRepositoryInterface $programRepository)
    {
        $this->ProgramRepository = $programRepository;
    }
    public function store(array $data)
    {
        if(array_key_exists('image',$data))
        {
            $file  = $this->upload($data['image']);
            $data['image']=$file;
        }
        $program = $this->ProgramRepository->store($data);
        if(array_key_exists('casts',$data))
        {
            $program->casts()->sync($data['casts']);
        }
        return $program;
    }
    public function all()
    {
        return $this->ProgramRepository->all();
    }
    public function update(int $id, array $data)
    {
        if(array_key_exists('image',$data))
        {
            $file  = $this->upload($data['image']);
            $data['image']=$file;
        }
        $this->ProgramRepository->update($id,$data);
        $program = $this->ProgramRepository->find($id);
        if(array_key_exists('casts',$data))
        {
            $program->casts()->sync($data['casts']);
        }
        else
        {
            $program->casts()->sync([]);
        }
        return $program;
        // return $this->ProgramRepository->update($id,$data);
    }
    public function delete(int $id)
    {
        return $this->ProgramRepository->delete($id);
    }
    public function get($where)
    {
        return $this->ProgramRepository->all(['*'],[],$where);
    }
}
