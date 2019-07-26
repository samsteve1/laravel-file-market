<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Category, File};
use App\Traits\{Paginate, ReturnFile};


class HomeController extends Controller
{
    use Paginate, ReturnFile;

    protected $perPage = 2;
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $files = File::finished()->live()->approved()->paginate($this->perPage);
        
        return $this->returnFiles('home', $files, 'All fles');
    }

    public function popular()
    {
       
        $files = File::finished()->live()->approved()->get()->sortByDesc('sales_count');
        $files = $this->paginate($files);

        return $this->returnFiles('home', $files, 'Most downloaded');
    }

    public function category(Category $category)
    {
        $files = $category->files()->paginate($this->perPage);
        
       return  $this->returnFiles('home', $files, $category->name);
    }

    public function search(Request $request)
    {
        
        if($request->has('q')) {

            $searchTem = $request->get('q');

            $files = File::whereLike('title', $searchTem)->paginate($this->perPage);

            $title = $files->count() === 1 ? 'Result for ' : 'Results for ';

            return  $this->returnFiles('home', $files,  $title . $searchTem);
        }
        return back();
    }
}

