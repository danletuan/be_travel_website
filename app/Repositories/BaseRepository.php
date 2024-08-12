<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository as PrettusBaseRepository;
use Illuminate\Database\Eloquent\Model;

class BaseRepository extends PrettusBaseRepository implements BaseRepositoryInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function model()
    {
        return get_class($this->model);
    }

    public function all($columns = ['*'])
    {
        return $this->model->all($columns);
    }

    public function find($id, $columns = ['*'])
    {
        return $this->model->find($id, $columns);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $id)
    {
        $record = $this->model->find($id);
        return $record->update($data);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }
}

