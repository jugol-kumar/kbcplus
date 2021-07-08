@extends('layouts.frontend.app')

@section('content')

    <div class="container-fluid mb-4">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('assets/frontend/img/slider/img1.jpg') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets/frontend/img/slider/img2.jpg') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets/frontend/img/slider/img3.jpg') }}" class="d-block w-100" alt="...">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <div class="py-3 osahan-promos">
        <div class="promo-slider pb-0 mb-0">
            <div class="osahan-slider-item mx-2">
                <a href="promo_details.html">
                    <img src="{{asset('assets/frontend/img/promo1.jpg')}}" class="img-fluid mx-auto rounded" alt="Responsive image">
                </a>
            </div>
            <div class="osahan-slider-item mx-2">
                <a href="promo_details.html">
                    <img src="{{asset('assets/frontend/img/promo2.jpg')}}" class="img-fluid mx-auto rounded" alt="Responsive image">
                </a>
            </div>
            <div class="osahan-slider-item mx-2">
                <a href="promo_details.html">
                    <img src="{{asset('assets/frontend/img/promo3.jpg')}}" class="img-fluid mx-auto rounded" alt="Responsive image">
                </a>
            </div>
            <div class="osahan-slider-item mx-2">
                <a href="promo_details.html">
                    <img src="{{asset('assets/frontend/img/promo4.jpg')}}" class="img-fluid mx-auto rounded" alt="Responsive image">
                </a>
            </div>
            <div class="osahan-slider-item mx-2">
                <a href="promo_details.html">
                    <img src="{{asset('assets/frontend/img/promo2.jpg')}}" class="img-fluid mx-auto rounded" alt="Responsive image">
                </a>
            </div>
            <div class="osahan-slider-item mx-2">
                <a href="promo_details.html">
                    <img src="{{asset('assets/frontend/img/promo3.jpg')}}" class="img-fluid mx-auto rounded" alt="Responsive image">
                </a>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="osahan-home-page">
                    <div class="osahan-body">
                        @include('layouts.frontend.pertial.category-nav')
                        <div class="py-3 osahan-promos">
                            <div class="d-flex align-items-center mb-3">
                                <h5 class="m-0">Promos for you</h5>
                                <a href="promos.html" class="ml-auto btn btn-outline-success btn-sm">See more</a>
                            </div>
                            <div class="promo-slider pb-0 mb-0">
                                <div class="osahan-slider-item mx-2">
                                    <a href="promo_details.html"><img src="{{asset('assets/frontend/img/promo1.jpg')}}"
                                                                      class="img-fluid mx-auto rounded" alt="Responsive image"></a>
                                </div>
                                <div class="osahan-slider-item mx-2">
                                    <a href="promo_details.html"><img src="{{asset('assets/frontend/img/promo2.jpg')}}"
                                                                      class="img-fluid mx-auto rounded" alt="Responsive image"></a>
                                </div>
                                <div class="osahan-slider-item mx-2">
                                    <a href="promo_details.html"><img src="{{asset('assets/frontend/img/promo3.jpg')}}"
                                                                      class="img-fluid mx-auto rounded" alt="Responsive image"></a>
                                </div>
                                <div class="osahan-slider-item mx-2">
                                    <a href="promo_details.html"><img src="{{asset('assets/frontend/img/promo4.jpg')}}"
                                                                      class="img-fluid mx-auto rounded" alt="Responsive image"></a>
                                </div>
                                <div class="osahan-slider-item mx-2">
                                    <a href="promo_details.html"><img src="{{asset('assets/frontend/img/promo2.jpg')}}"
                                                                      class="img-fluid mx-auto rounded" alt="Responsive image"></a>
                                </div>
                                <div class="osahan-slider-item mx-2">
                                    <a href="promo_details.html"><img src="{{asset('assets/frontend/img/promo3.jpg')}}"
                                                                      class="img-fluid mx-auto rounded" alt="Responsive image"></a>
                                </div>
                            </div>
                        </div>
                        <div class="title d-flex align-items-center py-3">
                            <h5 class="m-0">Pick's Today</h5>
                            <a class="ml-auto btn btn-outline-success btn-sm" href="picks_today.html">See more</a>
                        </div>
                        <div class="pick_today">
                            <div class="row">
                                <div class="col-6 col-md-3 mb-3">
                                    <div
                                        class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                                        <div class="list-card-image">
                                            <a href="product_details.html" class="text-dark">
                                                <div class="member-plan position-absolute"><span
                                                        class="badge m-3 badge-danger">10%</span></div>
                                                <div class="p-3">
                                                    <img src="{{asset('assets/frontend/img/listing/v1.jpg')}}"
                                                         class="img-fluid item-img w-100 mb-3">
                                                    <h6>Chilli</h6>
                                                    <div class="d-flex align-items-center">
                                                        <h6 class="price m-0 text-success">$0.8/kg</h6>
                                                        <a data-toggle="collapse" href="#collapseExample1"
                                                           role="button" aria-expanded="false"
                                                           aria-controls="collapseExample1"
                                                           class="btn btn-success btn-sm ml-auto">+</a>
                                                        <div class="collapse qty_show" id="collapseExample1">
                                                            <div>
                                                                    <span class="ml-auto" href="#">
                                                                        <form id='myform'
                                                                              class="cart-items-number d-flex"
                                                                              method='POST' action='#'>
                                                                            <input type='button' value='-'
                                                                                   class='qtyminus btn btn-success btn-sm'
                                                                                   field='quantity' />
                                                                            <input type='text' name='quantity' value='1'
                                                                                   class='qty form-control' />
                                                                            <input type='button' value='+'
                                                                                   class='qtyplus btn btn-success btn-sm'
                                                                                   field='quantity' />
                                                                        </form>
                                                                    </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3 mb-3">
                                    <div
                                        class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                                        <div class="list-card-image">
                                            <a href="product_details.html" class="text-dark">
                                                <div class="member-plan position-absolute"><span
                                                        class="badge m-3 badge-danger">5%</span></div>
                                                <div class="p-3">
                                                    <img src="{{asset('assets/frontend/img/listing/v2.jpg')}}"
                                                         class="img-fluid item-img w-100 mb-3">
                                                    <h6>Onion</h6>
                                                    <div class="d-flex align-items-center">
                                                        <h6 class="price m-0 text-success">$1.8/kg</h6>
                                                        <a data-toggle="collapse" href="#collapseExample2"
                                                           role="button" aria-expanded="false"
                                                           aria-controls="collapseExample2"
                                                           class="btn btn-success btn-sm ml-auto">+</a>
                                                        <div class="collapse qty_show" id="collapseExample2">
                                                            <div>
                                                                    <span class="ml-auto" href="#">
                                                                        <form id='myform'
                                                                              class="cart-items-number d-flex"
                                                                              method='POST' action='#'>
                                                                            <input type='button' value='-'
                                                                                   class='qtyminus btn btn-success btn-sm'
                                                                                   field='quantity' />
                                                                            <input type='text' name='quantity' value='1'
                                                                                   class='qty form-control' />
                                                                            <input type='button' value='+'
                                                                                   class='qtyplus btn btn-success btn-sm'
                                                                                   field='quantity' />
                                                                        </form>
                                                                    </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3 mb-3">
                                    <div
                                        class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                                        <div class="list-card-image">
                                            <a href="product_details.html" class="text-dark">
                                                <div class="member-plan position-absolute"><span
                                                        class="badge m-3 badge-success">10%</span></div>
                                                <div class="p-3">
                                                    <img src="{{asset('assets/frontend/img/listing/v5.jpg')}}"
                                                         class="img-fluid item-img w-100 mb-3">
                                                    <h6>Cauliflower</h6>
                                                    <div class="d-flex align-items-center">
                                                        <h6 class="price m-0 text-success">$1.8/kg</h6>
                                                        <a data-toggle="collapse" href="#collapseExample3"
                                                           role="button" aria-expanded="false"
                                                           aria-controls="collapseExample3"
                                                           class="btn btn-success btn-sm ml-auto">+</a>
                                                        <div class="collapse qty_show" id="collapseExample3">
                                                            <div>
                                                                    <span class="ml-auto" href="#">
                                                                        <form id='myform'
                                                                              class="cart-items-number d-flex"
                                                                              method='POST' action='#'>
                                                                            <input type='button' value='-'
                                                                                   class='qtyminus btn btn-success btn-sm'
                                                                                   field='quantity' />
                                                                            <input type='text' name='quantity' value='1'
                                                                                   class='qty form-control' />
                                                                            <input type='button' value='+'
                                                                                   class='qtyplus btn btn-success btn-sm'
                                                                                   field='quantity' />
                                                                        </form>
                                                                    </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3 mb-3">
                                    <div
                                        class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                                        <div class="list-card-image">
                                            <a href="product_details.html" class="text-dark">
                                                <div class="member-plan position-absolute"><span
                                                        class="badge m-3 badge-success">10%</span></div>
                                                <div class="p-3">
                                                    <img src="{{asset('assets/frontend/img/listing/v6.jpg')}}"
                                                         class="img-fluid item-img w-100 mb-3">
                                                    <h6>Carrot</h6>
                                                    <div class="d-flex align-items-center">
                                                        <h6 class="price m-0 text-success">$0.8/kg</h6>
                                                        <a data-toggle="collapse" href="#collapseExample4"
                                                           role="button" aria-expanded="false"
                                                           aria-controls="collapseExample4"
                                                           class="btn btn-success btn-sm ml-auto">+</a>
                                                        <div class="collapse qty_show" id="collapseExample4">
                                                            <div>
                                                                    <span class="ml-auto" href="#">
                                                                        <form id='myform'
                                                                              class="cart-items-number d-flex"
                                                                              method='POST' action='#'>
                                                                            <input type='button' value='-'
                                                                                   class='qtyminus btn btn-success btn-sm'
                                                                                   field='quantity' />
                                                                            <input type='text' name='quantity' value='1'
                                                                                   class='qty form-control' />
                                                                            <input type='button' value='+'
                                                                                   class='qtyplus btn btn-success btn-sm'
                                                                                   field='quantity' />
                                                                        </form>
                                                                    </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3 mb-3">
                                    <div
                                        class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                                        <div class="list-card-image">
                                            <a href="product_details.html" class="text-dark">
                                                <div class="member-plan position-absolute"><span
                                                        class="badge m-3 badge-warning">5%</span></div>
                                                <div class="p-3">
                                                    <img src="{{asset('assets/frontend/img/listing/v3.jpg')}}"
                                                         class="img-fluid item-img w-100 mb-3">
                                                    <h6>Tomato</h6>
                                                    <div class="d-flex align-items-center">
                                                        <h6 class="price m-0 text-success">$1/kg</h6>
                                                        <a class="ml-auto" href="#">
                                                            <form id='myform' class="cart-items-number d-flex"
                                                                  method='POST' action='#'>
                                                                <input type='button' value='-'
                                                                       class='qtyminus btn btn-success btn-sm'
                                                                       field='quantity' />
                                                                <input type='text' name='quantity' value='1'
                                                                       class='qty form-control' />
                                                                <input type='button' value='+'
                                                                       class='qtyplus btn btn-success btn-sm'
                                                                       field='quantity' />
                                                            </form>
                                                        </a>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3 mb-3">
                                    <div
                                        class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                                        <div class="list-card-image">
                                            <a href="product_details.html" class="text-dark">
                                                <div class="member-plan position-absolute"><span
                                                        class="badge m-3 badge-warning">15%</span></div>
                                                <div class="p-3">
                                                    <img src="{{asset('assets/frontend/img/listing/v4.jpg')}}"
                                                         class="img-fluid item-img w-100 mb-3">
                                                    <h6>Cabbage</h6>
                                                    <div class="d-flex align-items-center">
                                                        <h6 class="price m-0 text-success">$0.8/kg</h6>
                                                        <a data-toggle="collapse" href="#collapseExample5"
                                                           role="button" aria-expanded="false"
                                                           aria-controls="collapseExample5"
                                                           class="btn btn-success btn-sm ml-auto">+</a>
                                                        <div class="collapse qty_show" id="collapseExample5">
                                                            <div>
                                                                    <span class="ml-auto" href="#">
                                                                        <form id='myform'
                                                                              class="cart-items-number d-flex"
                                                                              method='POST' action='#'>
                                                                            <input type='button' value='-'
                                                                                   class='qtyminus btn btn-success btn-sm'
                                                                                   field='quantity' />
                                                                            <input type='text' name='quantity' value='1'
                                                                                   class='qty form-control' />
                                                                            <input type='button' value='+'
                                                                                   class='qtyplus btn btn-success btn-sm'
                                                                                   field='quantity' />
                                                                        </form>
                                                                    </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3 mb-3">
                                    <div
                                        class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                                        <div class="list-card-image">
                                            <a href="product_details.html" class="text-dark">
                                                <div class="member-plan position-absolute"><span
                                                        class="badge m-3 badge-danger">10%</span></div>
                                                <div class="p-3">
                                                    <img src="{{asset('assets/frontend/img/listing/v1.jpg')}}"
                                                         class="img-fluid item-img w-100 mb-3">
                                                    <h6>Chilli</h6>
                                                    <div class="d-flex align-items-center">
                                                        <h6 class="price m-0 text-success">$0.8/kg</h6>
                                                        <a data-toggle="collapse" href="#collapseExample6"
                                                           role="button" aria-expanded="false"
                                                           aria-controls="collapseExample6"
                                                           class="btn btn-success btn-sm ml-auto">+</a>
                                                        <div class="collapse qty_show" id="collapseExample6">
                                                            <div>
                                                                    <span class="ml-auto" href="#">
                                                                        <form id='myform'
                                                                              class="cart-items-number d-flex"
                                                                              method='POST' action='#'>
                                                                            <input type='button' value='-'
                                                                                   class='qtyminus btn btn-success btn-sm'
                                                                                   field='quantity' />
                                                                            <input type='text' name='quantity' value='1'
                                                                                   class='qty form-control' />
                                                                            <input type='button' value='+'
                                                                                   class='qtyplus btn btn-success btn-sm'
                                                                                   field='quantity' />
                                                                        </form>
                                                                    </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3 mb-3">
                                    <div
                                        class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                                        <div class="list-card-image">
                                            <a href="product_details.html" class="text-dark">
                                                <div class="member-plan position-absolute"><span
                                                        class="badge m-3 badge-danger">5%</span></div>
                                                <div class="p-3">
                                                    <img src="{{asset('assets/frontend/img/listing/v2.jpg')}}"
                                                         class="img-fluid item-img w-100 mb-3">
                                                    <h6>Onion</h6>
                                                    <div class="d-flex align-items-center">
                                                        <h6 class="price m-0 text-success">$1.8/kg</h6>
                                                        <a data-toggle="collapse" href="#collapseExample7"
                                                           role="button" aria-expanded="false"
                                                           aria-controls="collapseExample7"
                                                           class="btn btn-success btn-sm ml-auto">+</a>
                                                        <div class="collapse qty_show" id="collapseExample7">
                                                            <div>
                                                                    <span class="ml-auto" href="#">
                                                                        <form id='myform'
                                                                              class="cart-items-number d-flex"
                                                                              method='POST' action='#'>
                                                                            <input type='button' value='-'
                                                                                   class='qtyminus btn btn-success btn-sm'
                                                                                   field='quantity' />
                                                                            <input type='text' name='quantity' value='1'
                                                                                   class='qty form-control' />
                                                                            <input type='button' value='+'
                                                                                   class='qtyplus btn btn-success btn-sm'
                                                                                   field='quantity' />
                                                                        </form>
                                                                    </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="title d-flex align-items-center py-3">
                            <h5 class="m-0">Recommend for You</h5>
                            <a class="ml-auto btn btn-outline-success btn-sm" href="recommend.html">26 more</a>
                        </div>
                        <div class="osahan-recommend">
                            <div class="row">
                                <div class="col-12 col-md-4 mb-3">
                                    <a href="product_details.html" class="text-dark text-decoration-none">
                                        <div
                                            class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                                            <div class="recommend-slider2 rounded mb-0">
                                                <div class="osahan-slider-item m-2 rounded">
                                                    <img src="{{asset('assets/frontend/img/recommend/r1.jpg')}}"
                                                         class="img-fluid mx-auto rounded shadow-sm"
                                                         alt="Responsive image">
                                                </div>
                                                <div class="osahan-slider-item m-2 rounded">
                                                    <img src="{{asset('assets/frontend/img/recommend/r2.jpg')}}"
                                                         class="img-fluid mx-auto rounded shadow-sm"
                                                         alt="Responsive image">
                                                </div>
                                                <div class="osahan-slider-item m-2 rounded">
                                                    <img src="{{asset('assets/frontend/img/recommend/r3.jpg')}}"
                                                         class="img-fluid mx-auto rounded shadow-sm"
                                                         alt="Responsive image">
                                                </div>
                                            </div>
                                            <div class="p-3 position-relative">
                                                <h6 class="mb-1 font-weight-bold text-success">Fresh Orange
                                                </h6>
                                                <p class="text-muted">Orange Great Quality item from Jamaica.</p>
                                                <div class="d-flex align-items-center">
                                                    <h6 class="m-0">$8.8/kg</h6>
                                                    <a class="ml-auto" href="#">
                                                        <form id='myform' class="cart-items-number d-flex"
                                                              method='POST' action='#'>
                                                            <input type='button' value='-'
                                                                   class='qtyminus btn btn-success btn-sm'
                                                                   field='quantity' />
                                                            <input type='text' name='quantity' value='1'
                                                                   class='qty form-control' />
                                                            <input type='button' value='+'
                                                                   class='qtyplus btn btn-success btn-sm'
                                                                   field='quantity' />
                                                        </form>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-12 col-md-4 mb-3">
                                    <a href="product_details.html" class="text-dark text-decoration-none">
                                        <div
                                            class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                                            <div class="recommend-slider2 rounded mb-0">
                                                <div class="osahan-slider-item m-2">
                                                    <img src="{{asset('assets/frontend/img/recommend/r4.jpg')}}"
                                                         class="img-fluid mx-auto rounded shadow-sm"
                                                         alt="Responsive image">
                                                </div>
                                                <div class="osahan-slider-item m-2">
                                                    <img src="{{asset('assets/frontend/img/recommend/r5.jpg')}}"
                                                         class="img-fluid mx-auto rounded shadow-sm"
                                                         alt="Responsive image">
                                                </div>
                                                <div class="osahan-slider-item m-2">
                                                    <img src="{{asset('assets/frontend/img/recommend/r6.jpg')}}"
                                                         class="img-fluid mx-auto rounded shadow-sm"
                                                         alt="Responsive image">
                                                </div>
                                            </div>
                                            <div class="p-3 position-relative">
                                                <h6 class="mb-1 font-weight-bold text-success">Green Apple</h6>
                                                <p class="text-muted">Green Apple Premium item from Vietnam.</p>
                                                <div class="d-flex align-items-center">
                                                    <h6 class="m-0">$10.8/kg</h6>
                                                    <a class="ml-auto" href="#">
                                                        <form id='myform' class="cart-items-number d-flex"
                                                              method='POST' action='#'>
                                                            <input type='button' value='-'
                                                                   class='qtyminus btn btn-success btn-sm'
                                                                   field='quantity' />
                                                            <input type='text' name='quantity' value='1'
                                                                   class='qty form-control' />
                                                            <input type='button' value='+'
                                                                   class='qtyplus btn btn-success btn-sm'
                                                                   field='quantity' />
                                                        </form>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-12 col-md-4 mb-3">
                                    <a href="product_details.html" class="text-dark text-decoration-none">
                                        <div
                                            class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                                            <div class="recommend-slider2 rounded mb-0">
                                                <div class="osahan-slider-item m-2">
                                                    <img src="{{asset('assets/frontend/img/recommend/r7.jpg')}}"
                                                         class="img-fluid mx-auto rounded shadow-sm"
                                                         alt="Responsive image">
                                                </div>
                                                <div class="osahan-slider-item m-2">
                                                    <img src="{{asset('assets/frontend/img/recommend/r8.jpg')}}"
                                                         class="img-fluid mx-auto rounded shadow-sm"
                                                         alt="Responsive image">
                                                </div>
                                                <div class="osahan-slider-item m-2">
                                                    <img src="{{asset('assets/frontend/img/recommend/r9.jpg')}}"
                                                         class="img-fluid mx-auto rounded shadow-sm"
                                                         alt="Responsive image">
                                                </div>
                                            </div>
                                            <div class="p-3 position-relative">
                                                <h6 class="mb-1 font-weight-bold text-success">Fresh Apple
                                                </h6>
                                                <p class="text-muted">Fresh Apple Premium item from Thailand.</p>
                                                <div class="d-flex align-items-center">
                                                    <h6 class="m-0">$12.8/kg</h6>
                                                    <a class="ml-auto" href="#">
                                                        <form id='myform' class="cart-items-number d-flex"
                                                              method='POST' action='#'>
                                                            <input type='button' value='-'
                                                                   class='qtyminus btn btn-success btn-sm'
                                                                   field='quantity' />
                                                            <input type='text' name='quantity' value='1'
                                                                   class='qty form-control' />
                                                            <input type='button' value='+'
                                                                   class='qtyplus btn btn-success btn-sm'
                                                                   field='quantity' />
                                                        </form>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
