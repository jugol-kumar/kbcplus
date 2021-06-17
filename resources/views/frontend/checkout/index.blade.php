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
                                <form action="{{ route('front.loginCustomer') }}" method="post">
                                    @csrf
                                    <input name="email" placeholder="Email" type="email">
                                    <input type="password" name="password" placeholder="Password">
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
                                <form action="{{ route('front.saveCustomer') }}" method="post">
                                    @csrf

                                    <input name="first_name" placeholder="First name"  class="error @error('first_name') is-invalid @enderror"  type="text">
                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <input name="last_name" placeholder="Last name"  class="error @error('last_name') is-invalid @enderror"  type="text">
                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <input name="email" placeholder="Email"  class="error @error('email') is-invalid @enderror"  type="Email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <input name="role" value="customer" type="hidden">
                                    <input name="phone" placeholder="Phone Number" class="error @error('phone') is-invalid @enderror" type="number">
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <input name="password" placeholder="Password" class="error @error('password') is-invalid @enderror" type="password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <input id="conform_password" type="password" placeholder="Conform Password" class="error @error('password') is-invalid @enderror"
                                           name="password_confirmation" required>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

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
