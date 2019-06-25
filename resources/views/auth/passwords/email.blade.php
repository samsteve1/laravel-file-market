@extends('layouts.app')

@section('content')
<section class="section"></section>
        <div class="container is-fluid">
            <div class="columns">
                <div class="column is-half is-offset-one-quarter">
                        @include('layouts.partials.flash._alert')
                    <div class="card">
                        <div class="card-header">
                            <p class="card-header-title">Request password reset</p>
                        </div>
                        
                        <div class="card-content">
                            <div class="content">
                                <form action="{{ route('password.email') }}" class="form" method="POST">
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
    
                                    <div class="field is-grouped">
                                        <p class="control">
                                            <button class="button is-primary" type="submit">{{ __('Send password reset link') }}</button>
                                        </p>
                                        <p>
                                            <a href="{{ route('login') }}">Login</a> <a href="{{ route('register') }}">Register</a>
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
