<?php
namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface  BaseRepositoryInterface{
    /**
     * get all models
     * @param array $columns
     * @param array $relations
     * @return Collection
     */
    public function all(array $columns=['*'],array $relations=[],array $where=[]) ;
    /**
     * find model by id
     * @param int $id
     * @param array $columns
     * @param array $relations
     * @param array appends
     * @return Model
     */
    public function find(int $id,array $columns=['*'],array $relations=[],array $appends=[]);
    /**
     * create model
     * @param array $data
     * @return Model
     */
    public function store(array $data);
    /**
     * update existing model by id
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function update(int $id ,array $data);
    /**
     * delete existing model by id
     * @param int $id
     * @return bool
     */
    public function delete(int $id);
    public function storeMany(array $data);
    public function query(array $where=[]);

    // /**
    //  * save with relation
    //  * @param array $data
    //  * @param array $relations
    //  */
    // public function saveWithRelations(array $data,array $relations=[]);
    // /**
    //  * update with relations
    //  * @param int $id
    //  * @param array $data
    //  * @param array $relations
    //  */
    // public function updateWithRelations(int $id ,array $data,array $relations=[]);
}
