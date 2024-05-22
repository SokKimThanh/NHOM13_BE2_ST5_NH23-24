@php
$title = "Quản Lý Sản Phẩm";
@endphp
@extends('layouts.master-admin')

@section('content')
<a href="{{ route('product.view') }}"><button class="btn btn-success mb-3">Thêm sản phẩm mới</button></a>

<table class="table mb-0 table-hover align-middle text-nowrap">
    <thead>
        <tr>
            <th class="border-top-0">ID</th>
            <th class="border-top-0">Tên sản phẩm</th>
            <th class="border-top-0">Ảnh bìa</th>
            <th class="border-top-0">Danh mục</th>
            <th class="border-top-0">Số lượng</th>
            <th class="border-top-0">Giá</th>
            <th class="border-top-0">Giá giảm</th>
            <th class="border-top-0">Cập nhật lúc</th>
            <th class="border-top-0" style="width: 100px">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dataList as $item)
        <tr>
            <td>{{ ++$index }}</td>
            <td>{{ $item->title }}</td>
            <td><img src="{{ $item->thumbnail }}" style="width: 180px;"></td>
            <td>{{ $item->category_name }}</td>
            <td>{{ number_format($item->quanlity, 0) }}</td>
            <td>{{ number_format($item->price, 0) }}</td>
            <td>{{ number_format($item->discount, 0) }}</td>
            <td>{{ getTimeFormat($item->updated_at) }}</td>
            <td>
                <a href="{{ route('product.view') }}?id={{ $item->id }}"><button
                        class="btn btn-warning">Sửa</button></a>
                <button class="btn btn-danger" onclick="deleteItem({{ $item->id }})">Xóa</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{!! $dataList->links() !!}
@endsection

@section('js')
<script type="text/javascript">
function deleteItem(id) {
    var option = confirm('Bạn có muốn xóa sản phẩm này không?')
    if (!option) return

    $.post('{{ route('product.delete') }}', {
            '_token': '{{ csrf_token() }}',
            'id': id
        },
        function(data) {
            location.reload()
        })
}
</script>
@stop