@extends('layouts.admin.app')
@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <div class="row mt-5 mt-5 clearfix">
                <div class="col-lg-12 ">
                    <h3 class="title float-left"><i class="icon-user mr-2"></i>User Table</h3>
                    <a href="{{ route('app.user.create') }}" class="btn l-amber btn-default float-right mb-3"><i class="icon-plus mr-2"></i>Add New</a>

                    <div class="card">
                        <div class="header">
                            <h2>User List</h2>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-hover m-b-0 c_list">
                                <thead>
                                <tr>
                                    <th>
                                        <label class="fancy-checkbox">
                                            <input class="select-all" type="checkbox" name="checkbox">
                                            <span></span>
                                        </label>
                                    </th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Created At</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $key => $user)
                                    <tr>
                                        <td style="width: 50px;">
                                            <label class="fancy-checkbox">
                                                <input class="checkbox-tick" type="checkbox" name="checkbox">
                                                <span></span>
                                            </label>
                                        </td>
                                        <td>
{{--                                            @if ($user->profile_image == 'placeholder')--}}
{{--                                                <img src="{{ config('app.placeholder') }}" class="rounded-circle avatar" alt="">--}}
{{--                                            @else--}}
{{--                                                <img src="@if($user->profile_image==null ? 'app.placeholder' : '')--}}
{{--                                                    --}}
{{--                                                @endif" class="rounded-circle avatar" alt="">--}}
{{--                                            @endif--}}
                                            <img src="@if($user->profile_image==null){{ config('app.placeholder') }}@else{{ asset('storage/users').'/'.$user->profile_image}}@endif" alt="" class="rounded-circle avatar"/>

                                            <p class="c_name">{{ $user->name }}</p>

                                            
                                             @if(!empty($user->role))
                                                <span class="badge badge-success m-l-10 hidden-sm-down">
                                                        {{ $user->role->name }}
                                                    </span>
                                               @else
                                                <span class="badge badge-danger m-l-10 hidden-sm-down">
                                                        No Role Found
                                                    </span>
                                              @endif
                                        </td>
                                        <td>
                                            <span class="phone"><i class="zmdi zmdi-phone m-r-10"></i>{{ $user->email }}</span>
                                        </td>
                                        <td>
                                            <address><i class="zmdi zmdi-pin"></i>{{ $user->created_at->diffForhumans() }}</address>
                                        </td>
                                        <td>
                                            @if ($user->status == 1 )
                                                <span class="badge l-pink">Active</span>
                                            @else
                                                <span class="badge l-blue">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('app.user.show', $user->id) }}" class="btn l-pink" title="Edit"><i class="icon-eye"></i></a>
                                            <a href="{{ route('app.user.edit', $user->id) }}" class="btn l-khaki" title="Edit"><i class="icon-pencil"></i></a>
                                            <a class="btn l-blue" onclick="showCancelMessage({{ $user->id }}); event.preventDefault();"><i class="icon-trash" ></i></a>

                                            <form id="delete-data-{{ $user->id }}" action="{{ route('app.user.destroy', $user->id) }}" method="post" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
