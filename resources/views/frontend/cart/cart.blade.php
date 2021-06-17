@extends('layouts.frontend.app')
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/sweetalert/sweetalert.css')}}"/>
@endpush
@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li class='active'>Shopping Cart</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->
    <div class="body-content outer-top-xs">
        <div class="container">
            <div class="row ">
                <div class="shopping-cart">
                    <div class="shopping-cart-table ">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="cart-romove item">Remove</th>
                                    <th class="cart-description item">Image</th>
                                    <th class="cart-product-name item">Product Name</th>
                                    <th class="cart-qty item">Quantity</th>
                                    <th class="cart-sub-total item">Product Price</th>
                                    <th class="cart-total last-item">Grandtotal</th>
                                </tr>
                                </thead><!-- /thead -->
                                <tfoot>
                                    <tr>
                                        <td colspan="7">
                                            <div class="shopping-cart-btn">
                                            <span class="">
                                                <a href="{{ route('index') }}" class="btn btn-upper btn-primary outer-left-xs">Continue Shopping</a>
                                            </span>
                                            </div><!-- /.shopping-cart-btn -->
                                        </td>
                                    </tr>
                                </tfoot>
                                <tbody>
                                @if (Cart::instance('cart')->count() > 0)
                                    @foreach(Cart::instance('cart')->content() as $item)
                                        <tr>
                                            <td class="romove-item"><a href="{{ route('front.delete.cart.item', $item->rowId) }}" title="cancel" class="icon"><i class="fa fa-trash-o"></i></a></td>
                                            <td class="cart-image">
                                                <a class="entry-thumbnail" href="detail.html">
                                                    <img src="{{ asset('storage/product/avatar') }}/{{ $item->options->image }}" style="width: 60px; height: 60px;" alt="">
                                                </a>
                                            </td>
                                            <td class="cart-product-name-info">
                                                <h4 class='cart-product-description'><a href="detail.html">{{ $item->name }}</a></h4>
                                                <div class="cart-product-info">
                                                    <span class="product-color">COLOR:<span>Blue</span></span>
                                                </div>
                                            </td>
                                            <td class="cart-product-quantity">
                                                <div class="quantity buttons_added">
                                                    <input type="button" value="-" data-id="{{ $item->rowId}}"  class="minus">
                                                    <input type="number" step="1" min="1" name="quantity" value="{{ $item->qty }}" title="Qty" class="input-text qty text" size="4" pattern="" inputmode="">
                                                    <input type="button" value="+" class="plus" data-id="{{ $item->rowId}}"  >
                                                </div>
                                            </td>
                                            <td class="cart-product-sub-total"><span class="cart-sub-total-price">{{ $item->price }}</span></td>
                                            <td class="cart-product-grand-total"><span class="cart-grand-total-price">{{ $item->subtotal }}</span></td>
                                        </tr>
                                    @endforeach
                                @else
                                    <span class="error-message">
                                        <strong>No have Any Item In This Cart.</strong>
                                    </span>
                                @endif
                                </tbody><!-- /tbody -->
                            </table><!-- /table -->
                        </div>
                    </div><!-- /.shopping-cart-table -->
                    @if (!Session::get('coupon'))
                        <div class="col-md-4 col-sm-12 estimate-ship-tax">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>
                                        <span class="estimate-title">Discount Code</span>
                                        <p>Enter your coupon code if you have one..</p>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <form action="{{ route('front.apply.coupon') }}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <input type="text" name="coupon_code" class="form-control unicase-form-control text-input" placeholder="You Coupon..">
                                            </div>
                                            <div class="clearfix pull-right">
                                                <button type="submit" class="btn-upper btn btn-primary">APPLY COUPON</button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                                </tbody><!-- /tbody -->
                            </table><!-- /table -->
                        </div><!-- /.estimate-ship-tax -->
                    @endif

                    <div class="col-md-4 col-sm-12 cart-shopping-total flot-chart">
                        <table class="table">
                            <thead>
                            <tr>
                                @if (Session::get('coupon'))
                                    <th>
                                        <div class="cart-sub-total">
                                            Subtotal<span class="inner-left-md">{{ Cart::instance('cart')->subtotal()}} TK</span>
                                        </div>
                                        <div class="cart-sub-total">
                                            @if (Session::get('coupon')['type'] == 'fixed')
                                                Discount({{ Session::get('coupon')['code'] }})<a href="{{ route('front.destroy.coupon') }}">X</a><span class="inner-left-md">{{ Session::get('coupon')['value'] }}TK</span>
                                            @else
                                                Discount({{ Session::get('coupon')['code'] }})<a href="{{ route('front.destroy.coupon') }}">X</a><span class="inner-left-md">{{ Session::get('coupon')['value'] }} %</span>
                                            @endif
                                        </div>

                                        <div class="cart-sub-total">
                                            Tax({{ config('cart.tax') }}%)<span class="inner-left-md">{{ Cart::instance('cart')->tax() }}</span>
                                        </div>
                                        <div class="cart-grand-total">
                                            Grand Total<span class="inner-left-md">{{ Cart::instance('cart')->total() }}</span>
                                        </div>
                                    </th>
                                @else
                                    <th>
                                        <div class="cart-sub-total">
                                            Subtotal<span class="inner-left-md">{{ Cart::instance('cart')->subtotal() }} TK</span>
                                        </div>
                                        <div class="cart-sub-total">
                                            Tax({{ config('cart.tax') }}%)<span class="inner-left-md">{{ Cart::instance('cart')->tax() }}</span>
                                        </div>
                                        <div class="cart-grand-total">
                                            Grand Total<span class="inner-left-md">{{ Cart::instance('cart')->total() }}</span>
                                        </div>
                                    </th>
                                @endif
                            </tr>
                            </thead><!-- /thead -->
                            <tbody>
                            <tr>
                                <td>
                                    <div class="cart-checkout-btn pull-right">
                                        @if (Cart::instance('cart')->count() > 0)
                                            @if (Session::get('customerLogin'))
                                                <a href="{{ route('front.customer.panel') }}" class="btn btn-primary checkout-btn">PROCCED TO CHEKOUT</a>
                                            @else
                                                <a href="{{ route('front.go.to.checkout') }}" class="btn btn-primary checkout-btn">PROCCED TO CHEKOUT</a>
                                            @endif
    {{--                                        <button type="submit" class="btn btn-primary checkout-btn">PROCCED TO CHEKOUT</button>--}}
                                            <span class="">Checkout with multiples address!</span>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            </tbody><!-- /tbody -->
                        </table><!-- /table -->
                    </div><!-- /.cart-shopping-total -->
                </div><!-- /.shopping-cart -->
            </div> <!-- /.row -->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
            <div id="brands-carousel" class="logo-slider wow fadeInUp">

                <div class="logo-slider-inner">
                    <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
                        <div class="item m-t-15">
                            <a href="#" class="image">
                                <img data-echo="{{asset('assets/frontend')}}/images/brands/brand1.png" src="{{asset('assets/frontend')}}/images/blank.gif" alt="">
                            </a>
                        </div><!--/.item-->

                        <div class="item m-t-10">
                            <a href="#" class="image">
                                <img data-echo="{{asset('assets/frontend')}}/images/brands/brand2.png" src="{{asset('assets/frontend')}}/images/blank.gif" alt="">
                            </a>
                        </div><!--/.item-->

                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="{{asset('assets/frontend')}}/images/brands/brand3.png" src="{{asset('assets/frontend')}}/images/blank.gif" alt="">
                            </a>
                        </div><!--/.item-->

                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="{{asset('assets/frontend')}}/images/brands/brand4.png" src="{{asset('assets/frontend')}}/images/blank.gif" alt="">
                            </a>
                        </div><!--/.item-->

                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="{{asset('assets/frontend')}}/images/brands/brand5.png" src="{{asset('assets/frontend')}}/images/blank.gif" alt="">
                            </a>
                        </div><!--/.item-->

                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="{{asset('assets/frontend')}}/images/brands/brand6.png" src="{{asset('assets/frontend')}}/images/blank.gif" alt="">
                            </a>
                        </div><!--/.item-->

                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="{{asset('assets/frontend')}}/images/brands/brand2.png" src="{{asset('assets/frontend')}}/images/blank.gif" alt="">
                            </a>
                        </div><!--/.item-->

                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="{{asset('assets/frontend')}}/images/brands/brand4.png" src="{{asset('assets/frontend')}}/images/blank.gif" alt="">
                            </a>
                        </div><!--/.item-->

                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="{{asset('assets/frontend')}}/images/brands/brand1.png" src="{{asset('assets/frontend')}}/images/blank.gif" alt="">
                            </a>
                        </div><!--/.item-->

                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="{{asset('assets/frontend')}}/images/brands/brand5.png" src="{{asset('assets/frontend')}}/images/blank.gif" alt="">
                            </a>
                        </div><!--/.item-->
                    </div><!-- /.owl-carousel #logo-slider -->
                </div><!-- /.logo-slider-inner -->
            </div><!-- /.logo-slider -->
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== --></div><!-- /.container -->
    </div><!-- /.body-content -->

@endsection

@push('js')
    <script src="{{ asset('assets/admin/vendor/sweetalert/sweetalert.min.js')}}"></script>
    <script>
        $('.plus').click(function (data){
            var rowid = $(this).data('id');
            $.ajax({
                url: "{{ route('front.add.quantity', '')}}"+"/"+rowid,
                method: "GET",
                success: function (data){
                    swal({
                        title: "Quantity Added Successful",
                        text: "Submit to run ajax request",
                        type: "success",
                        closeOnConfirm: false,
                        showLoaderOnConfirm: true,
                    });
                }
            });
        })

        $('.minus').click(function (data){
            var rowid = $(this).data('id');
            $.ajax({
                url: "{{ route('front.delete.quantity', '')}}"+"/"+rowid,
                method: "GET",
                success: function (data){
                    swal({
                        title: "Quantity Deleted Successful",
                        text: "Submit to run ajax request",
                        type: "success",
                        closeOnConfirm: false,
                    });
                }
            });
        })

    </script>
@endpush
