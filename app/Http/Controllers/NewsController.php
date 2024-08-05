<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ArticleService;
use App\Models\News;

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

    public function show($id)
    {
        // Lấy tin tức theo ID
        $news = News::findOrFail($id);

        // Truyền dữ liệu tới view
        return view('home.news-detail', [
            'news' => $news
        ]);
    }
}

