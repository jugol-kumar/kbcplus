@extends('layouts.admin.app')
@push('css')
@endpush

@section('content')
    <div id="main-content" class="profilepage_2 blog-page">
        <div class="container-fluid">
            <div class="row clearfix mt-5">
                <div class="col-lg-6 col-md-12 mx-auto">
                    <div class="card profile-header">
                        <div class="body">
                            <div class="profile-image"> <img src="{{ config('app.placeholder') }}" style="width: 140px; height: 140px;" class="rounded-circle" alt=""> </div>
                            <div>
                                <h4 class="m-b-0">{{ $user->name }}</h4>
                                <small>{{ $user->email }}</small>
                                <br>
                                <p>{{ $user->details }}</p>
                                <br>
                                @if ($user->status == 1)
                                    <span class="btn l-green">Active</span>
                                @else
                                    <span class="btn l-turquoise">Inactive</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="card profile-header">
                        <div class="body">
                            @foreach($user->roles as $role)
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">{{ $role->name }}</h4>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix mt-5">
                <div class="col-12">
                    <div class="card">
                        <div class="row ml-2 mt-3 mr-2">
                            @foreach($user->roles as $role)
                                @foreach($role->permissions as $permission)
                                    <div class="col-3">
                                        <div class="card">
                                            <div class="card-header">
                                                <h6>{{ $permission->name }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
