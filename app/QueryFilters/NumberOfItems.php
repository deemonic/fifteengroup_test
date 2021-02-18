<?php


namespace App\QueryFilters;


use Closure;

class NumberOfItems
{
    public function handle($request, Closure $next)
    {

        if ( ! request()->has('num_of_items')) {
            return $next($request);
        }

        $builder = $next($request);
        return $builder->orderBy('total_products', request('num_of_items'));

    }
}
