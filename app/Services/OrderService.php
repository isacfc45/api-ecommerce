<?php

namespace App\Services;

use App\Repositories\OrderRepository;

class OrderService
{
    protected $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function createOrder($userId)
    {
        return $this->orderRepository->createOrder($userId);
    }

    public function getOrdersByUser($userId)
    {
        return $this->orderRepository->getOrdersByUser($userId);
    }

    public function updateOrderStatus($orderId, $status)
    {
        return $this->orderRepository->updateOrderStatus($orderId, $status);
    }
}
