<?php

namespace App\Services;

use App\Repositories\NewsRepository;
use App\Models\News;
use App\Models\Category;

class ArticleService
{
    protected $newsRepository;

    public function __construct(NewsRepository $newsRepository)
    {
        $this->newsRepository = $newsRepository;
    }

    public function getAllNews($category = null)
    {
        $category = Category::where('name', $category)->first();

        if ($category) {
            return News::where('category_id', $category->id)->get();
        }
        
        return News::all();
    }

    public function getNewsById($id)
    {
        return $this->newsRepository->getNewsById($id);
    }

    public function getNewsBySlug($slug)
    {
        return $this->newsRepository->getNewsBySlug($slug);
    }
}

