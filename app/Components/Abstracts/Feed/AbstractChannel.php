<?php

namespace App\Components\Abstracts\Feed;

/**
 * Based on http://www.rssboard.org/rss-specification#requiredChannelElements
 *
 * Class AbstractChannel
 * @package App\Classes\Feed
 */
abstract class AbstractChannel
{
    abstract public function getTitle():? string;

    abstract public function getLink():? string;
}
