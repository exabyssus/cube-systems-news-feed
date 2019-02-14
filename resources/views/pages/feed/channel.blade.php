<a href="{{ $channel->getLink() }}" target="_blank">
    @includeWhen($channel->getImage(), 'pages.feed.channel.image', ['image' => $channel->getImage()])
    @includeWhen(!$channel->getImage(), 'pages.feed.channel.title', ['title' => $channel->getTitle()])
</a>