<?php

namespace App\Data\Models\User;

use App\Data\Models\Model;
use App\Data\Models\User\Traits\Relationship\UserRelationship;

class User extends Model
{
    use UserRelationship;

    /**
     * The collection associated with the model.
     *
     * @var string
     */
    protected $collection = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'email', 'phone'];
}
