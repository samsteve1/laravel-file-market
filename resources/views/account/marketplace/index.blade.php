@extends('account.layouts.default')

@section('account.content')
<section class="section">
    <div class="container is-fluid">
        <div class="columns">
            <div class="column">
                  
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-header-title">Connect your account to Paystack</h2>
                           
                        </div>
                        <div class="card-content">
                            <div class="content">
                                <form action="{{ route('account.connect.create') }}"  method="POST" id="subaccount-form">
                                    @csrf
                                    <div class="field">
                                        <label for="business_name" class="label">Your account name</label>
                                        <div class="control has-icons-left">
                                            <input type="text" name="business_name" id="business_name" class="input is-medium{{ $errors->has('business_name') ? ' is-danger' : '' }}"  required>
                                            <span class="icon is-small is-left">
                                                <i class="fa fa-user"></i>
                                            </span>
                                        </div>
                                        @if ($errors->has('business_name'))
                                            <p class="help is-danger">{{ $errors->first('business_name') }}</p>
                                        @endif
                                    </div>

                                    <div class="field">
                                        <label for="bank_name" class="label">Bank name</label>
                                        <div class="control has-icons-left">
                                            <select name="settlement_bank" id="bank_name" class="input is-medium{{ $errors->has('settlement_bank') ? ' is-danger' : '' }}" placeholder="Select Bank" required>
                                                <option value="First Bank of Nigeria">First Bank</option>
                                                <option value="Guaranty Trust Bank">GTBank</option>
                                            </select>
                                        </div>
                                        <span class="icon is-small is-left">
                                            <i class="fa fa-landmark"></i>
                                        </span>
                                        @if ($errors->has('settlement_bank'))
                                            <p class="help is-danger">{{ $errors->first('settlement_bank') }}</p>
                                        @endif
                                    </div>

                                    <div class="field">
                                        <label for="account_number" class="label">Account number</label>

                                        <div class="control">
                                            <input type="number" name="account_number" id="account_number" class="input is-medium{{ $errors->has('account_number') ? ' is-danger' : '' }}" required>
                                        </div>
                                        @if ($errors->has('account_number'))
                                            <p class="help is-danger">{{ $errors->first('account_number') }}</p>
                                        @endif
                                    </div>

                                    <input type="hidden" name="percentage_charge" value="{{ config('filemarket.sales.commission') }}">
                                    <input type="hidden" name="primary_contact_email" value="{{ auth()->user()->email }}">
                                    <input type="hidden" name="primary_contact_name" value="{{ auth()->user()->name }}">

                                    <div class="field">
                                        <p class="control">
                                            <button class="button is-primary is-medium" type="submit">Connect account</button>
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</section> 
@endsection

