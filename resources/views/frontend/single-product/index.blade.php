@extends('layouts.frontend.app')
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/product-details-slider.css') }}">
@endpush
@section('content')
    <div class="container">
        @if(isset($colorImage))
            {{ $colorImage }}
        @endif

        <div class="row">
            <div class="col-lg-6 imageAppen">
{{--                <div class="recommend-slider mb-3 appenSliderFiest" >--}}
{{--                    @if($product->colors[0]->images->count() > 0)--}}
{{--                        @foreach($product->colors[0]->images as $img)--}}
{{--                            <div class="osahan-slider-item">--}}
{{--                                <img src="{{asset('storage/product')}}/{{ $img->image }}" class="img-fluid mx-auto shadow-sm rounded" alt="Responsive image">--}}
{{--                            </div>--}}
{{--                        @endforeach--}}
{{--                    @endif--}}
{{--                </div>--}}


{{--                <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">--}}
{{--                    <div class="carousel-inner">--}}
{{--                        <div class="carousel-item active">--}}
{{--                            <img src="{{ asset('storage/product/1625782912247.png') }}" class="d-block w-100" alt="...">--}}
{{--                        </div>--}}
{{--                        <div class="carousel-item">--}}
{{--                            <img src="{{ asset('storage/product/1625782912409.png') }}" class="d-block w-100" alt="...">--}}
{{--                        </div>--}}
{{--                        <div class="carousel-item">--}}
{{--                            <img src="{{ asset('storage/product/1625782912178.png') }}" class="d-block w-100" alt="...">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}







                <div class = "product-imgs">
                    <div class = "img-display">
                        <div class = "img-showcase zoomClass">
                            @if($product->colors[0]->images->count() > 0)
                                @foreach($product->colors[0]->images as $img)
                                    @if($img->image != null)
                                        <img src = "{{ asset('storage/product') }}/{{ $img->image }}"  class="img-fluid" alt = "shoe image">
                                    @else
                                        <img src = "{{ config('app.productImage')  }}"  class="img-fluid" alt = "shoe image">
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class = "img-select">
                        @if($product->colors[0]->images->count() > 0)
                            @foreach($product->colors[0]->images as $key=> $img)
                                @if($img->image != null)
                                    <div class = "img-item">
                                        <a href = "javascript:void(0)" data-id = "{{ $key+1 }}">
                                            <img src = "{{ asset('storage/product') }}/{{ $img->image }}" alt = "shoe image">
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>




                <div class="pd-f d-flex align-items-center mb-3">
                    <a href="cart.html"
                       class="btn btn-warning p-3 rounded btn-block d-flex align-items-center justify-content-center mr-3 btn-lg"><i
                            class="icofont-plus m-0 mr-2"></i> ADD TO CART</a>
                    <a href="cart.html"
                       class="btn btn-success p-3 rounded btn-block d-flex align-items-center justify-content-center btn-lg m-0"><i
                            class="icofont-cart m-0 mr-2"></i> BUY NOW</a>
                </div>
            </div>


            <div class="col-lg-6">
                <div class="p-4 bg-white rounded shadow-sm">
                    <div class="pt-0">
                        <h5 class="d-inline mr-2">Product Id:</h5><span class="badge" style="background-color: rgb(0 255 73 / 36%);">{{ $product->product_id }}</span>
                        <h2 class="font-weight-bold titleChange">{{ $product->title }}  <span></span></h2>
                        <p class="font-weight-light text-dark m-0 d-flex align-items-center">
                            Product MRP : <b class="h6 text-dark m-0" id="sizeByPrice">{{ $product->colors[0]->attributes[0]->price }} Tk</b>
                            <span class="badge badge-danger ml-2">{{ $product->product_discount }}{{ $product->discount_type == 0 ? '%' : 'TK' }} OFF</span>
                        </p>
                        <a href="review.html">
                            <div class="rating-wrap d-flex align-items-center mt-2">
                                <ul class="rating-stars list-unstyled">
                                    <li>
                                        <i class="icofont-star text-warning"></i>
                                        <i class="icofont-star text-warning"></i>
                                        <i class="icofont-star text-warning"></i>
                                        <i class="icofont-star text-warning"></i>
                                        <i class="icofont-star"></i>
                                    </li>
                                </ul>
                                <p class="label-rating text-muted ml-2 small"> (245 Reviews)</p>
                            </div>
                        </a>
                    </div>
                    <div class="pt-2">
                        <div class="row">
                            <div class="col-6">
                                <p class="font-weight-bold m-0">Delivery</p>
                                <p class="text-muted m-0">Free</p>
                            </div>
                            <div class="col-6 text-right">
                                <p class="font-weight-bold m-0">Available in:</p> <span id="checkQuentity" class="{{ $product->colors[0]->attributes[0]->qty > 0 ? 'text-warning' : 'text-danger' }}">{{ $product->colors[0]->attributes[0]->qty > 0 ? 'IN STOKE' : 'OUT OF STOKE' }}</span>

                                <p class="font-weight-bold mt-3 mb-0">Product Sku:</p> <span class="badge" id="checkSque" style="color: #464040;background-color: rgb(255 156 78 / 60%);">{{ $product->colors[0]->attributes[0]->sku}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="details">
                        <div id="noHavecolor">
                            <h6>Available Color</h6>
                            <div class="pb-3 bg-white">
                                <div class="d-flex align-items-center">
                                    <div class="btn-group osahan-radio btn-group-toggle" data-toggle="buttons" id="color">
                                        @if($product->colors->count())
                                            @foreach($product->colors as $color)
                                                @if($color->color != 'null')
                                                    <label class="btn btn-secondary" style="background-color: {{ $color->color }} ;width: 25px;height: 25px;">
                                                        <input class="color" type="radio" name="options" id="option1" value="{{$color->id}}">
                                                    </label>
                                                @else
                                                    <script>
                                                        if ({{ $color->color == 'null' }}){
                                                            document.getElementById('noHavecolor').style.display = "none"
                                                        }
                                                    </script>
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="NoAvalableSize">
                            <h6>Available Size</h6>
                            <div class="bg-white">
                                <div class="d-flex align-items-center">
                                    <div class="btn-group osahan-radio btn-group-toggle" id="colorSize" data-toggle="buttons">
                                        @if($product->colors->count())
                                            @foreach($product->colors[0]->attributes as $attr)
                                                @if($attr->size != null)
                                                    <label class="btn btn-secondary">{{ $attr->size }}
                                                        <input class="size" type="radio" name="options" data-id="{{ $attr->id }}" id="option1">
                                                    </label>
                                                @else
                                                    <script>
                                                        if ({{ $attr->size == null }}){
                                                            document.getElementById('NoAvalableSize').style.display = "none"
                                                        }
                                                    </script>
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>



                        <div class="bg-white mt-2">
                            <div class="d-flex align-items-center">
                                <a class="ml-auto" href="#">
                                    <form id='myform' class="cart-items-number d-flex" method='POST' action='#'>
                                        <input type='button' value='-' class='qtyminus btn btn-success btn-sm'
                                               field='quantity'/>
                                        <input type='text' name='quantity' value='1' class='qty form-control'/>
                                        <input type='button' value='+' class='qtyplus btn btn-success btn-sm'
                                               field='quantity'/>
                                    </form>
                                </a>
                            </div>
                        </div>


                        <div class="pt-3">
                            <div class="input-group mb-3 border rounded shadow-sm overflow-hidden bg-white">
                                <div class="input-group-prepend">
                                    <button class="border-0 btn btn-outline-secondary text-success bg-white"><i
                                            class="icofont-search"></i></button>
                                </div>
                                <input type="text" class="shadow-none border-0 form-control form-control-lg pl-0"
                                       placeholder="Type your city (e.g Chennai, Pune)" aria-label=""
                                       aria-describedby="basic-addon1">
                            </div>
                            <p class="font-weight-bold mb-2">Product Details</p>
                            <p class="text-muted small mb-0">High quality Fresh Orange fruit exporters from South Korea
                                for sale. All citrus trees belong to the single genus Citrus and remain almost entirely
                                interfertile. This includes grapefruits, lemons, limes, oranges, and various other types
                                and hybrids. The fruit of any citrus tree is considered a hesperidium, a kind of
                                modified berry; it is covered by a rind wall.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


            <div class="row">
                <div class="col-lg-12">
                    {!! $product->short_description !!}
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    {!! $product->details !!}
                </div>
            </div>


        <h5 class="mt-3 mb-3">Maybe You Like this.</h5>
        <div class="row">
            <div class="col-sm-3 col-md-3 mb-3">
                <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                    <div class="list-card-image">
                        <a href="product_details.html" class="text-dark">
                            <div class="member-plan position-absolute"><span class="badge m-3 badge-danger">10%</span>
                            </div>
                            <div class="p-3">
                                <img src="{{asset('assets/frontend/img/listing/v1.jpg')}}"
                                     class="img-fluid item-img w-100 mb-3">
                                <h6>Chilli</h6>
                                <div class="d-flex align-items-center">
                                    <h6 class="price m-0 text-success">$0.8/kg</h6>
                                    <a data-toggle="collapse" href="#collapseExample1" role="button"
                                       aria-expanded="false" aria-controls="collapseExample1"
                                       class="btn btn-success btn-sm ml-auto">+</a>
                                    <div class="collapse qty_show" id="collapseExample1">
                                        <div>
<span class="ml-auto" href="#">
<form id='myform' class="cart-items-number d-flex" method='POST' action='#'>
<input type='button' value='-' class='qtyminus btn btn-success btn-sm' field='quantity'/>
<input type='text' name='quantity' value='1' class='qty form-control'/>
<input type='button' value='+' class='qtyplus btn btn-success btn-sm' field='quantity'/>
</form>
</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 col-md-3 mb-3">
                <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                    <div class="list-card-image">
                        <a href="product_details.html" class="text-dark">
                            <div class="member-plan position-absolute"><span class="badge m-3 badge-danger">5%</span>
                            </div>
                            <div class="p-3">
                                <img src="{{asset('assets/frontend/img/listing/v2.jpg')}}"
                                     class="img-fluid item-img w-100 mb-3">
                                <h6>Onion</h6>
                                <div class="d-flex align-items-center">
                                    <h6 class="price m-0 text-success">$1.8/kg</h6>
                                    <a data-toggle="collapse" href="#collapseExample2" role="button"
                                       aria-expanded="false" aria-controls="collapseExample2"
                                       class="btn btn-success btn-sm ml-auto">+</a>
                                    <div class="collapse qty_show" id="collapseExample2">
                                        <div>
<span class="ml-auto" href="#">
<form id='myform' class="cart-items-number d-flex" method='POST' action='#'>
<input type='button' value='-' class='qtyminus btn btn-success btn-sm' field='quantity'/>
<input type='text' name='quantity' value='1' class='qty form-control'/>
<input type='button' value='+' class='qtyplus btn btn-success btn-sm' field='quantity'/>
</form>
</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 col-md-3 mb-3">
                <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                    <div class="list-card-image">
                        <a href="product_details.html" class="text-dark">
                            <div class="member-plan position-absolute"><span class="badge m-3 badge-warning">5%</span>
                            </div>
                            <div class="p-3">
                                <img src="{{asset('assets/frontend/img/listing/v3.jpg')}}"
                                     class="img-fluid item-img w-100 mb-3">
                                <h6>Tomato</h6>
                                <div class="d-flex align-items-center">
                                    <h6 class="price m-0 text-success">$1/kg</h6>
                                    <a class="ml-auto" href="#">
                                        <form id='myform' class="cart-items-number d-flex" method='POST' action='#'>
                                            <input type='button' value='-' class='qtyminus btn btn-success btn-sm'
                                                   field='quantity'/>
                                            <input type='text' name='quantity' value='1' class='qty form-control'/>
                                            <input type='button' value='+' class='qtyplus btn btn-success btn-sm'
                                                   field='quantity'/>
                                        </form>
                                    </a>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 col-md-3 mb-3">
                <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                    <div class="list-card-image">
                        <a href="product_details.html" class="text-dark">
                            <div class="member-plan position-absolute"><span class="badge m-3 badge-warning">15%</span>
                            </div>
                            <div class="p-3">
                                <img src="{{asset('assets/frontend/img/listing/v4.jpg')}}"
                                     class="img-fluid item-img w-100 mb-3">
                                <h6>Cabbage</h6>
                                <div class="d-flex align-items-center">
                                    <h6 class="price m-0 text-success">$0.8/kg</h6>
                                    <a data-toggle="collapse" href="#collapseExample3" role="button"
                                       aria-expanded="false" aria-controls="collapseExample3"
                                       class="btn btn-success btn-sm ml-auto">+</a>
                                    <div class="collapse qty_show" id="collapseExample3">
                                        <div>
<span class="ml-auto" href="#">
<form id='myform' class="cart-items-number d-flex" method='POST' action='#'>
<input type='button' value='-' class='qtyminus btn btn-success btn-sm' field='quantity'/>
<input type='text' name='quantity' value='1' class='qty form-control'/>
<input type='button' value='+' class='qtyplus btn btn-success btn-sm' field='quantity'/>
</form>
</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3 col-md-3 mb-3">
                <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                    <div class="list-card-image">
                        <a href="product_details.html" class="text-dark">
                            <div class="member-plan position-absolute"><span class="badge m-3 badge-success">10%</span>
                            </div>
                            <div class="p-3">
                                <img src="{{asset('assets/frontend/img/listing/v5.jpg')}}"
                                     class="img-fluid item-img w-100 mb-3">
                                <h6>Cauliflower</h6>
                                <div class="d-flex align-items-center">
                                    <h6 class="price m-0 text-success">$1.8/kg</h6>
                                    <a data-toggle="collapse" href="#collapseExample4" role="button"
                                       aria-expanded="false" aria-controls="collapseExample4"
                                       class="btn btn-success btn-sm ml-auto">+</a>
                                    <div class="collapse qty_show" id="collapseExample4">
                                        <div>
                                            <span class="ml-auto" href="#">
                                            <form id='myform' class="cart-items-number d-flex" method='POST' action='#'>
                                            <input type='button' value='-' class='qtyminus btn btn-success btn-sm' field='quantity'/>
                                            <input type='text' name='quantity' value='1' class='qty form-control'/>
                                            <input type='button' value='+' class='qtyplus btn btn-success btn-sm' field='quantity'/>
                                            </form>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 col-md-3 mb-3">
                <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                    <div class="list-card-image">
                        <a href="product_details.html" class="text-dark">
                            <div class="member-plan position-absolute"><span class="badge m-3 badge-success">10%</span>
                            </div>
                            <div class="p-3">
                                <img src="{{asset('assets/frontend/img/listing/v6.jpg')}}"
                                     class="img-fluid item-img w-100 mb-3">
                                <h6>Carrot</h6>
                                <div class="d-flex align-items-center">
                                    <h6 class="price m-0 text-success">$0.8/kg</h6>
                                    <a data-toggle="collapse" href="#collapseExample5" role="button"
                                       aria-expanded="false" aria-controls="collapseExample5"
                                       class="btn btn-success btn-sm ml-auto">+</a>
                                    <div class="collapse qty_show" id="collapseExample5">
                                        <div>
                                            <span class="ml-auto" href="#">
                                            <form id='myform' class="cart-items-number d-flex" method='POST' action='#'>
                                            <input type='button' value='-' class='qtyminus btn btn-success btn-sm' field='quantity'/>
                                            <input type='text' name='quantity' value='1' class='qty form-control'/>
                                            <input type='button' value='+' class='qtyplus btn btn-success btn-sm' field='quantity'/>
                                            </form>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 col-md-3 mb-3">
                <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                    <div class="list-card-image">
                        <a href="product_details.html" class="text-dark">
                            <div class="member-plan position-absolute"><span class="badge m-3 badge-danger">10%</span>
                            </div>
                            <div class="p-3">
                                <img src="{{asset('assets/frontend/img/listing/v7.jpg')}}"
                                     class="img-fluid item-img w-100 mb-3">
                                <h6>Star Anise</h6>
                                <div class="d-flex align-items-center">
                                    <h6 class="price m-0 text-success">$2.5/kg</h6>
                                    <a data-toggle="collapse" href="#collapseExample6" role="button"
                                       aria-expanded="false" aria-controls="collapseExample6"
                                       class="btn btn-success btn-sm ml-auto">+</a>
                                    <div class="collapse qty_show" id="collapseExample6">
                                        <div>
                                            <span class="ml-auto" href="#">
                                            <form id='myform' class="cart-items-number d-flex" method='POST' action='#'>
                                            <input type='button' value='-' class='qtyminus btn btn-success btn-sm' field='quantity'/>
                                            <input type='text' name='quantity' value='1' class='qty form-control'/>
                                            <input type='button' value='+' class='qtyplus btn btn-success btn-sm' field='quantity'/>
                                            </form>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 col-md-3 mb-3">
                <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                    <div class="list-card-image">
                        <a href="product_details.html" class="text-dark">
                            <div class="member-plan position-absolute"><span class="badge m-3 badge-success">10%</span>
                            </div>
                            <div class="p-3">
                                <img src="{{asset('assets/frontend/img/listing/v8.jpg')}}"
                                     class="img-fluid item-img w-100 mb-3">
                                <h6>Brinjal</h6>
                                <div class="d-flex align-items-center">
                                    <h6 class="price m-0 text-success">$0.8/kg</h6>
                                    <a data-toggle="collapse" href="#collapseExample7" role="button"
                                       aria-expanded="false" aria-controls="collapseExample7"
                                       class="btn btn-success btn-sm ml-auto">+</a>
                                    <div class="collapse qty_show" id="collapseExample7">
                                        <div>
                                            <span class="ml-auto" href="#">
                                                <form id='myform' class="cart-items-number d-flex" method='POST' action='#'>
                                                    <input type='button' value='-' class='qtyminus btn btn-success btn-sm' field='quantity'/>
                                                    <input type='text' name='quantity' value='1' class='qty form-control'/>
                                                    <input type='button' value='+' class='qtyplus btn btn-success btn-sm' field='quantity'/>
                                                </form>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('js')
    <script src="{{ asset('assets/frontend/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/product-details.js') }}"></script>



<script>
    $(document).ready(function (){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(".color").on('click', function (){
          var color_id = $(this).val();

          if(color_id){
            $.ajax({
                url: "{{route('front.product.sizebycolor')}}",
                data: {color_id: color_id, _token: '{{csrf_token()}}'},
                type: "POST",
                success: function (res) {
                    if (res.color.extraUrl != 'null') {
                        $('.titleChange').children('span').empty();
                        $('.titleChange').children('span').append(res.color.extraUrl);
                    } else {
                        $('.titleChange').children('span').empty();
                    }
                    $('#colorSize').empty();
                    $.each(res.color.attributes, function (key, value) {
                        $('#colorSize').append(`
                                <label class="btn btn-secondary">
                                    <input class="size" type="radio" name="options" data-id="${value.id}" id="option1">${value.size}
                                </label>
`);
                    });


                    // console.log(res);

                    $('.img-showcase').empty();
                    $('.img-select').empty();

                    const j = 0;
                    $.each(res.color.images, function (key, value) {
                        console.log(value)
                        if (value.image == null){
                            $('.img-showcase').append(`<img src = "https://via.placeholder.com/450" alt = "shoe image">`);
                        }else{
                            $('.img-showcase').append(`<img src = "{{ asset('storage/product') }}/${value.image}" alt = "shoe image">`);
                        }

                        if(res.color.images.length > 1 && value.image != null){
                            $('.img-select').append(`
                               <div class = "img-item">
                                    <a href = "javascript:void(0)" data-id = "${key+1}">
                                        <img src = "{{ asset('storage/product') }}/${value.image}" alt = "shoe image">
                                    </a>
                                </div>
                         `);
                        }

                    })

                }
            })
          }else {
              alert("Color id not Found!");
          }
      });

        $("body").delegate('.size','click', function(){
            $('.container').attr('disabled', true);
            var attr_id = $(this).data('id');
            if(attr_id){
                $.ajax({
                    url:"{{route('front.product.sizeByPrice')}}",
                    data:{size_id:attr_id, _token: '{{csrf_token()}}'},
                    type:"POST",
                    success:function (res){
                        if (res){
                            $('.container').attr('disabled', false);
                            $('#sizeByPrice').empty();
                            $('#checkSque').empty();
                            if (res.attr.price != null){
                                $('#sizeByPrice').append(res.attr.price + " Tk");
                            }else{
                                $('#sizeByPrice').append("NOt Available..");
                            }

                            if (res.attr.sku != null){
                                $('#checkSque').append(res.attr.sku);
                            }

                            if (res.attr.qty > 0){
                                $('#checkQuentity').empty();
                                $('#checkQuentity').addClass('text-warning')
                                $('#checkQuentity').append(`IN STOKE`);
                            }else{
                                $('#checkQuentity').empty();
                                $('#checkQuentity').addClass('text-danger')
                                $('#checkQuentity').append(`OUT OF STOKE`);
                            }

                        }
                    }
                });
            }
        });
    //     Slider


        const imgs = document.querySelectorAll('.img-select a');
        const imgBtns = [...imgs];
        let imgId = 1;

        imgBtns.forEach((imgItem) => {
            imgItem.addEventListener('click', (event) => {
                event.preventDefault();
                imgId = imgItem.dataset.id;
                slideImage();
            });
        });

        function slideImage(){
            const displayWidth = document.querySelector('.img-showcase img:first-child').clientWidth;

            document.querySelector('.img-showcase').style.transform = `translateX(${- (imgId - 1) * displayWidth}px)`;
        }

        window.addEventListener('resize', slideImage);


        $('.img-select').on('click', 'a', function (){
            let imgId = 1;
            imgId = $(this).data('id');
            var displayWidth = $('.img-showcase img:first-child').width();
            $('.img-showcase').css( "transform", `translateX(${- (imgId - 1) * displayWidth}px)`);
            console.log(displayWidth);
        })

        function slideImage(){
            const displayWidth = document.querySelector('.img-showcase img:first-child').clientWidth;

            $('.img-showcase').style.transform = 'translateX(${- (imgId - 1) * displayWidth}px)';
        }
    })
</script>

@endpush
