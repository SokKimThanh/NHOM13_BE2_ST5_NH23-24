@extends('layouts.master')
@section('content')
<!-- Start Banner Hero -->
<div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
    <ol class="carousel-indicators">
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
    </ol>
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('FE/assets/img/banner.jpg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('FE/assets/img/slide_logo_3.jpg') }}" class="d-block w-100" alt="...">
            </div>
        </div>

    </div>
    <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel"
        role="button" data-bs-slide="prev">
        <i class="fas fa-chevron-left"></i>
    </a>
    <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel"
        role="button" data-bs-slide="next">
        <i class="fas fa-chevron-right"></i>
    </a>
</div>
<!-- End Banner Hero -->


<!-- Start Categories of The Month -->
<section class="container py-5">
    <div class="row text-center pt-3">
        <div class="col-lg-6 m-auto">
            <h1 class="h1">Hạng mục của Tháng</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-4 p-5 mt-3">
            <a href=""><img src="{{ asset('FE/assets/img/sanpham2.jpg') }}" class="rounded-circle img-fluid border"></a>
            <h5 class="text-center mt-3 mb-3">Truyền Thống</h5>
            <p class="text-center"><a href="{{ url('/category/truyen-thong') }}" class="btn btn-success">Vào Mua Sắm</a>
            </p>
        </div>
        <div class="col-12 col-md-4 p-5 mt-3">
            <a href=""><img src="{{ asset('FE/assets/img/sanpham1.jpg') }}" class="rounded-circle img-fluid border"></a>
            <h2 class="h5 text-center mt-3 mb-3">Cách Tân</h2>
            <p class="text-center"><a href="{{ url('/category/cach-tan') }}" class="btn btn-success">Vào Mua Sắm</a>
            </p>
        </div>
        <div class="col-12 col-md-4 p-5 mt-3">
            <a href=""><img src="{{ asset('FE/assets/img/sanpham3.jpg') }}" class="rounded-circle img-fluid border"></a>
            <h2 class="h5 text-center mt-3 mb-3">Tay Bồng</h2>
            <p class="text-center"><a href="{{ url('/category/tay-bong') }}" class="btn btn-success">Vào Mua Sắm</a>
            </p>
        </div>
    </div>
</section>
<!-- End Categories of The Month -->


<!-- Start Featured Product -->
<section class="bg-light">
    <div class="container py-5">
        <div class="row text-center py-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Sản phẩm nổi bật</h1>
            </div>
        </div>
        <div class="row">
            @foreach($productList as $item)
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="{{ route('frontend.detail', ['id' => $item->id, 'href_param' => $item->slug]) }}">
                            <img src="{{ $item->thumbnail }}" class="card-img-top" alt="{{ $item->title }}">
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <p class="text-center">
                                    <li class="text-muted text-right">{{ number_format($item->discount, 0) }} vnđ</li>
                                </p>
                            </ul>
                            <p class="text-center"><a
                                    href="{{ route('frontend.detail', ['id' => $item->id, 'href_param' => $item->slug]) }}"
                                    class="h2 text-decoration-none text-dark">{{$item->title}}</a></p>
                            <br>
                            <p class="text-center">
                                <button class="btn btn-success btn-lg"
                                    onclick="addCart({{ $item->id }}, $('[name=num]').val())" value="1">Thêm Vào Giỏ
                                    Hàng</button>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <p class="text-center"><a href="{{ route('frontend.products') }}" class="btn btn-warning">Xem tất cả sản
                phẩm</a></p>
    </div>
</section>
<!-- End Featured Product -->

@section('js')
<script type="text/javascript">
    function addCart(id, num) {
        cartList = getCookie('cart')
        if (cartList != null && cartList != '') {
            cartList = JSON.parse(cartList)
        } else {
            cartList = []
        }

        isFind = false
        for (var i = 0; i < cartList.length; i++) {
            if (cartList[i].id == id) {
                cartList[i].num = parseInt(cartList[i].num) + parseInt(num)
                isFind = true
                break
            }
        }

        if (!isFind) {
            cartList.push({
                'id': id,
                'num': num
            })
        }

        cartList = JSON.stringify(cartList)
        document.cookie = `cart=${cartList}` + getLifecycle()

        location.reload()
    }


    function getLifecycle() {
        var now = new Date();
        var time = now.getTime();
        var expireTime = time + 30 * 1000 * 86400;
        now.setTime(expireTime);
        return ';expires=' + now.toUTCString() + ';path=/';
    }

    function getCookie(name) {
        function escape(s) {
            return s.replace(/([.*+?\^$(){}|\[\]\/\\])/g, '\\$1');
        }
        var match = document.cookie.match(RegExp('(?:^|;\\s*)' + escape(name) + '=([^;]*)'));
        return match ? match[1] : null;
    }
</script>
@endsection
@stop