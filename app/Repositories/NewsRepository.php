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
}
