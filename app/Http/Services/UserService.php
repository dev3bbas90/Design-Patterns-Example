<?php

namespace App\Http\Services;

use App\Repositories\UserRepositoryInterface;
class UserService
{
    protected $userRepository ;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function store(array $data)
    {
        return $this->userRepository->store($data);
    }
    public function all()
    {
        return $this->userRepository->all();
    }
    public function update(int $id, array $data)
    {
        return $this->userRepository->update($id,$data);
    }
    public function delete(int $id)
    {
        return $this->userRepository->delete($id);
    }
}
