@extends('layouts.admin.app')
@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <div class="row mt-5 mt-5 clearfix">
                <div class="col-lg-12 ">
                    <h3 class="title float-left"><i class="icon-check mr-2"></i>Roles Table</h3>
                    <a href="{{ route('app.role.create')}}" class="btn l-amber btn-default float-right mb-3"><i class="icon-plus mr-2"></i>Add New</a>
                    <div class="card">
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-striped js-basic-example  table-custom">
                                    <thead>
                                    <tr>
                                        <th>#Id</th>
                                        <th>Name</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>#Id</th>
                                        <th>Name</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($roles as $key => $role)
                                            <tr>
                                                <td>{{ $key+1}}</td>
                                                <td>{{ $role->name }}
                                                    <span class="badge badge-default">{{ $role->permissions->count() }}</span></td>
                                                <td>{{ $role->created_at->format('d-M-Y') }}</td>
                                                <td>
                                                    <a class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit"><i class="icon-eye" ></i></a>
                                                    <a href="{{ route('app.role.edit', $role->id) }}" class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit"><i class="icon-pencil" ></i></a>
                                                    <a class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit" onclick="showCancelMessage({{ $role->id }}); event.preventDefault();"><i class="icon-trash" ></i></a>

                                                    <form id="delete-data-{{ $role->id }}" action="{{ route('app.role.destroy', $role->id) }}" method="post" style="display: none;">
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
    </div>
@endsection
