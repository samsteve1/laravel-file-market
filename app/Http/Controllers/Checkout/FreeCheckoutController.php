<?php

namespace App\Http\Controllers\Checkout;

use App\Models\File;
use Illuminate\Http\Request;
use App\Jobs\Checkout\CreateSale;
use App\Http\Requests\Checkout\FreeCheckoutRequest;
use App\Http\Controllers\Controller;

class FreeCheckoutController extends Controller
{
    public function checkout(FreeCheckoutRequest $request, File $file)
    {
        if(!$file->isFree()) {
            return back();
        }

        dispatch(new CreateSale($file, $request->email));
        
        return back()->withSuccess('Thanks, We\'ve emailed the download link to you!');
    }
}
