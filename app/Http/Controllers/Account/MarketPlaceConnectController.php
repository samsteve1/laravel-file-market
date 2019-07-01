<?php

namespace App\Http\Controllers\Account;

use Paystack;
use Illuminate\Http\Request;
use App\Http\Requests\MarketPlaceCreateRequest;
use App\Http\Controllers\Controller;

class MarketPlaceConnectController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index()
    {
        return view('account.marketplace.index');
    }
    public function connectPaystackAccount(MarketPlaceCreateRequest $request)
    {
        $data = [
            "business_name" => $request->business_name,
            "settlement_bank"   =>  $request->settlement_bank,
            "account_number"    =>  $request->account_number,
            "percentage_charge" =>  $request->percentage_charge,
            "primary_contact_email" => $request->primary_contact_email,
            "primary_contact_name" => $request->primary_contact_name
        ];

        $paystackSubAccount = Paystack::createSubAccount($data);

        $subAccountName = $paystackSubAccount['business_name'];
        $subAccountCode = $paystackSubAccount['subaccount_code'];
        
        if ($this->updateUserAccountWithSubAccountCode($subAccountCode, $subAccountName)) {

            return redirect()->route('account.index')->withSuccess('Paystack account created successfully!');
        }
        return back()->withError('Unable to create your Paystack account, Please retry!');
    }

    private function updateUserAccountWithSubAccountCode($subaccountCode, $subAccountName)
    {
        $user = auth()->user();

        $user->update([
            'subaccount_code' =>    $subaccountCode,
            'subaccount_name' =>    $subAccountName
        ]);

        if(!$user->save()) {
            return false;
        }

        return true;
    }
}
