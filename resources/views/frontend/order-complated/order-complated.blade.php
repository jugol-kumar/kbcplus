@extends('layouts.frontend.app')

@section('content')

    <nav aria-label="breadcrumb" class="breadcrumb mb-0">
        <div class="container">
            <ol class="d-flex align-items-center mb-0 p-0">
                <li class="breadcrumb-item"><a href="#" class="text-success">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Successful</li>
            </ol>
        </div>
    </nav>

    <div class="row d-flex justify-content-center" style="background: linear-gradient(to left, #f3a4bfe6, #f7bb97, #82e7d4)">
        <div class="col-md-6">
            <div class="p-5 text-center">
                <i class="icofont-check-circled display-1 text-warning"></i>
                <h1 class="text-white font-weight-bold">Osahan, Your order has been successful 🎉</h1>
                <p class="text-white">Check your order status in <a
                        href="https://askbootstrap.com/design/features-of-zomato-online-food-order-delivery-app/"
                        class="font-weight-bold text-decoration-none text-white">My Order</a> about next steps information.
                </p>
            </div>

            <div class="bg-white rounded p-3 m-5 text-center">
                <h6 class="font-weight-bold mb-2">Preparing your order</h6>
                <p class="small text-muted">Your order will be prepared and will come soon</p>
                <a href="status_onprocess.html" class="btn rounded btn-warning btn-lg btn-block">Track My Order</a>
            </div>
        </div>
    </div>



@endsection
