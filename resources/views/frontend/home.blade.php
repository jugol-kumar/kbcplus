@extends('layouts.frontend.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <ul class="list-unstyled main-category-section">
                    @foreach($categories as $key => $cat)
                        <li><a href="{{ route('front.category.product', $cat->id) }}"><i class="{{ $cat->icon_class }} mr-2"></i>{{$cat->name}} <i class="icofont-arrow-right float-right"></i></a></li>
                    @endforeach
                </ul>
            </div>




            <div class="col-md-8">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('assets/frontend/img/image1.jpg') }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('assets/frontend/img/picfor.webp') }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('assets/frontend/img/2189.jpg') }}" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                <div class="your-class mt-2">
                    <div class="col-sm-12 col-md-6 mr-1">
                        <div class="main-card-section bg-awat">
                            <h5>Lorem ipsum dolor</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        </div>
                    </div>
                    <div class="col-sm-12  col-md-6 mr-1">
                        <div class="main-card-section bg-danger">
                            <h5>Lorem ipsum dolor</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        </div>
                    </div>
                    <div class="col-sm-12  col-md-6 mr-1">
                        <div class="main-card-section bg-dark">
                            <h5>Lorem ipsum dolor</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 mr-1">
                        <div class="main-card-section bg-warning">
                            <h5>Lorem ipsum dolor</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 mr-1">
                        <div class="main-card-section bg-info">
                            <h5>Lorem ipsum dolor</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





