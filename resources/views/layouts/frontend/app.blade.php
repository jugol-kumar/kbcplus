<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from askbootstrap.com/preview/vegishop/home.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 16 Jun 2021 11:09:14 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="{{asset('assets/frontend/img/logo.png')}}">
    <title>Vegishop - Online Grocery Supermarket HTML Template</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/vendor/slick/slick.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/vendor/slick/slick-theme.min.css') }}" />

    <link href="{{asset('assets/frontend/vendor/icons/icofont.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/frontend/css/simpleSnackbar.min.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ asset('assets/frontend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/frontend/css/style.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/frontend/vendor/sidebar/demo.css') }}" rel="stylesheet">

    @stack('css')
</head>

<body class="fixed-bottom-padding">


    <div id="pagePreloder">
        <div>
            <div class="line line-1"></div>
            <div class="line line-2"></div>
            <div class="line line-3"></div>
            <div class="line line-4"></div>
            <div class="line line-5"></div>
        </div>
    </div>



    @include('layouts.frontend.pertial.header-top')

    <div class="theme-switch-wrapper">
        <label class="theme-switch" for="checkbox">
            <input type="checkbox" id="checkbox" />
            <div class="slider round"></div>
            <i class="icofont-moon"></i>
        </label>
        <em>Enable Dark Mode!</em>
    </div>


    @include('layouts.frontend.pertial.header')

    <nav aria-label="breadcrumb" class="breadcrumb mb-0 d-none">
        <div class="container">
            <ol class="d-flex align-items-center mb-0 p-0">
                <li class="breadcrumb-item"><a href="#" class="text-success">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"></li>
            </ol>
        </div>
    </nav>



    <section class="osahan-main-body">
        @yield('content')
    </section>



    <nav id="main-nav">
        <ul class="second-nav">
            <li><a href="home.html"><i class="icofont-smart-phone mr-2"></i> Home</a></li>
            <li>
                <a href="#"><i class="icofont-login mr-2"></i> Authentication</a>
                <ul>
                    <li><a class="dropdown-item" href="signin.html">Sign In</a></li>
                    <li><a class="dropdown-item" href="signup.html">Sign Up</a></li>
                    <li><a href="verification.html">Verification</a></li>
                </ul>
            </li>
            <li><a class="dropdown-item" href="listing.html">Listing</a></li>
            <li><a class="dropdown-item" href="product_details.html">Detail</a></li>
            <li><a class="dropdown-item" href="picks_today.html">Trending</a></li>
            <li><a class="dropdown-item" href="recommend.html">Recommended</a></li>
            <li><a class="dropdown-item" href="fresh_vegan.html">Most Popular</a></li>
            <li><a class="dropdown-item" href="cart.html">Cart</a></li>
            <li><a class="dropdown-item" href="checkout.html">Checkout</a></li>
            <li><a class="dropdown-item" href="successful.html">Successful</a></li>
            <li>
                <a href="#"><i class="icofont-sub-listing mr-2"></i> My Order</a>
                <ul>
                    <li><a class="dropdown-item" href="my_order.html">My order</a></li>
                    <li><a class="dropdown-item" href="status_complete.html">Status Complete</a></li>
                    <li><a class="dropdown-item" href="status_onprocess.html">Status on Process</a></li>
                    <li><a class="dropdown-item" href="status_canceled.html">Status Canceled</a></li>
                    <li><a class="dropdown-item" href="review.html">Review</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="icofont-ui-user mr-2"></i> My Account</a>
                <ul>
                    <li><a class="dropdown-item" href="my_account.html">My account</a></li>
                    <li><a class="dropdown-item" href="promos.html">Promos</a></li>
                    <li><a class="dropdown-item" href="my_address.html">My address</a></li>
                    <li><a class="dropdown-item" href="terms_conditions.html">Terms & conditions</a></li>
                    <li><a class="dropdown-item" href="help_support.html">Help & support</a></li>
                    <li><a class="dropdown-item" href="help_ticket.html">Help ticket</a></li>
                    <li><a class="dropdown-item" href="signin.html">Logout</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="icofont-page mr-2"></i> Pages</a>
                <ul>
                    <li><a class="dropdown-item" href="verification.html">Verification</a></li>
                    <li><a class="dropdown-item" href="promos.html">Promos</a></li>
                    <li><a class="dropdown-item" href="promo_details.html">Promo Details</a></li>
                    <li><a class="dropdown-item" href="terms_conditions.html">Terms & Conditions</a></li>
                    <li><a class="dropdown-item" href="privacy.html">Privacy</a></li>
                    <li><a class="dropdown-item" href="terms%26conditions.html">Conditions</a></li>
                    <li><a class="dropdown-item" href="help_support.html">Help Support</a></li>
                    <li><a class="dropdown-item" href="help_ticket.html">Help Ticket</a></li>
                    <li><a class="dropdown-item" href="refund_payment.html">Refund Payment</a></li>
                    <li><a class="dropdown-item" href="faq.html">FAQ</a></li>
                    <li><a class="dropdown-item" href="signin.html">Sign In</a></li>
                    <li><a class="dropdown-item" href="signup.html">Sign Up</a></li>
                    <li><a class="dropdown-item" href="search.html">Search</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="icofont-link mr-2"></i> Navigation Link Example</a>
                <ul>
                    <li>
                        <a href="#">Link Example 1</a>
                        <ul>
                            <li>
                                <a href="#">Link Example 1.1</a>
                                <ul>
                                    <li><a href="#">Link</a></li>
                                    <li><a href="#">Link</a></li>
                                    <li><a href="#">Link</a></li>
                                    <li><a href="#">Link</a></li>
                                    <li><a href="#">Link</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Link Example 1.2</a>
                                <ul>
                                    <li><a href="#">Link</a></li>
                                    <li><a href="#">Link</a></li>
                                    <li><a href="#">Link</a></li>
                                    <li><a href="#">Link</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#">Link Example 2</a></li>
                    <li><a href="#">Link Example 3</a></li>
                    <li><a href="#">Link Example 4</a></li>
                    <li data-nav-custom-content>
                        <div class="custom-message">
                            You can add any custom content to your navigation items. This text is just an example.
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
        <ul class="bottom-nav">
            <li class="email">
                <a class="text-success" href="home.html">
                    <p class="h5 m-0"><i class="icofont-home text-success"></i></p>
                    Home
                </a>
            </li>
            <li class="github">
                <a href="cart.html">
                    <p class="h5 m-0"><i class="icofont-cart"></i></p>
                    CART
                </a>
            </li>
            <li class="ko-fi">
                <a href="help_ticket.html">
                    <p class="h5 m-0"><i class="icofont-headphone"></i></p>
                    Help
                </a>
            </li>
        </ul>
    </nav>

    <section class="footer-bottom-search pt-5 pb-5 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <p class="text-black">POPULAR COUNTRIES</p>
                    <div class="search-links">
                        <a href="#">Australia</a> | <a href="#">Brasil</a> | <a href="#">Canada</a> | <a href="#">Chile</a> | <a href="#">Czech Republic</a> | <a href="#">India</a> | <a href="#">Indonesia</a> | <a href="#">Ireland</a> | <a href="#">New Zealand</a> | <a href="#">United Kingdom</a> | <a href="#">Turkey</a> | <a href="#">Philippines</a> | <a href="#">Sri Lanka</a> | <a href="#">Australia</a> | <a href="#">Brasil</a> | <a href="#">Canada</a> | <a href="#">Chile</a> | <a href="#">Czech Republic</a> | <a href="#">India</a> | <a href="#">Indonesia</a> | <a href="#">Ireland</a> | <a href="#">New Zealand</a> | <a href="#">United Kingdom</a> | <a href="#">Turkey</a> | <a href="#">Philippines</a> | <a href="#">Sri Lanka</a><a href="#">Australia</a> | <a href="#">Brasil</a> | <a href="#">Canada</a> | <a href="#">Chile</a> | <a href="#">Czech Republic</a> | <a href="#">India</a> | <a href="#">Indonesia</a> | <a href="#">Ireland</a> | <a href="#">New Zealand</a> | <a href="#">United Kingdom</a> | <a href="#">Turkey</a> | <a href="#">Philippines</a> | <a href="#">Sri Lanka</a> | <a href="#">Australia</a> | <a href="#">Brasil</a> | <a href="#">Canada</a> | <a href="#">Chile</a> | <a href="#">Czech Republic</a> | <a href="#">India</a> | <a href="#">Indonesia</a> | <a href="#">Ireland</a> | <a href="#">New Zealand</a> | <a href="#">United Kingdom</a> | <a href="#">Turkey</a> | <a href="#">Philippines</a> | <a href="#">Sri Lanka</a>
                    </div>
                    <p class="mt-4 text-black">POPULAR FOOD</p>
                    <div class="search-links">
                        <a href="#">Fast Food</a> | <a href="#">Chinese</a> | <a href="#">Street Food</a> | <a href="#">Continental</a> | <a href="#">Mithai</a> | <a href="#">Cafe</a> | <a href="#">South Indian</a> | <a href="#">Punjabi Food</a> | <a href="#">Fast Food</a> | <a href="#">Chinese</a> | <a href="#">Street Food</a> | <a href="#">Continental</a> | <a href="#">Mithai</a> | <a href="#">Cafe</a> | <a href="#">South Indian</a> | <a href="#">Punjabi Food</a><a href="#">Fast Food</a> | <a href="#">Chinese</a> | <a href="#">Street Food</a> | <a href="#">Continental</a> | <a href="#">Mithai</a> | <a href="#">Cafe</a> | <a href="#">South Indian</a> | <a href="#">Punjabi Food</a> | <a href="#">Fast Food</a> | <a href="#">Chinese</a> | <a href="#">Street Food</a> | <a href="#">Continental</a> | <a href="#">Mithai</a> | <a href="#">Cafe</a> | <a href="#">South Indian</a> | <a href="#">Punjabi Food</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="section-footer border-top bg-white">
        <section class="footer-top py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-inline">
                            <select class="custom-select mr-2">
                                <option>USD</option>
                                <option>EUR</option>
                                <option>RUBL</option>
                            </select>
                            <select class="custom-select">
                                <option>United States</option>
                                <option>Russia</option>
                                <option>Uzbekistan</option>
                            </select>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <form>
                            <div class="input-group">
                                <input type="text" placeholder="Email" class="form-control" name="">
                                <span class="input-group-append">
                                    <button type="submit" class="btn btn-success"> Subscribe</button>
                                </span>
                            </div>

                        </form>
                    </div>
                    <div class="col-md-4 text-md-right">
                        <a href="#" class="btn btn-icon btn-light"><i class="icofont-facebook"></i></a>
                        <a href="#" class="btn btn-icon btn-light"><i class="icofont-twitter"></i></a>
                        <a href="#" class="btn btn-icon btn-light"><i class="icofont-instagram"></i></a>
                        <a href="#" class="btn btn-icon btn-light"><i class="icofont-youtube"></i></a>
                    </div>
                </div>

            </div>

        </section>

        <section class="footer-main border-top pt-5 pb-4">
            <div class="container">
                <div class="row">
                    <aside class="col-md">
                        <h6 class="title">Products</h6>
                        <ul class="list-unstyled list-padding">
                            <li> <a href="listing.html" class="text-dark">Listing</a></li>
                            <li> <a href="product_details.html" class="text-dark">Detail</a></li>
                            <li> <a href="picks_today.html" class="text-dark">Trending</a></li>
                            <li> <a href="recommend.html" class="text-dark">Recommended</a></li>
                            <li> <a href="fresh_vegan.html" class="text-dark">Most Popular</a></li>
                        </ul>
                    </aside>
                    <aside class="col-md">
                        <h6 class="title">Checkout Process</h6>
                        <ul class="list-unstyled list-padding">
                            <li> <a href="cart.html" class="text-dark">Cart</a></li>
                            <li> <a href="cart.html" class="text-dark">Order Address</a></li>
                            <li> <a href="cart.html" class="text-dark">Delivery Time</a></li>
                            <li> <a href="cart.html" class="text-dark">Order Payment</a></li>
                            <li> <a href="checkout.html" class="text-dark">Checkout</a></li>
                            <li> <a href="successful.html" class="text-dark">Successful</a></li>
                        </ul>
                    </aside>
                    <aside class="col-md">
                        <h6 class="title">My Order</h6>
                        <ul class="list-unstyled list-padding">
                            <li> <a href="my_order.html" class="text-dark">My order</a></li>
                            <li> <a href="status_complete.html" class="text-dark">Status Complete</a></li>
                            <li> <a href="status_onprocess.html" class="text-dark">Status on Process</a></li>
                            <li> <a href="status_canceled.html" class="text-dark">Status Canceled</a></li>
                            <li> <a href="review.html" class="text-dark">Review</a></li>
                        </ul>
                    </aside>
                    <aside class="col-md">
                        <h6 class="title">My Account</h6>
                        <ul class="list-unstyled list-padding">
                            <li> <a class="text-dark" href="my_account.html"> My account</a></li>
                            <li> <a class="text-dark" href="promos.html"> Promos</a></li>
                            <li> <a class="text-dark" href="my_address.html"> My address</a></li>
                            <li> <a class="text-dark" href="terms_conditions.html"> Terms &amp; conditions</a></li>
                            <li> <a class="text-dark" href="help_support.html"> Help &amp; support</a></li>
                            <li> <a class="text-dark" href="help_ticket.html"> Help ticket</a></li>
                            <li> <a class="text-dark" href="signin.html"> Logout</a></li>
                        </ul>
                    </aside>
                    <aside class="col-md">
                        <h6 class="title">Extra Pages</h6>
                        <ul class="list-unstyled list-padding">
                            <li><a href="promo_details.html" class="text-dark"> Promo Details </a></li>
                            <li><a href="terms_conditions.html" class="text-dark"> Conditions </a></li>
                            <li><a href="help_support.html" class="text-dark"> Help Support </a></li>
                            <li><a href="refund_payment.html" class="text-dark"> Refund Payment </a></li>
                            <li><a href="faq.html" class="text-dark"> FAQ </a></li>
                            <li><a href="signin.html" class="text-dark"> Sign In </a></li>
                        </ul>
                    </aside>
                </div>

            </div>

        </section>

        <section class="footer-bottom border-top py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <span class="pr-2">© 2021 Vegishop</span>
                        <span class="pr-2"><a href="privacy.html" class="text-dark">Privacy</a></span>
                        <span class="pr-2"><a href="terms%26conditions.html" class="text-dark">Terms &
                                Conditions</a></span>
                    </div>
                    <div class="col-md-6 text-md-right">
                        <a href="#"><img src="{{asset('assets/frontend/img/appstore.png')}}" height="30"></a>
                        <a href="#"><img src="{{asset('assets/frontend/img/playmarket.png')}}" height="30"></a>
                    </div>
                </div>

            </div>

        </section>
        <div class="modal fade right-modal" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header p-0">
                        <nav class="schedule w-100">
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-link active col-5 py-4" id="nav-home-tab" data-toggle="tab"
                                    href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
                                    <p class="mb-0 font-weight-bold">Sign in</p>
                                </a>
                                <a class="nav-link col-5 py-4" id="nav-profile-tab" data-toggle="tab"
                                    href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">
                                    <p class="mb-0 font-weight-bold">Sign up</p>
                                </a>
                                <a class="nav-link col-2 p-0 d-flex align-items-center justify-content-center"
                                    data-dismiss="modal" aria-label="Close">
                                    <h1 class="m-0 h4 text-dark"><i class="icofont-close-line"></i></h1>
                                </a>
                            </div>
                        </nav>
                    </div>


                    <div class="modal-body p-0">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                aria-labelledby="nav-home-tab">
                                <div class="osahan-signin p-4 rounded">
                                    <div class="p-2">
                                        <h2 class="my-0">Welcome Back</h2>
                                        <p class="small mb-4">Sign in to Continue.</p>
                                        <form action="{{ route('login') }}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email</label>
                                                <input name="email" placeholder="Enter Email" type="email" class="form-control"
                                                    id="exampleInputEmail1" aria-describedby="emailHelp">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Password</label>
                                                <input name="password" placeholder="Enter Password" type="password" class="form-control"
                                                    id="exampleInputPassword1">
                                            </div>
                                            <button type="submit" class="btn btn-success btn-lg rounded btn-block">Sign
                                                in</button>
                                        </form>

                                        <p class="text-muted text-center small m-0 py-3">or</p>
                                        <a href="verification.html"
                                            class="btn btn-block rounded btn-lg text-white" style="background: #1877F2;">
                                            <i class="icofont-facebook mr-2"></i> Sign In with Facebook
                                        </a>
                                        <a href="verification.html"
                                            class="btn btn-light border btn-block rounded btn-lg btn-google">
                                            <i class="icofont-google-plus text-danger mr-2"></i> Sign In with Google
                                        </a>
                                        <p class="text-center mt-3 mb-0"><a href="signup.html" class="text-dark">Don't
                                                have an account? Sign up</a></p>
                                    </div>
                                </div>
                            </div>



                            <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                aria-labelledby="nav-profile-tab">
                                <div class="osahan-signup bg-white p-4">
                                    <div class="p-2">
                                        <h2 class="my-0">Let's get started</h2>
                                        <p class="small mb-4">Create account to see our top picks for you!</p>
                                        <form action="https://askbootstrap.com/preview/vegishop/verification.html">
                                            <div class="form-group">
                                                <label for="exampleInputName1">Name</label>
                                                <input placeholder="Enter Name" type="text" class="form-control"
                                                    id="exampleInputName1" aria-describedby="emailHelp">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputNumber1">Phone Number</label>
                                                <input placeholder="Enter Phone Number" type="number"
                                                    class="form-control" id="exampleInputNumber1"
                                                    aria-describedby="emailHelp">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email</label>
                                                <input placeholder="Enter Email" type="email" class="form-control"
                                                    id="exampleInputEmail1" aria-describedby="emailHelp">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Password</label>
                                                <input placeholder="Enter Password" type="password" class="form-control"
                                                    id="exampleInputPassword1">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword2">Confirmation Password</label>
                                                <input placeholder="Enter Confirmation Password" type="password"
                                                    class="form-control" id="exampleInputPassword2">
                                            </div>
                                            <button type="submit"
                                                class="btn btn-success rounded btn-lg btn-block">Create Account</button>
                                        </form>
                                        <p class="text-muted text-center small py-2 m-0">or</p>
                                        <a href="verification.html"
                                            class="btn btn-dark btn-block rounded btn-lg btn-apple">
                                            <i class="icofont-brand-apple mr-2"></i> Sign up with Apple
                                        </a>
                                        <a href="verification.html"
                                            class="btn btn-light border btn-block rounded btn-lg btn-google">
                                            <i class="icofont-google-plus text-danger mr-2"></i> Sign up with Google
                                        </a>
                                        <p class="text-center mt-3 mb-0"><a href="signin.html" class="text-dark">Already
                                                have an account! Sign in</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer p-0 border-0">
                        <div class="col-6 m-0 p-0">
                            <a href="#" class="btn border-top border-right btn-lg btn-block"
                                data-dismiss="modal">Close</a>
                        </div>
                        <div class="col-6 m-0 p-0">
                            <a href="help_support.html" class="btn border-top btn-lg btn-block">Help</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>


