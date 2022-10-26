<?php

namespace App\Repositories;

class BaseRepository
{
    protected $model;

    public function __construct($model)
    {
      $this->model = new $model;
    }

    public function all()
    {
      return $this->model->all();
    }

    public function find($id)
    {
      return $this->model->find($id);
    }

    public function findByUuid($uuid)
    {
      return $this->model->where('uuid', $uuid)->first();
    }

    public function create(array $data)
    {
      return $this->model->create($data);
    }

    public function update($id, array $data)
    {
      return $this->model->find($id)->update($data);
    }

    public function updateByUuid($uuid, array $data)
    {
      return $this->model->where('uuid', $uuid)->update($data);
    }

    public function delete($id)
    {
      return $this->model->find($id)->delete();
    }

    public function deleteByUuid($uuid)
    {
      return $this->model->where('uuid', $uuid)->delete();
    }
}