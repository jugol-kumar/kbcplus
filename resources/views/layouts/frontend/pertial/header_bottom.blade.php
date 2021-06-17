<div class="main-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
                <!-- ============================================================= LOGO ============================================================= -->
            <!--          <div class="logo"> <a href="home.html"> <img src="{{asset('assets/frontend')}}/images/logo.png" alt="logo"> </a> </div>-->
                <div class="logo"> <a href="{{ route('index') }}"><img src="{{asset('assets/frontend')}}/images/mainlogo.jpg" alt="" style="
                                                                           width: 100px;
                                                                           margin-left: 110px;
                                                                           height: 50px;
                        "></a> </div>
                <!-- /.logo -->
                <!-- ============================================================= LOGO : END ============================================================= --> </div>
            <!-- /.logo-holder -->

            <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
                <!-- /.contact-row -->
                <!-- ============================================================= SEARCH AREA ============================================================= -->
                <div class="search-area">
                    <form>
                        <div class="control-group">
                            <ul class="categories-filter animate-dropdown">
                                <li class="dropdown"> <a class="dropdown-toggle"  data-toggle="dropdown" href="category.html">Categories <b class="caret"></b></a>
                                    <ul class="dropdown-menu" role="menu" >
                                        <li class="menu-header">Computer</li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Clothing</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Electronics</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Shoes</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Watches</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <input class="search-field" placeholder="Search here..." />
                            <a class="search-button" href="#" ></a> </div>
                    </form>
                </div>
                <!-- /.search-area -->
                <!-- ============================================================= SEARCH AREA : END ============================================================= --> </div>
            <!-- /.top-search-holder -->

            <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">
                <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->

                <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
                        <div class="items-cart-inner">
                            <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
                            <div class="basket-item-count"><span class="count">
                                    @if (Cart::instance('cart')->count() > 0 )
                                       {{ Cart::instance('cart')->count() }}
                                    @endif
                                </span></div>
                            <div class="total-price-basket"> <span class="lbl">cart</span></div>
                        </div>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="cart-item product-summary">
                                @forelse(Cart::instance('cart')->content() as $item)
                                <div class="row">
                                    <div class="col-xs-4">
                                        <div class="image"> <a href="{{ route('front.single-product', $item->id) }}"><img src="{{ asset('storage/product/avatar') }}/{{ $item->options->image }}" alt=""></a> </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <h3 class="name"><a href="index.php?page-detail">{{ $item->name }}</a></h3>
                                        <div class="price">TK {{ $item->price }}</div>
                                    </div>
                                    <div class="col-xs-1 action"> <a href="#"><i class="fa fa-trash"></i></a> </div>
                                </div>
                                @empty
                                    <h5>No have any product your cart</h5>
                                @endforelse
                            </div>
                            <!-- /.cart-item -->
                            <div class="clearfix"></div>
                            <hr>
                            <div class="clearfix cart-total">
                                <a href="{{ route('front.go.to.cart') }}" class="btn btn-upper btn-primary btn-block m-t-20">Go To Cart</a>
                            </div>
                            <!-- /.cart-total-->
                        </li>
                    </ul>
                    <!-- /.dropdown-menu-->
                </div>
                <!-- /.dropdown-cart -->
                <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= --> </div>
            <!-- /.top-cart-row -->
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

</div>
