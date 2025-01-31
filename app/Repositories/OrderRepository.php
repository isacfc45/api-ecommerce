<?php

namespace App\Repositories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;

class OrderRepository
{
    public function store(array $data): Order
    {
        return Order::create($data);
    }

    public function all(): Collection
    {
        return Order::all();
    }

    public function find(int $id): Order
    {
        return Order::findOrFail($id);
    }

    public function update(int $id, array $data): Order
    {
        $order = Order::findOrFail($id);
        $order->update($data);

        return $order;
    }
}
