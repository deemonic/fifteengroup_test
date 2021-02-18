<?php


namespace App\QueryFilters;

use Closure;

class OrderTotal
{
    public function handle($request, Closure $next)
    {

        if ( ! request()->has('order_total')) {
            return $next($request);
        }

        $builder = $next($request);
        return $builder->orderBy('order_total', request('order_total'));

    }
}
