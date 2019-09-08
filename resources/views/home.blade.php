@extends('layouts.home')

@section('content')
    <div class="hero-body">
        <div class="container has-text-centered">
            <h1 class="title is-1">
                Buy and sell files
            </h1>
        </div>
    </div>
@endsection

@section('home.container')
    <div class="card">
        <div class="card-header">
            <h3 class="card-header-title">
               {{ $title }}
            </h3>
        </div>

        <div class="card-content">
            <div class="content">
                @if ($files->count())
                    @each('home.partials._file', $files, 'file')

                    {{ $files->links('vendor.pagination.file-pagination') }}
                @else
                    <p>No files</p>
                @endif
            </div>


        </div>
    </div>
@endsection
