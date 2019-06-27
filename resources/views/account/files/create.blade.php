@extends('account.layouts.default')

@section('account.content')
   {{-- Create file form --}}

   <div class="card">
       <div class="card-header">
           <h1 class="card-header-title">Create a file</h1>
       </div>
       <div class="card-content">
           <div class="content">
               <form action="{{ route('account.files.store', $file) }}" class="form" method="POST">
                   @csrf
                   <div class="field">
                       <label for="title" class="label">Title</label>
                       <p class="control">
                           <input type="text" name="title" id="title" class="input{{ $errors->has('title') ? ' is-danger' : '' }}" required placeholder="File title">
                       </p>
                       @if ($errors->has('title'))
                            <p class="help is-danger">{{ $errors->first('title') }}</p>
                        @endif
                   </div>

                   <div class="field">
                       <label for="overview_short" class="label">Short overview</label>
                       <p class="control">
                           <input type="text" name="overview_short" id="overview_short" class="input{{ $errors->has('overview_short') ? ' is-danger' : '' }}" required>
                       </p>
                       @if ($errors->has('overview_short'))
                           <p class="help is-danger">{{ $errors->first('overview_short') }}</p>
                       @endif
                   </div>

                   <div class="field">
                       <label for="overview" class="label">Overview</label>
                       <p class="control">
                           <textarea name="overview" id="overview"  class="textarea{{ $errors->has('overview') ? ' is-danger' : '' }}" required></textarea>
                       </p>
                       @if ($errors->has('overview'))
                           <p class="help is-danger">{{ $errors->first('overview') }}</p>
                       @endif
                   </div>
                   <div class="field">
                       <label for="price" class="label">Price (NGN)</label>
                       <p class="control">
                        <input type="number" name="price" id="price" class="input{{ $errors->has('price') ? ' is-danger' : '' }}" required>
                       </p>

                       @if ($errors->has('price'))
                           <p class="help is-danger">{{ $errors->first('price') }}</p>
                       @endif
                   </div>
                   <div class="field is-grouped">
                       <p class="control">
                           <button class="button is-primary" type="submit">Submit</button>
                       </p>
                       <p>
                           We'll review your file before it goes live.
                       </p>
                   </div>
               </form>
           </div>
       </div>
   </div>
@endsection