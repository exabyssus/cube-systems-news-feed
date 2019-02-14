<ul class="list-group list-group-flush">
    <li class="list-group-item">
        @foreach ($categories as $k => $category)
            <a href="{{ $category->attributes()->domain }}"
               target="_blank"
               class="badge badge-pill badge-light">{{ $category }}</a>
        @endforeach
    </li>
</ul>