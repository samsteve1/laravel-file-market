<?php

namespace App\Http\Controllers\Files;

use App\Models\{File, Sale};
use Chumper\Zipper\Zipper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FileDownloadController extends Controller
{
    protected $zipper;

    public function __construct(Zipper $zipper)
    {
        $this->zipper = $zipper;
    }
    public function show(File $file, Sale $sale)
    {
        if(!$file->visible()){
            return abort(403);
        }

        if(!$file->matchesSale($sale)) {
            return abort(403);
        } 

        $this->createZipForFileInPath($file, $path = $this->generateTemporaryPath($file));

        return response()
                ->download($path)
                ->deleteFileAfterSend(true);
    }
    protected function createZipForFileInPath(File $file, $path)
    {
        $this->zipper->make($path)->add($file->getUploadList())->close();
    }

    protected function generateTemporaryPath(File $file)
    {
        return public_path('temp/' . str_slug($file->title) . '.zip');
    }
}
