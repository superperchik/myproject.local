@extends('layouts.app')

@section('title', 'Создать заказ')

@section('content')
    <h1>Создать заказ</h1>
    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="customer_name" class="form-label">ФИО покупателя</label>
            <input type="text" name="customer_name" id="customer_name" class="form-control" value="{{ old('customer_name') }}" required>
        </div>
        <div class="mb-3">
            <label for="order_date" class="form-label">Дата создания</label>
            <input type="date" name="order_date" id="order_date" class="form-control" value="{{ old('order_date', date('Y-m-d')) }}" required>
        </div>
        <div class="mb-3">
            <label for="product_id" class="form-label">Товар</label>
            <select name="product_id" id="product_id" class="form-control" required>
                <option value="">Выберите товар</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                        {{ $product->name }} ({{ number_format($product->price, 2) }} руб.)
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Количество</label>
            <input type="number" name="quantity" id="quantity" class="form-control" value="{{ old('quantity', 1) }}" min="1" required>
        </div>
        <div class="mb-3">
            <label for="comment" class="form-label">Комментарий</label>
            <textarea name="comment" id="comment" class="form-control">{{ old('comment') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Сохранить заказ</button>
        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Отмена</a>
    </form>
@endsection
