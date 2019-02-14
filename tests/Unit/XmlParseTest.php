<?php

namespace Tests\Unit;

use App\Services\XmlService;
use Tests\TestCase;

class XmlParseTest extends TestCase
{
    const MOCK_VALID_FILE = __DIR__ . '/../resources/tvnet.valid.rss.xml';
    const MOCK_INVALID_FILE = __DIR__ . '/../resources/tvnet.invalid.rss.xml';

    public function testParseValidXmlStringToSimpleXMLElement()
    {
        $rawXml = file_get_contents(self::MOCK_VALID_FILE);
        $xmlService = new XmlService;
        $simpleXMLElement = $xmlService->convertStringToSimpleXMLElement($rawXml);

        $this->assertInstanceOf('SimpleXMLElement', $simpleXMLElement);
    }

    public function testParseInvalidXmlStringToSimpleXMLElement()
    {
        $rawXml = file_get_contents(self::MOCK_INVALID_FILE);
        $xmlService = new XmlService;
        $simpleXMLElement = $xmlService->convertStringToSimpleXMLElement($rawXml);

        $this->assertNotInstanceOf('SimpleXMLElement', $simpleXMLElement);
    }
}
