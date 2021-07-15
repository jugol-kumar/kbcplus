@extends('layouts.admin.app')
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/switch/switch.css') }}">
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
                                <table id="show-table" class="table table-striped js-basic-example  table-custom">
                                    <thead>
                                    <tr>
                                        <th>#Id</th>
                                        <th>Brand's Name</th>
                                        <th>Avatar</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>#Id</th>
                                        <th>Brand's Name</th>
                                        <th>Avatar</th>
                                        <th>Description</th>
                                        <th>Status</th>
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

    {{--    ----------------------------------------add Modal Start modal is here --------------------------------------}}
    <div class="modal fade" id="add-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form id="add-brand" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="header">
                            <h3>Add Brands</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Brand's Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Enter Brand's Name...">
                                    </div>
                                </div>
                                <div class="col-6"style="margin-top: 27px;">
                                    <label for="">You Can Find Brand Image Form Here</label><a href="https://worldvectorlogo.com/" target="_blank">  Click Here</a>
                                    <div class="input-group">
                                       <span class="input-group-btn">
                                         <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                           <i class="fa fa-picture-o"></i> Choose
                                         </a>
                                       </span>
                                        <input id="thumbnail" class="form-control" type="text" name="brand_logo">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group mt-3">
                                        <label class="label">
                                            <div class="toggle">
                                                <input class="toggle-state"  name="status" type="checkbox" id="gridCheck" />
                                                <div class="indicator"></div>
                                            </div>
                                            <div class="label-text">Status</div>
                                        </label>
                                    </div>
                                </div>

                                <div class="btn-group mt-3">
                                    <button id="save-brand" class="btn btn-primary">Save</button>
                                    <button type="submit" class="btn btn-danger">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{--    ----------------------------------------add Modal end modal is here ----------------------------------------}}

    {{--    ----------------------------------------edit Modal Start modal is here --------------------------------------}}
    <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form id="edit-brand-form" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="header">
                            <h3>Edit Brands</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Brand's Name</label>
                                        <input type="text" name="name" class="form-control" id="name">
                                        <input type="hidden" name="id" id="editId">
                                    </div>
                                </div>
                                <div class="col-6 " style="margin-top: 27px;">
                                    <div class="input-group">
                                       <span class="input-group-btn">
                                         <a id="elfm" data-input="thumbnaile" data-preview="holder" class="btn btn-primary">
                                           <i class="fa fa-picture-o"></i> Choose
                                         </a>
                                       </span>
                                        <input id="thumbnaile" class="form-control" type="text" name="brand_logo">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <h4 class="card-title mb-5">Brand's Details</h4>
                                        <textarea name="description" class="form-control" id="description" rows="5" placeholder="Enter some details for this brand's..."></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-8 ">
                                    <div class="form-group mt-3">
                                        <label class="label">
                                            <div class="toggle">
                                                <input class="toggle-state checkUpdatStatus" type="checkbox" id="statusCheck" name="status"/>
                                                <div class="indicator"></div>
                                            </div>
                                            <div class="label-text">Status</div>
                                        </label>
                                    </div>
                                    <button id="save-brand" class="btn btn-primary">Save</button>
                                    <button  id="cancel"class="btn btn-danger">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{--    ----------------------------------------edit Modal end modal is here ----------------------------------------}}


@endsection
@push('js')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        $('#lfm').filemanager('image');
        $('#elfm').filemanager('image');


        $('#cancel').on('click', function(e){
            e.preventDefault();
            $('.modal').modal('hide');
        })

        //ajax setup
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //add brand is here
        $('#add-brand').submit(function(e){
            event.preventDefault();
            $.ajax({
                url: "{{ route('app.slider.store') }}",
                method: "POST",
                data: new FormData(this),
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function (data){
                    $('#add-modal').modal('hide');
                    table.ajax.reload();
                }
            });
        });

        //show brand is here
        var table = $('#show-table').DataTable({
            ajax: "{{ route('app.brand.all.show') }}",

            columns:[
                {data: 'SrNo',
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {'data': 'name'},
                {'data' : 'brand_logo',
                    render: function (data, row, type){
                        return `<img src="${data}"  class="" width="50" height="50" />`
                    },
                },
                {'data' : 'description',
                    render: function (data, row, type){
                        return data
                    },
                },
                {
                    'data' : 'status',
                    render:function (data, row, type){
                        if(data == 'on'){
                            return `<span class="badge l-blue">Active</span>`
                        }else{
                            return `<span class="badge l-coral">Inactive</span>`
                        }
                    }
                },
                {'data' : 'id',
                    render:function(data, row, type){
                        return `
                                <a onclick="editBrand(${data})" id="editBrand" class="btn btn-sm  l-turquoise text-white">
                                    <i class="icon-pencil" ></i>
                                </a>
                                <a onclick="deleteBrand(${data})" class="btn btn-sm l-coral text-white">
                                    <i class="icon-trash" ></i>
                                </a>`;
                    }
                },

            ]
        });

        //edit brad is here
        function editBrand(id){
            if (id != null){
                $.ajax({
                    url:"{{ route('app.brand.edit') }}",
                    dataType: "JSON",
                    data:{id: id,},
                    type: "POST",
                    success: function(res){
                        $('#edit-modal').modal('show');
                        $('#name').val(res.brand.name);
                        $('#editId').val(res.brand.id);
                        $('#thumbnaile').val(res.brand.brand_logo);
                        $('#description').val(res.brand.description);
                        if (res.brand.status === 'on'){
                            $('#statusCheck').prop('checked', true)
                        }else{
                            $('#statusCheck').prop('checked', false)
                        }
                    }
                });
            }
        }

        //update brand is here
        $('#edit-brand-form').submit(function(e){
            e.preventDefault();
            var data = $(this).serializeArray();
            if ($('.checkUpdatStatus').is(':checked') == true){
                data.push({name:'status', value:'on'});
            }else{
                data.push({name:'status', value:''});
            }
            $.ajax({
                url: "{{ route('app.brand.update') }}",
                type:"POST",
                dataType: "JSON",
                data:data,
                success: function (res){
                    if (res.code === 200){
                        table.ajax.reload();
                        $('#edit-modal').modal('hide');
                    }
                }
            });
        });

        //delete brand is here
        function deleteBrand(id){
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
                    if (id != null){
                        $.ajax({
                            url: "{{ route('app.brand.destroy',"")}}/"+id,
                            data:{id:id},
                            dataType:"JSON",
                            type:"DELETE",
                            success: function (res){
                                if(res.code == 200){
                                    swal({title: "Success!", text: "Brand Delete Successfully Done...", type: "success"},function() {
                                        table.ajax.reload();
                                    })
                                }
                            }
                        });
                    }
                }else {
                    swal("Cancelled", "Your imaginary file is safe :)", "error");
                }
            });
        }

    </script>

@endpush
