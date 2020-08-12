<?php

namespace App\Data\Repositories\User;

use App\Contracts\Repositories\User\AddressRepository;
use App\Data\Models\User\Address;
use App\Data\Repositories\Repository;

class EloquentAddressRepository extends Repository implements AddressRepository
{
    public function __construct(Address $address)
    {
        $this->model = $address;
    }
}
