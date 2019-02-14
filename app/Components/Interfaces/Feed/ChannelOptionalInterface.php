<?php

namespace App\Components\Interfaces\Feed;

interface ChannelOptionalInterface
{
    public function getGenerator():? string;

    public function getDocs():? string;
}
