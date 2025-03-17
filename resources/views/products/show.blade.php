@extends('layouts.app')

@section('title', 'Просмотр товара')

@section('content')
    <h1>Просмотр товара</h1>
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">{{ $product->name }}</h3>
            <p class="card-text"><strong>Категория:</strong> {{ $product->category->name }}</p>
            <p class="card-text"><strong>Цена:</strong> {{ number_format($product->price, 2) }} руб.</p>
            @if($product->description)
                <p class="card-text"><strong>Описание:</strong> {{ $product->description }}</p>
            @endif
            <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">Редактировать</a>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Назад</a>
        </div>
    </div>
@endsection
