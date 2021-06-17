@extends('layouts.frontend.app')
@push('css')

@endpush
@section('content')
    <div class="row">
        <!-- ==============================================This is side bar category ============================================== -->
        <div class="col-xs-12 col-sm-12 col-md-3 sidebar">
            <!-- ================================== TOP NAVIGATION ================================== -->
            <div>
                <div class="side-menu animate-dropdown outer-bottom-xs">
                    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
                    <nav class="yamm megamenu-horizontal">
                        <ul class="nav">
                            @foreach($categories as $category)
                                <li class="dropdown menu-item">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon fa {{$category->icon_class}}" aria-hidden="true"></i>
                                        {{ $category->name }}
                                    </a>
                                    <ul class="dropdown-menu mega-menu">
                                        <li class="yamm-content">
                                            <div class="row">
                                                @forelse($category->subcategories->chunk(8) as $chunk)
                                                <div class="col-sm-12 col-md-3">
                                                    <ul class="links list-unstyled">
                                                        @forelse($chunk as $scat)
                                                        <li><a href="{{ route('front.subcategory.product', $scat->id) }}">{{ $scat->name }}</a></li>
                                                        @empty
                                                            <center>No have Any Sub Category </center>
                                                        @endforelse
                                                    </ul>
                                                </div>
                                                @empty
                                                    <div class="col-sm-12 col-md-3">
                                                        <ul class="links list-unstyled">
                                                            <h4>No have andy sub Category </h4>
                                                        </ul>
                                                    </div>
                                                @endforelse
                                            </div>
                                            <!-- /.row -->
                                        </li>
                                        <!-- /.yamm-content -->
                                    </ul>
                                    <!-- /.dropdown-menu -->
                                </li>
                            @endforeach
                            <!-- /.menu-item -->
                        </ul>
                        <!-- /.nav -->
                    </nav>
                    <!-- /.megamenu-horizontal -->
                </div>
            </div>


            <!-- /.side-menu -->
            <!-- ================================== TOP NAVIGATION : END ================================== -->

            <!-- ============================================== HOT DEALS ============================================== -->
            <!-- ============================================== HOT DEALS: END ============================================== -->

            <!-- ============================================== SPECIAL OFFER ============================================== -->


            <!-- /.sidebar-widget -->
            <!-- ============================================== SPECIAL OFFER : END ============================================== -->
            <!-- ============================================== PRODUCT TAGS ============================================== -->
            <!-- /.sidebar-widget -->
            <!-- ============================================== PRODUCT TAGS : END ============================================== -->
            <!-- ============================================== SPECIAL DEALS ============================================== -->

        </div>
        <!-- /.sidemenu-holder -->
        <!-- ==============================================This is side bar category ============================================== -->
        <!--====================================================== This is slider with sidebar header================================================================= -->
        <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
            <div id="hero">
                <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
                    <div class="item" style="background-image: url({{asset('assets/frontend')}}/images/sliders/01.jpg);">
                        <div class="container-fluid">
                            <div class="caption bg-color vertical-center text-left">
                                <div class="slider-header fadeInDown-1">Top Brands</div>
                                <div class="big-text fadeInDown-1"> New Collections </div>
                                <div class="excerpt fadeInDown-2 hidden-xs"> <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span> </div>
                                <div class="button-holder fadeInDown-3"> <a href="index.php?page=single-product" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a> </div>
                            </div>
                            <!-- /.caption -->
                        </div>
                        <!-- /.container-fluid -->
                    </div>
                    <!-- /.item -->

                    <div class="item" style="background-image: url({{asset('assets/frontend')}}/images/sliders/02.jpg);">
                        <div class="container-fluid">
                            <div class="caption bg-color vertical-center text-left">
                                <div class="slider-header fadeInDown-1">Spring 2016</div>
                                <div class="big-text fadeInDown-1"> Women <span class="highlight">Fashion</span> </div>
                                <div class="excerpt fadeInDown-2 hidden-xs"> <span>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit</span> </div>
                                <div class="button-holder fadeInDown-3"> <a href="index.php?page=single-product" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a> </div>
                            </div>
                            <!-- /.caption -->
                        </div>
                        <!-- /.container-fluid -->
                    </div>
                    <!-- /.item -->

                </div>
                <!-- /.owl-carousel -->
            </div>
            <div class="info-boxes wow fadeInUp">
                <div class="info-boxes-inner">
                    <div class="row">
                        <div class="col-md-6 col-sm-4 col-lg-4">
                            <div class="info-box">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <h4 class="info-box-heading green">money back</h4>
                                    </div>
                                </div>
                                <h6 class="text">30 Days Money Back Guarantee</h6>
                            </div>
                        </div>
                        <!-- .col -->

                        <div class="hidden-md col-sm-4 col-lg-4">
                            <div class="info-box">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <h4 class="info-box-heading green">free shipping</h4>
                                    </div>
                                </div>
                                <h6 class="text">Shipping on orders over TK99</h6>
                            </div>
                        </div>
                        <!-- .col -->
                        <div class="col-md-6 col-sm-4 col-lg-4">
                            <div class="info-box">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <h4 class="info-box-heading green">Special Sale</h4>
                                    </div>
                                </div>
                                <h6 class="text">Extra TK5 off on all items </h6>
                            </div>
                        </div>
                        <!-- .col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.info-boxes-inner -->

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-xs-12 col-md-12 home-banner">
            <section class="section featured-product wow fadeInUp">
                <h3 class="section-title">Featured products</h3>
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
                    @forelse ($featuredproducts as $fProduct)
                        <div class="item item-carousel">
                            <div class="products">
                                <div class="product">
                                    <div class="product-image">
                                        <div class="image"> <a href="{{ route('front.single-product', $fProduct->title_slug) }}"><img  src="{{ asset('storage/product/avatar') }}/{{ $fProduct->avatar }}" alt=""></a> </div>
                                        <!-- /.image -->
                                        <div class="tag hot"><span>hot</span></div>
                                    </div>
                                    <!-- /.product-image -->
                                    <div class="product-info text-left">
                                        <h3 class="name"><a href="{{ route('front.single-product', $fProduct->id) }}">{{ $fProduct->product_title}}</a></h3>
                                        <div class="rating rateit-small"></div>
                                        <div class="description"></div>
                                        <div class="product-price"> <span class="price"> TK450.99 </span> <span class="price-before-discount">TK 800</span> </div>
                                        <!-- /.product-price -->

                                    </div>
                                    <!-- /.product-info -->
                                    <div class="cart clearfix animate-effect">
                                        <div class="action">
                                            <ul class="list-unstyled">
                                                <li class="add-cart-button btn-group">
                                                    <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                                    <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                </li>
                                                <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                                <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                                            </ul>
                                        </div>
                                        <!-- /.action -->
                                    </div>
                                    <!-- /.cart -->
                                </div>
                                <!-- /.product -->

                            </div>
                            <!-- /.products -->
                        </div>
                    @empty

                        <div class="item item-carousel">
                            <div class="products">
                                <center><h2>No Have Featured Product</h2></center>
                            </div>
                            <!-- /.products -->
                        </div>
                @endforelse
                <!-- /.item -->
                </div>
                <!-- /.home-owl-carousel -->
            </section>




        @foreach($categories as $category)
                <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
                    <div class="more-info-tab clearfix ">
                        <h3 class="new-product-title pull-left">{{ $category->name }}</h3>
                        <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
                            <?php $i = 1?>
                            @forelse($category->subcategories->take(5) as $subcategory)
                                @if ($i == 1)
                                    <li class="active"><a data-transition-type="backSlide" href="#{{ $subcategory->id }}" data-toggle="tab">{{$subcategory->name}}</a></li>
                                @else
                                    <li><a data-transition-type="backSlide" href="#{{ $subcategory->id }}" data-toggle="tab">{{$subcategory->name}}</a></li>
                                @endif
                                <?php $i++ ?>
                            @empty
                                <center><h2>No have Any Sub Category In This Category.</h2></center>
                            @endforelse
                                <li><a href="{{ route('front.category.product', $category->id) }}" class="btn-color">View All</a></li>
                        </ul>
                        <!-- /.nav-tabs -->
                    </div>

                    <div class="tab-content outer-top-xs">
                        <?php $i = 1 ?>
                        @foreach($category->subcategories->take(5) as $subcategory)
                            @if ( $i == 1)
                                <div class="tab-pane in active" id="{{ $subcategory->id }}">
                                    <div class="product-slider">
                                        <div class="owl-carousel home-owl-carousel">
                                            @forelse($subcategory->products as $product)
                                                <div class="item item-carousel owl-item-style" >
                                                    <div class="products">
                                                        <div class="product">
                                                            <div class="product-image">
                                                                <div class="image"> <a href="{{ route('front.single-product', $product->title_slug) }}"><img  src="{{asset('storage/product/avatar')}}/{{ $product->avatar }}" class="product-image-size" alt=""></a> </div>
                                                                <!-- /.image -->
                                                                <div class="tag new"><span>new</span></div>
                                                            </div>
                                                            <!-- /.product-image -->
                                                            <div class="product-info text-left">
                                                                <h3 class="name"><a href="{{ route('front.single-product', $product->title_slug) }}">{{ $product->product_title }}</a></h3>
                                                                <div class="rating rateit-small"></div>
                                                                <div class="description"></div>
                                                                <div class="product-price"> <span class="price"> TK{{ $product->sell_price }} </span> <span class="price-before-discount">TK 800</span> </div>
                                                                <!-- /.product-price -->
                                                            </div>
                                                            <!-- /.product-info -->
                                                            <div class="cart clearfix animate-effect">
                                                                <div class="action">
                                                                    <ul class="list-unstyled">
                                                                        <li class="add-cart-button btn-group">
                                                                            <button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button>
                                                                            <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                                        </li>
                                                                        <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                                                        <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                                                                    </ul>
                                                                </div>
                                                                <!-- /.action -->
                                                            </div>
                                                            <!-- /.cart -->
                                                        </div>
                                                        <!-- /.product -->
                                                    </div>
                                                    <!-- /.products -->
                                                </div>
                                            @empty
                                                <center><h2>No Have Any Product FOr This Sub Category...</h2></center>
                                            @endforelse
                                        </div>
                                        <!-- /.home-owl-carousel -->
                                    </div>
                                        <!-- /.product-slider -->
                                </div>
                            @else
                                <div class="tab-pane" id="{{ $subcategory->id }}">
                                        <div class="product-slider">
                                            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
                                                @forelse($subcategory->products as $product)
                                                    <div class="item item-carousel owl-item-style">
                                                        <div class="products">
                                                            <div class="product">
                                                                <div class="product-image">
                                                                    <div class="image"> <a href="{{ route('front.single-product',$product->title_slug) }}"><img  src="{{asset('storage/product/avatar')}}/{{ $product->avatar }}" class="product-image-size" alt=""></a> </div>
                                                                    <!-- /.image -->
                                                                    <div class="tag new"><span>new</span></div>
                                                                </div>
                                                                <!-- /.product-image -->
                                                                <div class="product-info text-left">
                                                                    <h3 class="name"><a href="{{ route('front.single-product', $product->title_slug) }}">{{ $product->product_title }}</a></h3>
                                                                    <div class="rating rateit-small"></div>
                                                                    <div class="description"></div>
                                                                    <div class="product-price"> <span class="price"> TK {{ $product->sell_price }} </span> <span class="price-before-discount">TK 800</span> </div>
                                                                    <!-- /.product-price -->
                                                                </div>
                                                                <!-- /.product-info -->
                                                                <div class="cart clearfix animate-effect">
                                                                    <div class="action">
                                                                        <ul class="list-unstyled">
                                                                            <li class="add-cart-button btn-group">
                                                                                <button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button>
                                                                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                                            </li>
                                                                            <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                                                            <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                                                                        </ul>
                                                                    </div>
                                                                    <!-- /.action -->
                                                                </div>
                                                                <!-- /.cart -->
                                                            </div>
                                                                <!-- /.product -->
                                                            </div>
                                                        <!-- /.products -->
                                                    </div>
                                                @empty
                                                    <center><h2>No Have Any Product FOr This Sub Category...</h2></center>
                                                @endforelse
                                            </div>
                                            <!-- /.home-owl-carousel -->
                                        </div>
                                        <!-- /.product-slider -->
                                    </div>
                            @endif
                            <?php $i++ ?>
                        @endforeach
                    </div>
                    <!-- /.tab-content -->
                </div>
            @endforeach
            {{-- =================================== full width body ending is here  ================================================================================        --}}
        </div>
    </div>


    <div class="category-product">
        @foreach($categories as $category)
        <div class="row">
                <section class="section featured-product wow fadeInUp">
                    <h3 class="section-title">{{ $category->name }}</h3>
                    @forelse ($category->products as $product)
                        <div class="col-xs-4 col-md-2" style="visibility: visible; animation-name: fadeInUp;">
                            <div class="products product-card">
                                <div class="product">
                                    <div class="product-image">
                                        <div class="image"> <a href="{{ route('front.single-product', $product->title_slug) }}"><img src="{{ asset('storage/product/avatar') }}/{{ $product->avatar }}" alt=""></a> </div>
                                        <!-- /.image -->
                                        <div class="tag new"><span>new</span></div>
                                    </div>
                                    <!-- /.product-image -->
                                    <div class="product-info text-left">
                                        <h3 class="name"><a href="{{ route('front.single-product', $product->title_slug) }}">{{ $product->product_title }}</a></h3>
                                        <div class="product-price">
                                            <span class="price"> $450.99 </span>
                                            <span class="price-before-discount">$ 800</span>
                                        </div>
                                        <!-- /.product-price -->
                                    </div>
                                    <!-- /.product-info -->
                                    <div class="cart clearfix animate-effect">
                                        <div class="action">
                                            <ul class="list-unstyled">
                                                <li class="add-cart-button btn-group">
                                                    <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                                    <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                </li>
                                                <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                                <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal"></i> </a> </li>
                                            </ul>
                                        </div>
                                        <!-- /.action -->
                                    </div>
                                    <!-- /.cart -->
                                </div>
                                <!-- /.product -->
                            </div>
                            <!-- /.products -->
                        </div>
                    @empty
                        No product Avalable
                    @endforelse
                    <div class="col-xs-4 col-md-2 viewmore-button" style="visibility: visible; animation-name: fadeInUp;">
                        <div class="products product-card card-button">
                            <h4>View More Products</h4>
                            <a href="{{ route('front.category.product', $category->id) }}">
                                <button class="add-cart-button">View More<i class="fa fa-arrow-right"></i></button>
                            </a>
                        </div>
                    </div>
                </section>
        </div>
    @endforeach
        <!-- /.row -->
    </div>








    <div id="brands-carousel" class="logo-slider wow fadeInUp">
        <div class="logo-slider-inner">
            <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">

                <div class="item m-t-10"> <a href="#" class="image"> <img data-echo="{{ asset('assets/frontend/images/brands/themeforest1.png') }}" src="{{ asset('assets/frontend/images/brands/themeforest1.png') }}" alt=""> </a> </div>
                <div class="item m-t-10"> <a href="#" class="image"> <img data-echo="{{ asset('assets/frontend/images/brands/themeforest2.png') }}" src="{{ asset('assets/frontend/images/brands/themeforest2.png') }}" alt=""> </a> </div>
                <div class="item m-t-10"> <a href="#" class="image"> <img data-echo="{{ asset('assets/frontend/images/brands/themeforest3.png') }}" src="{{ asset('assets/frontend/images/brands/themeforest3.png') }}" alt=""> </a> </div>
                <div class="item m-t-10"> <a href="#" class="image"> <img data-echo="{{ asset('assets/frontend/images/brands/themeforest4.png') }}" src="{{ asset('assets/frontend/images/brands/themeforest4.png') }}" alt=""> </a> </div>
                <div class="item m-t-10"> <a href="#" class="image"> <img data-echo="{{ asset('assets/frontend/images/brands/themeforest5.png') }}" src="{{ asset('assets/frontend/images/brands/themeforest5.png') }}" alt=""> </a> </div>
                <div class="item m-t-10"> <a href="#" class="image"> <img data-echo="{{ asset('assets/frontend/images/brands/themeforest1.png') }}" src="{{ asset('assets/frontend/images/brands/themeforest1.png') }}" alt=""> </a> </div>
                <div class="item m-t-10"> <a href="#" class="image"> <img data-echo="{{ asset('assets/frontend/images/brands/themeforest2.png') }}" src="{{ asset('assets/frontend/images/brands/themeforest2.png') }}" alt=""> </a> </div>
                <div class="item m-t-10"> <a href="#" class="image"> <img data-echo="{{ asset('assets/frontend/images/brands/themeforest3.png') }}" src="{{ asset('assets/frontend/images/brands/themeforest3.png') }}" alt=""> </a> </div>
                <div class="item m-t-10"> <a href="#" class="image"> <img data-echo="{{ asset('assets/frontend/images/brands/themeforest4.png') }}" src="{{ asset('assets/frontend/images/brands/themeforest4.png') }}" alt=""> </a> </div>
                <div class="item m-t-10"> <a href="#" class="image"> <img data-echo="{{ asset('assets/frontend/images/brands/themeforest5.png') }}" src="{{ asset('assets/frontend/images/brands/themeforest5.png') }}" alt=""> </a> </div>
                <!--/.item-->

            </div>
            <!-- /.owl-carousel #logo-slider -->
        </div>
        <!-- /.logo-slider-inner -->
    </div>
@endsection
