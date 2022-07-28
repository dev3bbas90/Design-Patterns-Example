<?php

namespace App\Http\Services;

use App\Repositories\ProgramCategoriesRepositoryInterface;
class ProgramCategoriesService

{

    protected $ProgramCategoriesRepository ;
    public function __construct(ProgramCategoriesRepositoryInterface $ProgramCategoriesRepository)
    {
        $this->ProgramCategoriesRepository = $ProgramCategoriesRepository;
    }
    public function store(array $data)
    {

        return $this->ProgramCategoriesRepository->store($data);

    }
    public function all()
    {
        return $this->ProgramCategoriesRepository->all();
    }
    public function update(int $id, array $data)
    {

        return $this->ProgramCategoriesRepository->update($id,$data);

    }
    public function delete(int $id)
    {
        return $this->ProgramCategoriesRepository->delete($id);
        
    }
}
