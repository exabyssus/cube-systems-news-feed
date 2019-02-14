<?php

namespace App\Components\Classes\Feed;

use App\Components\Abstracts\Feed\AbstractItem;
use App\Components\Interfaces\Feed\EnclosureInterface;
use App\Components\Interfaces\Feed\ItemInterface;
use App\Components\Interfaces\Feed\ItemOptionalInterface;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use SimpleXMLElement;

class Item extends AbstractItem implements ItemInterface, ItemOptionalInterface
{
    /** @var SimpleXMLElement */
    protected $title;
    /** @var SimpleXMLElement */
    protected $description;
    /** @var SimpleXMLElement */
    protected $link;
    /** @var SimpleXMLElement */
    protected $guid;
    /** @var SimpleXMLElement */
    protected $pubDate;
    /** @var SimpleXMLElement */
    protected $author;
    /** @var array */
    protected $categories = [];
    /** @var Enclosure|null */
    protected $enclosure;

    public function __construct(SimpleXMLElement $item)
    {
        $this->title = $item->title;
        $this->description = $item->description;
        $this->link = $item->link;
        $this->guid = $item->guid;
        $this->pubDate = $item->pubDate;
        $this->author = $item->author;
        if ($categories = $item->category and count($categories) > 0) {
            foreach ($categories as $category) {
                $this->categories[] = $category;
            }
        }
        /** @var null|SimpleXMLElement $enclosure */
        $enclosure = $item->enclosure;
        if ($enclosure && $attributes = $enclosure->attributes()) {
            $this->enclosure = new Enclosure($attributes);
        }
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
    public function getDescription():? string
    {
        return (string)$this->description;
    }

    /**
     * @return null|string
     */
    public function getLink():? string
    {
        return (string)$this->link;
    }

    /**
     * @return null|string
     */
    public function getGuid():? string
    {
        return (string)$this->guid;
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
    public function getAuthor():? string
    {
        return (string)$this->author;
    }

    /**
     * @return Collection
     */
    public function getCategories(): Collection
    {
        return collect($this->categories);
    }

    /**
     * @return EnclosureInterface|null
     */
    public function getEnclosure():? EnclosureInterface
    {
        return $this->enclosure;
    }
}
