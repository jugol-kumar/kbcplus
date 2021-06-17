<div class="top-bar animate-dropdown">
    <div class="container-fluid">
        <div class="header-top-inner">
            <div class="cnt-account">
                <ul class="list-unstyled">
                    <li><a href="#"><i class="icon fa fa-user"></i>My Account</a></li>
                    <li><a href="#"><i class="icon fa fa-heart"></i>Wishlist</a></li>
                    <li><a href="#"><i class="icon fa fa-shopping-cart"></i>My Cart</a></li>
                    @if (Session::get('customer_shipping'))
                        <li><a href="#"><i class="icon fa fa-shopping-cart"></i>Payment</a></li>
                    @endif
                    @if (Session::get('customerLogin'))
                        @if (Cart::instance('cart')->count() > 0)
                            <li><a href="{{ route('front.customer.panel') }}"><i class="icon fa fa-check"></i>Checkout</a></li>
                        @endif
                        <li><a href="{{ route('front.customer.logout') }}"><i class="icon fa fa-power-off"></i>Logout</a></li>
                    @else
                        <li><a href="{{ route('front.go.to.checkout') }}"><i class="icon fa fa-lock"></i>Login</a></li>
                    @endif
                </ul>
            </div>
            <!-- /.cnt-account -->

            <div class="cnt-block">
                <ul class="list-unstyled list-inline">
                    <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">USD </span><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">USD</a></li>
                            <li><a href="#">INR</a></li>
                            <li><a href="#">GBP</a></li>
                        </ul>
                    </li>
                    <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">English </span><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">English</a></li>
                            <li><a href="#">French</a></li>
                            <li><a href="#">German</a></li>
                        </ul>
                    </li>
                </ul>
                <!-- /.list-unstyled -->
            </div>
            <!-- /.cnt-cart -->
            <div class="clearfix"></div>
        </div>
        <!-- /.header-top-inner -->
    </div>
    <!-- /.container -->
</div>
