@extends('layouts.frontend.app')
@section('content')
    <h2>CSS Tab</h2>
    <div class="warpper">
        <input class="radio" id="one" name="group" type="radio" checked>
        <input class="radio" id="two" name="group" type="radio">
        <input class="radio" id="three" name="group" type="radio">
        <div class="tabs">
            <label class="tab" id="one-tab" for="one">Login Here</label>
            <label class="tab" id="two-tab" for="two">Customer</label>
            <label class="tab" id="three-tab" for="three">Vindor</label>
        </div>
        <div class="panels">
            <div class="panel" id="one-panel">
                <div class="login-form-container">
                    <h2>Login Here</h2>
                    <div class="card">
                        <div class="card-body">
                            <div class="login-form">
                                <form action="#" method="post">
                                    <input name="user-email" placeholder="Email" type="email">
                                    <input type="password" name="user-password" placeholder="Password">
                                    <div class="button-box">
                                        <button type="submit" class="default-btn floatright">Register</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel" id="two-panel">
                <div class="login-form-container">
                    <h2>Customer Registration</h2>
                    <div class="card">
                        <div class="card-body">
                            <div class="register-form">
                                <form action="{{ route('front.customer.save') }}" method="post">
                                    @csrf
{{--                                    <input type="text" name="last_nm" placeholder="First Name">--}}
{{--                                    <input type="text" name="first_name" placeholder="Last Name">--}}
                                    <input name="email" placeholder="Email" type="Email">
                                    <input name="role" value="customer"  type="hidden">
                                    <input name="phone" placeholder="Phone Number" type="number">
                                    <input name="password" placeholder="Password" type="password">
                                    <div class="button-box">
                                        <button type="submit" class="default-btn floatright">Register</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel" id="three-panel">
                <div class="login-form-container">
                    <h2>Vindor Registration</h2>
                    <div class="card">
                        <div class="card-body">
                            <div class="register-form">
                                <form action="#" method="post">
                                    <input name="user-email" placeholder="Email" type="email">
                                    <input name="user-email" placeholder="Email" type="email">
                                    <input name="user-email" placeholder="Email" type="email">
                                    <input name="user-email" placeholder="Email" type="email">
                                    <input name="user-email" placeholder="Email" type="email">
                                    <input name="user-email" placeholder="Email" type="email">
                                    <input name="user-email" placeholder="Email" type="email">
                                    <input name="user-email" placeholder="Email" type="email">
                                    <input type="password" name="user-password" placeholder="Password">
                                    <div class="button-box">
                                        <button type="submit" class="default-btn floatright">Register</button>
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
