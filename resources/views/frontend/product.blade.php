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
   <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button"
      data-bs-slide="prev">
      <i class="fas fa-chevron-left"></i>
   </a>
   <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button"
      data-bs-slide="next">
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
         <p class="text-center"><a href="" class="btn btn-success">Vào Mua Sắm</a>
         </p>
      </div>
      <div class="col-12 col-md-4 p-5 mt-3">
         <a href=""><img src="{{ asset('FE/assets/img/sanpham1.jpg') }}" class="rounded-circle img-fluid border"></a>
         <h2 class="h5 text-center mt-3 mb-3">Cách Tân</h2>
         <p class="text-center"><a href="" class="btn btn-success">Vào Mua Sắm</a>
         </p>
      </div>
      <div class="col-12 col-md-4 p-5 mt-3">
         <a href=""><img src="{{ asset('FE/assets/img/sanpham3.jpg') }}" class="rounded-circle img-fluid border"></a>
         <h2 class="h5 text-center mt-3 mb-3">Tay Bồng</h2>
         <p class="text-center"><a href="" class="btn btn-success">Vào Mua Sắm</a>
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
                     <li class="text-muted text-right">{{ number_format($item->price, 0) }} vnđ</li>
                  </p>
               </ul>
               <p class="text-center"><a
                     href="{{ route('frontend.detail', ['id' => $item->id, 'href_param' => $item->slug]) }}"
                     class="h2 text-decoration-none text-dark">{{$item->title}}</a></p>
               <br>
               <p class="text-center"><a href="#" class="btn btn-success">Thêm Vào Giỏ Hàng</a></p>
            </div>
            </div>
         </div>
      @endforeach
         <div class="text-center">{!! $productList->links() !!}</div>
      </div>

   </div>
</section>
<!-- End Featured Product -->
@stop