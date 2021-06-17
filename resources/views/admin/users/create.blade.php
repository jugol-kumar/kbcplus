@extends('layouts.admin.app')
@push('css')
    <link
        rel="stylesheet"
        type="text/css"
        href="https://unpkg.com/file-upload-with-preview@4.1.0/dist/file-upload-with-preview.min.css"
    />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/switch/switch.css') }}">
    <style>
        .custom-file-container__image-preview{
            overflow: hidden;
        }
    </style>
@endpush
@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <!-- Color Pickers -->

            <div class="row mt-5 mt-5 clearfix">
                <div class="col-lg-12 ">
                    <h3 class="title float-left"><i class="icon-user mr-2"></i>User Table</h3>
                    <a href="{{ route('app.user.index')}}" class="btn l-khaki btn-default float-right mb-3"><i class="icon-arrow-left mr-2"></i>Go To Back</a>
                </div>
            </div>
        </div>
        <form action="{{ route('app.user.store') }}" method="post" enctype="multipart/form-data">
        <div class="row mt-5 clearfix">
                @csrf
                <div class="col-md-7">
                    <div class="row">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-5">Add User</h4>
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" required="" placeholder="Enter User Name...">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" required="" placeholder="Enter User Email...">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" required="" placeholder="Enter User Password...">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password_confirmation" class="form-control" required="" placeholder="Enter User Conform Password...">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-5">Add Avatar</h4>
                                <div class="form-group mt-5">
                                    <div class="custom-file-container" data-upload-id="myUniqueUploadId">
                                        <label>Upload Single File
                                            <span class="custom-file-container__image-clear" title="Clear Image" ></span>
                                        </label>
                                        <label class="custom-file-container__custom-file">
                                            <input type="file" name="profile_image" class="custom-file-container__custom-file__custom-file-input" accept="*" aria-label="Choose File" />
                                            <span class="custom-file-container__custom-file__custom-file-control" ></span>
                                        </label>
                                        <div class="custom-file-container__image-preview"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 offset-1">
                    <div class="row">
                        <div class="card">
                            <div class="card-body">
                                <h4>Select Roles</h4>
                                <div class="form-group">
                                    <select id="max-select" name="role[]" class="form-control show-tick ms" multiple>
                                        @foreach($roles as $key => $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="card">
                            <div class="card-body">
                                <h4>User Simple Details</h4>
                                <textarea name="details" class="form-control" id="" rows="7" placeholder="User Details..."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="card">
                            <div class="card-body">
                                <h2>User Status</h2>

                                <label class="label mt-5">
                                    <div class="toggle">
                                        <input class="toggle-state" type="checkbox" id="allCheck" name="status" value="check" />
                                        <div class="indicator"></div>
                                    </div>
                                    <div class="label-text">User Status</div>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="card ">
                            <div class="card-body ">
                                <div class="ml-5">
                                    <button type="submit" class="btn btn-lg l-pink">Save User</button>
                                    <button type="reset" class="btn btn-lg l-khaki">Cancle User</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </form>
    </div>
@endsection
@push('js')
    <script src="https://unpkg.com/file-upload-with-preview@4.1.0/dist/file-upload-with-preview.min.js"></script>
    <script src="{{ asset('assets/admin/vendor/select2/select2.min.js') }}"></script>
    <script>
        var upload = new FileUploadWithPreview("myUniqueUploadId");

        $("#max-select").select2({
            placeholder: "~~Select Roles~~",
        });
    </script>
@endpush
