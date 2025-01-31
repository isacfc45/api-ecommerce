<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct(protected OrderService $orderService) {}

    public function index(Request $request)
    {
        return ApiResponse::success($this->orderService->listOrders());
    }

    public function show($id)
    {
        return ApiResponse::success($this->orderService->getOrder($id));
    }

    public function store(Request $request)
    {
        $order = $this->orderService->createOrder($request->all());
        return ApiResponse::success($order, 'Order created successfully', 201);
    }

    public function update(Request $request, $id)
    {
        $order = $this->orderService->updateOrder($id, $request->all());
        return ApiResponse::success($order, 'Order updated successfully');
    }
}
