<?php

namespace App\Components\Classes\Feed;

use App\Components\Abstracts\Feed\AbstractConfig;
use App\Components\Interfaces\Feed\ConfigInterface;

class Config extends AbstractConfig implements ConfigInterface
{
    /** @var string */
    protected $url;
    /** @var bool */
    protected $isActive;
    /** @var int|null */
    protected $ttl;

    public function __construct(array $data = [])
    {
        $this->url = $data['url'] ?? '';
        $this->isActive = $data['is_active'] ?? false;
        $this->ttl = $data['ttl'] ?? null;
    }

    /**
     * @return null|string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return (bool)$this->isActive;
    }

    /**
     * @return int
     */
    public function getTtl(): int
    {
        if (!$ttl = $this->ttl) {
            // Fallback to config date minute
            $ttl = config('date.minute') * 10; // 10 minutes
        }

        return $ttl;
    }
}
