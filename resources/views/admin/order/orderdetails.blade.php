@extends('layouts.admin.app')
@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <div class="row mt-5">
                <div class="col-lg-4 col-md-12 align-center">
                    <h3>user Information</h3>
                    <div class="card profile-header">
                        <div class="body">
                            <div class="profile-image"> <img src="{{ asset('assets/admin/images/user.png') }}" class="rounded-circle" alt=""> </div>
                            <hr>
                            <div>
                                <h4 class="m-b-0"><strong>{{ $order->user->first_name }}</strong> {{ $order->user->last_name }}</h4>
                                <span>{{ $order->user->email }}</span><br>
                                <span>{{ $order->user->phone }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            user Full Details
                        </div>
                        <div class="card-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis facilis fugit magnam minus quos sunt! A aliquam, blanditiis harum mollitia odit quae saepe sint sunt? Aliquam deserunt laborum numquam repudiandae!</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h3>Shipping Details</h3>
                    <div class="card">
                       <div class="card-body">
                           <table class="table table-striped table-bordered">
                                <tr>
                                    <th>Phone Number</th>
                                    <td>{{ $order->address->phone }}</td>
                                </tr>
                                <tr>
                                    <th>Address Area</th>
                                    <td>{{ $order->address->delivery_address }}</td>
                                </tr>
                               <tr>
                                   <th>Division</th>
                                   <td>{{ $order->address->completed_address }}</td>
                               </tr>
                                <tr>
                                    <th>District</th>
                                    <td>{{ $order->address->delivery_option }}</td>
                                </tr>
                                <tr>
                                    <th>Full Address</th>
                                    <td>{{ $order->address->delivery_institutions }}</td>
                                </tr>
                           </table>
                       </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h3>Payment Details</h3>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <th>Payment Method</th>
                                            <th>Payment Status</th>
                                            <th>Payment Date</th>
                                        </thead>
                                        <tbody>
                                            <td>{{ $order->payment->payment_status }}</td>
                                            <td>{{ $order->payment->date }}</td>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Order Details
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered align-center table-striped">
                                <thead>
                                    <th>#SL</th>
                                    <th>Product Name</th>
                                    <th>Product Image</th>
                                    <th>Product Price</th>
                                    <th>Product Quantity</th>
                                    <th>Total Price</th>
                                </thead>
                                <tbody>
                                @php($subTotal = 0)
                                @foreach($order->orderDetails as $key => $odetail)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td><a href="javascript:void(0)">{{ str_limit($odetail->product_name, 25) }}</a></td>
                                        <td><img src="{{ asset('storage/product') }}/{{ $odetail->product_image }}"  class="rounded-circle" width="50" height="50" alt=""></td>
                                        <td>{{ $odetail->product_price }}</td>
                                        <td>{{ $odetail->product_quantity }}</td>
                                        <td>{{ $total = $odetail->product_price *  $odetail->product_quantity  }}</td>
                                        @php($subTotal = $subTotal + $total)
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 offset-md-8">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered borderless">
                                <tr>
                                    <td>Sub Total</td>
                                    <td>{{ $subTotal }}</td>
                                </tr>
                                <tr>
                                    <td>Tax ({{ $tax = config('cart.tax') }}%)</td>
                                    <td>{{$taxVal = ($subTotal * $tax)/100 }}</td>
                                </tr>
                                <tr>
                                    <td>Grand Total</td>
                                    <td>{{ $subTotal + $taxVal}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
