<?php

namespace App\Components\Abstracts\Feed;

/**
 * Based on http://www.rssboard.org/rss-specification#ltenclosuregtSubelementOfLtitemgt
 *
 * Class AbstractEnclosure
 * @package App\Classes\Feed
 */
abstract class AbstractEnclosure
{
    abstract public function getUrl():? string;

    abstract public function getLength():? string;

    abstract public function getType():? string;
}
