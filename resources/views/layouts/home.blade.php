<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
   @include('layouts.partials._head')
</head>
<body>
   <div id="app">
        <section class="hero is-primary is-small">
            <div class="hero-head">
                    @include('layouts.partials._navigation')
            </div>
        
            @yield('content')
           
        </section>
        
        <section class="section">
            <div class="container">
               <div class="columns">
                     <div class="column is-one-quarter">
                           @include('home.side-bar')
                     </div>
            
                     <div class="column is-three-quarter">
                        @yield('home.container')
                     </div>
               </div>
            </div>
         </section>

    </div>
    
    @include('layouts.partials._scripts')

</body>
</html>
