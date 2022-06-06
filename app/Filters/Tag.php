<?php

namespace App\Filters;
use Closure;

class Tag
{
    public function handle($request, Closure $next)
    {
        if (request()->type != 'tag') {
            return $next($request);
        }

        return $next($request)->WithWhereHas('tags', fn($query) => $query->where('name', request()->name));
    }
}
