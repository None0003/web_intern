@extends('layouts.app')

@section('content')
<h2>Thêm sản phẩm</h2>

<form action="{{ route('products.store') }}" method="POST">
    @csrf
    <label>Tên:</label>
    <input type="text" name="name">
    <label>Giá:</label>
    <input type="number" name="price">
    <label>Mô tả:</label>
    <textarea name="description"></textarea>
    <button type="submit">Thêm</button>
</form>
@endsection
