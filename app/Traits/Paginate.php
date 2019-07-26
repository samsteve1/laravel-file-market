<?php

namespace App\Traits;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
trait Paginate 
{
    

    protected function paginate(Collection $collection, $perPage = 2)
    {
       
        $page = LengthAwarePaginator::resolveCurrentPage();


        $results = $collection->slice(($page -1 ) * $perPage, $perPage)->values();

        $paginated = new LengthAwarePaginator($results, $collection->count(), $perPage, $page, [
            'path' => LengthAwarePaginator::resolveCurrentPath(),
        ]);

        //$paginated->appends(request()->all());

        return $paginated;
    }
}