{{-- user login and registration droware page... --}}
<div>



{{--    <div class="modal fade right-modal" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"--}}
{{--         aria-hidden="true">--}}
{{--        <div class="modal-dialog modal-dialog-centered">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header p-0">--}}
{{--                    <nav class="schedule w-100">--}}
{{--                        <div class="nav nav-tabs" id="nav-tab" role="tablist">--}}
{{--                            <a class="nav-link active col-5 py-4" id="nav-home-tab" data-toggle="tab" href="#nav-home"--}}
{{--                               role="tab" aria-controls="nav-home" aria-selected="true">--}}
{{--                                <p class="mb-0 font-weight-bold">Sign in</p>--}}
{{--                            </a>--}}
{{--                            <a class="nav-link col-5 py-4" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"--}}
{{--                               role="tab" aria-controls="nav-profile" aria-selected="false">--}}
{{--                                <p class="mb-0 font-weight-bold">Sign up</p>--}}
{{--                            </a>--}}
{{--                            <a class="nav-link col-2 p-0 d-flex align-items-center justify-content-center"--}}
{{--                               data-dismiss="modal" aria-label="Close">--}}
{{--                                <h1 class="m-0 h4 text-dark"><i class="icofont-close-line"></i></h1>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </nav>--}}
{{--                </div>--}}
{{--                <div class="modal-body p-0">--}}
{{--                    <div class="tab-content" id="nav-tabContent">--}}
{{--                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"--}}
{{--                             aria-labelledby="nav-home-tab">--}}
{{--                            <div class="osahan-signin p-4 rounded">--}}
{{--                                <div class="p-2">--}}
{{--                                    <h2 class="my-0">Welcome Back</h2>--}}
{{--                                    <p class="small mb-4">Sign in to Continue.</p>--}}
{{--                                    <form action="https://askbootstrap.com/preview/vegishop/verification.html">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="exampleInputEmail1">Email</label>--}}
{{--                                            <input placeholder="Enter Email" type="email" class="form-control"--}}
{{--                                                   id="exampleInputEmail1" aria-describedby="emailHelp">--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="exampleInputPassword1">Password</label>--}}
{{--                                            <input placeholder="Enter Password" type="password" class="form-control"--}}
{{--                                                   id="exampleInputPassword1">--}}
{{--                                        </div>--}}
{{--                                        <button type="submit" class="btn btn-success btn-lg rounded btn-block">Sign--}}
{{--                                            in</button>--}}
{{--                                    </form>--}}
{{--                                    <p class="text-muted text-center small m-0 py-3">or</p>--}}
{{--                                    <a href="verification.html" class="btn btn-dark btn-block rounded btn-lg btn-apple">--}}
{{--                                        <i class="icofont-brand-apple mr-2"></i> Sign up with Apple--}}
{{--                                    </a>--}}
{{--                                    <a href="verification.html"--}}
{{--                                       class="btn btn-light border btn-block rounded btn-lg btn-google">--}}
{{--                                        <i class="icofont-google-plus text-danger mr-2"></i> Sign up with Google--}}
{{--                                    </a>--}}
{{--                                    <p class="text-center mt-3 mb-0"><a href="signup.html" class="text-dark">Don't have--}}
{{--                                            an account? Sign up</a></p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">--}}
{{--                            <div class="osahan-signup bg-white p-4">--}}
{{--                                <div class="p-2">--}}
{{--                                    <h2 class="my-0">Let's get started</h2>--}}
{{--                                    <p class="small mb-4">Create account to see our top picks for you!</p>--}}
{{--                                    <form action="https://askbootstrap.com/preview/vegishop/verification.html">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="exampleInputName1">Name</label>--}}
{{--                                            <input placeholder="Enter Name" type="text" class="form-control"--}}
{{--                                                   id="exampleInputName1" aria-describedby="emailHelp">--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="exampleInputNumber1">Phone Number</label>--}}
{{--                                            <input placeholder="Enter Phone Number" type="number" class="form-control"--}}
{{--                                                   id="exampleInputNumber1" aria-describedby="emailHelp">--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="exampleInputEmail1">Email</label>--}}
{{--                                            <input placeholder="Enter Email" type="email" class="form-control"--}}
{{--                                                   id="exampleInputEmail1" aria-describedby="emailHelp">--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="exampleInputPassword1">Password</label>--}}
{{--                                            <input placeholder="Enter Password" type="password" class="form-control"--}}
{{--                                                   id="exampleInputPassword1">--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="exampleInputPassword2">Confirmation Password</label>--}}
{{--                                            <input placeholder="Enter Confirmation Password" type="password"--}}
{{--                                                   class="form-control" id="exampleInputPassword2">--}}
{{--                                        </div>--}}
{{--                                        <button type="submit" class="btn btn-success rounded btn-lg btn-block">Create--}}
{{--                                            Account</button>--}}
{{--                                    </form>--}}
{{--                                    <p class="text-muted text-center small py-2 m-0">or</p>--}}
{{--                                    <a href="verification.html" class="btn btn-dark btn-block rounded btn-lg btn-apple">--}}
{{--                                        <i class="icofont-brand-apple mr-2"></i> Sign up with Apple--}}
{{--                                    </a>--}}
{{--                                    <a href="verification.html"--}}
{{--                                       class="btn btn-light border btn-block rounded btn-lg btn-google">--}}
{{--                                        <i class="icofont-google-plus text-danger mr-2"></i> Sign up with Google--}}
{{--                                    </a>--}}
{{--                                    <p class="text-center mt-3 mb-0"><a href="signin.html" class="text-dark">Already--}}
{{--                                            have an account! Sign in</a></p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="modal-footer p-0 border-0">--}}
{{--                    <div class="col-6 m-0 p-0">--}}
{{--                        <a href="#" class="btn border-top border-right btn-lg btn-block" data-dismiss="modal">Close</a>--}}
{{--                    </div>--}}
{{--                    <div class="col-6 m-0 p-0">--}}
{{--                        <a href="help_support.html" class="btn border-top btn-lg btn-block">Help</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}


</div>
{{-- user login and registration droware page... --}}


    <script src="{{ asset('assets/frontend/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/simpleSnackbar.min.js') }}" type="0efe8106ad88ff6124858db3-text/javascript"></script>

    <script src="{{ asset('assets/frontend/js/toaster.js') }}"></script>
    <script src="{{ asset('assets/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}" type="0efe8106ad88ff6124858db3-text/javascript"></script>
    <script type="0efe8106ad88ff6124858db3-text/javascript" src="{{ asset('assets/frontend/vendor/slick/slick.min.js') }}"></script>
    <script type="0efe8106ad88ff6124858db3-text/javascript" src="{{ asset('assets/frontend/vendor/sidebar/hc-offcanvas-nav.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/osahan.js') }}" type="0efe8106ad88ff6124858db3-text/javascript"></script>
    <script src="{{  asset('assets/frontend/vendor/slick/slick.min.js') }}"></script>
    <script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js"
        data-cf-settings="0efe8106ad88ff6124858db3-|49" defer=""></script>___scripts_6___


    <script>
        // $('body').addClass('d-none')
        // $('#wait').fadeIn('slow');

        $(document).ready(function (){
            setTimeout(function (){

                // $('#wait').fadeOut('slow');
                $('body').removeClass('d-none')
            }, 5000)
        });


        // cart quentity minus ajax request
        $('body').on('click', '.cart-quentiy-minus', function (e){
            e.preventDefault();
            var cartId = $(this).data('id');
            var quentity = $('#cartQuntityVal').val()
            $.ajax({
                url: '{{ route('front.update.cart.minus') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id:cartId,
                    qty: quentity,
                },
                success: function (res) {
                    console.log(res);
                    if (res.code == 420){
                        eTost(res.msg);
                    }
                    if (res.code == 200){
                        window.location.reload();
                        sTost(res.msg);
                    }
                }
            });



        });

        //cart quentity plus ajax request
        $('body').on('click', '.cart-quentiy-plus', function (e){
            e.preventDefault();
            var cartId = $(this).data('id');
            $.ajax({
                url: '{{ route('front.update.cart.plus') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id:cartId,
                },
                success: function (res) {
                    console.log(res);
                    if (res.code == 420){
                        eTost(res.msg);
                    }
                    if (res.code == 200){
                        window.location.reload();
                        sTost(res.msg);
                    }
                }
            });
        });

        //delete cart quentity ajax request
        $('body').on('click', '.delete-cart-item', function (e){
            e.preventDefault();
            var cartId = $(this).data('id');

            $.ajax({
                url: '{{ route('front.cart.delete.byId') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}',
                    id:cartId,
                },
                success: function (res) {
                    if (res.code == 200){
                        sTost(res.msg);
                        window.location.reload();
                    }else{
                        eTost('Something Is Wrong. Please Try Again..')
                    }
                }
            });

        });

        //destroy cart quentity ajax request
        $('#clearCartSession').on('click', function (e){
            e.preventDefault();
            var url = "{{ route('front.clear.cart.session') }}";
            $.ajax({
                url: url,
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}',
                },
                success: function (res) {
                    if (res.code == 200){
                        sTost(res.msg);
                        window.location.reload();
                    }else{
                        eTost('Something Is Wrong. Please Try Again..')
                    }
                }
            });
        });


    </script>
    @stack('js')
</body>

</html>
