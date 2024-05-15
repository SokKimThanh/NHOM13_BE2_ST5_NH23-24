@php
$title = "Quản Lý Đơn Hàng";
@endphp
@extends('layouts.master-admin')

@section('content')
<table class="table mb-0 table-hover align-middle text-nowrap">
    <thead>
        <tr>
            <th class="border-top-0">ID</th>
            <th class="border-top-0">Họ và Tên</th>
            <th class="border-top-0">Email</th>
            <th class="border-top-0">Số điện thoại</th>
            <th class="border-top-0">Địa chỉ</th>
            <th class="border-top-0">Ghi chú</th>
            <th class="border-top-0">Ngày đặt hàng</th>
            <th class="border-top-0">Trạng thái</th>
            <th class="border-top-0">Tổng tiền</th>
            <th class="border-top-0" style="width: 100px">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dataList as $item)
            <tr>
                <td>{{ ++$index }}</td>
                <td>{{ $item->fullname }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->phone_number }}</td>
                <td>{{ $item->address }}</td>
                <td>{{ $item->note }}</td>
                <td>{{ getTimeFormat($item->order_date) }}</td>
                <td>
                    @if($item->status == 0)
                        <label class="label label-warning">Chưa duyệt</label>
                    @elseif($item->status == 1)
                        <label class="label label-success">Đã duyệt</label>
                    @else
                        <label class="label label-danger">Đã hủy</label>
                    @endif
                </td>
                <td>{{ number_format($item->total_money, 0) }}</td>
                <td>
                    @if($item->status == 0)
                        <button class="btn btn-success" onclick="updateItem({{ $item->id }}, 1)">Duyệt</button>
                        <button class="btn btn-danger" onclick="updateItem({{ $item->id }}, 2)">Hủy</button>
                    @endif
                    <a href="{{ route('order.detail') }}?id={{ $item->id }}"><button class="btn btn-info">Chi tiết</button></a>
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
    function updateItem(id, status) {
        if(status == 1) {
            var option = confirm('Bạn có chắc chắn cập nhật trạng thái "Đã phê duyệt" của đơn hàng không?')
        } else {
            var option = confirm('Bạn có chắc chắn cập nhật trạng thái "Hủy" của đơn hàng không?')
        }
        if(!option) return

        $.post('{{ route('order.update') }}', {
            '_token': '{{ csrf_token() }}',
            'id': id,
            'status': status
        }, function(data) {
            location.reload()
        })
    }

    function deleteItem(id) {
        var option = confirm('Bạn có chắc chắn xóa mục này?')
        if(!option) return

        $.post('{{ route('order.delete') }}', {
            '_token': '{{ csrf_token() }}',
            'id': id
        }, function(data) {
            location.reload()
        })
    }
</script>
@stop