@extends('layouts.master')

@section('content')
<!-- inner page section -->
<section class="inner_page_head">
    <div class="container_fuild">
        <div class="row">
            <div class="col-md-12 offset-lg-1">
                <div class="full mt-4">
                    <h3>Liên Hệ</h3>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end inner page section -->
<!-- why section -->
<section class="why_section layout_padding">
    <div class="container">

        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="full">
                    <form class="form" action="{{ route('frontend.contact.send') }}" method="post">
                        <fieldset>
                            {{ csrf_field() }}
                            <input type="text" class="form-control mb-2" placeholder="Nhập họ & tên" name="fullname"
                                required />
                            <input type="email" class="form-control mb-2" placeholder="Nhập email" name="email"
                                required />
                            <input type="tel" class="form-control mb-2" placeholder="Nhập số điện thoại"
                                name="phone_number" required />
                            <input type="text" class="form-control mb-2" placeholder="Nhập chủ đề" name="subject_name"
                                required />
                            <textarea placeholder="Nội dung" class="form-control mb-2" required name="note"></textarea>
                            <input type="submit" class="btn btn-primary" value="Gửi Phản Hồi" />
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end why section -->
@stop