<div>
{{--    <div class="py-3 osahan-promos">--}}
{{--        <div class="promo-slider pb-0 mb-0">--}}
{{--            <div class="osahan-slider-item mx-2">--}}
{{--                <a href="promo_details.html">--}}
{{--                    <img src="{{asset('assets/frontend/img/promo1.jpg')}}" class="img-fluid mx-auto rounded" alt="Responsive image">--}}
{{--                </a>--}}
{{--            </div>--}}
{{--            <div class="osahan-slider-item mx-2">--}}
{{--                <a href="promo_details.html">--}}
{{--                    <img src="{{asset('assets/frontend/img/promo2.jpg')}}" class="img-fluid mx-auto rounded" alt="Responsive image">--}}
{{--                </a>--}}
{{--            </div>--}}
{{--            <div class="osahan-slider-item mx-2">--}}
{{--                <a href="promo_details.html">--}}
{{--                    <img src="{{asset('assets/frontend/img/promo3.jpg')}}" class="img-fluid mx-auto rounded" alt="Responsive image">--}}
{{--                </a>--}}
{{--            </div>--}}
{{--            <div class="osahan-slider-item mx-2">--}}
{{--                <a href="promo_details.html">--}}
{{--                    <img src="{{asset('assets/frontend/img/promo4.jpg')}}" class="img-fluid mx-auto rounded" alt="Responsive image">--}}
{{--                </a>--}}
{{--            </div>--}}
{{--            <div class="osahan-slider-item mx-2">--}}
{{--                <a href="promo_details.html">--}}
{{--                    <img src="{{asset('assets/frontend/img/promo2.jpg')}}" class="img-fluid mx-auto rounded" alt="Responsive image">--}}
{{--                </a>--}}
{{--            </div>--}}
{{--            <div class="osahan-slider-item mx-2">--}}
{{--                <a href="promo_details.html">--}}
{{--                    <img src="{{asset('assets/frontend/img/promo3.jpg')}}" class="img-fluid mx-auto rounded" alt="Responsive image">--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
</div>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="osahan-home-page">
                    <div class="osahan-body">
                        @include('layouts.frontend.pertial.category-nav')
                        <div class="py-3 osahan-promos">
                            <div class="d-flex align-items-center mb-3">
                                <h5 class="m-0">Promos for you</h5>
                                <a href="promos.html" class="ml-auto btn btn-outline-success btn-sm">See more</a>
                            </div>
                            <div class="promo-slider pb-0 mb-0">
                                <div class="osahan-slider-item mx-2">
                                    <a href="promo_details.html"><img src="{{asset('assets/frontend/img/promo1.jpg')}}"
                                                                      class="img-fluid mx-auto rounded" alt="Responsive image"></a>
                                </div>
                                <div class="osahan-slider-item mx-2">
                                    <a href="promo_details.html"><img src="{{asset('assets/frontend/img/promo2.jpg')}}"
                                                                      class="img-fluid mx-auto rounded" alt="Responsive image"></a>
                                </div>
                                <div class="osahan-slider-item mx-2">
                                    <a href="promo_details.html"><img src="{{asset('assets/frontend/img/promo3.jpg')}}"
                                                                      class="img-fluid mx-auto rounded" alt="Responsive image"></a>
                                </div>
                                <div class="osahan-slider-item mx-2">
                                    <a href="promo_details.html"><img src="{{asset('assets/frontend/img/promo4.jpg')}}"
                                                                      class="img-fluid mx-auto rounded" alt="Responsive image"></a>
                                </div>
                                <div class="osahan-slider-item mx-2">
                                    <a href="promo_details.html"><img src="{{asset('assets/frontend/img/promo2.jpg')}}"
                                                                      class="img-fluid mx-auto rounded" alt="Responsive image"></a>
                                </div>
                                <div class="osahan-slider-item mx-2">
                                    <a href="promo_details.html"><img src="{{asset('assets/frontend/img/promo3.jpg')}}"
                                                                      class="img-fluid mx-auto rounded" alt="Responsive image"></a>
                                </div>
                            </div>
                        </div>



                        <div class="title d-flex align-items-center py-3">
                            <h5 class="m-0">Pick's Today</h5>
                            <a class="ml-auto btn btn-outline-success btn-sm" href="picks_today.html">{{ $products->count() }} more</a>
                        </div>
                        <div class="pick_today">
                            <div class="row">
                                @foreach($products as $product)
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
                                                        <img src="{{asset('storage/product')}}/{{$product->colors[0]->images[rand(0, $length-1)]->image}}" class="img-fluid item-img w-100 mb-3" style="max-height: 175px;min-height:136px;">
                                                    @else
                                                        <img src="{{ config('app.productImage')  }}"  class="img-fluid item-img w-100 mb-3" style="max-height: 175px; min-height: 175px;">
                                                    @endif

                                                    <p>{{  Str::limit($product->title, 25) }}</p>


                                                    <h6 class="price m-0 text-success">{{ $product->colors[0]->attributes[0]->price != null ? $product->colors[0]->attributes[0]->price : '00' }}/{{ $product->product_unit }}</h6>
                                                    <div class="d-flex align-items-center">
                                                        <a href="javascript:void(0)" id="addToCart" data-id="{{ $product->colors[0]->attributes[0]->id }}" data-color="{{ $product->colors[0]->id }}" class="view-button">Add To Cart
                                                        </a>
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
                                                                    <img src="{{asset('storage/product')}}/{{$product->colors[$i]->images[rand(0, $length-1)]->image}}" class="img-fluid item-img w-100 mb-3" style="max-height: 175px;">
                                                                @else
                                                                    <img src="{{ config('app.productImage')  }}"  class="img-fluid item-img w-100 mb-3" style="max-height: 175px; min-height: 175px;">
                                                                @endif

                                                                <p>{{  Str::limit($product->colors[$i]->product->title, 25) }}</p>
                                                                <h6 class="price m-0 text-success">{{ $product->colors[$i]->attributes[0]->price != null ? $product->colors[$i]->attributes[0]->price : '00' }}/{{ $product->colors[$i]->product->product_unit }}</h6>
                                                                <div class="d-flex align-items-center">
{{--                                                                    <a href="{{ route('front.product.details', $product->colors[$i]->product->slug) }}" class="view-button">View Details</a>--}}

                                                                    <a href="javascript:void(0)" id="addToCart" data-id="{{ $product->colors[$i]->attributes[0]->id }}" data-color="{{ $product->colors[$i]->id }}" class="view-button">Add To Cart
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endfor
                                    @endif
                                @endforeach
                            </div>
                        </div>




                        <div class="title d-flex align-items-center py-3">
                            <h5 class="m-0">Recommend for You</h5>
                            <a class="ml-auto btn btn-outline-success btn-sm" href="recommend.html">26 more</a>
                        </div>
                        <div class="osahan-recommend">
                            <div class="row">
                                <div class="col-12 col-md-4 mb-3">
                                    <a href="product_details.html" class="text-dark text-decoration-none">
                                        <div
                                            class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                                            <div class="recommend-slider2 rounded mb-0">
                                                <div class="osahan-slider-item m-2 rounded">
                                                    <img src="{{asset('assets/frontend/img/recommend/r1.jpg')}}"
                                                         class="img-fluid mx-auto rounded shadow-sm"
                                                         alt="Responsive image">
                                                </div>
                                                <div class="osahan-slider-item m-2 rounded">
                                                    <img src="{{asset('assets/frontend/img/recommend/r2.jpg')}}"
                                                         class="img-fluid mx-auto rounded shadow-sm"
                                                         alt="Responsive image">
                                                </div>
                                                <div class="osahan-slider-item m-2 rounded">
                                                    <img src="{{asset('assets/frontend/img/recommend/r3.jpg')}}"
                                                         class="img-fluid mx-auto rounded shadow-sm"
                                                         alt="Responsive image">
                                                </div>
                                            </div>
                                            <div class="p-3 position-relative">
                                                <h6 class="mb-1 font-weight-bold text-success">Fresh Orange
                                                </h6>
                                                <p class="text-muted">Orange Great Quality item from Jamaica.</p>
                                                <div class="d-flex align-items-center">
                                                    <h6 class="m-0">$8.8/kg</h6>
                                                    <a class="ml-auto" href="#">
                                                        <form id='myform' class="cart-items-number d-flex"
                                                              method='POST' action='#'>
                                                            <input type='button' value='-'
                                                                   class='qtyminus btn btn-success btn-sm'
                                                                   field='quantity' />
                                                            <input type='text' name='quantity' value='1'
                                                                   class='qty form-control' />
                                                            <input type='button' value='+'
                                                                   class='qtyplus btn btn-success btn-sm'
                                                                   field='quantity' />
                                                        </form>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-12 col-md-4 mb-3">
                                    <a href="product_details.html" class="text-dark text-decoration-none">
                                        <div
                                            class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                                            <div class="recommend-slider2 rounded mb-0">
                                                <div class="osahan-slider-item m-2">
                                                    <img src="{{asset('assets/frontend/img/recommend/r4.jpg')}}"
                                                         class="img-fluid mx-auto rounded shadow-sm"
                                                         alt="Responsive image">
                                                </div>
                                                <div class="osahan-slider-item m-2">
                                                    <img src="{{asset('assets/frontend/img/recommend/r5.jpg')}}"
                                                         class="img-fluid mx-auto rounded shadow-sm"
                                                         alt="Responsive image">
                                                </div>
                                                <div class="osahan-slider-item m-2">
                                                    <img src="{{asset('assets/frontend/img/recommend/r6.jpg')}}"
                                                         class="img-fluid mx-auto rounded shadow-sm"
                                                         alt="Responsive image">
                                                </div>
                                            </div>
                                            <div class="p-3 position-relative">
                                                <h6 class="mb-1 font-weight-bold text-success">Green Apple</h6>
                                                <p class="text-muted">Green Apple Premium item from Vietnam.</p>
                                                <div class="d-flex align-items-center">
                                                    <h6 class="m-0">$10.8/kg</h6>
                                                    <a class="ml-auto" href="#">
                                                        <form id='myform' class="cart-items-number d-flex"
                                                              method='POST' action='#'>
                                                            <input type='button' value='-'
                                                                   class='qtyminus btn btn-success btn-sm'
                                                                   field='quantity' />
                                                            <input type='text' name='quantity' value='1'
                                                                   class='qty form-control' />
                                                            <input type='button' value='+'
                                                                   class='qtyplus btn btn-success btn-sm'
                                                                   field='quantity' />
                                                        </form>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-12 col-md-4 mb-3">
                                    <a href="product_details.html" class="text-dark text-decoration-none">
                                        <div
                                            class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                                            <div class="recommend-slider2 rounded mb-0">
                                                <div class="osahan-slider-item m-2">
                                                    <img src="{{asset('assets/frontend/img/recommend/r7.jpg')}}"
                                                         class="img-fluid mx-auto rounded shadow-sm"
                                                         alt="Responsive image">
                                                </div>
                                                <div class="osahan-slider-item m-2">
                                                    <img src="{{asset('assets/frontend/img/recommend/r8.jpg')}}"
                                                         class="img-fluid mx-auto rounded shadow-sm"
                                                         alt="Responsive image">
                                                </div>
                                                <div class="osahan-slider-item m-2">
                                                    <img src="{{asset('assets/frontend/img/recommend/r9.jpg')}}"
                                                         class="img-fluid mx-auto rounded shadow-sm"
                                                         alt="Responsive image">
                                                </div>
                                            </div>
                                            <div class="p-3 position-relative">
                                                <h6 class="mb-1 font-weight-bold text-success">Fresh Apple
                                                </h6>
                                                <p class="text-muted">Fresh Apple Premium item from Thailand.</p>
                                                <div class="d-flex align-items-center">
                                                    <h6 class="m-0">$12.8/kg</h6>
                                                    <a class="ml-auto" href="#">
                                                        <form id='myform' class="cart-items-number d-flex"
                                                              method='POST' action='#'>
                                                            <input type='button' value='-'
                                                                   class='qtyminus btn btn-success btn-sm'
                                                                   field='quantity' />
                                                            <input type='text' name='quantity' value='1'
                                                                   class='qty form-control' />
                                                            <input type='button' value='+'
                                                                   class='qtyplus btn btn-success btn-sm'
                                                                   field='quantity' />
                                                        </form>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{ asset('assets/frontend/js/simpleSnackbar.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/toaster.js') }}"></script>
    @if(Session::has('msg'))
        <script>
            sTost('{{Session::get('msg')}}')
        </script>
        {{--        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('msg') }}</p>--}}
    @endif
    @if(Session::has('error'))
        <script>
            eTost('{{Session::get('error')}}')
        </script>
        {{--        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('msg') }}</p>--}}
    @endif

    <script>
        $(document).ready(function(){
            $('.your-class').slick({
                dots: false,
                infinite: true,
                autoplay: true,
                autoplaySpeed: 2000,
                slidesToShow: 2,
            });
        });
    </script>
    <script>


        function callAjax(data, token){
            // console.log(data);
            $.ajax({
                url:`{{route('front.add.to.cart')}}`,
                data:{pro_id: '{{$product->id}}',data, _token:'{{ csrf_token() }}'},
                type:"POST",
                success:function (res){
                    if (res.code == 210){
                        eTost(res.msg);
                        // location.reload();
                    }else if(res.code == 200){
                        sTost(res.msg);
                        location.reload();
                    }else{
                        eTost('Somthing Is Wrong. Please Try Again...');
                    }
                }
            })
        }



        $('body').on('click', '#addToCart', function (){
            var nullColorId = null;
            var attrId = $(this).data('id');

            var pro_id = `{{ $product->id }}`;
            var color = true;
            var color_id = $(this).data('color')

            var size_id = $("input[name='sizes']:checked").data('id')
            var size = $('#colorSize .sizeClass').hasClass('hasSize');


            var quentity = $('input[name="quantity"]').val();

            if (color==true && size==true){
                if (color_id != null && size_id != null){
                    // alert(`ajax call with size and color id.. Color id:${color_id} and Size Id: ${size_id}`)
                    let data = {color_id:color_id, size_id:size_id, qty:quentity, attr_id:attrId};
                    callAjax(data);
                }
                else{
                    if(color_id == null){
                        wTost('Have your size now select yoru color...');
                    }else if(size_id == null){
                        wTost('Have your Color Now Select Your Size...');
                    }else{
                        wTost('Select Color And Size....');
                    }
                }
            }

            else if(color && size==false){
                if (color_id != null ){
                    // alert('ajax call with color id. color id is:'+ color_id);
                    let data = {color_id:color_id, size_id:'null', qty:quentity, attr_id:attrId};
                    callAjax(data);
                }else{
                    wTost('please select color...')
                }
            }

            else if(size && color==false){
                if (size_id != null){
                    // alert('ajax call with size id. size id is: '+size_id)
                    let data = {color_id:nullColorId, size_id:size_id, qty:quentity, attr_id:attrId};
                    callAjax(data);
                    // console.log(size_id);
                }else{
                    wTost('Please Chose Size First...');
                }
            }
            else{
                let data = {color_id:nullColorId, size_id:'null', qty:quentity, attr_id:attrId};
                callAjax(data);
                // alert('call ajax without color and size ok');
            }
        })

    </script>

@endpush
