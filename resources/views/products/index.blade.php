@extends('layouts.app')

@section('title', 'Список товаров')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Товары</h1>
        <a href="{{ route('products.create') }}" class="btn btn-primary">Добавить товар</a>
    </div>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Категория</th>
            <th>Цена</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category->name }}</td>
                <td>{{ number_format($product->price, 2) }} руб.</td>
                <td>
                    <a href="{{ route('products.show', $product) }}" class="btn btn-info btn-sm">Просмотр</a>
                    <a href="{{ route('products.edit', $product) }}" class="btn btn-warning btn-sm">Редактировать</a>
                    <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Удалить товар?')">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

