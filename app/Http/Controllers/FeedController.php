<?php

namespace App\Http\Controllers;

use App\Facades\Feed;

class FeedController extends Controller
{
    /**
     * Show feed items list
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        // Can add as many rss feeds as you want
        $feeds = collect(['tvnet'])->map(function (string $serviceName) {
            return Feed::getChannel($serviceName);
        });

        // Do we really need to use view composer
        // and leave this controller method all alone just to render page? no! let's leave at least something :)
        return view('pages.feed', compact('feeds'));
    }
}
