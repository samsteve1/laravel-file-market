<?php

namespace App\Http\ViewComposer;

use App\Models\Category;
use Illuminate\View\View;

class FileCategoryComposer 
{
    public function compose(View $view)
    {
       $categories = Category::get();

       
        $view->with([
            'categories' =>  $categories
            
        ]);
    }
}