<?php

namespace App\Components\Abstracts\Feed;

abstract class AbstractConfig
{
    abstract public function getUrl(): string;

    abstract public function isActive(): bool;

    abstract public function getTtl(): int;
}
