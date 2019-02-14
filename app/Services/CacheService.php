<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;

class CacheService
{
    /**
     * Set to cache with default ttl 60 seconds
     *
     * @param string $key
     * @param string $data
     * @param int $ttl
     */
    public function set(string $key, string $data, int $ttl = 60)
    {
        Cache::put($key, $data, $ttl);
    }

    /**
     * Get from cache
     *
     * @param string $key
     * @return null|string
     */
    public function get(string $key):? string
    {
        $value = null;
        if (Cache::has($key)) {
            // Get from cache and set to value
            $value = Cache::get($key);
        }

        return $value;
    }

    /**
     * Forget cache item
     *
     * @param string $key
     */
    public function forget(string $key)
    {
        Cache::forget($key);
    }
}
