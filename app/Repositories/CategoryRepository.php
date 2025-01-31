<?php

use App\Models\Category;

class CategoryRepository
{
    public function getAll($perPage)
    {
        return Category::with('products')->paginate($perPage);
    }

    public function create($data)
    {
        return Category::create($data);
    }

    public function findById($id)
    {
        return Category::with('products')->findOrFail($id);
    }

    public function update($id, $data)
    {
        $category = Category::findOrFail($id);
        $category->update($data);
        return $category;
    }

    public function delete($id)
    {
        return Category::destroy($id);
    }
}
