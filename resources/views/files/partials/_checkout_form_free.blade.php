<form action="{{ route('checkout.free', $file) }}" method="POST">
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
        <p class="control">
            <button class="button is-primary is-medium"><i class="fa fa-download"></i> Download for free</button>
        </p>
    </span>
</form>