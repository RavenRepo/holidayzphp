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
        // TEMPORARY: Disable SSL verification for local development. REMOVE for production!
        $response = Http::withOptions([
            'verify' => false,
            'timeout' => 30, // Increase timeout to 30 seconds
        ])->get('https://api.unsplash.com/search/photos', [
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

        // Fallback to placeholder images if the API request fails
        return $this->getPlaceholderImages($count);
    }

    /**
     * Get placeholder images if the API request fails.
     */
    private function getPlaceholderImages(int $count): array
    {
        $placeholders = [
            'https://via.placeholder.com/800x500?text=Travel+Image+1',
            'https://via.placeholder.com/800x500?text=Travel+Image+2',
            'https://via.placeholder.com/800x500?text=Travel+Image+3',
            'https://via.placeholder.com/800x500?text=Travel+Image+4',
            'https://via.placeholder.com/800x500?text=Travel+Image+5',
        ];

        return array_slice($placeholders, 0, $count);
    }
}
