<?php

namespace App\Traits;

trait WithWhereHas
{
    public function scopeWithWhereHas($query, $relationship, $condition = null)
    {
        $query->with($relationship, $condition)->whereHas($relationship, $condition);
    }
}
