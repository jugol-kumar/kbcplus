@extends('layouts.frontend.app')
@push('css')

@endpush
@section('content')
    <div class="sign-in-page">
        <div class="row">
            <h4 class="checkout-subtitle text-center">Cause Your Payment Method</h4>
{{--            {{ Session::get('customer_shipping')['id'] }}--}}
{{--            {{ Session::get('customer_shipping')['first_name'] }}--}}
{{--            {{ Session::get('customer_shipping')['last_name'] }}--}}
            <!-- create a new account -->
            <form action="{{ route('front.customer.save.payment') }}" method="post" class="register-form outer-top-xs" role="form">
                <div class="col-md-8 col-sm-8 create-new-account col-md-offset-2">
                        @csrf
                        <table class="table table-bordered">
                            <tr class="table-bordered">
                                <td>Bikas</td>
                                <td><input disabled type="radio" title="This Is Bikash" value="bikas" name="payment"> Click For Check</td>
                            </tr>
                            <tr class="table-bordered">
                                <td>Rocket</td>
                                <td><input disabled type="radio"  title="This Is Rocket"  value="rocket" name="payment"> Click For Check</td>
                            </tr>
                            <tr class="table-bordered">
                                <td>Cash On Delivery</td>
                                <td><input type="radio" title="This Is Rocket" value="cod" name="payment"> Click For Check</td>
                            </tr>
                        </table>
                    <button style="margin-top: 10px;" type="submit" class="btn-upper btn btn-primary checkout-page-button">Place Your Order</button>
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection
