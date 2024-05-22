@php
$title = "Quản Lý Role";
@endphp
@extends('layouts.master-admin')

@section('content')
<div class="row">
    <div class="col-md-6">
        <form method="post" action="{{ route('role.add') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label>Tên quyền: </label>
                <input type="number" name="id" hidden value="{{ $id }}">
                <input type="text" name="name" class="form-control" placeholder="Nhập tên quyền" value="{{ $name }}">
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
                    <th class="border-top-0">Tên quyền</th>
                    <th class="border-top-0" style="width: 100px">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dataList as $item)
                    <tr>
                        <td>{{ ++$index }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            <a href="{{ route('role.index') }}?id={{ $item->id }}"><button class="btn btn-warning">Sửa</button></a>
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
        var option = confirm('Are you sure to delete this item')
        if(!option) return

        $.post('{{ route('role.delete') }}', {
            '_token': '{{ csrf_token() }}',
            'id': id
        }, function(data) {
            location.reload()
        })
    }
</script>
@stop