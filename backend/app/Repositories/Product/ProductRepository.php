<?php
namespace App\Repositories\Product;
use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{
    public function getAll()
    {
        return Product::all();
    }
    public function findById($id)
    {
        return Product::findOrFail($id);
    }
    public function create(array $data)
    {
        return Product::create($data);
    }
    public function update($id, array $data)
    {
        $Product = Product::findOrFail($id);
        $Product->update($data);
        return $Product;
    }
    public function delete($id)
    {
        $Product = Product::findOrFail($id);
        $Product->delete();
        return true;
    }

}

