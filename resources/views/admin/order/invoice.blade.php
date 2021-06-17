@extends('layouts.admin.app')
@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Invoices</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item">Pages</li>
                            <li class="breadcrumb-item active">Invoices</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row clearfix">

                <div class="col-lg-12 col-md-12">
                    <div class="card invoice1">
                        <div class="body">
                            <div class="invoice-top clearfix">
                                <div class="logo">
                                    <img src="{{ asset('assets/admin/images/sm/avatar1.jpg') }}" alt="user" class="rounded-circle img-fluid">
                                </div>
                                <div class="info">
                                    <h6>{{ Auth::user()->name }}</h6>
                                    <p> {{ Auth::user()->email }} <br>
                                        289-335-6503
                                    </p>
                                </div>
                                <div class="title">
                                    <h4>Invoice #{{ rand(0000,9999) }}</h4>
                                    <p>Issued: May 27, 2018<br>
                                        Payment Due: June 27, 2018
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="invoice-mid clearfix">

                                <div class="clientlogo">
                                    <img src="{{ asset('assets/admin/images/sm/avatar2.jpg') }}" alt="user" class="rounded-circle img-fluid">
                                </div>

                                <div class="info">
                                    <h6>{{ $order->shipping->first_name }} {{ $order->shipping->last_name }}</h6>
                                    <p>{{ $order->shipping->email }}<br>
                                        {{ $order->shipping->phone }}</p>
                                    <h6>Project Description</h6>
                                    <p>{{ $order->shipping->full_address }}</p>
                                </div>

                            </div>
                            <div class="table-responsive">
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
                                            <td>{{ $odetail->product_name }}</td>
                                            <td><img src="{{ asset('storage/product/avatar') }}/{{ $odetail->product_image }}"  class="rounded-circle" width="50" height="50" alt=""></td>
                                            <td>{{ $odetail->product_price }}</td>
                                            <td>{{ $odetail->product_quantity }}</td>
                                            <td>{{ $total = $odetail->product_price *  $odetail->product_quantity  }}</td>
                                            @php($subTotal = $subTotal + $total)
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <hr>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <h5>Note</h5>
                                    <p>Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.</p>
                                </div>
                                <div class="col-md-6 text-right">
                                    <p class="m-b-0"><b>Sub-total:</b> {{ $subTotal }}</p>
                                    <p class="m-b-0">VAT:  ({{ $tax = config('cart.tax') }}%) {{$taxVal = ($subTotal * $tax)/100 }}</p>
                                    <h3 class="m-b-0 m-t-10">{{ $subTotal + $taxVal }}</h3>
                                </div>
                                <div class="hidden-print col-md-12 text-right">
                                    <hr>
                                    <button class="btn btn-outline-secondary"><i class="icon-printer"></i></button>
                                    <button class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
