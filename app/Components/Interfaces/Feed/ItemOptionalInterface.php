<?php

namespace App\Components\Interfaces\Feed;

use Carbon\Carbon;
use Illuminate\Support\Collection;

interface ItemOptionalInterface
{
    public function getGuid():? string;

    public function getPubDate():? Carbon;

    public function getAuthor():? string;

    public function getCategories(): Collection;

    public function getEnclosure():? EnclosureInterface;
}
