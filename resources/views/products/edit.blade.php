@extends('layouts.app')

@section('title', 'Редактировать товар')

@section('content')
    <h1>Редактировать товар</h1>
    <form action="{{ route('products.update', $product) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Название</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $product->name) }}" required>
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Категория</label>
            <select name="category_id" id="category_id" class="form-control" required>
                <option value="">Выберите категорию</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ (old('category_id', $product->category_id) == $category->id) ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Цена</label>
            <input type="number" step="0.01" name="price" id="price" class="form-control" value="{{ old('price', $product->price) }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Описание</label>
            <textarea name="description" id="description" class="form-control">{{ old('description', $product->description) }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Обновить</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Отмена</a>
    </form>
@endsection
