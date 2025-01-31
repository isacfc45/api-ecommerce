<?php

namespace App\Repositories;

use App\Models\Cart;

class CartRepository
{
    public function getUserCart($userId)
    {
        return Cart::where('user_id', $userId)->with('product')->get();
    }

    public function addToCart($data)
    {
        return Cart::updateOrCreate(
            ['user_id' => $data['user_id'], 'product_id' => $data['product_id']],
            ['quantity' => $data['quantity']]
        );
    }

    public function removeFromCart($cartId, $userId)
    {
        return Cart::where('id', $cartId)->where('user_id', $userId)->delete();
    }

    public function clearCart($userId)
    {
        return Cart::where('user_id', $userId)->delete();
    }
}
