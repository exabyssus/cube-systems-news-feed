<?php

namespace App\Components\Classes\Feed;

use App\Components\Abstracts\Feed\AbstractImage;
use App\Components\Interfaces\Feed\ImageInterface;
use App\Components\Interfaces\Feed\ImageOptionalInterface;
use SimpleXMLElement;

class Image extends AbstractImage implements ImageInterface, ImageOptionalInterface
{
    /** @var SimpleXMLElement */
    protected $url;
    /** @var SimpleXMLElement */
    protected $title;
    /** @var SimpleXMLElement */
    protected $link;
    /** @var SimpleXMLElement */
    protected $width;
    /** @var SimpleXMLElement */
    protected $height;
    /** @var SimpleXMLElement */
    protected $description;

    public function __construct(SimpleXMLElement $image)
    {
        $this->url = $image->url;
        $this->title = $image->title;
        $this->link = $image->link;
        $this->width = $image->width;
        $this->height = $image->height;
        $this->description = $image->description;
    }

    /**
     * @return null|string
     */
    public function getUrl():? string
    {
        return (string)$this->url;
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
    public function getLink():? string
    {
        return (string)$this->link;
    }

    /**
     * @return null|string
     */
    public function getWidth():? int
    {
        return (int)$this->width;
    }

    /**
     * @return null|string
     */
    public function getHeight():? int
    {
        return (int)$this->height;
    }

    /**
     * @return null|string
     */
    public function getDescription():? string
    {
        return (string)$this->description;
    }
}
