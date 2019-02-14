<?php

namespace App\Components\Classes\Feed;

use App\Components\Abstracts\Feed\AbstractChannel;
use App\Components\Abstracts\Feed\AbstractImage;
use App\Components\Interfaces\Feed\ChannelInterface;
use App\Components\Interfaces\Feed\ChannelOptionalInterface;
use App\Components\Interfaces\Feed\ImageInterface;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use SimpleXMLElement;

class Channel extends AbstractChannel implements ChannelInterface, ChannelOptionalInterface
{
    /** @var SimpleXMLElement */
    protected $generator;
    /** @var SimpleXMLElement */
    protected $docs;
    /** @var SimpleXMLElement */
    protected $title;
    /** @var SimpleXMLElement */
    protected $language;
    /** @var SimpleXMLElement */
    protected $pubDate;
    /** @var SimpleXMLElement */
    protected $link;
    /** @var SimpleXMLElement */
    protected $description;
    /** @var ImageInterface */
    protected $image;
    /** @var array */
    protected $items = [];

    public function __construct(SimpleXMLElement $channel)
    {
        $this->generator = $channel->generator;
        $this->docs = $channel->docs;
        $this->title = $channel->title;
        $this->language = $channel->language;
        $this->pubDate = $channel->pubDate;
        $this->link = $channel->link;
        $this->description = $channel->description;
        /** @var SimpleXMLElement $image */
        $image = $channel->image;
        if ($image) {
            $this->image = new Image($image);
        }
        if ($items = $channel->item and count($items) > 0) {
            foreach ($items as $item) {
                $this->items[] = new Item($item);
            }
        }
    }

    /**
     * @return null|string
     */
    public function getGenerator():? string
    {
        return (string)$this->generator;
    }

    /**
     * @return null|string
     */
    public function getDocs():? string
    {
        return (string)$this->docs;
    }

    /**
     * @return null|string
     */
    public function getTitle():? string
    {
        return (string)$this->title;
    }

    /**
     * @return null|string
     */
    public function getLanguage():? string
    {
        return (string)$this->language;
    }

    /**
     * @return Carbon|null
     */
    public function getPubDate():? Carbon
    {
        return Carbon::parse($this->pubDate);
    }

    /**
     * @return null|string
     */
    public function getLink():? string
    {
        return (string)$this->link;
    }

    /**
     * @return AbstractImage|null
     */
    public function getImage():? AbstractImage
    {
        return $this->image;
    }

    /**
     * Get items
     *
     * @param int|null $limit
     * @return Collection
     */
    public function getItems(int $limit = null): Collection
    {
        $items = collect($this->items)->sortByDesc(function (Item $item) {
            return $item->getPubDate()->getTimestamp();
        });

        if ($limit) {
            // Limit item count using slice on collection
            $items = $items->slice(0, $limit);
        }

        return $items;
    }
}
