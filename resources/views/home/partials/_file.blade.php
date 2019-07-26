
@component('files.partials._file', compact('file'))
@slot('links')
<nav class="level-left is-mobile">
        <div class="level-item">
          <div>
            <p class="heading">{{ $file->isFree() ? 'Free' :  'NGN' . $file->price }}</p>
          </div>
        </div>
        <div class="level-item">
            <div>
              <p class="heading">
                    @if (!$file->approved)
                    <p class="level-item">
                        Pending approval
                    </p>
                @endif
              </p>
            </div>
         </div>
         <div class="level-item">
            <div>
                <p class="">{{ $file->salesCount() }} Downloads</p>
            </div>
        </div>
        <div class="level-item">
            <div>
                    <a href="{{ route('files.show', $file) }}"><i class="fa fa-download"></i> Download</a>
            </div>
        </div>
</nav>
@endslot
@endcomponent