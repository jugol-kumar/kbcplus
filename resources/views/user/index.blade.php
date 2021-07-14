@extends('layouts.frontend.app')

@section('content')
    <div class="container">
        {{ Auth::user() }}
        <div class="row">
            <div class="col-lg-4">
                <div class="osahan-account bg-white rounded shadow-sm overflow-hidden">
                    <div class="p-4 profile text-center border-bottom">
                        <img src="{{ config('app.placeholder') }}" class="img-fluid rounded-pill">
                        <h6 class="font-weight-bold m-0 mt-2">{{ Auth::user()->name }}</h6>
                        <p class="small text-muted m-0">
                            <a href="{{ Auth::user()->email }}"
                                                           class="__cf_email__"
                                                           data-cfemail="c8a1a9a5a7bba9a0a9a688afa5a9a1a4e6aba7a5">[email&#160;protected]</a>
                        </p>
                    </div>
                    <div class="account-sections">
                        <ul class="list-group">
                            <a href="my_account.html" class="text-decoration-none text-dark">
                                <li class="border-bottom bg-white d-flex align-items-center p-3">
                                    <i class="icofont-user osahan-icofont bg-danger"></i>My Account
                                    <span class="badge badge-success p-1 badge-pill ml-auto"><i
                                            class="icofont-simple-right"></i></span>
                                </li>
                            </a>
                            <a href="promos.html" class="text-decoration-none text-dark">
                                <li class="border-bottom bg-white d-flex align-items-center p-3">
                                    <i class="icofont-sale-discount osahan-icofont bg-success"></i>Promos
                                    <span class="badge badge-success p-1 badge-pill ml-auto"><i
                                            class="icofont-simple-right"></i></span>
                                </li>
                            </a>
                            <a href="my_address.html" class="text-decoration-none text-dark">
                                <li class="border-bottom bg-white d-flex align-items-center p-3">
                                    <i class="icofont-address-book osahan-icofont bg-dark"></i>My Address
                                    <span class="badge badge-success p-1 badge-pill ml-auto"><i
                                            class="icofont-simple-right"></i></span>
                                </li>
                            </a>
                            <a href="terms_conditions.html" class="text-decoration-none text-dark">
                                <li class="border-bottom bg-white d-flex align-items-center p-3">
                                    <i class="icofont-info-circle osahan-icofont bg-primary"></i>Terms, Privacy & Policy
                                    <span class="badge badge-success p-1 badge-pill ml-auto"><i
                                            class="icofont-simple-right"></i></span>
                                </li>
                            </a>
                            <a href="help_support.html" class="text-decoration-none text-dark">
                                <li class="border-bottom bg-white d-flex align-items-center p-3">
                                    <i class="icofont-phone osahan-icofont bg-warning"></i>Help & Support
                                    <span class="badge badge-success p-1 badge-pill ml-auto"><i
                                            class="icofont-simple-right"></i></span>
                                </li>
                            </a>
                            <a href="help_ticket.html" class="text-decoration-none text-dark">
                                <li class="border-bottom bg-white d-flex align-items-center p-3">
                                    <i class="icofont-phone osahan-icofont bg-success"></i>Ticket
                                    <span class="badge badge-success p-1 badge-pill ml-auto"><i
                                            class="icofont-simple-right"></i></span>
                                </li>
                            </a>
                            <a href="javascript:void(0)" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"  class="text-decoration-none text-dark">
                                <li class="border-bottom bg-white d-flex  align-items-center p-3">
                                    <i class="icofont-lock osahan-icofont bg-danger"></i> Logout
                                </li>
                            </a>

                            <form id="logout-form" action="{{ route('user.logout') }}" style="display: none" method="post">
                                @csrf
                            </form>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 p-4 bg-white rounded shadow-sm">
                <h4 class="mb-4 profile-title">My account</h4>
                <div id="edit_profile">
                    <div class="p-0">
                        <form action="https://askbootstrap.com/preview/vegishop/my_account.html">
                            <div class="form-group">
                                <label for="exampleInputName1">Full Name</label>
                                <input type="text" class="form-control" id="exampleInputName1" value="gurdeeposahan">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputNumber1">Mobile Number</label>
                                <input type="number" class="form-control" id="exampleInputNumber1" value="1234567890">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                       value="iamosahan@gmail.com">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success btn-block btn-lg">Save Changes</button>
                            </div>
                        </form>
                    </div>
                    <div class="additional mt-3">
                        <div class="change_password mb-1">
                            <a href="change_password.html" class="p-3 btn-light border btn d-flex align-items-center">Change
                                Password
                                <i class="icofont-rounded-right ml-auto"></i></a>
                        </div>
                        <div class="deactivate_account">
                            <a href="deactivate_account.html"
                               class="p-3 btn-light border btn d-flex align-items-center">Deactivate Account
                                <i class="icofont-rounded-right ml-auto"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')

    @if(Session::has('msg'))
        <script src="{{ asset('assets/frontend/js/simpleSnackbar.min.js') }}"></script>
        <script src="{{ asset('assets/frontend/js/toaster.js') }}"></script>
        <script>
            sTost('{{Session::get('msg')}}')
        </script>
    @endif
@endpush
