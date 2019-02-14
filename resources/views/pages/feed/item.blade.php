<div class="col-xl-4 col-xs-2 col-md-4 p-1">
    <div class="card">
        @includeWhen($item->getCategories()->count() > 0, 'pages.feed.item.category', [
            'categories' => $item->getCategories()->filter(function ($category) {
                    return !in_array(strtolower($category), ['tvnet']);
                })
        ])
        <div class="card-header">
            <h5 class="card-title">
                <span class="badge badge-pill badge-warning">
                    {{ $item->getPubDate()->diffForHumans() }}
                </span>
                {{ $item->getTitle() }}
            </h5>
        </div>
        @includeWhen($item->getEnclosure(), 'pages.feed.item.image', ['image' => $item->getEnclosure()])
        <div class="card-body">
            <p class="card-text mw-100">
                {!! $item->getDescription() !!}
                <a href="{{ $item->getLink() }}" target="_blank"
                   class="badge badge-pill badge-warning">Go to article</a>
            </p>
        </div>
    </div>
</div>