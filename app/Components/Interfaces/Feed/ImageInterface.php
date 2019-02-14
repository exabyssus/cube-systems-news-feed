<?php

namespace App\Components\Interfaces\Feed;

interface ImageInterface
{
    public function getUrl():? string;

    public function getTitle():? string;

    public function getLink():? string;
}
