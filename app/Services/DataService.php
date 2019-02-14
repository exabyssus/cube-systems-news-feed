<?php

namespace App\Services;

use App\Exceptions\InvalidURLException;
use SimpleXMLElement;
use App\Exceptions\SimpleXMLElementException;

class DataService
{
    /**
     * @param string $url
     * @throws InvalidURLException
     */
    public function validateUrl(string $url)
    {
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            throw new InvalidURLException('Url is not valid');
        }
    }

    /**
     * @param SimpleXMLElement $object
     * @throws SimpleXMLElementException
     */
    public function validateSimpleXMLElement(SimpleXMLElement $object)
    {
        if (!$object instanceof SimpleXMLElement) {
            throw new SimpleXMLElementException('Object should be instance of SimpleXMLElement not null');
        }
    }
}
