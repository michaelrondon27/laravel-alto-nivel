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

    public function store()
    {
        $rules = [
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:1000'],
            'price' => ['required', 'min:1'],
            'stock' => ['required', 'min:0'],
            'status' => ['required', 'in:available,unavailable']
        ];

        request()->validate($rules);

        if (request()->status == 'available' && request()->stock == 0) {
            return redirect()
                ->back()
                ->withInput(request()->all())
                ->withErrors('If available must have stock');
        }

        $product = Product::create(request()->all());

        return redirect()
            ->route('products.index')
            ->withSuccess("The new product with id {$product->id} was created");
    }

    public function show($id)
    {
        return view('products.show')->with([
            'product' => Product::findOrFail($id)
        ]);
    }

    public function edit($id)
    {
        return view('products.edit')->with([
            'product' => Product::findOrFail($id)
        ]);
    }

    public function update($id)
    {
        $rules = [
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:1000'],
            'price' => ['required', 'min:1'],
            'stock' => ['required', 'min:0'],
            'status' => ['required', 'in:available,unavailable']
        ];

        request()->validate($rules);

        $product = Product::findOrFail($id);

        $product->update(request()->all());

        return redirect()
            ->route('products.index')
            ->withSuccess("The product with id {$product->id} was edited");
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()
            ->route('products.index')
            ->withSuccess("The product with id {$product->id} was deleted");
    }
}
