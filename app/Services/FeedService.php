<?php

namespace App\Services;

use App\Components\Abstracts\Feed\AbstractChannel;
use App\Components\Abstracts\Feed\AbstractConfig;
use App\Components\Classes\Feed\Channel;
use App\Components\Classes\Feed\Config;
use App\Components\Interfaces\Feed\ConfigInterface;
use App\Exceptions\InvalidURLException;
use App\Exceptions\SimpleXMLElementException;
use Illuminate\Support\Facades\Log;
use SimpleXMLElement;

class FeedService
{
    /**
     * Get feed service config.
     *
     * @param string $serviceName
     * @return AbstractConfig
     */
    protected function getServiceConfig(string $serviceName): AbstractConfig
    {
        $config = config(sprintf('feeds.%s', $serviceName), []);
        return new Config($config);
    }

    /**
     * Get channel by service name
     *
     * @param string $serviceName
     * @return AbstractChannel
     */
    public function getChannel(string $serviceName):? AbstractChannel
    {
        /** @var ConfigInterface $serviceConfig */
        $serviceConfig = $this->getServiceConfig($serviceName);
        if (!$serviceConfig->isActive()) {
            // Early return when wrong service is not active
            return null;
        }

        /** @var AbstractChannel|null $result */
        $result = null;

        try {
            /** Throwable */
            app('DataService')->validateUrl($serviceConfig->getUrl());

            // Get from cache or fetch
            $content = app('CacheService')->get($serviceName)
                ?? $this->fetchContent($serviceName, $serviceConfig);

            /** @var null|SimpleXMLElement $object */
            $object = app('XmlService')->convertStringToSimpleXMLElement($content);

            /** Throwable */
            app('DataService')->validateSimpleXMLElement($object);

            /** @var SimpleXMLElement $channel */
            $channel = $object->channel;

            /** @var Channel $result */
            $result = new Channel($channel);
        } catch (InvalidURLException $e) {
            Log::notice($e->getMessage());
        } catch (SimpleXMLElementException $e) {
            Log::warning($e->getMessage());
        }

        return $result;
    }

    /**
     * Fetch content
     *
     * @param string $serviceName
     * @param ConfigInterface $serviceConfig
     * @return null|string
     */
    public function fetchContent(string $serviceName, ConfigInterface $serviceConfig):? string
    {
        /** @var string $content */
        if ($content = app('HttpService')->getContents($serviceConfig->getUrl())) {
            // Put to cache
            app('CacheService')->set(
                $serviceName,
                $content,
                $serviceConfig->getTtl()
            );
        }

        return $content;
    }
}
