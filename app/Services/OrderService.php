<?php

namespace App\Services;

use App\Models\Order;
use App\Repositories\OrderRepository;
use Illuminate\Database\Eloquent\Collection;

class OrderService
{
    public function __construct(protected OrderRepository $orderRepository) {}

    public function createOrder(array $data): Order
    {
        return $this->orderRepository->store($data);
    }

    public function listOrders(): Collection
    {
        return $this->orderRepository->all();
    }

    public function getOrder(int $id): Order
    {
        return $this->orderRepository->find($id);
    }
}
