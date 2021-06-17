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
        #brand_image{
            margin-top: 35px;
        }
    </style>
@endpush
@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <div class="row mt-5 mt-5 clearfix">
                <div class="col-lg-12 ">
                    <h3 class="title float-left"><i class="icon-star mr-2"></i>Brand's Table</h3>
                    <button data-toggle="modal" data-target="#add-modal" class="btn l-amber btn-default float-right mb-3">
                        <i class="icon-plus mr-2"></i>Add New
                    </button>
                    <div class="card">
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-striped js-basic-example  table-custom">
                                    <thead>
                                    <tr>
                                        <th>#Id</th>
                                        <th>Brand's Name</th>
                                        <th>Avatar</th>
                                        <th>Sub Category</th>
                                        <th>Description</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>#Id</th>
                                        <th>Brand's Name</th>
                                        <th>Avatar</th>
                                        <th>Sub Category</th>
                                        <th>Description</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach ($brands as $key=> $item)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td><img src="{{ asset('storage/brands') }}/{{ $item->brand_logo }}"class="rounded-circle" width="48" height="48" alt=""></td>
                                            <td>{{ $item->subcategory->name }}</td>
                                            <td>{{ $item->description }}</td>
                                            <td>{{ $item->created_at->diffForHumans() }}</td>
                                            <td>
                                                <a data-toggle="modal"
                                                   data-target="#show-modal"
                                                   data-id="{{ $item->id }}"
                                                   data-name="{{ $item->name }}"
                                                   data-desctiptioin="{{ $item->description }}"
                                                   data-category="{{ $item->subcategory->name }}"
                                                   data-image="{{ asset('storage/brands') }}/{{ $item->brand_logo }}"
                                                   class="btn l-khaki"
                                                ><i class="icon-eye"></i>
                                                </a>
                                                <a data-toggle="modal"
                                                   data-target="#edit-modal"
                                                   class="btn l-blue"
                                                   data-id="{{ $item->id }}"
                                                   data-name="{{ $item->name }}"
                                                   data-desctiptioin="{{ $item->description }}"
                                                   data-category="{{ $item->subcategory->name }}"
                                                   data-image="{{ $item->brand_logo }}"
                                                ><i class="icon-pencil"></i>
                                                </a>
                                                <a class="btn l-amber" onclick="showCancelMessage({{ $item->id }}); event.preventDefault();"><i class="icon-trash" ></i></a>
                                                <form id="delete-data-{{ $item->id }}" action="{{ route('app.brand.destroy', $item->id) }}" method="post" style="display: none;">
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

