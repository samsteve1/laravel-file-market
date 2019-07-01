@extends('layouts.plain')

@section('content')
    <section class="hero is-medium is-info">
        
        <div class="hero-body">
            <div class="container">
                    @include('layouts.partials.flash._alert')
                <h3 class="subtitle is-spaced">
                    <strong>{{ ucwords($file->user->name) }}</strong> is selling
                </h3>
                <h1 class="title is-1 is-spaced">{{ ucwords($file->title) }}</h1>

                <h2 class="subtitle">
                    {{ ucfirst($file->overview_short) }}
                </h2>

                @if ($file->isFree())
                    @include('files.partials._checkout_form_free', compact('file'))
                @else
                    @include('files.partials._checkout_paid')
                @endif
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="content">
                <div class="columns">
                    <div class="column">
                        <h1 class="title">Overview</h1>
                        <p>{{ ucfirst($file->overview) }}</p>
                    </div>
                    <div class="column">
                        <h1 class="title">What you get</h1>

                        @foreach ($uploads as $upload)
                            <p>{{ $upload->filename }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection