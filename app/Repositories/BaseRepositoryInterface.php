<?php

namespace App\Repositories;

interface BaseRepositoryInterface
{
    public function all($columns = ['*']);
    public function find($id, $columns = ['*']);
    public function create(array $data);
    public function update(array $data, $id);
    public function delete($id);
}

