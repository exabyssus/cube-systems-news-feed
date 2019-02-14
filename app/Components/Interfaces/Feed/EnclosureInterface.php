<?php

namespace App\Components\Interfaces\Feed;

interface EnclosureInterface
{
    public function getUrl():? string;

    public function getLength():? string;

    public function getType():? string;
}
