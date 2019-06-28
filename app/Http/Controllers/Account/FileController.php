<?php

namespace App\Http\Controllers\Account;

use App\Models\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Policies\File\FilePoilcy;
use App\Http\Requests\File\{StoreFileRequest, UpdateFileRequest};
class FileController extends Controller
{
    public function index()
    {
        $files = auth()->user()->files()->latest()->finished()->get();

        return view('account.files.index', [
            'files' => $files
        ]);
    }
    /**
     * Create a new file
     */
    public function create(File $file)
    {
        // Check if file exists, if file doesnt exists, create a new one and redirect
        if(!$file->exists) {
            $file = $this->createAndReturnSkeletonFile();

            return redirect()->route('account.files.create', $file);
        }

        // if file exists, redirect to create form
        $this->authorize('touch', $file);

        return view('account.files.create', compact('file'));
    }

    protected function createAndReturnSkeletonFile()
    {
        return auth()->user()->files()->create([
            
            'title' =>  'Untitled',
            'overview'  =>  'None',
            'overview_short' => 'None',
            'price' =>  0,
            'finished'  => false,
        ]);
    }

    public function edit(Request $request, File $file)
    {
        $this->authorize('touch', $file);
        
        return view('account.files.edit', [
            'file'  =>  $file,
            'approval' => $file->approvals->first(),
        ]);
    }

    public function store(StoreFileRequest $request, File $file)
    {
        $this->authorize('touch', $file);

        $file->fill($request->only(['title', 'overview', 'overview_short', 'price']));
        $file->finished = true;
        $file->save();

        return redirect()->route('account.index')->withSuccess('Your file has been submitted for review!');
    }
    public function update(UpdateFileRequest $request, File $file)
    {
        $this->authorize('touch', $file);

        $approvalProperties = $request->only(File::APPROVAL_PROPERTIES);

        if($file->needsApproval($approvalProperties)) {
            
            $file->createApproval($approvalProperties);

            return back()->withSuccess('File updated, W\'ll review your changes soon.');
        }

        $file->update([
            'live' =>   (bool)$request->get('live', false),
            'price' => $request->get('price')
        ]);

        return back()->withSuccess('File updated!');
    }
}
