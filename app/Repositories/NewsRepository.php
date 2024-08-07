<?php

namespace App\Repositories;

use App\Models\News;

class NewsRepository
{
    public function getAll($category = null)
    {
        return News::when($category, function($query, $category) {
            return $query->where('category', $category);
        })->get();
    }

    public function getNewsById($id)
    {
        return News::findOrFail($id);
    }

    public function getNewsBySlug($slug)
    {
        return News::where('slug', $slug)->firstOrFail();
    }
}
