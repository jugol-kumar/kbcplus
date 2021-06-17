@extends('layouts.admin.app')
@push('css')

@endpush
@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <div class="row mt-5 mt-5 clearfix">
                <div class="col-lg-12 ">
                    <h3 class="title float-left"><i class=" icon-pie-chart mr-2"></i>Sub Category Table</h3>
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
                                        <th>Sub Category Name</th>
                                        <th>Category Name</th>
                                        <th>Description</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>#Id</th>
                                        <th>Sub Category Name</th>
                                        <th>Category Name</th>
                                        <th>Description</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($subCategories as $key=> $item)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->category->name }}</td>
                                                <td>{{ $item->description }}</td>
                                                <td>{{ $item->created_at->diffForHumans() }}</td>
                                                <td>
                                                    <a data-toggle="modal"
                                                       data-target="#show-modal"
                                                       data-id="{{ $item->id }}"
                                                       data-name="{{ $item->name }}"
                                                       data-desctiptioin="{{ $item->description }}"
                                                       data-category="{{ $item->category->name }}"
                                                       class="btn l-khaki"
                                                    ><i class="icon-eye"></i>
                                                    </a>

                                                    <a data-toggle="modal"
                                                       data-target="#edit-modal"
                                                       class="btn l-blue"
                                                       data-id="{{ $item->id }}"
                                                       data-name="{{ $item->name }}"
                                                       data-desctiptioin="{{ $item->description }}"
                                                       data-category="{{ $item->category->name }}"

                                                    ><i class="icon-pencil"></i>
                                                    </a>
                                                    <a class="btn l-amber" onclick="showCancelMessage({{ $item->id }}); event.preventDefault();"><i class="icon-trash" ></i></a>
                                                    <form id="delete-data-{{ $item->id }}" action="{{ route('app.subcategory.destroy', $item->id) }}" method="post" style="display: none;">
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

    {{------------------------------------------add Modal Start modal is here --------------------------------------}}
    <div class="modal fade" id="add-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="card">
                    <div class="header">
                        <h3>Add Sub Category </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('app.subcategory.store') }}" method="post">
                            @csrf
                            <div class="form-row mb-3">
                                <label for="">Category Name</label>

                                <select id="max-select" name="category_id" class="form-control show-tick ms">
                                    <option disabled>~~Select Category~~</option>
                                    @foreach($categories as $key => $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-row mb-3">
                                <label for="">Sub Category Name</label>
                                <input type="text" name="name" placeholder="Enter Category Name..." class="form-control">
                            </div>
                            <div class="form-row">
                                <label for="">Category Name</label>
                                <textarea name="description" class="form-control" rows="5" placeholder="Enter Category Description..."></textarea>
                                <small class="text-danger">Max 150 character Description Text</small>
                            </div>
                            <div class="btn-group mt-3">
                                <button type="submit" class="btn l-coral">Save Category</button>
                                <button type="button"  data-dismiss="modal" class="btn l-parpl">Cancel</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{------------------------------------------add Modal end modal is here ----------------------------------------}}

    {{-------------------------------------------Show Modal Start modal is here ------------------------------------}}
    <div class="modal fade" id="show-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="card">
                    <div class="header">
                        <h3>Show Sub Category </h3>
                    </div>
                    <div class="card-body">
                        <div class="form-row mb-3">
                            <label for="">#id</label>
                            <input type="text" disabled id="id" class="form-control" value="">
                        </div>

                        <div class="form-row mb-3">
                            <label for="">Category Name</label>
                            <input type="text" disabled id="category" class="form-control" value="">
                        </div>

                        <div class="form-row mb-3">
                            <label for="">Sub Category Name</label>
                            <input type="text" disabled id="sub_category" class="form-control">
                        </div>
                        <div class="form-row">
                            <label for="">Sub Category Description's</label>
                            <textarea name="description" id="description" class="form-control" rows="5" disabled></textarea>
                        </div>
                        <div class="btn-group mt-3">
                            <button type="button"  data-dismiss="modal" class="btn l-parpl">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-----------------------------------------add Modal end modal is here -----------------------------------------}}


    {{------------------------------------------add Modal Start modal is here --------------------------------------}}
    <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="card">
                    <div class="header">
                        <h3>Edit Sub Category </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('app.subcategory.update', 'id') }}" method="post">
                            @method('PUT')
                            @csrf
                            <div class="form-row mb-3">
                                <label for="">Category Name</label>
                                <select id="max-select" name="category_id" class="form-control show-tick ms">
                                    <option disabled>~~Select Category~~</option>
                                    @foreach($categories as $key => $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-row mb-3">
                                <label for="">Sub Category Name</label>
                                <input type="text" name="name" id="sub_category" class="form-control">
                                <input type="hidden" name="id" id="id" class="form-control">
                            </div>
                            <div class="form-row">
                                <label for="">Category Name</label>
                                <textarea name="description" class="form-control" rows="5" id="description"></textarea>
                                <small class="text-danger">Max 150 character Description Text</small>
                            </div>
                            <div class="btn-group mt-3">
                                <button type="submit" class="btn l-coral">Save Category</button>
                                <button type="button"  data-dismiss="modal" class="btn l-parpl">Cancel</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{------------------------------------------add Modal end modal is here ----------------------------------------}}


@endsection
@push('js')
    <script src="{{ asset('assets/admin/vendor/select2/select2.min.js') }}"></script>
    <script>
        $("#max-select").select2({
            placeholder: "~~Select Category~~",
        });

        $('#show-modal').on('show.bs.modal', function (event){
           var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('name')
            var desctiptioin = button.data('desctiptioin')
            var category = button.data('category')
            var modal = $(this)
            modal.find('#id').val(id)
            modal.find('#category').val(category)
            modal.find('#sub_category').val(name)
            modal.find('#description').val(desctiptioin)
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
    </script>
@endpush
