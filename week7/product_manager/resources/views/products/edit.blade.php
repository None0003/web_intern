@extends('layouts.app')

@section('title', 'Chỉnh sửa sản phẩm')

@section('content')
<h2>Chỉnh sửa sản phẩm</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('products.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="name" class="form-label">Tên sản phẩm</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $product->name) }}" required>
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Giá</label>
        <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $product->price) }}" required>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Mô tả</label>
        <input type="text" class="form-control" id="description" name="description" value="{{ old('description', $product->description) }}">
    </div>

    <button type="submit" class="btn btn-primary">Cập nhật</button>
    <a href="{{ route('products.index') }}" class="btn btn-secondary">Hủy</a>
</form>
@endsection
