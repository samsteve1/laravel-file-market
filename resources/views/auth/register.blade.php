@extends('layouts.app')

@section('content')

<section class="section">
    <div class="container is-fluid">
        <div class="columns">
            <div class="column is-half is-offset-one-quarter">
                <div class="card">
                    <div class="card-header">
                        <p class="card-header-title">Let's get you ready for selling</p>
                    </div>

                    <div class="card-content">
                        <div class="content">
                            <form action="{{ route('register') }}" class="form" method="POST">
                                @csrf
                                
                                <div class="field">
                                    <label for="email" class="label">Email</label>
                                    <div class="control has-icons-left">
                                        <input type="email" class="input{{ $errors->has('email') ? ' is-danger' : '' }}" id="email" name="email" placeholder="e.g. josh@example.com" value="{{ old('email') }}" required>
                                        <span class="icon is-small is-left">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                    </div>
                                    @if ($errors->has('email'))
                                        <p class="help is-danger">{{ $errors->first('email') }}</p>
                                    @endif
                                </div>

                                <div class="field">
                                    <label for="name" class="label">Name</label>
                                    <div class="control has-icons-left">
                                        <input type="text" class="input{{ $errors->has('name') ? ' is-danger' : '' }}" id="name" name="name" placeholder="e.g. Josh Kenney" value="{{ old('name') }}" required>
                                        <span class="icon is-small">
                                            <i class="fa fa-user"></i>
                                        </span>
                                    </div>
                                    @if ($errors->has('name'))
                                        <p class="help is-danger">{{ $errors->first('name') }}</p>
                                    @endif
                                </div>

                                <div class="field">
                                    <label for="password" class="label">Choose a password</label>
                                    <div class="control has-icons-left">
                                        <input type="password" name="password" id="password" class="input{{ $errors->has('password') ? ' is-danger' : '' }}" placeholder="password" required>
                                        <span class="icon is-small">
                                            <i class="fa fa-lock"></i>
                                        </span>
                                    </div>
                                    @if ($errors->has('password'))
                                        <p class="help is-danger">{{ $errors->first('password') }}</p>
                                    @endif
                                </div>

                                <div class="field">
                                    <div class="control">
                                        <label  class="checkbox">
                                            <input type="checkbox" name="terms" id="terms">
                                            I agree to the <a href="#">terms and conditions</a>
                                        </label>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="control">
                                        <button class="button is-primary" type="submit">Rgister</button>
                                    </div>
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
