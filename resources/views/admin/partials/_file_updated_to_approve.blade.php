@component('files.partials._file', compact('file'))
    @slot('links')
        <div class="level">
            <div class="level-left">
                <p class="level-item">
                    <a href="{{ route('admin.files.show', $file) }}">Preview file</a>
                </p>

                <p class="level-item">
                    <a href="#" onclick="event.preventDefault(); document.getElementById('approve-{{ $file->id }}').submit();">Approve</a>
                </p>
                <form action="{{ route('admin.files.updated.update', $file) }}" id="approve-{{ $file->id }}" method="POST" class="is-hidden">
                    @csrf
                    {{ method_field('PATCH') }}

                </form>

                <p class="level-item">
                    <a href ="" onclick="event.preventDefault(); document.getElementById('reject-{{ $file->id }}').submit();">Reject file</a>
                </p>

                <form action="{{ route('admin.files.updated.destroy', $file) }}" id="reject-{{ $file->id }}" method="POST" class="is-hidden">
                    @csrf
                    {{ method_field('DELETE') }}

                </form>
               
            </div>
        </div>
    @endslot
@endcomponent