{{--    ----------------------------------------add Modal Start modal is here --------------------------------------}}
    <div class="modal fade" id="add-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="{{ route('app.brand.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="header">
                            <h3>Add Sub Category </h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                
                                <div class="col-6">
                                   <div class="form-group">
                                        <label for="">Brand's Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Enter Brand's Name...">
                                    </div>
                                </div>

                                <div class="col-6">
                                     <div class="form-group">
                                        <label for="">Brand Logo</label>
                                   <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text">Upload</span>
                                      </div>
                                      <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile01">
                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                      </div>
                                    </div>
                                </div>
                                </div>
                            
                            <div class="col-12">
                               <div class="form-group">
                                        <h4 class="card-title mb-5">Brand's Details</h4>
                                        <textarea name="description" class="form-control" id="descriptoin" rows="5" placeholder="Enter some details for this brand's..."></textarea>
                               </div>
                            </div>

                            <div class="col-lg-8 col-md-8 ">
                             <div class="form-group">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" id="gridCheck">
                                  <label class="form-check-label" for="gridCheck">
                                    Check status
                                  </label>
                                </div>
                              </div>

                              <button type="submit" class="btn btn-primary">Save</button>

                              <button type="submit" class="btn btn-danger">Cancel</button>

                            </div>

                           
                            
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
{{--    ----------------------------------------add Modal end modal is here ----------------------------------------}}

{{--    --}}{{-------------------------------------------Show Modal Start modal is here ------------------------------------}}
    <div class="modal fade" id="show-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="card">
                    <div class="header">
                        <h3>Show Sub Category </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-row mb-3">
                                    <label for="">#id</label>
                                    <input type="text" disabled id="id" class="form-control" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-row mb-3">
                                    <label for="">Category Name</label>
                                    <input type="text" disabled id="category" class="form-control" value="">
                                </div>
                            </div>
                        </div>
                        <div class="form-row mb-3">
                            <label for="">Sub Category Name</label>
                            <input type="text" disabled id="sub_category" class="form-control">
                        </div>
                        <div class="form-row">
                            <label for="">Sub Category Description's</label>
                            <textarea name="description" id="description" class="form-control" rows="3" disabled></textarea>
                        </div>
                        <div class="form-row">
                            <label for="">Brand Image</label><br>
                            <img id="brand_image" class="media-object"/>
                        </div>
                        <div class="btn-group mt-3">
                            <button type="button"  data-dismiss="modal" class="btn l-parpl">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--    --}}{{-----------------------------------------add Modal end modal is here -----------------------------------------}}

<div>

{{--    ----------------------------------------add Modal Start modal is here --------------------------------------}}
{{--    <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog">--}}
{{--        <div class="modal-dialog" role="document">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="card">--}}
{{--                    <div class="header">--}}
{{--                        <h3>Edit Sub Category </h3>--}}
{{--                    </div>--}}
{{--                    <div class="card-body">--}}
{{--                        <form action="{{ route('app.subcategory.update', 'id') }}" method="post">--}}
{{--                            @method('PUT')--}}
{{--                            @csrf--}}
{{--                            <div class="form-row mb-3">--}}
{{--                                <label for="">Category Name</label>--}}
{{--                                <select id="max-select" name="category_id" class="form-control show-tick ms">--}}
{{--                                    <option disabled>~~Select Category~~</option>--}}
{{--                                    @foreach($categories as $key => $item)--}}
{{--                                        <option value="{{ $item->id }}">{{ $item->name }}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}

{{--                            <div class="form-row mb-3">--}}
{{--                                <label for="">Sub Category Name</label>--}}
{{--                                <input type="text" name="name" id="sub_category" class="form-control">--}}
{{--                                <input type="hidden" name="id" id="id" class="form-control">--}}
{{--                            </div>--}}
{{--                            <div class="form-row">--}}
{{--                                <label for="">Category Name</label>--}}
{{--                                <textarea name="description" class="form-control" rows="5" id="description"></textarea>--}}
{{--                                <small class="text-danger">Max 150 character Description Text</small>--}}
{{--                            </div>--}}
{{--                            <div class="btn-group mt-3">--}}
{{--                                <button type="submit" class="btn l-coral">Save Category</button>--}}
{{--                                <button type="button"  data-dismiss="modal" class="btn l-parpl">Cancel</button>--}}
{{--                            </div>--}}

{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    ----------------------------------------add Modal end modal is here ----------------------------------------}}

</div>

@endsection
@push('js')

    <script src="https://unpkg.com/file-upload-with-preview@4.1.0/dist/file-upload-with-preview.min.js"></script>
    <script src="{{ asset('assets/admin/vendor/select2/select2.min.js') }}"></script>
    <script>
        $("#max-select").select2();

        $('#show-modal').on('show.bs.modal', function (event){

           var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('name')
            var desctiptioin = button.data('desctiptioin')
            var brand_image = button.data('image')

            var modal = $(this)
            modal.find('#id').val(id)
            modal.find('#category').val(category)
            modal.find('#sub_category').val(name)
            modal.find('#description').val(desctiptioin)
            $("#brand_image").attr("src",brand_image);

        });
        $('#edit-modal').on('show.bs.modal', function (event){
           var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('name')
            var desctiptioin = button.data('desctiptioin')
            var category = button.data('category')
            var modal = $(this)
            modal.find('#id').val(id)
            modal.find('#sub_category').val(name)
            modal.find('#description').val(desctiptioin)
        });
        var upload = new FileUploadWithPreview("myUniqueUploadId");
    </script>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        $('#lfm').filemanager('image');
    </script>

@endpush
