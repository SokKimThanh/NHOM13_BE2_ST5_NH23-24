@extends('layouts.master')
@section('content')
<!-- Open Content -->
<section class="bg-light">
    <div class="container pb-5">
        <div class="row">
            <div class="col-lg-5 mt-5">
                <div class="card">
                    <img class="card-img img-fluid" src="{{ $detail->thumbnail }}" alt="Card image cap"
                        id="product-detail">
                </div>
            </div>
            <!-- col end -->
            <div class="col-lg-7 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h1>{{ $detail->title }}</h1>
                        <p class="h3 py-2">{{ number_format($detail->price) }}</p>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h6>Danh Mục: </h6>
                            </li>
                            <li class="list-inline-item">
                                <p class="text-muted"><strong></strong></p>
                            </li>
                        </ul>

                        <h6>Mô Tả Chi Tiết:</h6>
                        <p>{!! $detail->description !!}</p>
                        <input type="hidden" name="product-title" value="Activewear">
                        <div class="row">
                            <div class="col-auto">
                                <ul class="list-inline pb-3">
                                    <li class="list-inline-item text-right">
                                        Số Lượng
                                        <input type="number" name="num" value="1">
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row pb-3">
                            <div class="col d-grid">
                                <button class="btn btn-success btn-lg"
                                    onclick="addCart({{ $detail->id }}, $('[name=num]').val())">Thêm Vào Giỏ
                                    Hàng</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Close Content -->

<!-- Start Article -->
<section class=" py-5">
    <div class="container">
        <div class="row text-left p-2 pb-3">
            <h4>Xem Thêm Sản Phẩm</h4>
        </div>

        <!--Start Carousel Wrapper-->
        <div id="carousel-related-product">
            @foreach($productList as $item)
                <div class="p-2 pb-3">
                    <div class="product-wap card rounded-0">
                        <a class="card rounded-0"
                            href="{{ route('frontend.detail', ['id' => $item->id, 'href_param' => $item->slug]) }}">
                            <img class="card-img rounded-0 img-fluid" src="{{ $item->thumbnail }}">
                        </a>
                        <div class="card-body">
                            <a href="{{ route('frontend.detail', ['id' => $item->id, 'href_param' => $item->slug]) }}"
                                class="h3 text-decoration-none">
                                <h4 class="text-center">{{ $item->title }}</h4>
                            </a>
                            <p class="text-center mb-0 mt-1">Mẫu </p>
                            <p class="text-center mb-0">{{ number_format($item->price, 0) }}
                                vnđ</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


    </div>
</section>
<!-- End Article -->
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