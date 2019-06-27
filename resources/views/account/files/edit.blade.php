@extends('account.layouts.default')

@section('account.content')
   {{-- Create file form --}}

   <div class="card">
       <div class="card-header">
           <h1 class="card-header-title">Update  file  &nbsp; <small class="has-text-grey-light"> {{ $file->title }}</small></h1>
          
       </div>
       <div class="card-content">
           <div class="content">
                @if ($approval)
                    @include('account.files.partials._changes')
                @endif
               <form action="{{ route('account.files.update', $file) }}" class="form" method="POST">
                   @csrf
                   {{ method_field('PATCH') }}

                   <div class="field">
                       <p class="control">
                           <label for="live" class="checkbox">
                               <input type="checkbox" name="live" id="live" {{ $file->live ? 'checked' : '' }}>
                               Live
                           </label>
                       </p>
                   </div>
                   <div class="field">
                       <label for="title" class="label">Title</label>
                       <p class="control">
                           <input type="text" name="title" id="title" class="input{{ $errors->has('title') ? ' is-danger' : '' }}" value="{{ old('title') ? old('title') : $file->title }}" required placeholder="File title">
                       </p>
                       @if ($errors->has('title'))
                            <p class="help is-danger">{{ $errors->first('title') }}</p>
                        @endif
                   </div>

                   <div class="field">
                       <label for="overview_short" class="label">Short overview</label>
                       <p class="control">
                           <input type="text" name="overview_short" id="overview_short" class="input{{ $errors->has('overview_short') ? ' is-danger' : '' }}" value="{{ old('overview_short') ? old('overview_short') : $file->overview_short }}" required>
                       </p>
                       @if ($errors->has('overview_short'))
                           <p class="help is-danger">{{ $errors->first('overview_short') }}</p>
                       @endif
                   </div>

                   <div class="field">
                       <label for="overview" class="label">Overview</label>
                       <p class="control">
                           <textarea name="overview" id="overview"  class="textarea{{ $errors->has('overview') ? ' is-danger' : '' }}" required>{{ old('overview') ? old('overview') : $file->overview }}</textarea>
                       </p>
                       @if ($errors->has('overview'))
                           <p class="help is-danger">{{ $errors->first('overview') }}</p>
                       @endif
                   </div>
                   <div class="field">
                       <label for="price" class="label">Price (NGN)</label>
                       <p class="control">
                        <input type="number" name="price" id="price" class="input{{ $errors->has('price') ? ' is-danger' : '' }}" value="{{ old('price') ? old('price') : $file->price }}" required>
                       </p>

                       @if ($errors->has('price'))
                           <p class="help is-danger">{{ $errors->first('price') }}</p>
                       @endif
                   </div>
                   <div class="field is-grouped">
                       <p class="control">
                           <button class="button is-primary" type="submit">Update file</button>
                       </p>
                       <p>
                           Your file changes may be subject to review.
                       </p>
                   </div>
               </form>
           </div>
       </div>
   </div>
@endsection
