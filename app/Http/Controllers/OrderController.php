<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Список заказов
    public function index()
    {
        $orders = Order::with('product')->get();
        return view('orders.index', compact('orders'));
    }

    // Форма создания заказа
    public function create()
    {
        $products = Product::all();
        return view('orders.create', compact('products'));
    }

    // Сохранение нового заказа
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'order_date'    => 'required|date',
            'product_id'    => 'required|exists:products,id',
            'quantity'      => 'required|integer|min:1',
            'comment'       => 'nullable|string',
        ]);

        Order::create($validated);
        return redirect()->route('orders.index')->with('success', 'Заказ создан.');
    }

    // Просмотр деталей заказа
    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    // Форма редактирования заказа (например, для изменения статуса)
    public function edit(Order $order)
    {
        return view('orders.edit', compact('order'));
    }

    // Обновление заказа (в данном случае можно обновлять только статус)
    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'status' => 'required|in:новый,выполнен',
        ]);

        $order->update($validated);
        return redirect()->route('orders.index')->with('success', 'Статус заказа обновлён.');
    }

    // Удаление заказа
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Заказ удалён.');
    }
}
