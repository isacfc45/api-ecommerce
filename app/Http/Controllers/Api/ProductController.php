<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(protected ProductService $productService) {}

    public function index(Request $request)
    {
        return ApiResponse::success($this->productService->listProducts($request->get('per_page', 10)));
    }

    public function store(ProductRequest $request)
    {
        $product = $this->productService->createProduct($request->all());
        return ApiResponse::success($product, 'Product created successfully', 201);
    }

    public function show(Product $product)
    {
        return ApiResponse::success($product);
    }

    public function update(ProductRequest $request, Product $product)
    {
        $product = $this->productService->updateProduct($product, $request->all());
        return ApiResponse::success($product, 'Product updated successfully');
    }

    public function destroy(Product $product)
    {
        $this->productService->deleteProduct($product);
        return ApiResponse::success(null, 'Product deleted successfully');
    }
}
