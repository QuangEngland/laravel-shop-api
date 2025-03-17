<?php

namespace App\Http\Controllers;

use App\Repositories\Product\ProductInterface;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //
    private $product;
    public function __construct(ProductInterface $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        return $this->product->getAllProducts();
    }

    public function show($id)
    {
        return $this->product->getProductById($id);
    }

    public function store(Request $request)
    {
        return $this->product->createProduct($request->all());
    }

    public function update($id, Request $request)
    {
        return $this->product->updateProduct($id, $request->all());
    }

    public function destroy($id)
    {
        return $this->product->deleteProduct($id);
    }
}
