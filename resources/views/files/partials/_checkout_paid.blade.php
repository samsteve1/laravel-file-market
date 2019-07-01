
    @csrf
    NGN {{ $file->price }}
    <form action="{{ route('checkout.paid.redirect', $file) }}" class="hidden" method="POST"  accept-charset="UTF-8">
        @csrf

        <span class="field has-addons">
            <p class="contorls"></p>
            <div class="control has-icons-left">
                <input type="email" class="input{{ $errors->has('email') ? ' is-danger' : '' }} is-medium" id="email" name="email" placeholder="e.g. josh@example.com" value="{{ old('email') }}" required>
                <span class="icon is-small is-left">
                    <i class="fa fa-envelope"></i>
                </span>
            </div>
            @if ($errors->has('email'))
                <p class="help is-danger">{{ $errors->first('email') }}</p>
            @endif

            <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}">
            <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}">
            <input type="hidden" name="amount" value="{{ $file->price * 100 }}">
            <input type="hidden" name="subaccount" value="{{ $file->user->subaccount_code }}">
            <input type="hidden" name="metadata" value="{{ json_encode($array = ['file_identifier' => $file->identifier]) }}">


            <p class="control">
                <button class="button is-primary is-medium"><i class="fa fa-credit-card"></i>&nbsp; Pay with Paystack</button>
            </p>
        </span>

        

    </form>
