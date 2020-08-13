<?php

namespace App\Contracts\Repositories\User;

interface AddressRepository
{
    public function create(array $data);

    public function updateById(array $data, $id);
}
