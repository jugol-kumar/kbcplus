@extends('layouts.admin.app')

@push('css')
    <link rel="stylesheet" href="{{ asset( 'assets/admin/css/switch/switch.css') }}">
    <style>
        .header-color{
            background-color: #fffef4;
        }
    </style>
@endpush

@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <div class="row mt-5 mt-5 clearfix">
                <div class="col-lg-12 ">
                    <h3 class="title float-left"><i class="icon-check mr-2"></i>Roles Table</h3>
                    <a href="{{ route('app.role.index')}}" class="btn l-khaki btn-default float-right mb-3"><i class="icon-arrow-left mr-2"></i>Go To Back</a>
                </div>
            </div>
            <form class="mb-5" action="{{ isset($role) ? route('app.role.update', $role->id) : route('app.role.store') }}" method="post">
                @isset($role)
                    @csrf
                    @method('PUT')
                @else
                    @csrf
                @endisset
                <div class="row mb-3">
                    <div class="col-sm-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Roles</h4>
                                <p class="card-description">Enter Unique Role Name</p>
                                <label for="rolenameinput">Role Name</label>
                                <input type="text" name="name" class="form-control" id="rolenameinput"
                                   @isset ($role)
                                        value="{{ $role->name }}"
                                       @else
                                       placeholder="Enter Role name..."
                                   @endisset
                                >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-2" id="example1">
                    <div class="col-sm-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-header header-color">

                                <h4 class="card-title">All Permissions</h4>
                                <p class="card-description">Module Wise Permissions</p>
                                <label class="label">
                                    <div class="toggle">
                                        <input class="toggle-state" type="checkbox" id="allCheck" name="check" value="check" />
                                        <div class="indicator"></div>
                                    </div>
                                    <div class="label-text">Select All</div>
                                </label>
                            </div>
                            <div class="card-body">
                                @forelse($modules->chunk(3) as $key => $chunk )
                                    <div class="form-row">
                                        @foreach($chunk as $key=> $module)
                                            <div class="col mt-4">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h4>{{$module->name}}</h4>
                                                        <label class="label mt-3">
                                                            <div class="toggle">
                                                                <input class="toggle-state" type="checkbox" name="check" value="check" />
                                                                <div class="indicator"></div>
                                                            </div>
                                                            <div class="label-text">Select All</div>
                                                        </label>
                                                    </div>

                                                    <div class="card-body l-pink">
                                                        @foreach($module->permissions as $key => $permission)
                                                            <div class="custom-control custom-switch">
                                                                <input name="permission[]" type="checkbox"  class="custom-control-input" id="{{$permission->name}}" value="{{ $permission->id }}"
                                                                    @isset($role)
                                                                        @foreach ($role->permissions as $item)
                                                                            {{ $permission->id == $item->id ? 'checked' : '' }}
                                                                        @endforeach
                                                                    @endisset
                                                                >
                                                                <label class="custom-control-label" for="{{$permission->name}}">{{ $permission->name }}</label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @empty
                                    <h1 class="display-2 text-danger">Any Module Not Found</h1>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-danger" id="print">Cancel</button>
            </form>
    </div>
@endsection
@push('js')
    <script type="text/javascript">
        $(document).ready(function (){
            $('#allCheck').click(function (){
                $('.custom-control-input').prop('checked', $ (this).prop('checked'));
            });
        });
    </script>
@endpush
