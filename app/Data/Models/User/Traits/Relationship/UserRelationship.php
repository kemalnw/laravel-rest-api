<?php

namespace App\Data\Models\User\Traits\Relationship;

use App\Data\Models\User\Address;

trait UserRelationship
{
    /**
     * Address
     *
     * @return \Jenssegers\Mongodb\Relations\HasOne
     */
    public function address()
    {
        return $this->hasOne(Address::class);
    }
}
