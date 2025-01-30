<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    public function getAll($perPage)
    {
        return Product::with('category')->paginate($perPage);
    }

    public function create($data)
    {
        return Product::create($data);
    }

    public function findById($id)
    {
        return Product::with('category')->findOrFail($id);
    }

    public function update($id, $data)
    {
        $product = Product::findOrFail($id);
        $product->update($data);
        return $product;
    }

    public function delete($id)
    {
        return Product::destroy($id);
    }
}
