<?php

namespace App\Components\Abstracts\Feed;

/**
 * Based on http://www.rssboard.org/rss-specification#ltimagegtSubelementOfLtchannelgt
 *
 * Class AbstractImage
 * @package App\Classes\Feed
 */
abstract class AbstractImage
{
    abstract public function getUrl():? string;

    abstract public function getTitle():? string;

    abstract public function getLink():? string;
}
