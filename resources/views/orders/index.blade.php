@extends('layouts.app')

@section('title', 'Список заказов')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Заказы</h1>
        <a href="{{ route('orders.create') }}" class="btn btn-primary">Создать заказ</a>
    </div>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Дата создания</th>
            <th>Покупатель</th>
            <th>Статус</th>
            <th>Итоговая цена</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->order_date }}</td>
                <td>{{ $order->customer_name }}</td>
                <td>{{ $order->status }}</td>
                <td>{{ number_format($order->total_price, 2) }} руб.</td>
                <td>
                    <a href="{{ route('orders.show', $order) }}" class="btn btn-info btn-sm">Просмотр</a>
                    <a href="{{ route('orders.edit', $order) }}" class="btn btn-warning btn-sm">Редактировать</a>
                    <form action="{{ route('orders.destroy', $order) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Удалить заказ?')">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
