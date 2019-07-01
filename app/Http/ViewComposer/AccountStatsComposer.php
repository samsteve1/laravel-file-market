<?php

namespace App\Http\ViewComposer;

use Illuminate\View\View;

class AccountStatsComposer 
{
    public function compose(View $view)
    {
        $user = auth()->user();

        $files = $user->files()->finished();
        $sales = $user->sales;
        $view->with([
            'fileCount' =>  $files->count(),
            'saleCount' =>  $sales->count(),
            'lifeTimeSale' => $user->saleValueOverLifeTime(),
            'monthSale'    => $user->saleValueThisMonth(),
        ]);
    }
}