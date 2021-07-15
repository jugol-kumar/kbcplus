@extends('layouts.frontend.app')

@section('content')
    <div class="container">
        {{ Auth::user() }}
        <div class="row">
            @include('user.user-sidebar.sidebar')
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
