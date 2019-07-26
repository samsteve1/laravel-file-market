@extends('account.layouts.default')

@section('account.content')
    <div class="card">
        <div class="card-header">
            <h1 class="card-header-title">Your Files</h1>
        </div>
        <div class="card-content">
            <div class="content">
                @if ($files->count())
                    @each('account.partials._file', $files, 'file')
                    
                @else
                    <p>You have no files yet.</p>
                @endif
            </div>
        </div>
    </div>
@endsection