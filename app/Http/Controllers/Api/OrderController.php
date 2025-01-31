<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Services\OrderService;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    public function __construct(protected OrderService $orderService) {}

    public function store()
    {
        $order = $this->orderService->createOrder(auth()->id());

        if (!$order) {
            return ApiResponse::error('Order could not be created', 500);
        }

        return ApiResponse::success($order, 'Order created successfully', 201);
    }

    public function index()
    {
        return ApiResponse::success($this->orderService->getOrdersByUser(auth()->id()), 'Orders retrieved successfully', 200);
    }

    public function updateStatus(Request $request, $id)
    {
        $order = $this->orderService->updateOrderStatus($id, $request->status);
        return ApiResponse::success($order, 'Order status updated successfully', 200);
    }
}
