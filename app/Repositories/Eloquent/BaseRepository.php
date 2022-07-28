<?php
namespace App\Repositories\Eloquent;

use App\Repositories\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
class BaseRepository implements BaseRepositoryInterface
{
    protected $model;
    public function __construct(Model $model)
    {
        $this->model =$model;
    }
    public function all(array $columns=['*'],array $relations=[],array $where=[])
    {
        return $this->model->where($where)->with($relations)->get($columns);
    }
    public function find(int $id,array $columns=['*'],array $relations=[],array $appends=[])
    {
        return $this->model->select($columns)->with($relations)->findOrFail($id)->append($appends);
    }
    public function store(array $data)
    {
        $model = $this->model->create($data);
        return $model->fresh();
    }
    public function update(int $id ,array $data)
    {
        $model = $this->find($id);
        return $model->update($data);
    }
    public function delete(int $id)
    {
        return $this->find($id)->delete();
    }
    public function storeMany(array $data)
    {
        foreach($data as $row)
        {
            $this->store($row);
        }

    }
    public function query(array $where=[])
    {
        return $this->model->where($where);
    }
}
