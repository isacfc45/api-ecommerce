<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Models\Category;
use CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(protected CategoryService $categoryService) {}

    public function index(Request $request)
    {
        return ApiResponse::success($this->categoryService->listCategories($request->get('per_page', 10)));
    }

    public function store(Request $request)
    {
        $category = $this->categoryService->createCategory($request->all());
        return ApiResponse::success($category, 'Category created successfully', 201);
    }

    public function show(Category $category)
    {
        return ApiResponse::success($category);
    }

    public function update(Request $request, Category $category)
    {
        $category = $this->categoryService->updateCategory($category, $request->all());
        return ApiResponse::success($category, 'Category updated successfully');
    }

    public function destroy(Category $category)
    {
        $this->categoryService->deleteCategory($category);
        return ApiResponse::success(null, 'Category deleted successfully');
    }
}
