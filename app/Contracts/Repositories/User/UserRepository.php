<?php

namespace App\Contracts\Repositories\User;

interface UserRepository
{
    public function paginate($perPage = 10, $columns = ['*'], $pageName = 'page', $page = null);

    public function create(array $data);

    public function updateById(array $data, $id);
}
