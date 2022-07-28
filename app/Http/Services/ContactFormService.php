<?php

namespace App\Http\Services;

use App\Repositories\ContactFormRepositoryInterface;
class ContactFormService

{
    protected $ContactFormService ;
    public function __construct(ContactFormRepositoryInterface $ContactFormService)
    {
        $this->ContactFormService = $ContactFormService;
    }
    // public function store(array $data)
    // {
    //     return $this->ContactFormService->store($data);

    // }
    public function all()
    {
        return $this->ContactFormService->all();
    }
    // public function update(int $id, array $data)
    // {

    //     return $this->ContactFormService->update($id,$data);

    // }
    public function delete(int $id)
    {
        return $this->ContactFormService->delete($id);
    }
}
