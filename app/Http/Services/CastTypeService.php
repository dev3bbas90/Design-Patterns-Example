<?php

namespace App\Http\Services;

use App\Repositories\CastTypeRepositoryInterface;
class CastTypeService

{

    protected $CastTypeRepository ;
    public function __construct(CastTypeRepositoryInterface $CastTypeRepository)
    {
        $this->CastTypeRepository = $CastTypeRepository;
    }
    public function store(array $data)
    {

        return $this->CastTypeRepository->store($data);

    }
    public function all()
    {
        return $this->CastTypeRepository->all();
    }
    public function update(int $id, array $data)
    {

        return $this->CastTypeRepository->update($id,$data);

    }
    public function delete(int $id)
    {
        return $this->CastTypeRepository->delete($id);
    }
}
