@php
$title = "Thêm/Sửa Thông Tin Người Dùng";
@endphp
@extends('layouts.master-admin')

@section('content')
<div class="row">
    <div class="col-md-7">
        <form action="{{ route('user.add') }}" method="post" id="MyForm">
            {{ csrf_field() }}
            <div class="form-group">
                <label>Họ và Tên: </label>
                <input type="text" name="id" hidden value="{{ ($user != null)?$user->id:'' }}">
                <input type="text" name="name" class="form-control" required value="{{ ($user != null)?$user->name:'' }}">
            </div>
            <div class="form-group">
                <label>Email: </label>
                <input type="email" name="email" class="form-control" required value="{{ ($user != null)?$user->email:'' }}">
            </div>
            <div class="form-group">
                <label>Số điện thoại: </label>
                <input type="tel" name="phone_number" class="form-control" value="{{ ($user != null)?$user->phone_number:'' }}">
            </div>
            <div class="form-group">
                <label>Địa chỉ: </label>
                <input type="text" name="address" class="form-control" value="{{ ($user != null)?$user->address:'' }}">
            </div>
            <div class="form-group">
                <label>Mật khẩu: </label>
                <input type="password" name="password" class="form-control" min="6">
            </div>
            <div class="form-group">
                <label>Nhập lại mật khẩu: </label>
                <input type="password" name="confirm_pwd" class="form-control" min="6">
            </div>
            <div class="form-group">
                <label>Quyền: </label>
                <select class="form-control" required name="role_id">
                    <option value="">-- Chọn quyền --</option>
                    @foreach($roleList as $item)
                        @if($user != null && $user->role_id == $item->id)
                            <option selected value="{{ $item->id }}">{{ $item->name }}</option>
                        @else
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-success">Lưu</button>
                <a href="{{ route('user.index') }}">Quay lại danh sách</a>
            </div>
        </form>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
    $(function() {
        $('#MyForm').submit(function() {
            if($('[name=password]').val() != $('[name=confirm_pwd]').val()) {
                alert('Password is not match')

                return false
            }

            return true
        })
    })
</script>
@stop