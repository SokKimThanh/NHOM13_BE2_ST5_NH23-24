@php
$title = "Quản Lý Người Dùng";
@endphp
@extends('layouts.master-admin')

@section('content')
<a href="{{ route('user.view') }}"><button class="btn btn-success mb-3">Thêm người dùng mới</button></a>

<table class="table mb-0 table-hover align-middle text-nowrap">
    <thead>
        <tr>
            <th class="border-top-0">ID</th>
            <th class="border-top-0">Tên người dùng</th>
            <th class="border-top-0">Email</th>
            <th class="border-top-0">Số điện thoại</th>
            <th class="border-top-0">Địa chỉ</th>
            <th class="border-top-0">Quyền</th>
            <th class="border-top-0">Cập nhật lúc</th>
            <th class="border-top-0" style="width: 100px">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dataList as $item)
            <tr>
                <td>{{ ++$index }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->phone_number }}</td>
                <td>{{ $item->address }}</td>
                <td>{{ $item->role_name }}</td>
                <td>{{ getTimeFormat($item->updated_at) }}</td>
                <td>
                    <a href="{{ route('user.view') }}?id={{ $item->id }}"><button class="btn btn-warning">Sửa</button></a>
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
        var option = confirm('Bạn có muốn xóa người dùng này!')
        if(!option) return

        $.post('{{ route('user.delete') }}', {
            '_token': '{{ csrf_token() }}',
            'id': id
        }, function(data) {
            location.reload()
        })
    }
</script>
@stop