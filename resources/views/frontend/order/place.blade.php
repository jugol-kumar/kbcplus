@extends('layouts.frontend.app')
@section('content')
    <h1>Hello Customer</h1><br>
    <h5>Thanks for your order. we will successfully received your order. we will contract with you after 24 hour.</h5>
    <a href="{{ route('front.go.to.checkout') }}">Go To Your Profile</a>
@endsection

