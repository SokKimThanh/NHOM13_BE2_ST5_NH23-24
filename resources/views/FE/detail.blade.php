@extends('FE.app')
@section('content')
<!-- Open Content -->
<section class="bg-light">
    <div class="container pb-5">
        <div class="row">
            <div class="col-lg-5 mt-5">
                <div class="card">
                    <img class="card-img img-fluid" src="{{ asset('FE/assets/img/' . $product -> image) }}" alt="Card image cap" id="product-detail">
                </div>                
            </div>
            <!-- col end -->
            <div class="col-lg-7 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h1>{{$product -> name}}</h1>
                        <p class="h3 py-2">{{$product -> price}}</p>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h6>Danh Mục: </h6>
                            </li>
                            <li class="list-inline-item">
                                <p class="text-muted"><strong>{{$protype}}</strong></p>
                            </li>
                        </ul>

                        <h6>Mô Tả Chi Tiết:</h6>
                        <p>{{$product -> description}}</p>
                        <form action="" method="GET">
                            <input type="hidden" name="product-title" value="Activewear">
                            <div class="row">
                                <div class="col-auto">
                                    <ul class="list-inline pb-3">
                                        <li class="list-inline-item text-right">
                                            Số Lượng
                                            <input type="hidden" name="product-quanity" id="product-quanity" value="1">
                                        </li>
                                        <li class="list-inline-item"><span class="btn btn-success" id="btn-minus">-</span></li>
                                        <li class="list-inline-item"><span class="badge bg-secondary" id="var-value">1</span></li>
                                        <li class="list-inline-item"><span class="btn btn-success" id="btn-plus">+</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row pb-3">
                                <div class="col d-grid">
                                    <button type="submit" class="btn btn-success btn-lg" name="submit" value="buy">Buy</button>
                                </div>
                                <div class="col d-grid">
                                    <button type="submit" class="btn btn-success btn-lg" name="submit" value="addtocard">Add To Cart</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Close Content -->

<!-- Start Article -->
<section class="py-5">
    <div class="container">
        <div class="row text-left p-2 pb-3">
            <h4>Xem Thêm Sản Phẩm</h4>
        </div>

        <!--Start Carousel Wrapper-->
        <div id="carousel-related-product">
            @foreach($products as $row)
            <div class="p-2 pb-3">
                <div class="product-wap card rounded-0">
                    <a class="card rounded-0" href="{{ route('page', ['page'=>'detail' . $row -> id]) }}">
                        <img class="card-img rounded-0 img-fluid" src="{{ asset('FE/assets/img/' . $row -> image) }}">
                    </a>
                    <div class="card-body">
                        <a href="{{ route('page', ['page'=>'detail' . $row -> id]) }}" class="h3 text-decoration-none"><h4 class="text-center">{{$row -> name}}</h4></a>
                        <p class="text-center mb-0 mt-1">Mẫu {{$row -> protype -> protype_name}}</p>
                        <p class="text-center mb-0">{{$row -> price}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>


    </div>
</section>
<!-- End Article -->

@endsection