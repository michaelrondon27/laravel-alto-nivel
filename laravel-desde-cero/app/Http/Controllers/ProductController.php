<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('products.index')->with([
            'products' => Product::all()
        ]);
    }
    
    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $product = Product::create($request->all());

        return $product;
    }

    public function show($product)
    {
        return view('products.show')->with([
            'product' => Product::findOrFail($product)
        ]);
    }

    public function edit($product)
    {
        return "Showing the form to edit the product with id {$product} from CONTROLLER";
    }

    public function update($product)
    {
        // 
    }

    public function destroy($product)
    {
        // 
    }

}
