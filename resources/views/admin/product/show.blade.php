@extends('layouts.admin.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/ecommerce.css') }}">
@endpush

@section('content')


    <div id="main-content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-9">
                    <div class="card">
                        <div class="body">
                            <div class="row">
                                <div class="preview col-lg-4 col-md-12">
                                    <div class="preview-pic tab-content">

{{--                                        <?php $i = 1; $product[] = null;?>--}}
{{--                                        @foreach($product->images as $image)--}}
{{--                                            @if ($i==1)--}}
{{--                                                <div class="tab-pane active" id="{{$image->id}}"><img src="{{ asset('storage/product/images') }}/{{ $image->image_name }}" class="img-fluid" ></div>--}}
{{--                                            @else--}}
{{--                                                <div class="tab-pane" id="{{$image->id}}"><img src="{{ asset('storage/product/images') }}/{{ $image->image_name }}" class="img-fluid"></div>--}}
{{--                                            @endif--}}
{{--                                                <?php $i++ ?>--}}
{{--                                        @endforeach--}}
                                    </div>
                                    <ul class="preview-thumbnail nav nav-tabs">
{{--                                        <?php $i=1 ?>--}}
{{--                                        @foreach($product->images as $image)--}}
{{--                                            @if ( $i == 1)--}}
{{--                                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#{{$image->id}}"><img src="{{ asset('storage/product/images') }}/{{ $image->image_name }}" class="img-fluid"></a></li>--}}
{{--                                            @else--}}
{{--                                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#{{$image->id}}"><img src="{{ asset('storage/product/images') }}/{{ $image->image_name }}" class="img-fluid"></a></li>--}}
{{--                                            @endif--}}
{{--                                                <?php $i++ ?>--}}
{{--                                        @endforeach--}}
                                    </ul>
                                </div>
                                <div class="details col-lg-8 col-md-12">
                                    <h3 class="product-title m-b-0">{{ $product->product_title }}</h3>
                                    <div class="rating">
                                        <div class="stars">
                                            <span class="icon-star text-warning"></span>
                                            <span class="icon-star text-warning"></span>
                                            <span class="icon-star text-warning"></span>
                                            <span class="icon-star text-warning"></span>
                                            <span class="icon-star text-muted"></span>
                                        </div>
                                        <span class="m-l-10">41 reviews</span>
                                    </div>
                                    <hr>
                                    <h5 class="price m-t-0">Current Price: <span class="text-warning">TK {{ $product->purchase_price }}</span></h5>
                                    <h5 class="price m-t-0">Old Price: <del class="text-warning">TK {{ $product->purchase_price }}</del> </h5>
                                    <p class="product-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                    <p class="vote"><strong>78%</strong> of buyers enjoyed this product! <strong>(23 votes)</strong></p>
                                    <h5 class="sizes">sizes:
                                        <span class="size" title="small">s</span>
                                        <span class="size" title="medium">m</span>
                                        <span class="size" title="large">l</span>
                                        <span class="size" title="xtra large">xl</span>
                                    </h5>
                                    <h5 class="colors">colors:
                                        <span class="color bg-warning not-available" title="Not In store"></span>
                                        <span class="color bg-success"></span>
                                        <span class="color bg-primary"></span>
                                    </h5>
{{--                                    <hr>--}}
{{--                                    <div class="action" >--}}


{{--                                        Publication Status:--}}
{{--                                        @if ($product->publication_status == 1)--}}
{{--                                            <a href="{{ route('app.product.unpublished', $product->id) }}" class="ml-2 btn text-white l-slategray"--}}
{{--                                            >Published</a>--}}
{{--                                        @else--}}
{{--                                        <a href="{{ route('app.product.published', $product->id) }}" class="ml-2 btn l-coral">Un Published</a>--}}
{{--                                        @endif--}}



{{--                                        Featured Status--}}
{{--                                        @if ($product->publication_status == 1)--}}
{{--                                            <a href="{{ route('app.product.published', $product->id) }}" class="btn text-white l-slategray">Published</a>--}}
{{--                                        @else--}}
{{--                                        <a href="" class="btn l-coral">Un Published</a>--}}
{{--                                        @endif--}}


{{--                                    </div>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="row">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">This Product All Tags</h5>
                                @foreach ($product->colors as $item)
                                    <span class="badge badge-danger mt-2">{{ $item->color }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="card">
                            <div class="card-body">
                                <h5>Product Category </h5>
                                {{ $product->category->name }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Thsi Product Sub Category Name </h5>
                                {{ $product->subCategory->name }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Thsi Product Sub Category Name </h5>
                                {{ $product->brand->name }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="card">
                    <div class="card-body">
                        {!! $product->short_description !!}
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        {!! $product->full_description !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')

@endpush
