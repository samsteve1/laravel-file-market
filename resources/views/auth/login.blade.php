@extends('layouts.app')

@section('content')

<section class="section">
    <div class="container is-fluid">
        <div class="columns">
            <div class="column is-half is-offset-one-quarter">
                <div class="card">
                    <div class="card-header">
                        <p class="card-header-title">Sign in to your account.</p>
                    </div>

                    <div class="card-content">
                        <div class="content">
                            <form action="{{ route('login') }}" class="form" method="POST">
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
                                    <label for="password" class="label">Account password</label>
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
                                            <input type="checkbox" name="remember" id="remember">
                                            Remember me
                                        </label>
                                    </div>
                                </div>
                                <div class="field is-grouped">
                                    <p class="control">
                                        <button class="button is-primary" type="submit">Login</button>
                                    </p>
                                    <p>
                                        <a href="{{ route('password.request') }}">Forgotten your password?</a>
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
