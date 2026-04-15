<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        if (!auth()->check() || !in_array(auth()->user()->role, ['admin', 'employee'])) {
            return redirect('/login')->with('error', 'Please login first.');
        }
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        if (!auth()->check() || !in_array(auth()->user()->role, ['admin', 'employee'])) {
            return redirect('/login')->with('error', 'Please login first.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id'
        ]);

        Product::create($request->all());
        return redirect()->route('products.index')->with('success', 'Product added!');
    }

    public function edit(Product $product)
    {
        if (!auth()->check() || !in_array(auth()->user()->role, ['admin', 'employee'])) {
            return redirect('/login')->with('error', 'Please login first.');
        }
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        if (!auth()->check() || !in_array(auth()->user()->role, ['admin', 'employee'])) {
            return redirect('/login')->with('error', 'Please login first.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id'
        ]);

        $product->update($request->all());
        return redirect()->route('products.index')->with('success', 'Product updated!');
    }

    public function destroy(Product $product)
    {
        if (!auth()->check() || !in_array(auth()->user()->role, ['admin', 'employee'])) {
            return redirect('/login')->with('error', 'Please login first.');
        }

        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted!');
    }
}