<div class="bg-white shadow-sm osahan-main-nav">
    <nav class="navbar navbar-expand-lg navbar-light bg-white osahan-header py-0 container">
        <a class="navbar-brand mr-0" href="{{ route('front.index') }}"><img class="img-fluid logo-img " src="{{asset('assets/frontend/img/logo.png')}}"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="ml-3 d-flex align-items-center">
            <div class="dropdown mr-3">
                <a class="text-dark dropdown-toggle d-flex align-items-center osahan-location-drop" href="#"
                   id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false">
                    <div><i
                            class="icofont-location-pin d-flex align-items-center bg-light rounded-pill p-2 icofont-size border shadow-sm mr-2"></i>
                    </div>
                    <div>
                        <p class="text-muted mb-0 small">Select Location</p>
                        Maharashtra India...
                    </div>
                </a>
                <div class="dropdown-menu osahan-select-loaction p-3" aria-labelledby="navbarDropdown">
                    <span>Select your city to start shopping</span>
                    <form class="form-inline my-2">

                        <div class="input-group p-0 col-lg-12">
                            <input type="text" class="form-control form-control-sm"
                                   id="inlineFormInputGroupUsername2" placeholder="Search Location">
                            <div class="input-group-prepend">
                                <div class="btn btn-success rounded-right btn-sm"><i
                                        class="icofont-location-arrow"></i> Detect</div>
                            </div>
                        </div>
                    </form>
                    <div class="city pt-2">
                        <h6>Top Citys</h6>
                        <p class="border-bottom m-0 py-1"><a href="#" class="text-dark">Banglore</a></p>
                        <p class="border-bottom m-0 py-1"><a href="#" class="text-dark">Noida</a></p>
                        <p class="border-bottom m-0 py-1"><a href="#" class="text-dark">Delhi</a></p>
                        <p class="m-0 py-1"><a href="#" class="text-dark">Mumbai</a></p>
                    </div>
                </div>
            </div>

            <div class="input-group mr-sm-2 col-lg-12">
                <input type="text" class="form-control" id="inlineFormInputGroupUsername2"
                       placeholder="Search for Products..">
                <div class="input-group-prepend">
                    <div class="btn btn-success rounded-right"><i class="icofont-search"></i></div>
                </div>
            </div>
        </div>
        <div class="ml-auto d-flex align-items-center">
            <div class="dropdown">
                <a href="#" class="text-dark dropdown-toggle not-drop mr-2" id="dropdownMenuNotification"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="icofont-notification d-flex align-items-center bg-light rounded-pill p-2 icofont-size border shadow-sm"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right p-0 osahan-notifications-main"
                     aria-labelledby="dropdownMenuNotification">

                    <div class="osahan-notifications bg-white border-bottom p-2">
                        <div class="position-absolute ml-n1 py-2"><i
                                class="icofont-check-circled text-white bg-success rounded-pill p-1"></i></div>
                        <a href="status_complete.html" class="text-decoration-none text-dark">
                            <div class="notifiction small">
                                <div class="ml-3">
                                    <p class="font-weight-bold mb-1">Yay! Order Complete</p>
                                    <p class="small m-0"><i class="icofont-ui-calendar"></i> Today, 05:14 AM</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="osahan-notifications bg-white border-bottom p-2">
                        <a href="status_onprocess.html" class="text-decoration-none text-muted">
                            <div class="notifiction small">
                                <div class="ml-3">
                                    <p class="font-weight-bold mb-1">Yipiee. order Success</p>
                                    <p class="small m-0"><i class="icofont-ui-calendar"></i> Monday, 08:30 PM</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="osahan-notifications bg-white p-2">
                        <a href="status_onprocess.html" class="text-decoration-none text-muted">
                            <div class="notifiction small">
                                <div class="ml-3">
                                    <p class="font-weight-bold mb-1">New Promos Coming</p>
                                    <p class="small m-0"><i class="icofont-ui-calendar"></i> Sunday, 10:30 AM</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="dropdown">
                <a href="javascript:void(0)" class="text-dark dropdown-toggle not-drop mr-2" id="dropdownMenuNotification"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i
                        class="icofont-shopping-cart d-flex align-items-center bg-light rounded-pill p-2 icofont-size border shadow-sm">
                    </i>
                    @if(session('cart'))
                        <span class="text-white bg-primary cartNotification">{{ session('cart') ? count(session('cart')) : '' }}</span>
                    @endif
                </a>
                <div class="dropdown-menu dropdown-menu-right p-0 osahan-notifications-main product-cart-dropdrown"
                     aria-labelledby="dropdownMenuNotification">

                    <div class="osahan-notifications bg-white border-bottom p-2">
                        <div class="position-absolute ml-n1 py-2">
                            @if(session('cart'))
                                <a href="javascript:void(0)" id="clearCartSession">
                                    <span data-toggle="tooltip" data-placement="top" class="text-white bg-danger counter-cart" data-original-title="Clear All Cart Product.." aria-describedby="tooltip587617">
                                        <i class="icofont-close"></i>
                                    </span>
                                </a>
                            @endif
                        </div>
                        <div class="notifiction small">
                            <div class="ml-3">
                                <p class="font-weight-bold mb-1">My Cart</p>
                                <p class="small m-0"><i class="icofont-ui-calendar"></i> Total Product...</p>
                            </div>
                        </div>
                    </div>


                    @php($totaPrice = 0)
                    @if(session('cart'))
                        <div class="cartItems">
                        @foreach(session('cart') as $id => $details)
                            <div class="bg-white border-bottom">
                                <div class="cart-items bg-white position-relative border-bottom">
                                    <div class="d-flex  align-items-center">
                                        <a href="javascript:void(0)"><img src="{{ asset('storage/product') }}/{{ $details['image']  }}" class="img-fluid"></a>
                                        <a href="javascript:void(0)" class="ml-3 text-dark text-decoration-none w-100">
                                            <P class="my-1">{{ str_limit($details['title'], 15) }}</P>
                                            <p class="text-muted mb-2"> &#2547;{{ $details['price'] }} x {{ $details['quantity'] }}</p>
                                            <?php
                                                $totaPrice += $details['price'] * $details['quantity']
                                            ?>
                                            <span style="width: 15px;height: 15px;background: {{ $details['color'] }}; display: inline-block;"></span>
                                            <div class="btn-group cart-size">
                                                @if($details['size'] != null)
                                                    <label class="btn sizeClass hasSize">{{ $details['size'] }}</label>
                                                @endif
                                            </div>


                                            <div class="d-flex align-items-center mb-2">
                                                <form id="myform" class="cart-items-number d-flex ml-auto" method="POST" action="#">
                                                    <input type="button" value="-" data-id="{{ $id }}" class="btn btn-success btn-sm cart-quentiy-minus" field="quantity">
                                                    <input type="text" id="cartQuntityVal" name="quantity" value="{{ $details['quantity'] }}" class="qty form-control">
                                                    <input type="button" value="+"  data-id="{{ $id }}"  class="btn btn-success btn-sm cart-quentiy-plus" field="quantity">
                                                </form>
                                            </div>
                                            <a href="javascript:void(0)" class="delete-cart-item"data-id="{{ $id }}">
                                                <i class="icofont-trash cart-item-delete"></i>
                                            </a>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                        <div class="osahan-notifications bg-white border-bottom p-2">
                            <a href="javascript:void(0)" class="text-decoration-none text-dark">
                                <div class="notifiction small">
                                    <div class="ml-3">
                                        <h6 class="font-weight-bold mb-1">Total<span class="float-right">&#2547; {{ $totaPrice }}</span></h6>
                                        <h5 class="font-weight-bold mb-1">Total<span class="float-right">&#2547; {{ $totaPrice }}</span></h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <a href="{{ route('front.cart.details.index') }}" class="btn btn-block btn-success place-order-button">Place Your Order Now.</a>
                    @else
                    <div class="noproductincart">
                        <i class="icofont-dropbox"></i>
                        <h5>Your Cart Is Empty!</h5>
                    </div>
                    @endif
                </div>
            </div>


            @if(Auth::id())



                <div class="dropdown mr-3 show">
                    <a href="#" class="dropdown-toggle text-dark" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <img src="{{ config('app.placeholder') }}" class="img-fluid rounded-circle header-user mr-2"> Hi {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right top-profile-drop" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route('user.dashboard') }}"><i class="icofont-ui-user" style="margin-right: 5px;"></i>My account</a>
                        <a class="dropdown-item" href="promos.html"><i class="icofont-sale-discount" style="margin-right: 5px;"></i> Promos</a>
                        <a class="dropdown-item" href="my_address.html"><i class="icofont-address-book" style="margin-right: 5px;"></i> My address</a>
                        <a class="dropdown-item" href="terms_conditions.html"><i class="icofont-info-circle" style="margin-right: 5px;"></i> Terms &amp; conditions</a>
                        <a class="dropdown-item" href="help_support.html"><i class="icofont-phone-circle" style="margin-right: 5px;"></i> Help &amp; support</a>
                        <a class="dropdown-item" href="help_ticket.html"><i class="icofont-ticket" style="margin-right: 5px;"></i> Help ticket</a>
                        <a class="dropdown-item" href="javascript:void(0);"
                           onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();"><i class="icofont-logout" style="margin-right: 5px;"></i>Logout</a>

                        <form id="logout-form" action="{{ route('user.logout') }}" style="display: none" method="post">
                            @csrf
                        </form>
                    </div>
                </div>
            @else
                <a href="javascript:void(0)" data-toggle="modal" data-target="#login"
                   class="mr-2 text-dark bg-light rounded-pill p-2 icofont-size border shadow-sm">
                    <i class="icofont-login"></i>
                </a>
            @endif

        </div>
    </nav>
    <div class="bg-color-head">
        <div class="container menu-bar d-flex align-items-center">
            <ul class="list-unstyled form-inline mb-0">

                <li class="nav-item dropdown">
                    <a class="nav-link text-white dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Categories
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="listing.html">Listing</a>
                        <a class="dropdown-item" href="product_details.html">Detail</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="picks_today.html">Trending</a>
                        <a class="dropdown-item" href="recommend.html">Recommended</a>
                        <a class="dropdown-item" href="fresh_vegan.html">Most Popular</a>
                    </div>
                </li>

                <li class="nav-item active">
                    <a class="nav-link text-white pl-0" href="home.html">Featured Product<span
                            class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link text-white dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Checkout Process
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="cart.html">Cart</a>
                        <a class="dropdown-item" href="checkout.html">Checkout</a>
                        <a class="dropdown-item" href="successful.html">Successful</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link text-white dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        My Order
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="my_order.html">My order</a>
                        <a class="dropdown-item" href="status_complete.html">Status Complete</a>
                        <a class="dropdown-item" href="status_onprocess.html">Status on Process</a>
                        <a class="dropdown-item" href="status_canceled.html">Status Canceled</a>
                        <a class="dropdown-item" href="review.html">Review</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link text-white dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Extra Pages
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="verification.html">Verification</a>
                        <a class="dropdown-item" href="promos.html">Promos</a>
                        <a class="dropdown-item" href="promo_details.html">Promo Details</a>
                        <a class="dropdown-item" href="terms_conditions.html">Terms & Conditions</a>
                        <a class="dropdown-item" href="privacy.html">Privacy</a>
                        <a class="dropdown-item" href="terms%26conditions.html">Conditions</a>
                        <a class="dropdown-item" href="help_support.html">Help Support</a>
                        <a class="dropdown-item" href="help_ticket.html">Help Ticket</a>
                        <a class="dropdown-item" href="refund_payment.html">Refund Payment</a>
                        <a class="dropdown-item" href="faq.html">FAQ</a>
                        <a class="dropdown-item" href="signin.html">Sign In</a>
                        <a class="dropdown-item" href="signup.html">Sign Up</a>
                        <a class="dropdown-item" href="search.html">Search</a>
                    </div>
                </li>
            </ul>
            <div class="list-unstyled form-inline mb-0 ml-auto">
                <a href="picks_today.html" class="text-white px-3 py-2">Trending</a>
                <a href="promos.html" class="text-white bg-offer px-3 py-2"><i
                        class="icofont-sale-discount h6"></i>Promos</a>
            </div>
        </div>
    </div>
</div>

