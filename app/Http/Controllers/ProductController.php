<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Отображение списка товаров
    public function index()
    {
        $products = Product::with('category')->get();
        return view('products.index', compact('products'));
    }

    // Форма создания товара
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    // Сохранение нового товара
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price'       => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);

        Product::create($validated);
        return redirect()->route('products.index')->with('success', 'Товар создан.');
    }

    // Просмотр подробной информации о товаре
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    // Форма редактирования товара
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    // Обновление товара
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price'       => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);

        $product->update($validated);
        return redirect()->route('products.index')->with('success', 'Товар обновлён.');
    }

    // Удаление товара
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Товар удалён.');
    }
}

