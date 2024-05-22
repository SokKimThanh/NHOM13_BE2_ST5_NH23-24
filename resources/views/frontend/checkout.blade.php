@extends('layouts.master')

@section('content')
<!-- inner page section -->
<section class="inner_page_head">
   <div class="container_fuild">
      <div class="row">
         <div class="col-md-12 offset-md-1">
            <div class="full">
               <h3>Giỏ Hàng</h3>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- end inner page section -->
<!-- product section -->
<section class="product_section layout_padding">
   <div class="container">
      <div class="row">
         <div class="col-md-5">
            <form method="post" action="{{ route('frontend.complete') }}" id="MyForm">
               <fieldset>
                  {{ csrf_field() }}
                  <div class="form-group">
                     <label for="exampleInputEmail1">Email</label>
                     <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Nhập email" required>
                     <small id="emailHelp" class="form-text text-muted">Chúng tôi không bao giờ chia sẽ email của bạn
                        cho bất kỳ ai.</small>
                  </div>
                  <div class="form-group">
                     <label for="exampleInputEmail1">Số Điện thoại</label>
                     <input type="tel" class="form-control" placeholder="Nhập số điện thoại" name="phone_number"
                        required />
                  </div>
                  <div class="form-group">
                     <label for="exampleInputEmail1">Địa chỉ</label>
                     <input type="text" class="form-control" placeholder="Nhập địa chỉ nhận hàng" name="address"
                        required />
                  </div>
                  <div class="form-group">
                     <label for="exampleInputEmail1">Nội dung</label>
                     <textarea class="form-control" placeholder="Nội dung" name="note"></textarea>
                  </div>

                  <button id="submitData" hidden>Send</button>
               </fieldset>
            </form>
         </div>
         <div class="col-md-7">
            <table class="table table-bordered">
               <thead>
                  <tr>
                     <th>Tên Sản Phẩm</th>
                     <th>Giá</th>
                     <th>Số Lượng</th>
                     <th>Tổng Tiền</th>
                  </tr>
               </thead>
               <tbody>
                  @php
               $total = 0;
            @endphp
                  @foreach($cartItems as $item)
                           @php
                     $total += $item->discount * $item->num;
                  @endphp
                           <tr>
                              <td>{{ $item->title }}</td>
                              <td>
                                 {{ number_format($item->discount, 0) }}
                              </td>
                              <td>
                                 {{ $item->num }}
                              </td>
                              <td>
                                 {{ number_format($item->discount * $item->num, 0) }}
                              </td>
                           </tr>
            @endforeach
               </tbody>
            </table>
            <div class="row">
               <div class="col-md-12">
                  <h3 style="float: right; font-size: 22px;">Tổng tiền: {{ number_format($total, 0) }}</h3>
               </div>
               <div class="col-md-12">
                  <button class="btn btn-success" style="font-size: 32px; width: 260px; float: right;"
                     onclick="$('#submitData').click()">Hoàn Thành</button>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- end product section -->
@stop