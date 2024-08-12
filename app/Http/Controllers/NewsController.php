<?php

namespace App\Http\Controllers;

use App\Services\BaseService;
use Illuminate\Http\Request;
use App\Services\ArticleService;
use App\Models\News;
use App\Models\Category;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class NewsController extends Controller
{
    protected $service;

    public function __construct()
    {
        $this->service = new BaseService(new News());
    }

    public function index()
    {
        try {
            $posts = $this->service->getAll();
            return response()->json($posts);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Có lỗi xảy ra, vui lòng thử lại sau.'], 500);
        }
    }

    public function show($id)
    {
        try {
            $post = $this->service->getById($id);
            return response()->json($post);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Không tìm thấy dữ liệu'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Có lỗi xảy ra, vui lòng thử lại sau.'], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $post = $this->service->create($request->all());
            return response()->json($post, 201);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Có lỗi xảy ra, vui lòng thử lại sau.'], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $post = $this->service->update($request->all(), $id);
            return response()->json($post);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Không tìm thấy dữ liệu'], 404);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Có lỗi xảy ra, vui lòng thử lại sau.'], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $this->service->delete($id);
            return response()->json(null, 204);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Không tìm thấy dữ liệu'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Có lỗi xảy ra, vui lòng thử lại sau.'], 500);
        }
    }

    public function getPostsByStatus($status)
    {
        try {
            $posts = News::where('status', $status)
                ->get();
            return response()->json($posts);
        } catch (\Exception $e) {
            // Ghi lại lỗi vào log và trả về phản hồi lỗi
            \Log::error('Lỗi khi lấy bài viết theo trạng thái: ' . $e->getMessage());
            return response()->json(['message' => 'Có lỗi xảy ra khi lấy bài viết.'], 500);
        }
    }


    public function updateDraft(Request $request, $id)
    {
        try {
            $post = News::find($id);

            if (!$post) {
                return response()->json(['message' => 'Không tìm thấy bài viết'], 404);
            }

            $draftData = json_encode([
                'category_id' => $request->input('category_id'),
                'title' => $request->input('title'),
                'slug' => $request->input('slug'),
                'content' => $request->input('content'),
                'status' => $request->input('status'),
                'img' => $request->input('img'),
            ]);

            $post->draft = $draftData;
            $post->save();

            return response()->json(['message' => 'Cập nhật draft thành công', 'draft' => $draftData], 200);
        } catch (\Exception $e) {
            // Ghi lại lỗi vào log và trả về phản hồi lỗi
            \Log::error('Lỗi khi cập nhật draft bài viết: ' . $e->getMessage());
            return response()->json(['message' => 'Có lỗi xảy ra khi cập nhật draft.'], 500);
        }
    }



    // protected $articleService;
    // public function __construct(ArticleService $articleService)
    // {
    //     $this->articleService = $articleService;
    // }

    // public function index(Request $request)
    // {
    //     $category = $request->query('category', 'Adventure Travel');
    //     $news = $this->articleService->getAllNews($category);
    //     $categories = Category::all();

    //     return view('home.news', compact('news', 'category', 'categories'));
    // }

    // public function show($slug)
    // {
    //     // Sử dụng service để lấy tin tức theo slug
    //     $news = $this->articleService->getNewsBySlug($slug);

    //     // Truyền dữ liệu tới view
    //     return view('home.news-detail', [
    //         'news' => $news
    //     ]);
    // }
}

