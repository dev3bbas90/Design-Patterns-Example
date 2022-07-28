<?php

namespace App\Http\Services;

use App\Repositories\NewslettersRepositoryInterface;
class NewslettersService

{
    protected $NewslettersService ;
    public function __construct(NewslettersRepositoryInterface $NewslettersService)
    {
        $this->NewslettersService = $NewslettersService;
    }
    // public function store(array $data)
    // {
    //     return $this->NewslettersService->store($data);

    // }
    public function all()
    {
        return $this->NewslettersService->all();
    }
    // public function update(int $id, array $data)
    // {

    //     return $this->PartnersService->update($id,$data);

    // }
    public function delete(int $id)
    {
        return $this->NewslettersService->delete($id);
    }
}
