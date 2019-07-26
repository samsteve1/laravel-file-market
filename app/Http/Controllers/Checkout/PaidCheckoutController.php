<?php

namespace App\Http\Controllers\Checkout;

use Paystack;
use App\Models\File;
use Illuminate\Http\Request;
use App\Jobs\Checkout\CreateSale;
use App\Http\Controllers\Controller;
use App\Http\Requests\Checkout\PaidChecoutRequest;

class PaidCheckoutController extends Controller
{
    public function redirectToGateway()
    {
        return Paystack::getAuthorizationUrl()->redirectNow();
    }

    public function handleGatewayCallback()
    {
        
        $paymentDetails = Paystack::getPaymentData();
        
       

        $paymentStatus = $paymentDetails['data']['status'];

        if($paymentStatus == 'success') {
            $fileIdentifier = $paymentDetails['data']['metadata']['file_identifier'];
            $userEmail = $paymentDetails['data']['customer']['email'];
            $file = File::where('identifier', '=', $fileIdentifier)->first();

            

            if($file->count()) {
               
                dispatch(new CreateSale($file, $userEmail));
        
                return redirect()->route('files.show', compact('file'))->withSuccess('TPayment Received!, We\'ve emailed the download link to you!');
            }
        }
       

        
    }
}
