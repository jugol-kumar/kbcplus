@extends('layouts.admin.app')
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/switch/switch.css') }}">
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
                                <table id="sub_cat_table" class="table table-striped js-basic-example  table-custom">
                                    <thead>
                                    <tr>
                                        <th>#Id</th>
                                        <th>Sub Category Name</th>
                                        <th>Category Name</th>
                                        <th>Description
                                        <th>Status</th>
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
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>

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
                        <form id="sub_category">
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
                                <input type="text" id="sub_cat_name" name="name" placeholder="Enter Category Name..." class="form-control">
                            </div>
                            <div class="form-row">
                                <label for="">Category Name</label>
                                <textarea name="description" id="sub_cat_description" class="form-control" rows="5" placeholder="Enter Category Description..."></textarea>
                                <small class="text-danger">Max 150 character Description Text</small>
                            </div>
                            <div class="form-group mt-3">
                                <label class="label">
                                    <div class="toggle">
                                        <input class="toggle-state" type="checkbox" id="statusCheck" name="status"/>
                                        <div class="indicator"></div>
                                    </div>
                                    <div class="label-text">Status</div>
                                </label>
                            </div>
                            <div class="btn-group mt-3">
                                <button type="submit" id="saveBtn" class="btn l-coral">Save Category</button>
                                <button type="button"  data-dismiss="modal" class="btn l-parpl">Cancel</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{------------------------------------------add Modal end modal is here ----------------------------------------}}



    {{------------------------------------------Edit Modal Start modal is here --------------------------------------}}
    <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="card">
                    <div class="header">
                        <h3 id="modal-title"></h3>
                    </div>
                    <div class="card-body">
                        <form id="updateSCat">
                            <div class="form-row mb-3">
                                <label for="">Category Name</label>
                                <select id="cat-select" id="cat_id" name="category_id" class="form-control show-tick ms">
                                    <option disabled selected>~~Select Category~~</option>
                                    @foreach($categories as $key => $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-row mb-3">
                                <label for="">Sub Category Name</label>
                                <input type="text" name="name" id="scat-name" class="form-control">
                                <input type="hidden" name="id" id="scat-id" class="form-control">
                            </div>
                            <div class="form-row">
                                <label for="">Sub Category Description </label>
                                <textarea name="description" class="form-control" rows="5" id="description"></textarea>
                                <small class="text-danger">Max 150 character Description Text</small>
                            </div>
                            <div class="form-row">
                                <label class="label">
                                    <div class="toggle">
                                        <input class="toggle-state" type="checkbox" id="checkupdateStatus" name="status"/>
                                        <div class="indicator"></div>
                                    </div>
                                    <div class="label-text">Status</div>
                                </label>
                            </div>
                            <div class="btn-group mt-3">
                                <button id="updateBtn" class="btn l-coral">Save Category</button>
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
            // placeholder: "~~Select Category~~",
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //add sub category
        $('#saveBtn').click(function(e){
            e.preventDefault();
            var formData = $('#sub_category').serializeArray();
            if ( $("#statusCheck").is(':checked') == true) {
                formData.push({name:'status', value:'active'});
            }else{
                formData.push({name:'status', value:'inactive'});
            }
            $.ajax({
                url: "{{ route('app.subcategory.store') }}",
                type: "POST",
                dataType: 'JSON',
                data: formData,
                success: function (response){
                    if(response.code == 200){
                        $('#add-modal').modal('hide');
                        table.ajax.reload();
                    }
                }
            })
        });

        //get all sub category
        var table = $('#sub_cat_table').DataTable({
            ajax: "{{ route('app.subcategory.api') }}",
            columns:[
                {data: 'SrNo',
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {'data': 'name'},

                {'data': 'category',
                    render: function(data, type, row){
                        return `${data.name}`
                    }
                },
                {'data': 'description',
                    render: function(data,  type, row){
                        return `${data}`
                    }
                },
                {'data': 'status',
                    render: function(data,  type, row){
                        if (data === 'active'){
                            return `<span class="badge badge-default">${data}</span>`
                        }else{
                            return `<span class="badge badge-danger">${data}</span>`
                        }
                    }
                },
                {'data': 'created_at',
                    render: function(data, type, row){
                        var date =  new Date(data);
                        var day = date.getDate();
                        var month = date.getMonth() +1;
                        var year = date.getFullYear();
                        return ("0" + day).slice(-2) + '-' + (month.length > 1 ? month : "0" + month) + '-' + year;
                        return moment.utc(data, "x").toISOString();
                    }

                },
                {
                    'data': 'null',
                    render: function(data, type, row){
                        return `
                            <a data-id="${row.id}" id="editSCat" class="btn btn-sm  g-roseanna  edit-button text-white">
                             <i class="icon-pencil" ></i>
                            </a>

                            <a data-id="${row.id}" id="deleteCategory" onclick="scatDelete('${row.id}')" class="btn btn-sm  btn-danger delete-button text-white">
                                <i class="icon-trash" ></i>
                            </a>`;
                    }

                },
            ]

        });

        // edit sub category
        $("body").delegate('#editSCat','click', function() {
            var subCId = $(this).data('id');
            $.ajax({
               url: "{{ route('app.subcategory.edit') }}",
                type: "POST",
                data: {
                   id: subCId
                },
                dataType: "JSON",
                success: function (res){
                   if (res.code === 200){
                       $('#edit-modal').modal('show');
                       $('#modal-title').html("Edit Sub Category Form");
                       $('#scat-name').val(res.data.name);
                       $('#scat-id').val(res.data.id);
                       $('#description').val(res.data.description);
                       var optoin = res.data.category_id;
                       $(`#cat-select option[value='${optoin}']`).attr('selected','selected');
                      // var std =  $('[select option]').val();
                       if (res.data.status === 'active'){
                           $('#statusCheckE').prop('checked', true)
                       }else{
                           $('#statusCheckE').prop('checked', false)
                       }
                   }
                }
            });
        });

        //update sub category

        $('#updateBtn').on('click', function (e){
            e.preventDefault();
            var data = $('#updateSCat').serializeArray();
            if ( $("#checkupdateStatus").is(':checked') == true) {
                data.push({name:'status', value:'active'});
            }else{
                data.push({name:'status', value:'inactive'});
            }
            $.ajax({
               url: "{{ route('app.subcategory.update') }}",
                method: "POST",
               dataType: "JSON",
               data: data,
               success:function (res){
                   if(res.code == 200){
                       $('#edit-modal').modal('hide');
                       table.ajax.reload();
                   }
               }
            });
        });
        //delte sub category is here
        function scatDelete(e){
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#dc3545",
                confirmButtonText: "Delete",
                cancelButtonText: "Cancel",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: "{{ route('app.subcategory.delete') }}",
                        method: "POST",
                        dataType: "JSON",
                        data: {
                            id:e,
                        },
                        success: function (res){
                            if(res.code == 200){
                                swal({title: "Success!", text: "Sub Category Delete Successfully Done...", type: "success"},function() {
                                table.ajax.reload();
                            })
                            }
                        }
                    })
                } else {
                    swal("Cancelled", "Your imaginary file is safe :)", "error");
                }
            });
        }




    </script>
@endpush
