<?php

namespace App\Components\Abstracts\Feed;

/**
 * Based on http://www.rssboard.org/rss-specification#hrelementsOfLtitemgt
 *
 * Class AbstractItem
 * @package App\Classes\Feed
 */
abstract class AbstractItem
{
    abstract public function getTitle():? string;

    abstract public function getDescription():? string;

    abstract public function getLink():? string;
}
