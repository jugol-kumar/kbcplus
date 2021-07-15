@extends('layouts.frontend.app')
@section('content')


    <div id="wait" style="display:none;position:absolute;top:20%;left:50%;"><img src="{{ asset('assets/frontend/img/loder.gif') }}" /></div>
    <nav aria-label="breadcrumb" class="breadcrumb mb-0">
        <div class="container">
            <ol class="d-flex align-items-center mb-0 p-0">
                <li class="breadcrumb-item"><a href="{{ route('front.index') }}" class="text-success">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
            </ol>
        </div>
    </nav>

    <section class="py-4 osahan-main-body">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="osahan-listing">
                        <div class="d-flex align-items-center mb-3">
                            <h4>{{ $category->name }}</h4>
                            <div class="m-0 text-center ml-auto">
                                <a href="#" data-toggle="modal" data-target="#exampleModal"
                                   class="btn text-muted bg-white mr-2"><i class="icofont-filter mr-1"></i> Filter</a>
                                <a href="#" data-toggle="modal" data-target="#exampleModal" class="btn text-muted bg-white"><i
                                        class="icofont-signal mr-1"></i> Sort</a>
                            </div>
                        </div>
                        <div class="row">
{{--                            {{dd($category->products[0]->colors[0]->product)}}--}}
                                @forelse($category->products as $key=> $product)


                                <div class="col-6 col-md-2 mb-3">
                                    <div
                                        class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                                        <div class="list-card-image">
                                            <a href="{{ route('front.product.details', $product->slug) }}" class="text-dark">
                                                <div class="member-plan position-absolute"><span
                                                        class="badge m-3 badge-danger">{{ $product->product_discount }} {{ $product->discount_type == 0 ? '%' : 'TK'  }}</span></div>
                                                <div class="p-3" >
                                                    <?php
                                                    $length = $product->colors[0]->images->count()
                                                    ?>
                                                    @if($product->colors[0]->images->count() != 1)
                                                        <img src="{{asset('storage/product')}}/{{$product->colors[0]->images[rand(0, $length-1)]->image}}" class="img-fluid item-img w-100 mb-3" style="max-height: 175px;">
                                                    @else
                                                        <img src="{{ config('app.productImage')  }}"  class="img-fluid item-img w-100 mb-3" style="max-height: 175px; min-height: 175px;">
                                                    @endif

                                                    <p>{{  Str::limit($product->title, 25) }}</p>
                                                    <h6 class="price m-0 text-success">{{ $product->colors[0]->attributes[0]->price != null ? $product->colors[0]->attributes[0]->price : '00' }}/{{ $product->product_unit }}</h6>
                                                    <div class="d-flex align-items-center">
                                                        <a href="{{ route('front.product.details', $product->slug) }}" class="view-button">View Details</a>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                @php($colorLen = $product->colors->count())
                                 @if ($colorLen > 0)
                                     @for($i = 1; $i < $colorLen; $i++)
                                    <div class="col-6 col-md-2 mb-3">
                                        <div
                                            class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                                            <div class="list-card-image">
                                                <a href="{{ route('front.product.details', $product->colors[$i]->product->slug) }}" class="text-dark">
                                                    <div class="member-plan position-absolute"><span
                                                            class="badge m-3 badge-danger">{{ $product->colors[$i]->product->product_discount }} {{ $product->colors[$i]->product->discount_type == 0 ? '%' : 'TK'  }}</span></div>
                                                    <div class="p-3" >
                                                        <?php
                                                        $length = $product->colors[$i]->images->count()
                                                        ?>
                                                        @if($product->colors[$i]->images->count() != 1)
                                                            <img src="{{asset('storage/product')}}/{{$product->colors[$i]->images[rand(0, $length-1)]->image}}" class="img-fluid item-img w-100 mb-3" style="max-height: 175px; min-height:136px;">
                                                        @else
                                                            <img src="{{ config('app.productImage')  }}"  class="img-fluid item-img w-100 mb-3" style="max-height: 175px; min-height: 175px;">
                                                        @endif

                                                        <p>{{  Str::limit($product->colors[$i]->product->title, 25) }}</p>
                                                        <h6 class="price m-0 text-success">{{ $product->colors[$i]->attributes[0]->price != null ? $product->colors[$i]->attributes[0]->price : '00' }}/{{ $product->colors[$i]->product->product_unit }}</h6>
                                                        <div class="d-flex align-items-center">
                                                            <a href="{{ route('front.product.details', $product->colors[$i]->product->slug) }}" class="view-button">View Details</a>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    @endfor
                                @endif

                                @empty
                                    <div class="pb-3">
                                        <div class="col-9 product-category-notfound">
                                            <img class="" src="{{ asset('assets/frontend/img/user-page-empty.svg') }}" alt="" >
                                            <h3>No Product Founded {{ $category->name }} Category.</h3>
                                        </div>
                                    </div>
                                @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>









