@php
    $title = "Quản Lý Danh Mục Sản Phẩm";
@endphp
@extends('layouts.master-admin')

@section('content')
<div class="row">
    <div class="col-md-6">
        <form method="post" action="{{ route('category.add') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label>Tên danh mục: </label>
                <input type="number" name="id" hidden value="{{ $id }}">
                <input type="text" name="name" class="form-control" placeholder="Nhập tên danh mục" value="{{ $name }}">
            </div>
            <div class="form-group">
                <button class="btn btn-success">Lưu</button>
            </div>
        </form>
    </div>
    <div class="col-md-6">
        <table class="table mb-0 table-hover align-middle text-nowrap">
            <thead>
                <tr>
                    <th class="border-top-0">ID</th>
                    <th class="border-top-0">Tên danh mục</th>
                    <th class="border-top-0" style="width: 100px">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dataList as $item)
                    <tr>
                        <td>{{ ++$index }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            <a href="{{ route('category.index') }}?id={{ $item->id }}"><button
                                    class="btn btn-warning">Sửa</button></a>
                            <button class="btn btn-danger" onclick="deleteItem({{ $item->id }})">Xóa</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
function deleteItem(id) {
    var option = confirm('Bạn có muốn xóa sản phẩm này không?')
    if (!option) return

    $.post('{{ route('category.delete') }}', {
            '_token': '{{ csrf_token() }}',
            'id': id
        },
        function(data) {
            location.reload()
        })
}
</script>
@stop