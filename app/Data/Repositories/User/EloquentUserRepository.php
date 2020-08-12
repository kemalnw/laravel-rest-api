<?php

namespace App\Data\Repositories\User;

use App\Contracts\Repositories\User\UserRepository;
use App\Data\Models\User\User;
use App\Data\Repositories\Repository;

class EloquentUserRepository extends Repository implements UserRepository
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }
}
