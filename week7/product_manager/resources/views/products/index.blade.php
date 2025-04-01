@extends('layouts.app')

@section('content')
    <h2>Danh sách sản phẩm</h2>
    <a href="{{ route('products.create') }}">Thêm sản phẩm</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Giá</th>
            <th>Mô tả</th>
            <th>Hành động</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->description }}</td>
            <td>
                <a href="{{ route('products.show', $product->id) }}">Xem</a> |
                <a href="{{ route('products.edit', $product->id) }}">Sửa</a> |
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection
