@php
$title = "Chi Tiết Đơn Hàng";
@endphp
@extends('layouts.master-admin')

@section('content')
<div class="row">
    <div class="col-md-4">
        <table class="table table-bordered">
            <tr>
                <th>Họ và Tên</th>
                <td>{{ $orderItem->fullname }}</td>
            </tr>    
            <tr>
                <th>Email</th>
                <td>{{ $orderItem->email }}</td>
            </tr>  
            <tr>
                <th>Số điện thoại</th>
                <td>{{ $orderItem->phone_number }}</td>
            </tr>  
            <tr>
                <th>Địa chỉ</th>
                <td>{{ $orderItem->address }}</td>
            </tr>  
            <tr>
                <th>Ghi chú</th>
                <td>{{ $orderItem->note }}</td>
            </tr>          
        </table>
        <p>
            <a href="{{ route('order.index') }}">Quay lại danh sách</a>
        </p>
    </div>
    <div class="col-md-8">
        <table class="table mb-0 table-hover align-middle text-nowrap">
            <thead>
                <tr>
                    <th class="border-top-0">ID</th>
                    <th class="border-top-0">Tên sản phẩm</th>
                    <th class="border-top-0">Ảnh bìa</th>
                    <th class="border-top-0">Giá</th>
                    <th class="border-top-0">Số lượng</th>
                    <th class="border-top-0">Tổng giá</th>
                </tr>
            </thead>
            <tbody>
                @foreach($itemList as $item)
                    <tr>
                        <td>{{ ++$index }}</td>
                        <td>{{ $item->title }}</td>
                        <td><img src="{{ $item->thumbnail }}" style="width: 180px;"></td>
                        <td>{{ number_format($item->price, 0) }}</td>
                        <td>{{ number_format($item->num) }}</td>
                        <td>{{ number_format($item->price * $item->num, 0) }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Tổng tiền</td>
                    <td>{{ number_format($orderItem->total_money) }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection