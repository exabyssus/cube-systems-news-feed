<?php

namespace App\Components\Interfaces\Feed;

interface ConfigInterface
{
    public function getUrl(): string;

    public function isActive(): bool;

    public function getTtl(): int;
}
