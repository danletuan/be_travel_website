<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ArticleService;

class NewsController extends Controller
{
    protected $articleService;

    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    public function index(Request $request)
    {
        $category = $request->query('category');
        $news = $this->articleService->getAllNews($category);

        return view('home.news', compact('news', 'category'));
    }

    public function show($slug)
    {
        // Lấy tin tức theo slug
        $news = News::where('slug', $slug)->firstOrFail();

        // Truyền dữ liệu vào view
        return view('home.news-detail', ['news' => $news]);
    }
}