<div class="modal fade right-modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Filter</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-0">
                    <div class="osahan-filter">
                        <div class="filter">

                            <div class="p-3 bg-light border-bottom">
                                <h6 class="m-0">SORT BY</h6>
                            </div>
                            <div class="custom-control border-bottom px-0  custom-radio">
                                <input type="radio" id="customRadio1" name="location" class="custom-control-input" checked>
                                <label class="custom-control-label py-3 w-100 px-3" for="customRadio1">Top Rated</label>
                            </div>
                            <div class="custom-control border-bottom px-0  custom-radio">
                                <input type="radio" id="customRadio2" name="location" class="custom-control-input">
                                <label class="custom-control-label py-3 w-100 px-3" for="customRadio2">Nearest Me</label>
                            </div>
                            <div class="custom-control border-bottom px-0  custom-radio">
                                <input type="radio" id="customRadio3" name="location" class="custom-control-input">
                                <label class="custom-control-label py-3 w-100 px-3" for="customRadio3">Cost High to
                                    Low</label>
                            </div>
                            <div class="custom-control border-bottom px-0  custom-radio">
                                <input type="radio" id="customRadio4" name="location" class="custom-control-input">
                                <label class="custom-control-label py-3 w-100 px-3" for="customRadio4">Cost Low to
                                    High</label>
                            </div>
                            <div class="custom-control border-bottom px-0  custom-radio">
                                <input type="radio" id="customRadio5" name="location" class="custom-control-input">
                                <label class="custom-control-label py-3 w-100 px-3" for="customRadio5">Most Popular</label>
                            </div>

                            <div class="p-3 bg-light border-bottom">
                                <h6 class="m-0">FILTER</h6>
                            </div>
                            <div class="custom-control border-bottom px-0  custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="defaultCheck1" checked>
                                <label class="custom-control-label py-3 w-100 px-3" for="defaultCheck1">Open Now</label>
                            </div>
                            <div class="custom-control border-bottom px-0  custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="defaultCheck2">
                                <label class="custom-control-label py-3 w-100 px-3" for="defaultCheck2">Credit Cards</label>
                            </div>
                            <div class="custom-control border-bottom px-0  custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="defaultCheck3">
                                <label class="custom-control-label py-3 w-100 px-3" for="defaultCheck3">Alcohol
                                    Served</label>
                            </div>

                            <div class="p-3 bg-light border-bottom">
                                <h6 class="m-0">ADDITIONAL FILTERS</h6>
                            </div>
                            <div class="px-3 pt-3">
                                <input type="range" class="custom-range" min="0" max="100" name="">
                                <div class="form-row">
                                    <div class="form-group col-6">
                                        <label>Min</label>
                                        <input class="form-control" placeholder="$0" type="number">
                                    </div>
                                    <div class="form-group text-right col-6">
                                        <label>Max</label>
                                        <input class="form-control" placeholder="$1,0000" type="number">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer p-0 border-0">
                    <div class="col-6 m-0 p-0">
                        <button type="button" class="btn border-top btn-lg btn-block" data-dismiss="modal">Close</button>
                    </div>
                    <div class="col-6 m-0 p-0">
                        <button type="button" class="btn btn-success btn-lg btn-block">Apply</button>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
