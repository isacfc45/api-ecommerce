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

    public function findProductById($id)
    {
        return $this->productRepository->findById($id);
    }

    public function updateProduct($id, $data)
    {
        return $this->productRepository->update($id, $data);
    }

    public function deleteProduct($id)
    {
        return $this->productRepository->delete($id);
    }
}
