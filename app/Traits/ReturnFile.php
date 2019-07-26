<?php

namespace App\Traits;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
trait ReturnFile 
{
    public function returnFiles($view, LengthAwarePaginator $files, $title)
    {
        return view($view, [
            'files' => $files,
            'title' => ucfirst($title)
        ]);
    }
}