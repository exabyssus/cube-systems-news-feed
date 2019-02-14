<?php

namespace App\Components\Interfaces\Feed;

use App\Components\Abstracts\Feed\AbstractImage;
use Carbon\Carbon;
use Illuminate\Support\Collection;

interface ChannelInterface
{
    public function getGenerator():? string;

    public function getDocs():? string;

    public function getTitle():? string;

    public function getLanguage():? string;

    public function getPubDate():? Carbon;

    public function getLink():? string;

    public function getImage():? AbstractImage;

    public function getItems(): Collection;
}
