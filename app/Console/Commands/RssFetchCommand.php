<?php

namespace App\Console\Commands;

use App\Facades\Feed;
use Illuminate\Console\Command;

class RssFetchCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rss:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch feeds';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Fetching rss feed data...');
        collect(config('feeds'))->keys()->each(function (string $serviceName) {
            $this->info(sprintf('From: %s', $serviceName));

            // Call cache forget method to remove cache item using key
            app('CacheService')->forget($serviceName);

            // Trigger feed getChannel method to fetch new data
            Feed::getChannel($serviceName);
        });
        $this->info('Finished fetching rss feed data!');
    }
}
