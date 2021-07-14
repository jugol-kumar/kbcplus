@extends('layouts.frontend.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="accordion" id="accordionExample">
                    <div class="card border-0 osahan-accor rounded shadow-sm overflow-hidden">
                        <div class="card-header bg-white border-0 p-0" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn d-flex align-items-center bg-white btn-block text-left btn-lg h5 px-3 py-4 m-0"
                                        type="button" data-toggle="collapse" data-target="#collapseOne"
                                        aria-expanded="true" aria-controls="collapseOne">
                                    <span class="c-number">1</span> Cart ({{ session('cart') ? count(session('cart')) : '0' }} items)
                                </button>
                            </h2>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                             data-parent="#accordionExample">
                            <div class="card-body p-0 border-top">
                                <div class="osahan-cart">
                                    @php($totaPrice = 0)
                                    @if(session('cart'))
                                        {{--                        {{ dd(session('cart')) }}--}}
                                        <div class="cartItems">
                                            @foreach(session('cart') as $id => $details)
                                                <div class="bg-white border-bottom">
                                                    <div class="cart-items bg-white position-relative border-bottom">
                                                        <div class="d-flex  align-items-center">
                                                            <a href="javascript:void(0)"><img src="{{ asset('storage/product') }}/{{ $details['image']  }}" class="img-fluid"></a>
                                                            <a href="javascript:void(0)" class="ml-3 text-dark text-decoration-none w-100">
                                                                <P class="my-1">{{ $details['title'] }}</P>
                                                                <p class="text-muted mb-2"> &#2547;{{ $details['price'] }} x {{ $details['quantity'] }}</p>
                                                                <?php
                                                                $totaPrice += $details['price'] * $details['quantity']
                                                                ?>
                                                                <span style="width: 15px;height: 15px;background: {{ $details['color'] }}; display: inline-block;"></span>
                                                                <div class="btn-group cart-size">
                                                                    @if($details['size'] != null)
                                                                        <label class="btn sizeClass hasSize">{{ $details['size'] }}</label>
                                                                    @endif
                                                                </div>
                                                                <div class="d-flex align-items-center mb-2">
                                                                    <form id="myform" class="cart-items-number d-flex ml-auto" method="POST" action="#">
                                                                        <input type="button" value="-" data-id="{{ $id }}" class="btn btn-success btn-sm cart-quentiy-minus" field="quantity">
                                                                        <input type="text" id="cartQuntityVal" name="quantity" value="{{ $details['quantity'] }}" class="qty form-control">
                                                                        <input type="button" value="+"  data-id="{{ $id }}"  class="btn btn-success btn-sm cart-quentiy-plus" field="quantity">
                                                                    </form>
                                                                </div>
                                                                <a href="javascript:void(0)" class="delete-cart-item"data-id="{{ $id }}">
                                                                    <i class="icofont-trash cart-item-delete"></i>
                                                                </a>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <div class="noproductincart">
                                            <i class="icofont-dropbox"></i>
                                            <h5>Your Cart Is Empty!</h5>
                                        </div>
                                    @endif
                                    <div>
                                        <a href="javascript:void(0)" id="headingtwo" class="text-decoration-none btn btn-block p-3 headingtwo" type="button"
                                           data-toggle="collapse" data-target="#collapsetwo" aria-expanded="true"
                                           aria-controls="collapsetwo">
                                            <div class="rounded shadow bg-success d-flex align-items-center p-3 text-white">
                                                <div class="more">
                                                    <h6 class="m-0">Subtotal {{ $totaPrice }} Tk</h6>
                                                    <p class="small m-0">Proceed to checkout</p>
                                                </div>
                                                <div class="ml-auto"><i class="icofont-simple-right"></i></div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card border-0 osahan-accor rounded shadow-sm overflow-hidden mt-3">

                        <div class="card-header bg-white border-0 p-0 headingtwo" id="headingtwo">
                            <h2 class="mb-0">
                                <button class="btn d-flex align-items-center bg-white btn-block text-left btn-lg h5 px-3 py-4 m-0"
                                        type="button" data-toggle="collapse" data-target="#collapsetwo"
                                        aria-expanded="true" aria-controls="collapsetwo">
                                    <span class="c-number">2</span> Order Address <a href="#" data-toggle="modal"
                                                                                     data-target="#exampleModal"
                                                                                     class="text-decoration-none text-success ml-auto">
                                        <i class="icofont-plus-circle mr-1"></i>Add New Delivery Address</a>
                                </button>
                            </h2>
                        </div>

                        <div id="collapsetwo" class="collapse" aria-labelledby="headingtwo"
                             data-parent="#accordionExample">
                            <div class="card-body p-0 border-top">
                                <div class="osahan-order_address">
                                    <div class="p-3 row" id="address">
                                            {{-- delevary address append here  --}}
                                        <h3>No Have Address Available. Please Login First Or Create An Address...</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card border-0 osahan-accor rounded shadow-sm overflow-hidden mt-3">

                        <div class="card-header bg-white border-0 p-0" id="headingthree">
                            <h2 class="mb-0">
                                <button class="btn d-flex align-items-center bg-white btn-block text-left btn-lg h5 px-3 py-4 m-0"
                                        type="button" data-toggle="collapse" data-target="#collapsethree"
                                        aria-expanded="true" aria-controls="collapsethree">
                                    <span class="c-number">3</span> Delivery Time
                                </button>
                            </h2>
                        </div>

                        <div id="collapsethree" class="collapse" aria-labelledby="headingthree"
                             data-parent="#accordionExample">
                            <div class="card-body p-0 border-top">
                                <div class="osahan-order_address">
                                    <div class="text-center mb-4 py-4">
                                        <p class="display-2"><i class="icofont-ui-calendar text-success"></i></p>
                                        <p class="mb-1">Your Current Slot:</p>
                                        <h6 class="font-weight-bold text-dark" > <span id="mainDayDate">Select your Get Delivery Date And Time</span> <span id="mainTime"></span></h6>
                                    </div>
                                    <div class="schedule">
                                        <ul class="nav nav-tabs justify-content-center nav-fill" id="myTab" role="tablist">

                                        </ul>

                                        <div class="tab-content filter bg-white" id="myTabContent">
                                            <div class="tab-pane fade show active" id="mon" role="tabpanel"
                                                 aria-labelledby="mon-tab">

                                                <div class="custom-control border-bottom px-0 custom-radio">
                                                    <input class="custom-control-input deliveryTime" type="radio"
                                                           name="deliveryTime" id="mon2" data-value="8to11" value="8to11">
                                                    <label class="custom-control-label py-3 w-100 px-3" for="mon2">
                                                        <i class="icofont-clock-time mr-2" data-time="8AM - 11AM"></i>8AM - 11AM
                                                    </label>
                                                </div>

                                                <div class="custom-control border-bottom px-0 custom-radio">
                                                    <input class="custom-control-input deliveryTime" type="radio"
                                                           name="deliveryTime" id="mon3" data-value="11to2" value="11to2">
                                                    <label class="custom-control-label py-3 w-100 px-3" for="mon3">
                                                        <i class="icofont-clock-time mr-2" data-time="11AM - 2PM"></i> 11AM - 2PM
                                                    </label>
                                                </div>

                                                <div class="custom-control border-bottom px-0 custom-radio">
                                                    <input class="custom-control-input deliveryTime" type="radio"
                                                           name="deliveryTime" id="mon4" data-value="2to5"  value="2to5">
                                                    <label class="custom-control-label py-3 w-100 px-3" for="mon4">
                                                        <i class="icofont-clock-time mr-2" data-time="2PM - 5PM"></i> 2PM - 5PM
                                                    </label>
                                                </div>


                                                <div class="custom-control border-bottom px-0 custom-radio">
                                                    <input class="custom-control-input deliveryTime" data-value="5to8" type="radio"
                                                           name="deliveryTime" id="mon1" value="5to8">
                                                    <label class="custom-control-label py-3 w-100 px-3" for="mon1">
                                                        <i class="icofont-clock-time mr-2" data-time="5PM - 8PM"></i> 5PM - 8PM
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-3">
                                    <button id="placeOrder" class="btn btn-success btn-lg btn-block" type="button"
                                       data-toggle="collapse" data-target="#collapsefour" aria-expanded="true"
                                       aria-controls="collapsefour">Schedule Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-lg-4">
                <div class="sticky_sidebar">
                    <div class="bg-white rounded overflow-hidden shadow-sm mb-3 checkout-sidebar">
                        <div class="d-flex align-items-center osahan-cart-item-profile border-bottom bg-white p-3">
                            <img alt="osahan" src="{{ asset('assets/frontend/img/starter1.jpg')}}" class="mr-3 rounded-circle img-fluid">
                            <div class="d-flex flex-column">
                                <h6 class="mb-1 font-weight-bold">Korean Bangladesh Company Ltd.</h6>
                                <p class="mb-0 small text-muted"><i class="feather-map-pin"></i>Belive For Products</p>
                            </div>
                        </div>
                        <div>
                            <div class="bg-white p-3 clearfix">
                                <p class="font-weight-bold small mb-2">Bill Details</p>
                                <p class="mb-1">Item Total <span class="small text-muted">( {{ session('cart') ? count(session('cart')) : 0 }} item)</span> <span
                                        class="float-right text-dark">&#2547; {{ $totaPrice }}</span></p>
{{--                                <p class="mb-1">Store Charges <span class="float-right text-dark">$62.8</span></p>--}}
                                <p class="mb-3">Delivery Fee
                                    <span data-toggle="tooltip" data-placement="top"
                                                                   title="Delivery partner fee - &#2547; 60"
                                                                   class="text-info ml-1"><i
                                            class="icofont-info-circle"></i>
                                    </span>
                                    <span class="float-right text-dark">&#2547; 60</span></p>
                                <h6 class="mb-0 text-success">Total Discount<span class="float-right text-success">Off Now</span></h6>
                            </div>
                            <div class="p-3 border-top">
                                <h5 class="mb-0">TO PAY <span class="float-right text-danger">&#2547; {{ $totaPrice + 60 }}</span></h5>
                            </div>
                        </div>
                    </div>
                    <p class="text-success text-center">Your Total Savings on this order &#2547; 0.00</p>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Delivery Address</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="" id="delevaryAddress">
                        <div class="form-row">
                            <div class="col-md-12 form-group">
                                <label class="form-label">Delivery Area</label>
                                <div class="input-group">
                                    <input placeholder="Delivery Area" name="deliveryArea" type="text" class="form-control" id="country_name">

                                    <div class="input-group-append">
                                        <button id="button-addon2" type="button" class="btn btn-outline-secondary"><i
                                                class="icofont-pin"></i></button>
                                    </div>
                                </div>
                                <div id="countryList" style="margin-top: 0px!important;">
                                </div>
                            </div>
                            <div class="col-md-12 form-group">
                                <label class="form-label">Complete Address</label>
                                <input name="completedAddress" placeholder="Complete Address e.g. house number, street name, landmark" type="text" class="form-control">
                            </div>

                            <div class="col-md-12 form-group">
                                <label class="form-label">Phone</label>
                                <input name="phone" placeholder="Enter your p.n Phone Number..." type="text" class="form-control">
                            </div>

                            <div class="col-md-12 form-group">
                                <label class="form-label">Delivery Instructions</label>
                                <input name="deliveryInstructions" placeholder="Delivery Instructions e.g. Opposite Gold Souk Mall" type="text" class="form-control">
                            </div>

                            <div class="mb-0 col-md-12 form-group">
                                <label class="form-label">Nickname</label>
                                <div class="btn-group btn-group-toggle w-100" data-toggle="buttons">
                                    <label class="btn btn-outline-secondary active">
                                        <input type="radio" name="options" class="gold_color" value="HOME" id="option1" checked> Home
                                    </label>
                                    <label class="btn btn-outline-secondary">
                                        <input type="radio" name="options" class="gold_color" value="WORK" id="option2"> Work
                                    </label>
                                    <label class="btn btn-outline-secondary">
                                        <input type="radio" name="options" class="gold_color" value="OTHER" id="option3"> Other
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer p-0 border-0 mt-3">
                    <div class="col-6 m-0 p-0">
                        <button type="button" class="btn border-top btn-lg btn-block" data-dismiss="modal">Close</button>
                    </div>
                    <div class="col-6 m-0 p-0">
                        <button type="submit" class="btn btn-success btn-lg btn-block" id="saveDelevary">Save changes</button>
                    </div>
                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




@endsection
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="{{ asset('assets/frontend/js/toaster.js') }}"></script>
<script src="{{ asset('assets/frontend/js/simpleSnackbar.min.js') }}"></script>
<script>
    let days = [];
    let dates = [];
    let daysRequired = 7

    for (let i = 1; i <= daysRequired; i++) {
        days.push( moment().add(i, 'days').format('dddd') )
        dates.push( moment().add(i, 'days').format('DD MMMM YYYY') )
    }
    if (days.length){
        $.each(days, function (key, val){
            $("#myTab").append(`
            <li class="nav-item" role="presentation">
                <a class="nav-link  text-dark" id="mon-tab" data-toggle="tab"
                   href="#mon" role="tab" aria-controls="mon" aria-selected="true">
                    <p data-value="${val}" class="mb-0 font-weight-bold dayName" value="${val}">${val}</p>
                    <p class="mb-0 dates" data-value="${dates[key]}">${dates[key]}</p>
                </a>
            </li>
        `);
      })
    }


    $('#country_name').keyup(function (){
        var text = $(this).val();
        if (text != null){
            $.ajax({
                url: '{{ route('front.get.allDistrict') }}',
                data: {data: text, _token: '{{csrf_token()}}'},
                type: 'POST',
                success:function (res){
                    if (res != null){
                        $('#countryList').fadeIn();
                        $('#countryList').html(res);
                    }else{
                        eTost('Data Not Found...');
                        $('#countryList').fadeIn();
                    }
                }
            })
        }
    })

    $(document).on('click','li',function(){
        $("#country_name").val($(this).text());
        $('#countryList').fadeOut();
    });
    $(document).on('click', function (){
        $('#countryList').fadeOut();
    })


    $('#delevaryAddress').on('submit', function (e){
        e.preventDefault();

        var area = $("input[name=deliveryArea]").val();
        var address = $("input[name=completedAddress]").val();
        var instruction = $("input[name=deliveryInstructions]").val();
        var phone = $("input[name=phone]").val();
        var option = $('.gold_color:checked').val();

        var authID = '{{ Auth::id() }}';
        if (authID){
            $.ajax({
               url: '{{ route('user.address.store') }}',
               data: {area:area, address:address, instruction:instruction,option:option,phone:phone, _token:'{{ csrf_token() }}'},
               dataType: "JSON",
               type: 'POST',
               success:function (res){
                   if (res.code == 200){
                       $('#exampleModal').modal('hide');
                       window.location.reload();
                       sTost(res.msg);
                   }
               }
            });
        }else{
            wTost('You Not Login. So Login First...');
            $('#login').modal('show');
        }
    })


    $('.headingtwo').on('click', function (){
        $.ajax({
            url: '{{ route('user.address.index') }}',
            dataType: "JSON",
            type: 'GET',
            // beforeSend: function (){
            //   alert('im calling before send');
            // },
            success:function (res){
                console.log(res)
                if (res.address){
                    $("#address").empty();
                  $.each(res.address, function (key, val){
                      // console.log(val);
                      $("#address").prepend(`
                                             <div class="custom-control col custom-radio position-relative border-custom-radio">
                                                <input type="radio" id="customRadioInline${key}" name="customRadioInline1"
                                                       class="custom-control-input" data-value="${val.id}" >
<!--                                                // <input class="addressId" type="hidden" name="id" data-value="${val.id}" value="${val.id}">-->
                                                <label class="custom-control-label w-100" for="customRadioInline${key}">
                                                <div>
                                                    <div class="p-3 rounded bg-white shadow-sm w-100">
                                                        <div class="d-flex align-items-center mb-2">
                                                            <p class="mb-0 h6 text-capitalize">${val.delivery_option}</p>

                                                            <p class="mb-0 badge ${val.delivery_option == "HOME"?'badge-success':'badge-light'} ml-auto">
                                                                <i class="icofont-check-circled"></i> ${val.delivery_option == "HOME"?'Default':'Select'}</p>

                                                        </div>
                                                        <p class="small text-muted m-0">${val.completed_address}</p>
                                                        <p class="small text-muted m-0">${val.delivery_address}</p>
                                                        <p class="small text-muted m-0">${val.phone}</p>
                                                        <p class="pt-2 m-0 text-right">
                                                            <span class="small">
                                                                <a href="#" data-toggle="modal" data-target="#exampleModal" class="text-decoration-none text-info">Edit</a>
                                                            </span>
                                                        </p>
                                                    </div>
                                                    <span class="btn btn-light border-top btn-lg btn-block">Deliver Here</span>
                                                </div>
                                            </label>
                                        </div>
`);
                  })
                   $("#address").append(`<a href="#" class="btn btn-success btn-lg btn-block mt-3" type="button"
                                           data-toggle="collapse" data-target="#collapsethree" aria-expanded="true"
                                           aria-controls="collapsethree">Continue</a>`);
                } else{
                    $('#address').append('<h1>No Have Address. Login First For Address...</h1>');
                }
            }
        })
    })


    $('#myTab').on('click', 'li', function (){
        var dates = $(this ).find("a p:first-child").data('value');
        var dat = $(this ).find("a p:last-child").data('value');

        var className = $('.text-dark').hasClass('active');

        $("#mainDayDate").text(dates+" "+ "("+dat+")");
    });

    $('#myTabContent').on('click','input', function (){
        var deliveryTime = $(this).parent("div").find("label i").data('time');
        var className = $('.text-dark').hasClass('active');
        if (className == true){
            $('#mainTime').empty();
            $('#mainTime').text(deliveryTime);
        }else{
            wTost('Please First Select Date...')
        }

    });



    $('#placeOrder').on('click', function (){
        // var time = $('input [type=radio][name=deliveryTime]');
        var time = $('.deliveryTime:checked').data('value');
        var dats = $('#myTab li .active p:first-child').data('value');
        var addressId = $('input[name="customRadioInline1"]:checked').data('value');

        if (addressId == null) {
            wTost('Please Select First your Delivery Address...')
        }else{
            if (dats == null){
                wTost('Please Select Delivery Date...')
            }else {
                if (time == null){
                    wTost('Please Select Delivery Time...')
                }else{
                    $.ajax({
                        url: '{{ route('front.save.cart.details') }}',
                        dataType: "JSON",
                        type: 'POST',
                        data: {time:time, dats:dats, addressId:addressId, _token:'{{ csrf_token() }}'},
                        success: function (res){
                            if (res.code == 200){
                                sTost('Successfully Done Cart Add...');
                                var orderId = res.order_id;
                                window.location.href = "{{ route('front.goto.checkout','') }}"+'/'+orderId;
                            }else if(res.code == 402){
                                iTost(res.msg);
                            }
                            else{
                                eTost('Have An Error. Please Check And Try Again...');
                            }
                        }
                    })
                }
            }
        }

        console.log(addressId);
        console.log(dats);
        console.log(time);
    })



</script>
@endpush
