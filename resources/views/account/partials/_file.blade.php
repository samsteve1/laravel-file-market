
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
                    <p class="heading">{{ $file->live ? 'Live' : 'Not live' }}</p>
                </div>
            </div>
            <div class="level-item">
                <div>
                    <p class="heading"><a href="{{ route('account.files.edit', $file) }}">Make changes</a></p>
                </div>
            </div>
    </nav>
    @endslot
@endcomponent