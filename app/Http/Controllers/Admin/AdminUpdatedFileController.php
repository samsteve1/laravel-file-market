<?php

namespace App\Http\Controllers\Admin;

use Mail;
use App\Models\File;
use App\Mail\File\{UpdatedFileApproved, UpdatedFileRejected};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminUpdatedFileController extends Controller
{
    public function index()
    {
        $files = File::whereHas('approvals')->oldest()->get();

        return view('admin.files.updated.index', [
            'files' => $files
        ]);
    }
    public function update(File $file)
    {
        $file->mergeApprovalProperties();
        $file->approveAllUploads();
        $file->deleteAllApprovals();

        Mail::to($file->user)->send(new UpdatedFileApproved($file));
        return back()->withSuccess("{$file->title} changes have been approved!");
    }

    public function destroy(File $file)
    {
        $file->deleteAllApprovals();
        $file->deleteUnapprovedUploads();

        Mail::to($file->user)->send(new UpdatedFileRejected($file));
        return back()->withSuccess("{$file->title} has been rejected!");
    }
}
