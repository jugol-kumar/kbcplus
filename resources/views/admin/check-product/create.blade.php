@extends('layouts.admin.app')
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
@endpush

@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2>Add Product</h2>
                        </div>
                        <div class="body">
                            <form action="">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Product Title</label>
                                            <input type="text" name="title" placeholder="product title" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Product Price</label>
                                            <input type="text" name="title" placeholder="product title" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Product Desc</label>
                                            <input type="text" name="title" placeholder="product title" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <label for="">Product Size</label>
                                        <input type="text" name="title" placeholder="product title" class="form-control">
                                    </div>
                                    <div class="col">
                                        <label for="">Product Color</label>
                                        <input type="text" name="title" placeholder="product title" class="form-control">
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
@endsection
@push('js')
    <script src="{{ asset('assets/admin/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>
@endpush
