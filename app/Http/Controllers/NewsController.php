<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ArticleService;
use App\Models\News;
use App\Models\Category;

class NewsController extends Controller
{
    protected $articleService;

    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    public function index(Request $request)
    {
        $category = $request->query('category', 'Adventure Travel');
        $news = $this->articleService->getAllNews($category);
        $categories = Category::all();

        return view('home.news', compact('news', 'category', 'categories'));
    }

    public function show($slug)
    {
        // Sử dụng service để lấy tin tức theo slug
        $news = $this->articleService->getNewsBySlug($slug);

        // Truyền dữ liệu tới view
        return view('home.news-detail', [
            'news' => $news
        ]);
    }
}

