<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\CartRequest;
use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index()
    {
        return response()->json($this->cartService->getUserCart(auth()->id()), 200);
    }

    public function store(CartRequest $request)
    {
        return response()->json($this->cartService->addToCart([
            'user_id' => auth()->id(),
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
        ]), 201);
    }

    public function destroy($id)
    {
        return response()->json([
            'message' => $this->cartService->removeFromCart($id, auth()->id()) ? 'Item removido' : 'Item não encontrado'
        ], 200);
    }
}
