@extends('FE.app')
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
    <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
        <i class="fas fa-chevron-left"></i>
    </a>
    <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
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
            <a href="{{ route('protype', ['id'=>1]) }}"><img src="{{ asset('FE/assets/img/sanpham2.jpg') }}" class="rounded-circle img-fluid border"></a>
            <h5 class="text-center mt-3 mb-3">Truyền Thống</h5>
            <p class="text-center"><a href="{{ route('protype', ['id'=>1]) }}" class="btn btn-success">Vào Mua Sắm</a></p>
        </div>
        <div class="col-12 col-md-4 p-5 mt-3">
            <a href="{{ route('protype', ['id'=>2]) }}"><img src="{{ asset('FE/assets/img/sanpham1.jpg') }}" class="rounded-circle img-fluid border"></a>
            <h2 class="h5 text-center mt-3 mb-3">Cách Tân</h2>
            <p class="text-center"><a href="{{ route('protype', ['id'=>2]) }}" class="btn btn-success">Vào Mua Sắm</a></p>
        </div>
        <div class="col-12 col-md-4 p-5 mt-3">
            <a href="{{ route('protype', ['id'=>3]) }}"><img src="{{ asset('FE/assets/img/sanpham3.jpg') }}" class="rounded-circle img-fluid border"></a>
            <h2 class="h5 text-center mt-3 mb-3">Tay Bồng</h2>
            <p class="text-center"><a href="{{ route('protype', ['id'=>3]) }}" class="btn btn-success">Vào Mua Sắm</a></p>
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
            @foreach($products as $row)
            <div class="col-12 col-md-4 mb-4">
                <div class="card h-100">
                    <a href="{{ route('page', ['page'=>'detail' . $row -> id]) }}" class="card">
                        <img src="{{ asset('FE/assets/img/' . $row -> image) }}" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body">
                        <ul class="list-unstyled d-flex justify-content-between">
                            <p class="text-center"><li class="text-muted">{{$row -> price}}</li></p>
                        </ul>
                        <p class="text-center bg-success m-0 pt-1"><a href="{{ route('page', ['page'=>'detail' . $row -> id]) }}" class="h2 text-decoration-none text-white">{{$row -> name}}</a></p>
                        <p class="text-center mb-0 mt-1 {{($row -> quantity) > 0 ? '' : 'text-muted'}}">{{($row -> quantity) > 0 ? 'Kho Hàng: ' . $row->quantity : 'Đã Bán Hết'}}</p>
                        <br><p class="text-center"><a href="#" class="btn btn-success">Thêm Vào Giỏ Hàng</a></p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End Featured Product -->

@endsection