<?php

namespace App\Services;

use App\Repositories\NewsRepository;

class ArticleService
{
    protected $newsRepository;

    public function __construct(NewsRepository $newsRepository)
    {
        $this->newsRepository = $newsRepository;
    }

    public function getAllNews($category = null)
    {
        return $this->newsRepository->getAll($category);
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

