@extends('layouts.app')

@section('title', 'Chi tiết sản phẩm')

@section('content')
<h2>Chi tiết sản phẩm</h2>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">{{ $product->name }}</h5>
        <p class="card-text">Giá: {{ number_format($product->price, 0, ',', '.') }} VNĐ</p>
        <p class="card-text">Mô tả: {{ $product->description }}</p>
    </div>
</div>

<a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Quay lại</a>
<a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning mt-3">Sửa</a>
<form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger mt-3" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</button>
</form>
@endsection
