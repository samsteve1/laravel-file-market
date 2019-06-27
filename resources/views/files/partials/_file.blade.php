<article class="media">
    <div class="media-content">
        <div class="content">
            <p>
                <strong>
                    <a href="#">{{ $file->title }}</a>
                </strong>
                <br>
                {{ $file->overview_short }}
            </p>
        </div>
        {{ isset($links) ? $links : '' }}
    </div>
</article>