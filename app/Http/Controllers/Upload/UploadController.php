<?php

namespace App\Http\Controllers\Upload;

use Storage;
use App\Models\File;
use App\Models\Upload;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\UploadedFile;

class UploadController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function store(Request $request, File $file)
    {
        $this->authorize('touch', $file);

        $uploadedFile = $request->file('file');

        $upload = $this->storeUpload($file, $uploadedFile);
        
        Storage::disk('local')->putFileAs(
            'files/' . $file->identifier,
            $uploadedFile,
            $upload->filename
        );

        return response()->json([
            'id' => $upload->id
        ]);
    }

    protected function storeUpload(File $file, UploadedFile $uploadedFile)
    {
        $this->authorize('touch', $file);

        $upload = new Upload;

        $upload->fill([
            'filename' => $this->generateFileName($uploadedFile),
            'size'  =>  $uploadedFile->getSize(),
        ]);

        $upload->file()->associate($file);
        $upload->user()->associate(auth()->user());

        $upload->save();
        
        return $upload;
    }

    protected function generateFileName(UploadedFile $uploadedFile)
    {
        return $uploadedFile->getClientOriginalName();
    }

    public function destroy(File $file,  Upload $upload)
    {
        $this->authorize('touch', $file);

        $this->authorize('touch', $upload);

        if($file->uploads()->count() === 1) {
            return response()->json(null, 422);
        }
        $upload->delete();
    }
}
