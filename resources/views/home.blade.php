@php
    $title = "Trang Quản Trị";
@endphp
@extends('layouts.master-admin')

@section('content')
<table class="table mb-0 table-hover align-middle text-nowrap">
    <tbody>
        <tr>
            <td>
                <div class="d-flex align-items-center">
                    <h4 class="m-b-0 font-16">Tổng người dùng</h4>
                </div>
            </td>
            <td>
                <div class="m-r-10"><a class="btn btn-circle d-flex btn-info text-white">{{ $users_count }}</a>
                </div>
            </td>
        </tr>

        <tr>
            <td>
                <div class="d-flex align-items-center">
                    <h4 class="m-b-0 font-16">Tổng đơn hàng</h4>
                </div>
            </td>
            <td>
                <div class="m-r-10"><a class="btn btn-circle d-flex btn-info text-white">{{ $oders_count }}</a>
                </div>
            </td>
        </tr>

        <tr>
            <td>
                <div class="d-flex align-items-center">
                    <h4 class="m-b-0 font-16">Tổng bài viết</h4>
                </div>
            </td>
            <td>
                <div class="m-r-10"><a class="btn btn-circle d-flex btn-info text-white">{{ $news_count }}</a>
                </div>
            </td>
        </tr>
    </tbody>
</table>
@endsection