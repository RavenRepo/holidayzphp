<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

/**
 * Service for fetching images from Unsplash API.
 */
class UnsplashService
{
    /**
     * Search Unsplash for images by keyword.
     */
    public function searchImages(string $query, int $count = 5): array
    {
        $accessKey = config('services.unsplash.access_key');
        $response = Http::get('https://api.unsplash.com/search/photos', [
            'query' => $query,
            'per_page' => $count,
            'client_id' => $accessKey,
        ]);

        if ($response->successful()) {
            return collect($response->json('results'))
                ->pluck('urls.regular')
                ->filter()
                ->values()
                ->all();
        }

        return [];
    }
}
