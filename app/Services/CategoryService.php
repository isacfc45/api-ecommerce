<?php

class CategoryService
{
    public function __construct(protected CategoryRepository $categoryRepository) {}

    public function listCategories($perPage)
    {
        return $this->categoryRepository->getAll($perPage);
    }

    public function createCategory($data)
    {
        return $this->categoryRepository->create($data);
    }

    public function findCategoryById($id)
    {
        return $this->categoryRepository->findById($id);
    }

    public function updateCategory($id, $data)
    {
        return $this->categoryRepository->update($id, $data);
    }

    public function deleteCategory($id)
    {
        return $this->categoryRepository->delete($id);
    }
}
