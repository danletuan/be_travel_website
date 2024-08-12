<?php

namespace App\Services;

use App\Repositories\BaseRepository;
use App\Models\News;
use Illuminate\Database\Eloquent\Model;


class BaseService implements BaseServiceInterface
{
    protected $repository;

    public function __construct(Model $model)
    {
        $this->repository = new BaseRepository($model);
    }

    public function getAll()
    {
        return $this->repository->all();
    }

    public function getById($id)
    {
        return $this->repository->find($id);
    }

    public function create(array $data)
    {
        return $this->repository->create($data);
    }

    public function update(array $data, $id)
    {
        return $this->repository->update($data, $id);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }
}

