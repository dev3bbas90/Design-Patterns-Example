<?php

namespace App\Http\Services;

use App\Repositories\CategoryRepositoryInterface;
class CategoryService
{
    protected $categoryRepository ;
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->CategoryRepository = $categoryRepository;
    }
    public function store(array $data)
    {
        return $this->CategoryRepository->store($data);
    }
    public function all()
    {
        return $this->CategoryRepository->all();
    }
    public function update(int $id, array $data)
    {
        return $this->CategoryRepository->update($id,$data);
    }
    public function delete(int $id)
    {
        return $this->CategoryRepository->delete($id);
    }
}
