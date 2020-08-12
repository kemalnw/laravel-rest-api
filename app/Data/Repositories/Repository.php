<?php

namespace App\Data\Repositories;

abstract class Repository
{
    /**
     * The model associated with the repository.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * Store new record
     *
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(array $data)
    {
        $this->model->fill($data)->save();

        return $this->model;
    }

    /**
     * Find specified record by the given id
     *
     * @param mixed $id
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection|static|static[]
     */
    public function findById($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Paginate the given query.
     *
     * @param  int  $perPage
     * @param  array  $columns
     * @param  string  $pageName
     * @param  int|null  $page
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginate($perPage = 10, $columns = ['*'], $pageName = 'page', $page = null)
    {
        return $this->model->paginate($perPage, $columns, $pageName, $page);
    }

    /**
     * Update specified record by the given id
     *
     * @param array $data
     * @param mixed $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function updateById(array $data, $id)
    {
        $model = $this->findById($id);
        $model->fill($data)->save();

        return $model;
    }

    /**
     * Remove specified record by the given id
     *
     * @param mixed $id
     * @return bool
     */
    public function deleteById($id)
    {
        return $this->findById($id)->delete();
    }
}
