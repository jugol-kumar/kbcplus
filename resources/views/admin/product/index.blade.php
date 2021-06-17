@extends('layouts.admin.app')
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/switch/switch.css') }}">
    <style>
        .btn-style{
            position: absolute;
            transform: translate3d(0px, 35px, 0px);
            top: 0px;
            left: 0px;
            will-change: transform
        }
        .bg-btn-color {
            box-shadow: 0px 0px 38px -14px #eceba7 inset !important;
        }
    </style>
@endpush
@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <div class="row mt-5 mt-5 clearfix">
                <div class="col-lg-12 ">
                    <h3 class="title float-left"><i class=" icon-pie-chart mr-2"></i>Product</h3>
                    <a href="{{ route('app.product.create') }}" class="btn l-amber btn-default float-right mb-3">
                        <i class="icon-plus mr-2"></i>Add New
                    </a>
                    <div class="card">
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-striped js-basic-example  table-custom">
                                    <thead>
                                    <tr>
                                        <th>Product Image</th>
                                        <th  style="width: 5px;">Product Title</th>
                                        <th>Product Quantity</th>
                                        <th>Publication Status</th>
                                        <th>Featured Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Product Image</th>
                                        <th style="width: 5px;">Product Title</th>
                                        <th>Product Quantity</th>
                                        <th>Publication Status</th>
                                        <th>Featured Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($products as $product)
                                            <tr>
                                                <td><img src="{{ asset('storage/product/avatar') }}/{{ $product->avatar }}" class="rounded-circle" width="50" height="50" alt=""></td>
                                                <td style="width:5px;">{{ $product->product_title }}</td>
                                                <td>{{ $product->purchase_price }}</td>
                                                <td>
                                                    <label class="label">
                                                        <div class="toggle">
                                                            <input data-id="{{ $product->id }}" class="toggle-state publication_status" type="checkbox" id="allCheck"
                                                                   {{ $product->publication_status == 1 ? 'checked' : '' }}
                                                                   name="featured_status"/>
                                                            <div class="indicator"></div>
                                                        </div>
                                                        <div class="label-text">Product Featured</div>
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="label">
                                                        <div class="toggle">
                                                            <input class="toggle-state" type="checkbox" id="allCheck"

                                                                   {{ $product->publication_status == 1 ? 'checked' : '' }}
                                                                   name="featured_status"/>
                                                            <div class="indicator"></div>
                                                        </div>
                                                        <div class="label-text">Featured</div>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Action
                                                        </button>
                                                        <div class="dropdown-menu bg-btn-color" aria-labelledby="btnGroupDrop1" x-placement="bottom-start">
                                                            <a class="dropdown-item" href="{{ route('app.product.show', $product->id) }}"><i class="icon-paper-plane mr-2"></i> View Product</a>
                                                            <a class="dropdown-item" href="{{ route('app.product-att-form', $product->id) }}"><i class="icon-settings mr-2"></i> Product Setting</a>
                                                            <a class="dropdown-item" href="{{ route('app.product.edit', $product->id) }}"><i class="icon-social-dribbble mr-2"></i> Edit Product</a>
                                                            <a class="dropdown-item" onclick="showCancelMessage({{ $product->id }}); event.preventDefault();"><i class="icon-trash mr-2"></i> Delete Product</a>
                                                            <form id="delete-data-{{ $product->id }}" action="{{ route('app.product.destroy', $product->id) }}" enctype="multipart/form-data" method="post" style="display: none;">
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
    <script src="{{ asset('assets/admin/vendor/select2/select2.min.js') }}"></script>
    <script>
        $("#max-select").select2({
            placeholder: "~~Select Category~~",
        });

        $('.publication_status').change(function (){
            var status = $(this).prop('checked') == true ? 1 : 0;
            var id = $(this).data('id');
            $.ajax({
                url: '{{ route('app.product.published') }}',
                method: 'GET',
                dataType: 'JSON',
                data: { 'status':status, 'id': id},
                success:function (data){

                    if(data.publication_status == 1){
                        swal({
                            position: 'top-end',
                            type: 'success',
                            title: 'Successful',
                            text:'Product Published Successfully Done',
                            showConfirmButton: true,
                        });
                    }else{
                        swal({
                            position: 'top-end',
                            type: 'success',
                            title: 'Successful',
                            text:'Product Unpublished Successfully Done',
                            showConfirmButton: true,
                        });
                    }

                }
            })
        });



    </script>
@endpush




