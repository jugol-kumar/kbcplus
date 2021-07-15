@extends('layouts.admin.app')
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/switch/switch.css') }}">
@endpush
@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <div class="row mt-5 mt-5 clearfix">
                <div class="col-lg-12 ">
                    <h3 class="title float-left"><i class="icon-basket mr-2"></i>Manage Order</h3>
                    <div class="card">
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-striped js-basic-example  table-custom">
                                    <thead>
                                        <tr>
                                            <th>#Id</th>
                                            <th>Customer Name</th>
                                            <th>Customer Phone</th>
                                            <th>Order Total</th>
                                            <th>Payment Method</th>
                                            <th>Payment Status</th>
                                            <th>Order Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#Id</th>
                                            <th>Customer Name</th>
                                            <th>Customer Phone</th>
                                            <th>Order Total</th>
                                            <th>Payment Method</th>
                                            <th>Payment Status</th>
                                            <th>Order Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach ($orders as $key=> $order)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $order->user->email }}</td>
                                            <td>{{ $order->user->phone }}</td>
                                            <td>{{ $order->total }}</td>
                                            <td>
                                                <span class="btn g-limeade">Cash On Delivery</span>
                                            </td>
                                            <td>
                                                <span class="badge badge-info">Pending</span>
                                            </td>
                                            <td>
                                                <span class="badge badge-warning">Pending</span>
                                            </td>

                                            <td>
                                                <div class="btn-group" role="group">
                                                    <button id="btnGroupDrop1" type="button" class="btn l-green dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Action
                                                    </button>
                                                    <div class="dropdown-menu bg-btn-color" aria-labelledby="btnGroupDrop1" x-placement="bottom-start">
                                                        <a class="dropdown-item" href="{{ route('app.showOrder', $order->id) }}"><i class="icon-paper-plane mr-2"></i>View Order</a>
                                                        <a class="dropdown-item" href="{{ route('app.createInvoice', $order->id) }}"><i class="icon-settings mr-2"></i>Create Invoice</a>
                                                        @if ($order->payment_status == 'unpaid')
                                                            <a class="dropdown-item" href="{{ route('app.approvedPayment', $order->id) }}"><i class="icon-arrow-up mr-2"></i>Approved Payment</a>
                                                        @endif
                                                        @if ($order->order_status == 'pending')
                                                            <a class="dropdown-item" href="{{ route('app.approvedOrder', $order->id) }}"><i class="icon-arrow-up mr-2"></i>Approved Order</a>
                                                        @endif
                                                        <a class="dropdown-item" onclick="showCancelMessage({{ $order->id }}); event.preventDefault();"><i class="icon-trash mr-2"></i> Delete Order</a>
                                                        <form id="delete-data-{{ $order->id }}" action="{{ route('app.product.destroy', $order->id) }}" enctype="multipart/form-data" method="post" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')


@endpush
