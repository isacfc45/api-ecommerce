<?php

namespace App\Services;

use App\Repositories\CartRepository;

class CartService
{
    protected $cartRepository;

    public function __construct(CartRepository $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

    public function getUserCart($userId)
    {
        return $this->cartRepository->getUserCart($userId);
    }

    public function addToCart($data)
    {
        return $this->cartRepository->addToCart($data);
    }

    public function removeFromCart($cartId, $userId)
    {
        return $this->cartRepository->removeFromCart($cartId, $userId);
    }
}
