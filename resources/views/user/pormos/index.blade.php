@extends('layouts.frontend.app')
@section('content')
    <div class="container">
        <div class="row">
            @include('user.user-sidebar.sidebar')
            <div class="col-lg-8 p-4 bg-white rounded shadow-sm">
        <div class="osahan-promos">
            <h4 class="mb-4 profile-title">Avaiable Promos</h4>

            @if(isset($promos))
                <div class="pb-3">
                    <a href="promo_details.html" class="text-decoration-none text-white my-3">
                        <div class="rounded bg-success shadow-sm p-3 text-white">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <div class="d-flex align-items-center">
                                        <img class="pp-osahan-logo" src="{{ asset('assets/frontend/img/logo.png')}}">
                                        <div class="brand ml-2">
                                            <h5 class="m-0">Grocery</h5>
                                        </div>
                                    </div>
                                    <div class="mt-2 mb-3">
                                        <p class="text-white m-0">BANANA'S 25% OFF</p>
                                    </div>
                                    <a href="promo_details.html" class="btn btn-outline-light btn-sm"><i
                                            class="icofont-sale-discount"></i> CHECK NOW</a>
                                </div>
                                <div class="col-3 text-center">
                                    <a href="promo_details.html"><img src="{{ asset('assets/frontend/img/promos/p1.png')}}" class="img-fluid"></a>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="pb-3">
                    <a href="promo_details.html" class="text-decoration-none text-white">
                        <div class="rounded bg-info shadow-sm p-3 text-white">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <div class="d-flex align-items-center">
                                        <img class="pp-osahan-logo" src="{{ asset('assets/frontend/img/logo.png')}}">
                                        <div class="brand ml-2">
                                            <h5 class="m-0">Grocery</h5>
                                        </div>
                                    </div>
                                    <div class="mt-2 mb-3">
                                        <p class="text-white m-0">FREE LETTUCE ON EVERY PURCHASE</p>
                                    </div>
                                    <a href="promo_details.html" class="btn btn-outline-light btn-sm"><i
                                            class="icofont-sale-discount"></i> CHECK NOW</a>
                                </div>
                                <div class="col-3 text-center">
                                    <a href="promo_details.html"><img src="{{ asset('assets/frontend/img/promos/p2.png')}}" class="img-fluid"></a>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="pb-3">
                <a href="promo_details.html" class="text-decoration-none text-white">
                    <div class="rounded bg-danger shadow-sm p-3 text-white">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <div class="d-flex align-items-center">
                                    <img class="pp-osahan-logo" src="{{ asset('assets/frontend/img/logo.png')}}">
                                    <div class="brand ml-2">
                                        <h5 class="m-0">Grocery</h5>
                                    </div>
                                </div>
                                <div class="mt-2 mb-3">
                                    <p class="text-white m-0">FREE DELIVERY ON BUY BREAD</p>
                                </div>
                                <a href="promo_details.html" class="btn btn-light btn-sm"><i
                                        class="icofont-sale-discount"></i> CHECK NOW</a>
                            </div>
                            <div class="col-3 text-center">
                                <a href="promo_details.html"><img src="{{ asset('assets/frontend/img/promos/p3.png')}}" class="img-fluid"></a>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @else
                <div class="pb-3">
                    <div class="col-9 user-profile-notfound">
                        <img class="" src="{{ asset('assets/frontend/img/user-page-empty.svg') }}" alt="" >
                        <h3>No Promos Founted</h3>
                    </div>
                </div>
            @endif
        </div>
    </div>
        </div>
    </div>
@endsection

