@extends('layouts.frontend.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="bg-white rounded shadow-sm overflow-hidden">
                    <div class="address p-3 bg-light">
                        <h6 class="m-0 text-dark d-flex align-items-center">Address <span class="small ml-auto"><a
                                    href="#" class="font-weight-bold text-decoration-none text-success" data-toggle="modal"
                                    data-target="#exampleModal"><i class="icofont-location-arrow"></i> Change</a></span>
                        </h6>
                    </div>
                    <div class="p-3">
                        <div class="d-flex align-items-center">
                            <p class="mb-2 font-weight-bold">{{ $shippingAddress->delivery_option }}</p>
                            <p class="mb-2 badge badge-danger ml-auto">Selected</p>
                        </div>
                        <p class="small text-muted m-0">{{ $shippingAddress->delivery_address }}</p>
                        <p class="small text-muted m-0">{{ $shippingAddress->completed_address }}</p>
                        <p class="small text-muted m-0">{{ $shippingAddress->phone }}</p>
                        <h6 class="small text-muted m-0">Contract With me: {{ $shippingAddress->delivery_institutions }}</h6>
                    </div>
                    <div class="address p-3 bg-light">
                        <h6 class="text-dark m-0">Promo Code</h6>
                    </div>
                    <div>
                        <div class="accordion" id="accordionExample">
                            <div class="d-flex align-items-center" id="headingThree">
                                <a class="p-3 d-flex align-items-center text-decoration-none text-success w-100"
                                   type="button" data-toggle="collapse" data-target="#collapseThree"
                                   aria-expanded="false" aria-controls="collapseThree">
                                    <i class="icofont-badge mr-3"></i> Add Promo Code
                                    <span data-toggle="tooltip" data-placement="top" title="" class="text-info ml-1" data-original-title="This Section Disabled Now. Coming Soon. ">
                                        <i class="icofont-info-circle"></i>
                                    </span>
                                    <i class="icofont-rounded-down ml-auto"></i>
                                </a>
                            </div>
                            <div id="collapseThree" class="collapse p-3 border-top" aria-labelledby="headingThree"
                                 data-parent="#accordionExample">
                                <div class="clearfix">
                                    <div class="input-group-sm mb-2 input-group">
                                        <input placeholder="Enter promo code" type="text" class="form-control" disabled>
                                        <div class="input-group-append">
                                            <button id="button-addon2" type="button" class="btn btn-success"><i
                                                    class="icofont-percent"></i> APPLY
                                            </button>
                                        </div>
                                    </div>
                                    <div class="mb-0 input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                    class="icofont-ui-message"></i></span></div>
                                        <textarea disabled placeholder="Any suggestions? We will pass it on..."
                                                  aria-label="With textarea" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="address p-3 bg-light">
                        <h6 class="m-0 text-dark">Payment Method


                            <span data-toggle="tooltip" data-placement="top" title="" class="text-info ml-1" data-original-title="Submit Your Order With CashOnDelivery Method. Coming Soon Another Method.">
                                        <i class="icofont-info-circle"></i>
                                    </span></h6>
                    </div>
                    <div class="p-3">
                        <a href="#" class="text-success text-decoration-none w-100" data-toggle="modal"
                           data-target="#paymentModal">
                            <div class="d-flex align-items-center">
                                <i class="icofont-credit-card"></i> <span class="ml-3">Pay And Submit Your Order</span> <i
                                    class="icofont-rounded-right ml-auto"></i>
                            </div>
                        </a>
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
                                        class="float-right text-dark">&#2547; {{ $order->total }}</span></p>
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
                                <h5 class="mb-0">TO PAY <span class="float-right text-danger">&#2547; {{ $order->total + 60 }}</span></h5>
                            </div>
                        </div>
                    </div>
                    <a href="javascript:void(0)" id="placeOrder" class="btn btn-success btn-lg btn-block mt-3 mb-3">Place Order</a>
                    <p class="text-success text-center">Your Total Savings on this order &#2547; 0.00</p>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentModalLabel">Pay With Any Payment Method
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="schedule">
                        <ul class="nav nav-tabs justify-content-center nav-fill" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active text-dark" id="credit-tab" data-toggle="tab" href="#credit"
                                   role="tab" aria-controls="credit" aria-selected="true">
                                    <p class="mb-0 font-weight-bold"><i class="icofont-credit-card mr-2"></i> Credit/Debit
                                        Card</p>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link text-dark" id="banking-tab" data-toggle="tab" href="#banking" role="tab"
                                   aria-controls="banking" aria-selected="false">
                                    <p class="mb-0 font-weight-bold"><i class="icofont-globe mr-2"></i> Net Banking</p>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link text-dark" id="cash-tab" data-toggle="tab" href="#cash" role="tab"
                                   aria-controls="cash" aria-selected="false">
                                    <p class="mb-0 font-weight-bold"><i class="icofont-dollar mr-2"></i> Cash on Delivery
                                    </p>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content bg-white" id="myTabContent">
                            <div class="tab-pane fade show active disabledsectoin" id="credit" role="tabpanel" aria-labelledby="credit-tab">
                                <div class="osahan-card-body pt-3">
                                    <h6 class="m-0">Add new card
                                        <span data-toggle="tooltip" data-placement="top" title="" class="text-info ml-1" data-original-title="This Section Disabled Now. Coming Soon. ">
                                        <i class="icofont-info-circle"></i>
                                    </span>
                                    </h6>
                                    <p class="small">WE ACCEPT <span class="osahan-card ml-2 font-weight-bold">( Master Card / Visa Card / Rupay )</span>
                                    </p>
                                    <form>
                                        <div class="form-row">
                                            <div class="col-md-12 form-group">
                                                <label class="form-label font-weight-bold small">Card number</label>
                                                <div class="input-group">
                                                    <input placeholder="Card number" type="number" class="form-control">
                                                    <div class="input-group-append">
                                                        <button id="button-addon2" type="button"
                                                                class="btn btn-outline-secondary"><i
                                                                class="icofont-credit-card"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8 form-group"><label
                                                    class="form-label font-weight-bold small">Valid
                                                    through(MM/YY)</label><input placeholder="Enter Valid through(MM/YY)"
                                                                                 type="number" class="form-control"></div>
                                            <div class="col-md-4 form-group"><label
                                                    class="form-label font-weight-bold small">CVV</label><input
                                                    placeholder="Enter CVV Number" type="number" class="form-control"></div>
                                            <div class="col-md-12 form-group"><label
                                                    class="form-label font-weight-bold small">Name on card</label><input
                                                    placeholder="Enter Card number" type="text" class="form-control"></div>
                                            <div class="col-md-12 form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" id="custom-checkbox1"
                                                           class="custom-control-input">
                                                    <label title="" type="checkbox" for="custom-checkbox1"
                                                           class="custom-control-label small pt-1">Securely save this card
                                                        for a faster checkout next time.</label>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="tab-pane fade disabledsectoin" id="banking" role="tabpanel" aria-labelledby="banking-tab">
                                <div class="osahan-card-body pt-3">
                                    <form>
                                        <div class="btn-group btn-group-toggle w-100" data-toggle="buttons">
                                            <label class="btn btn-outline-secondary active">
                                                <input type="radio" name="options" id="option1" checked=""> HDFC
                                            </label>
                                            <label class="btn btn-outline-secondary">
                                                <input type="radio" name="options" id="option2"> ICICI
                                            </label>
                                            <label class="btn btn-outline-secondary">
                                                <input type="radio" name="options" id="option3"> AXIS
                                            </label>
                                        </div>
                                        <div class="form-row pt-3">
                                            <div class="col-md-12 form-group">
                                                <label class="form-label small font-weight-bold">Select Bank</label><br>
                                                <select class="custom-select form-control">
                                                    <option>Bank</option>
                                                    <option>KOTAK</option>
                                                    <option>SBI</option>
                                                    <option>UCO</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>



                            <div class="tab-pane fade" id="cash" role="tabpanel" aria-labelledby="cash-tab">
                                <div class="custom-control custom-checkbox pt-3">
                                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing" value="cod">
                                    <label class="custom-control-label" for="customControlAutosizing">
                                        <b>Cash</b><br>
                                        <p class="small text-muted m-0">Please keep exact change handy to help us serve you
                                            better</p>
                                    </label>
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
                        <button type="button" id="placeOrder" class="btn btn-success btn-lg btn-block">Proceed</button>
                    </div>
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
                                    <input value="{{ $shippingAddress->delivery_address }}" name="deliveryArea" type="text" class="form-control" id="country_name">
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
                                <input name="completedAddress" value="{{ $shippingAddress->completed_address }}" type="text" class="form-control">
                            </div>

                            <div class="col-md-12 form-group">
                                <label class="form-label">Phone</label>
                                <input name="phone" value="{{ $shippingAddress->phone }}" type="text" class="form-control">
                            </div>

                            <div class="col-md-12 form-group">
                                <label class="form-label">Delivery Instructions</label>
                                <input name="deliveryInstructions" value="{{ $shippingAddress->delivery_institutions }}" type="text" class="form-control">
                            </div>

                            <div class="mb-0 col-md-12 form-group">
                                <label class="form-label">Nickname</label>
                                <div class="btn-group btn-group-toggle w-100" data-toggle="buttons">
                                    <label class="btn btn-outline-secondary active">
                                        <input type="radio" name="options" class="gold_color" value="HOME" id="option1" {{ $shippingAddress->delivery_option == 'HOME' ? 'checked' : '' }}> Home
                                    </label>
                                    <label class="btn btn-outline-secondary">
                                        <input type="radio" name="options" class="gold_color" value="WORK" id="option2" {{ $shippingAddress->delivery_option == 'WORK' ? 'checked' : '' }}> Work
                                    </label>
                                    <label class="btn btn-outline-secondary">
                                        <input type="radio" name="options" class="gold_color" value="OTHER" id="option3" {{ $shippingAddress->delivery_option == 'OTHER' ? 'checked' : '' }}> Other
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
    <script>

        // autocomplated destrict name search.
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



        //update delevary addres..
        $('#delevaryAddress').on('submit', function (e){
            e.preventDefault();


            var area = $("input[name=deliveryArea]").val();
            var address = $("input[name=completedAddress]").val();
            var instruction = $("input[name=deliveryInstructions]").val();
            var phone = $("input[name=phone]").val();
            var option = $('.gold_color:checked').val();
            var addressId = '{{ $shippingAddress->id }}'

            console.log(addressId);
            var authID = '{{ Auth::id() }}';
            if (authID){
                $.ajax({
                    url: '{{ route('user.update.user.address') }}',
                    data: {area:area, address:address, instruction:instruction,option:option,phone:phone, addId:addressId, _token:'{{ csrf_token() }}'},
                    dataType: "JSON",
                    type: 'POST',
                    success:function (res){
                        if (res.code == 200){
                            console.log(res);
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

        // disabled card and banking payment section.
        $(".disabledsectoin").find("*").prop('disabled', true);


        $('body').on('click', '#placeOrder', function (){
            var pType = $('#customControlAutosizing:checked').val();
            var orderId = "{{ $order->id }}"
            if (pType == 'cod'){
                $.ajax({
                    url: '{{ route('front.makepayment') }}',
                    data: {pType:pType,orderId:orderId, _token:'{{ csrf_token() }}'},
                    dataType: "JSON",
                    type: 'POST',
                    success:function (res){
                        if (res.code == 200){
                            console.log(res);
                            $('#exampleModal').modal('hide');
                            window.location.href = "{{ route('front.order.successful') }}";
                            sTost(res.msg);
                        }
                    }
                });
            }else{
                eTost('Plese Select Payment Methord Cash On Delivery...')
            }
        })



    </script>
@endpush
