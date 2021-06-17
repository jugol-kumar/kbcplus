@extends('layouts.frontend.app')
@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Wishlist</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content">
        <div class="container">
            <div class="my-wishlist-page">
                <div class="row">
                    <div class="col-md-12 my-wishlist">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th colspan="4" class="heading-title">My Wishlist</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse(Cart::instance('watchlist')->content() as $item)
                                    <tr>
                                        <td class="col-md-2"><img src="{{ asset('storage/product/avatar') }}/{{ $item->options->image }}" alt="imga"></td>
                                        <td class="col-md-5">
                                            <div class="product-name"><a href="#">{{ $item->name }}</a></div>
                                            <div class="price">
                                                {{ $item->price }} TK
                                            </div>
                                        </td>
                                        <td class="col-md-1">
                                            <form action="{{ route('front.add.to.cart') }}" method="post">
                                                @csrf
                                                <div class="col-sm-2">
                                                    <div class="quantity buttons_added">
                                                        <input type="hidden" value="{{ $item->id }}" name="product_id">
                                                        <input type="hidden" value="{{ $item->price }}" name="product_price">
                                                        <input type="hidden" name="quantity" value="1">
                                                    </div>
                                                </div>
                                                <div class="col-sm-7">
                                                    <button type="submit" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</button>
                                                </div>
                                            </form>
                                        </td>

                                        <td class="col-md-1 close-btn">
                                            <a href="{{ route('front.delete.watchlist', $item->rowId) }}" class=""><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                    @empty
                                        <h4 class="error-message">No have any watchlist item</h4>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>			</div><!-- /.row -->
            </div><!-- /.sigin-in-->
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
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
    </div><!-- /.body-content -->
@endsection
@push('js')
    <script>
        function addToCart(){
            event.preventDefault();
            document.getElementById('addtocart-form').submit();
        }
    </script>
@endpush
