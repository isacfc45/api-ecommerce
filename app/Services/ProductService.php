<?php

namespace App\Services;

use App\Repositories\ProductRepository;

class ProductService
{
    public function __construct(protected ProductRepository $productRepository) {}

    public function listProducts($perPage)
    {
        return $this->productRepository->getAll($perPage);
    }

    public function createProduct($data)
    {
        return $this->productRepository->create($data);
    }
}
