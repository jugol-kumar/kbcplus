@extends('layouts.frontend.app')
@push('css')

@endpush
@section('content')
    <div class="sign-in-page">
        <div class="row">
            <!-- create a new account -->
            <form action="{{ route('front.customer.save.shipping') }}" method="post" class="register-form outer-top-xs" role="form">
                <div class="col-md-8 col-sm-8 create-new-account col-md-offset-2">
                    <h4 class="checkout-subtitle">Customer Shipping Details</h4>
                        @csrf
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail2">Email Address<span>*</span></label>
                            <input type="email" name="email" class="form-control unicase-form-control text-input" placeholder="Enter Email" id="exampleInputEmail2" >
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">First Name <span>*</span></label>
                            <input type="text" name="first_name" class="form-control unicase-form-control text-input" placeholder="Enter First name" id="exampleInputEmail1" >
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">last Name <span>*</span></label>
                            <input type="text" name="last_name" class="form-control unicase-form-control text-input" placeholder="Enter Last Name"  id="exampleInputEmail1" >
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Phone Number<span>*</span></label>
                            <input type="text" name="phone" class="form-control unicase-form-control text-input" placeholder="Enter Phone Number" id="exampleInputEmail1" >
                        </div>

                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Select Division<span>*</span></label>
                            <select name="division" class="form-control" id="division">
                                <option value="">~~Select Division~~</option>
                                <option value="Rajshahi">Rajshahi</option>
                                <option value="Ranjpur">Ranjpur</option>
                                <option value="Dinajpur">Dinajpur</option>
                                <option value="Dhaka">Dhaka</option>
                                <option value="Joshor">Joshor</option>
                                <option value="Khulna">Khulna</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">District<span>*</span></label>
                            <input type="text" name="district" class="form-control unicase-form-control text-input"  placeholder="Enter District">
                        </div>

                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Full Address<span>*</span></label>
                            <textarea type="text" name="full_address" rows="3" class="form-control unicase-form-control text-input"  placeholder="Full Address"></textarea>
                        </div>
                    <button style="margin-top: 10px;" type="submit" class="btn-upper btn btn-primary checkout-page-button">Save Shipping And Payment Details</button>
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection
