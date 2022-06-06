<?php

namespace App\Filters;
use Closure;

class Category
{
    public function handle($request, Closure $next)
    {
        if ( request()->type != 'category') {
            return $next($request);
        }

        return $next($request)->WithWhereHas('category', fn($query) => $query->where('name', request()->name));
    }
}
