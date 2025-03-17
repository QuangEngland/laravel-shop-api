<?php

namespace App\Repositories\Product;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Repositories\Product\ProductInterface;

class ProductRepository extends Controller implements ProductInterface
{
    private $product;
    public function __construct(Product $product)
    {
        $this->product = $product;
    }
    public function getAllProducts()
    {
        return $this->product->all();
    }

    public function getProductById($id)
    {
        return $this->product->find($id);
    }

    public function createProduct($data)
    {
        return $this->product->create($data);
    }

    public function updateProduct($id, $data)
    {
        $product = $this->product->find($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        $product->update($data);
        return $product;
    }

    public function deleteProduct($id)
    {
        return $this->product->find($id)->delete();
    }
}