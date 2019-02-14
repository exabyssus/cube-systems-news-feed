<?php

namespace App\Components\Interfaces\Feed;

interface ImageOptionalInterface
{
    public function getWidth():? int;

    public function getHeight():? int;

    public function getDescription():? string;
}
