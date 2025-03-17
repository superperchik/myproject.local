@extends('layouts.app')

@section('title', 'Просмотр заказа')

@section('content')
    <h1>Заказ #{{ $order->id }}</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Покупатель: {{ $order->customer_name }}</h5>
            <p class="card-text"><strong>Дата создания:</strong> {{ $order->order_date }}</p>
            <p class="card-text"><strong>Статус:</strong> {{ $order->status }}</p>
            <p class="card-text"><strong>Товар:</strong> {{ $order->product->name }}</p>
            <p class="card-text"><strong>Количество:</strong> {{ $order->quantity }}</p>
            <p class="card-text"><strong>Итоговая цена:</strong> {{ number_format($order->total_price, 2) }} руб.</p>
            @if($order->comment)
                <p class="card-text"><strong>Комментарий:</strong> {{ $order->comment }}</p>
            @endif
            <a href="{{ route('orders.edit', $order) }}" class="btn btn-warning">Изменить статус</a>
            <a href="{{ route('orders.index') }}" class="btn btn-secondary">Назад</a>
        </div>
    </div>
@endsection
