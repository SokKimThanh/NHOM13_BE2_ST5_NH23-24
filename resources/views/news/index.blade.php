@php
$title = "Quản Lý Tin Tức";
@endphp
@extends('layouts.master-admin')

@section('content')
<a href="{{ route('news.view') }}"><button class="btn btn-success mb-3">Thêm tin tức mới</button></a>

<table class="table mb-0 table-hover align-middle text-nowrap">
    <thead>
        <tr>
            <th class="border-top-0">ID</th>
            <th class="border-top-0">Tên tin tức</th>
            <th class="border-top-0">Ảnh bìa</th>
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
            <td>{{ getTimeFormat($item->updated_at) }}</td>
            <td>
                <a href="{{ route('news.view') }}?id={{ $item->id }}"><button class="btn btn-warning">Sửa</button></a>
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
        var option = confirm('Bạn có muốn xóa tin tức này!')
        if(!option) return

        $.post('{{ route('news.delete') }}', {
            '_token': '{{ csrf_token() }}',
            'id': id
        }, function(data) {
            location.reload()
        })
    }
</script>
@stop