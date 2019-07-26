<?php

namespace App\Providers;
use App\Http\ViewComposer\{AdminStatsComposer,AccountStatsComposer, FileCategoryComposer};
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('account.layouts.partials._stats', AccountStatsComposer::class);
        View::composer('admin.layouts.partials._stats', AdminStatsComposer::class);
        View::composer('account.files.create', FileCategoryComposer::class);
        View::composer('home.side-bar', FileCategoryComposer::class);
    }
}
