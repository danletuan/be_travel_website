<?php

namespace App\Http\Controllers;

use App\Services\BaseService;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CategoryController extends Controller
{
    protected $service;

    public function __construct()
    {
        $this->service = new BaseService(new Category());
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

}

