@extends('layouts.frontend.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div id="category" class="category-carousel hidden-xs">
                <div class="item">
                    <div class="image"> <img src="{{asset('assets/frontend')}}/images/banners/cat-banner-1.jpg" alt="" class="img-responsive"> </div>
                    <div class="container-fluid">
                        <div class="caption vertical-top text-left">
                            <div class="big-text"> Big Sale </div>
                            <div class="excerpt hidden-sm hidden-md"> Save up to 49% off </div>
                            <div class="excerpt-normal hidden-sm hidden-md"> Lorem ipsum dolor sit amet, consectetur adipiscing elit </div>
                        </div>
                        <!-- /.caption -->
                    </div>
                    <!-- /.container-fluid -->
                </div>
            </div>
        </div>
    </div>
    <div class='row'>
        <div class='col-md-3 sidebar'>
            <!-- ================================== TOP NAVIGATION ================================== -->
            <!-- /.side-menu -->
            <!-- ================================== TOP NAVIGATION : END ================================== -->
            <div class="sidebar-module-container">
                <div class="sidebar-filter">
                    <!-- ============================================== SIDEBAR CATEGORY ============================================== -->
                    <div class="sidebar-widget wow fadeInUp">
                        <h3 class="section-title">shop by</h3>
                        <div class="widget-header">
                            <h4 class="widget-title">Category</h4>
                        </div>
                        <div class="sidebar-widget-body">
                            <div class="accordion">

                                @foreach ($allCategory as $item)
                                    <div class="accordion-group">
                                        <div class="accordion-heading"> <a href="#{{ $item->id }}" data-toggle="collapse" class="accordion-toggle collapsed"> {{ $item->name }} </a> </div>
                                        <!-- /.accordion-heading -->
                                        <div class="accordion-body collapse" id="{{ $item->id }}" style="height: 0px;">
                                            <div class="accordion-inner">
                                                <ul>
                                                    @foreach($item->subcategories as $scategory)
                                                    <li><a href="{{ route('front.subcategory.product', $scategory->id) }}">{{ $scategory->name}}</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <!-- /.accordion-inner -->
                                        </div>
                                        <!-- /.accordion-body -->
                                    </div>
                                @endforeach
                                <!-- /.accordion-group -->
                            </div>
                            <!-- /.accordion -->
                        </div>
                        <!-- /.sidebar-widget-body -->
                    </div>
                    <!-- /.sidebar-widget -->
                    <!-- ============================================== SIDEBAR CATEGORY : END ============================================== -->

                    <!-- ============================================== PRICE SILDER============================================== -->
                    <div class="sidebar-widget wow fadeInUp outer-top-vs">
                        <div class="widget-header">
                            <h4 class="widget-title">Price Slider</h4>
                        </div>
                        <div class="sidebar-widget-body m-t-10">
                            <div class="price-range-holder"> <span class="min-max"> <span class="pull-left">$200.00</span> <span class="pull-right">$800.00</span> </span>
                                <input type="text" id="amount" style="border:0; color:#666666; font-weight:bold;text-align:center;">
                                <input type="text" class="price-slider" value="" >
                            </div>
                            <!-- /.price-range-holder -->
                            <a href="#" class="lnk btn btn-primary">Show Now</a> </div>
                        <!-- /.sidebar-widget-body -->
                    </div>
                    <!-- /.sidebar-widget -->
                    <!-- ============================================== PRICE SILDER : END ============================================== -->
                    <!-- ============================================== MANUFACTURES============================================== -->
                    <div class="sidebar-widget wow fadeInUp">
                        <div class="widget-header">
                            <h4 class="widget-title">Brands</h4>
                        </div>
                        <div class="sidebar-widget-body">
                            <ul class="list">
                                @foreach($brands as $brand)
                                    <li><a href="{{ route('front.brand.product', $brand->id) }}">{{ $brand->name }} <img class="brand-icon" src="{{ asset('storage/brands') }}/{{ $brand->brand_logo }}" alt=""></a></li>
                                @endforeach
                            </ul>
                            <!--<a href="#" class="lnk btn btn-primary">Show Now</a>-->
                        </div>
                        <!-- /.sidebar-widget-body -->
                    </div>
                    <!-- /.sidebar-widget -->
                    <!-- ============================================== MANUFACTURES: END ============================================== -->
                    <!-- ============================================== COLOR============================================== -->
                    <div class="sidebar-widget wow fadeInUp outer-top-vs">
                        <div class="widget-header">
                            <h4 class="widget-title">Colors</h4>
                        </div>
                        <div class="sidebar-widget-body">
                            <ul class="list">
                                <li><a href="#">Red</a></li>
                                <li><a href="#">Blue</a></li>
                                <li><a href="#">Yellow</a></li>
                                <li><a href="#">Pink</a></li>
                                <li><a href="#">Brown</a></li>
                                <li><a href="#">Teal</a></li>
                            </ul>
                        </div>
                        <!-- /.sidebar-widget-body -->
                    </div>
                    <!-- /.sidebar-widget -->
                    <!-- ============================================== COLOR: END ============================================== -->
                    <!-- /.sidebar-widget -->
                    <!-- ============================================== COMPARE: END ============================================== -->
                    <!-- ============================================== PRODUCT TAGS ============================================== -->
                    <div class="sidebar-widget product-tag wow fadeInUp outer-top-vs">
                        <h3 class="section-title">Product tags</h3>
                        <div class="sidebar-widget-body outer-top-xs">
                            <div class="tag-list"> <a class="item" title="Phone" href="category.html">Phone</a> <a class="item active" title="Vest" href="category.html">Vest</a> <a class="item" title="Smartphone" href="category.html">Smartphone</a> <a class="item" title="Furniture" href="category.html">Furniture</a> <a class="item" title="T-shirt" href="category.html">T-shirt</a> <a class="item" title="Sweatpants" href="category.html">Sweatpants</a> <a class="item" title="Sneaker" href="category.html">Sneaker</a> <a class="item" title="Toys" href="category.html">Toys</a> <a class="item" title="Rose" href="category.html">Rose</a> </div>
                            <!-- /.tag-list -->
                        </div>
                        <!-- /.sidebar-widget-body -->
                    </div>
                </div>
                <!-- /.sidebar-filter -->
            </div>
            <!-- /.sidebar-module-container -->
        </div>
        <!-- /.sidebar -->
        <div class='col-md-9'>
            <!-- ========================================== SECTION – HERO ========================================= -->


            <div class="clearfix filters-container m-t-10">
                <div class="row">
                    <div class="col col-sm-6 col-md-2">
                        <div class="filter-tabs">
                            <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                                <li class="active"> <a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-large"></i>Grid</a> </li>
                                <li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-th-list"></i>List</a></li>
                            </ul>
                        </div>
                        <!-- /.filter-tabs -->
                    </div>
                    <!-- /.col -->
{{--                    <div class="col col-sm-12 col-md-6">--}}
{{--                        <div class="col col-sm-3 col-md-6 no-padding">--}}
{{--                            <div class="lbl-cnt"> <span class="lbl">Sort by</span>--}}
{{--                                <div class="fld inline">--}}
{{--                                    <div class="dropdown dropdown-small dropdown-med dropdown-white inline">--}}
{{--                                        <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> Position <span class="caret"></span> </button>--}}
{{--                                        <ul role="menu" class="dropdown-menu">--}}
{{--                                            <li role="presentation"><a href="#">position</a></li>--}}
{{--                                            <li role="presentation"><a href="#">Price:Lowest first</a></li>--}}
{{--                                            <li role="presentation"><a href="#">Price:HIghest first</a></li>--}}
{{--                                            <li role="presentation"><a href="#">Product Name:A to Z</a></li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <!-- /.fld -->--}}
{{--                            </div>--}}
{{--                            <!-- /.lbl-cnt -->--}}
{{--                        </div>--}}
{{--                        <!-- /.col -->--}}
{{--                        <div class="col col-sm-3 col-md-6 no-padding">--}}
{{--                            <div class="lbl-cnt"> <span class="lbl">Show</span>--}}
{{--                                <div class="fld inline">--}}
{{--                                    <div class="dropdown dropdown-small dropdown-med dropdown-white inline">--}}
{{--                                        <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> 1 <span class="caret"></span> </button>--}}
{{--                                        <ul role="menu" class="dropdown-menu">--}}
{{--                                            <li role="presentation"><a href="#">1</a></li>--}}
{{--                                            <li role="presentation"><a href="#">2</a></li>--}}
{{--                                            <li role="presentation"><a href="#">3</a></li>--}}
{{--                                            <li role="presentation"><a href="#">4</a></li>--}}
{{--                                            <li role="presentation"><a href="#">5</a></li>--}}
{{--                                            <li role="presentation"><a href="#">6</a></li>--}}
{{--                                            <li role="presentation"><a href="#">7</a></li>--}}
{{--                                            <li role="presentation"><a href="#">8</a></li>--}}
{{--                                            <li role="presentation"><a href="#">9</a></li>--}}
{{--                                            <li role="presentation"><a href="#">10</a></li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <!-- /.fld -->--}}
{{--                            </div>--}}
{{--                            <!-- /.lbl-cnt -->--}}
{{--                        </div>--}}
{{--                        <!-- /.col -->--}}
{{--                    </div>--}}
{{--                    <!-- /.col -->--}}
{{--                    <div class="col col-sm-6 col-md-4 text-right">--}}
{{--                        <div class="pagination-container">--}}
{{--                            <ul class="list-inline list-unstyled">--}}
{{--                                <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>--}}
{{--                                <li><a href="#">1</a></li>--}}
{{--                                <li class="active"><a href="#">2</a></li>--}}
{{--                                <li><a href="#">3</a></li>--}}
{{--                                <li><a href="#">4</a></li>--}}
{{--                                <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>--}}
{{--                            </ul>--}}
{{--                            <!-- /.list-inline -->--}}
{{--                        </div>--}}
{{--                        <!-- /.pagination-container --> </div>--}}
{{--                    <!-- /.col -->--}}
                </div>
                <!-- /.row -->
            </div>
            <div class="search-result-container ">
                <div id="myTabContent" class="tab-content category-list">
                    <div class="tab-pane active " id="grid-container">
                        <div class="category-product">
                            <div class="row">
                                @forelse ($category as $item)
                                    <div class="col-sm-6 col-md-3 wow fadeInUp">
                                        <div class="products product-card">
                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image"> <a href="{{ route('front.single-product', $item->title_slug) }}"><img src="{{ asset('storage/product/avatar') }}/{{ $item->avatar }}" alt=""></a> </div>
                                                    <!-- /.image -->
                                                    <div class="tag new"><span>new</span></div>
                                                </div>
                                                <!-- /.product-image -->
                                                <div class="product-info text-left">
                                                    <h3 class="name"><a href="{{ route('front.single-product', $item->title_slug) }}">Floral Print Buttoned</a></h3>
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
                                    <h3>No have Any Product For this category</h3>
                                @endforelse
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.category-product -->

                    </div>
                    <!-- /.tab-pane -->

                    <div class="tab-pane "  id="list-container">
                        <div class="category-product">
                            @forelse ($category as $item)

                                <div class="category-product-inner wow fadeInUp">
                                    <div class="products">
                                        <div class="product-list product">
                                            <div class="row product-list-row">
                                                <div class="col col-sm-4 col-lg-4">
                                                    <div class="product-image">
                                                        <div class="image"> <img src="{{asset('storage/product/avatar')}}/{{ $item->avatar }}" alt=""> </div>
                                                    </div>
                                                    <!-- /.product-image -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col col-sm-8 col-lg-8">
                                                    <div class="product-info">
                                                        <h3 class="name"><a href="{{ $item->title }}">Floral Print Buttoned</a></h3>
                                                        <div class="rating rateit-small"></div>
                                                        <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                                                        <!-- /.product-price -->
                                                        <div class="description m-t-10">Suspendisse posuere arcu diam, id accumsan eros pharetra ac. Nulla enim risus, facilisis bibendum gravida eget, lacinia id purus. Suspendisse posuere arcu diam, id accumsan eros pharetra ac. Nulla enim risus, facilisis bibendum gravida eget.</div>
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
                                                    <!-- /.product-info -->
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.product-list-row -->
                                            <div class="tag new"><span>new</span></div>
                                        </div>
                                        <!-- /.product-list -->
                                    </div>
                                    <!-- /.products -->
                                </div>
                            @empty
                                <h3>No have Any product in this category</h3>
                            @endforelse
                            <!-- /.category-product-inner -->
                        </div>
                        <!-- /.category-product -->
                    </div>
                    <!-- /.tab-pane #list-container -->
                </div>
                <!-- /.tab-content -->
                <div class="clearfix filters-container">
                    <div class="text-right">
                        <div class="pagination-container">
                            <ul class="list-inline list-unstyled">
                                <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                                <li><a href="#">1</a></li>
                                <li class="active"><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                            </ul>
                            <!-- /.list-inline -->
                        </div>
                        <!-- /.pagination-container --> </div>
                    <!-- /.text-right -->

                </div>
                <!-- /.filters-container -->

            </div>
            <!-- /.search-result-container -->

        </div>
        <!-- /.col -->
    </div>

    <div id="brands-carousel" class="logo-slider wow fadeInUp">
        <div class="logo-slider-inner">
            <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
                <div class="item m-t-15"> <a href="#" class="image"> <img data-echo="{{asset('assets/frontend')}}/images/brands/brand1.png" src="{{asset('assets/frontend')}}/images/blank.gif" alt=""> </a> </div>
                <!--/.item-->

                <div class="item m-t-10"> <a href="#" class="image"> <img data-echo="{{asset('assets/frontend')}}/images/brands/brand2.png" src="{{asset('assets/frontend')}}/images/blank.gif" alt=""> </a> </div>
                <!--/.item-->

                <div class="item"> <a href="#" class="image"> <img data-echo="{{asset('assets/frontend')}}/images/brands/brand3.png" src="{{asset('assets/frontend')}}/images/blank.gif" alt=""> </a> </div>
                <!--/.item-->

                <div class="item"> <a href="#" class="image"> <img data-echo="{{asset('assets/frontend')}}/images/brands/brand4.png" src="{{asset('assets/frontend')}}/images/blank.gif" alt=""> </a> </div>
                <!--/.item-->

                <div class="item"> <a href="#" class="image"> <img data-echo="{{asset('assets/frontend')}}/images/brands/brand5.png" src="{{asset('assets/frontend')}}/images/blank.gif" alt=""> </a> </div>
                <!--/.item-->

                <div class="item"> <a href="#" class="image"> <img data-echo="{{asset('assets/frontend')}}/images/brands/brand6.png" src="{{asset('assets/frontend')}}/images/blank.gif" alt=""> </a> </div>
                <!--/.item-->

                <div class="item"> <a href="#" class="image"> <img data-echo="{{asset('assets/frontend')}}/images/brands/brand2.png" src="{{asset('assets/frontend')}}/images/blank.gif" alt=""> </a> </div>
                <!--/.item-->

                <div class="item"> <a href="#" class="image"> <img data-echo="{{asset('assets/frontend')}}/images/brands/brand4.png" src="{{asset('assets/frontend')}}/images/blank.gif" alt=""> </a> </div>
                <!--/.item-->

                <div class="item"> <a href="#" class="image"> <img data-echo="{{asset('assets/frontend')}}/images/brands/brand1.png" src="{{asset('assets/frontend')}}/images/blank.gif" alt=""> </a> </div>
                <!--/.item-->

                <div class="item"> <a href="#" class="image"> <img data-echo="{{asset('assets/frontend')}}/images/brands/brand5.png" src="{{asset('assets/frontend')}}/images/blank.gif" alt=""> </a> </div>
                <!--/.item-->
            </div>
            <!-- /.owl-carousel #logo-slider -->
        </div>
        <!-- /.logo-slider-inner -->

    </div>
    <!-- /.logo-slider -->
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== --> </div>
    <!-- /.container -->

    </div>
@endsection
