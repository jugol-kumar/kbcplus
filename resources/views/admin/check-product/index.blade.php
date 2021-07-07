@extends('layouts.admin.app')
@push('css')
@endpush
@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <div class="row mt-5 mt-5 clearfix">
                <div class="col-lg-12 ">
                    <h3 class="title float-left"><i class=" icon-pie-chart mr-2"></i>Product Variation</h3>
                    <a href="{{ route('app.check.create') }}" class="btn l-amber btn-default float-right mb-3">
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




