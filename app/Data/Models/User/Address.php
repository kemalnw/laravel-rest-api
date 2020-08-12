<?php

namespace App\Data\Models\User;

use App\Data\Models\Model;

class Address extends Model
{
    /**
     * The collection associated with the model.
     *
     * @var string
     */
    protected $collection = 'addresses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['street', 'city', 'country', 'postal_code'];
}
