@extends('layouts.app')

@section('title', 'Редактировать заказ')

@section('content')
    <h1>Редактировать заказ</h1>
    <form action="{{ route('orders.update', $order) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="status" class="form-label">Статус</label>
            <select name="status" id="status" class="form-control" required>
                <option value="новый" {{ $order->status == 'новый' ? 'selected' : '' }}>Новый</option>
                <option value="выполнен" {{ $order->status == 'выполнен' ? 'selected' : '' }}>Выполнен</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Обновить статус</button>
        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Назад</a>
    </form>
@endsection
