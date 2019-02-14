<?php

namespace App\Components\Classes\Feed;

use App\Components\Abstracts\Feed\AbstractEnclosure;
use App\Components\Interfaces\Feed\EnclosureInterface;
use SimpleXMLElement;

class Enclosure extends AbstractEnclosure implements EnclosureInterface
{
    /** @var SimpleXMLElement */
    protected $url;
    /** @var SimpleXMLElement */
    protected $length;
    /** @var SimpleXMLElement */
    protected $type;

    public function __construct(SimpleXMLElement $enclosure)
    {
        $this->url = $enclosure->url;
        $this->length = $enclosure->length;
        $this->type = $enclosure->type;
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
    public function getLength():? string
    {
        return (string)$this->length;
    }

    /**
     * @return null|string
     */
    public function getType():? string
    {
        return (string)$this->type;
    }
}
