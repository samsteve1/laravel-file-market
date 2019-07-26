<div class="list is-hoverable is-danger">
    <a href="{{ route('popular') }}" class="list-item {{ return_if(on_page('popular'), 'is-active') }}">Popular files</a>
    {{-- <a href="#" class="list-item">Best selling</a> --}}
    <br>
    <p><strong>Categories</strong></p>

    @foreach ($categories as $category)
        <a href="{{ route('category', $category) }}" class="list-item {{ return_if(on_page('categories/'. $category->id), ' is-active') }}">{{ ucfirst($category->name) }}</a>
    @endforeach
</div>


