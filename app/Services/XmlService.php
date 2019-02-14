<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use SimpleXMLElement;
use Throwable;

class XmlService
{
    const SIMPLE_XML_ELEMENT = 'SimpleXMLElement';

    /**
     * Convert string to SimpleXMLElement
     *
     * @param string $content
     * @return null|SimpleXMLElement
     */
    public function convertStringToSimpleXMLElement(string $content):? SimpleXMLElement
    {
        /** @var bool|null|SimpleXMLElement $simpleXMLElement */
        $simpleXMLElement = null;
        try {
            $simpleXMLElement = simplexml_load_string(
                $content,
                self::SIMPLE_XML_ELEMENT,
                LIBXML_NOCDATA
            );
        } catch (Throwable $e) {
            Log::warning($e->getMessage());
        }

        // As far as simplexml_load_string returns false when string could not be converted
        // in that case we have to return null
        return $simpleXMLElement ?: null;
    }
}
