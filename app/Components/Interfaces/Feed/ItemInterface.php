<?php

namespace App\Components\Interfaces\Feed;

interface ItemInterface
{
    public function getTitle():? string;

    public function getDescription():? string;

    public function getLink():? string;
}
