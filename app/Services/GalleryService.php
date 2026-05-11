<?php

namespace App\Services;

use App\Models\Gallery;

class GalleryService
{
    public function getPublishedGalleries(int $limit = null)
    {
        $query = Gallery::published()->ordered();
        
        if ($limit) {
            $query = $query->limit($limit);
        }
        
        return $query->get();
    }

    public function getGalleryWithImages($slug)
    {
        return Gallery::where('slug', $slug)
            ->where('is_published', true)
            ->with('images')
            ->firstOrFail();
    }

    public function getGalleryStats()
    {
        return [
            'total_galleries' => Gallery::published()->count(),
            'total_images' => Gallery::published()->withCount('images')->get()->sum('images_count'),
        ];
    }
}
