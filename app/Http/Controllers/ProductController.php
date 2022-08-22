<?php

namespace App\Http\Controllers;

use App\Product;
use APP\Category;
use APP\Provider;

use Illuminate\Http\Request;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;

class ProductController extends Controller
{
    public function index()
    {
        $Products = Product::get();
        return view('admin.Product.index', compact('Products'));
    }


    public function create()
    {
        $categories = Category::get();
        $providers = Provider::get();

        return view('admin.Product.create',compact('categories','providers'));
    }


    public function store(ProductStoreRequest $request)
    {
        Product::create($request->all());
        return redirect()->route('Products.index');
    }


    public function show(Product $Product)
    {
        return view('admin.Product.index', compact('Products'));
    }


    public function edit(Product $Product)
    {
        $categories = Category::get();
        $providers = Provider::get();

        return view('admin.Product.index', compact('Products', 'categories','providers'));
    }


    public function update(productUpdateRequest $request, Product $Product)
    {
        $Product->update($request->all());
        return redirect()->route('Products.index');
    }

    public function destroy(Product $Product)
    {
        $Product->delete();
        return redirect()->route('Products.index');
    }
}
