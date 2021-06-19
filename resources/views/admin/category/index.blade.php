@extends('layouts.admin.app')
@push('css')
  <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css"> -->
@endpush
@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <div class="row mt-5 mt-5 clearfix">
                <div class="col-lg-12 ">
                    <h3 class="title float-left"><i class="icon-disc mr-2"></i>Category table</h3>
                    <button onclick="addPost()" class="btn l-amber btn-default float-right mb-3"><i class="icon-plus mr-2"></i>Add New</button>
                    <div class="card">

                        <div class="body">
                            <div class="table-responsive">
                                <table id="categoryTable" class="table table-striped js-basic-example  table-custom">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Icon</th>
                                        <th>Description</th>
                                        <th>Created At</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                         <th>ID</th>
                                        <th>Name</th>
                                        <th>Icon</th>
                                        <th>Description</th>
                                        <th>Created At</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody id="showResult">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


{{--        ------------------------------------------add Modal Start modal is here ------------------------------------ --}}
    <div class="modal fade" id="add-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="card">
                    <div class="modal-header">
                        <h3 class="modal-title"> </h3>
                        <button type="button" class="close" id="addModalClose">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <form  id="categoryForm" >

                            <div class="form-row mb-3">
                                <label for="">Category Name</label>
                                <input type="text" name="name" id="name" placeholder="Enter Category Name..." class="form-control">
                            </div>
                            <div class="form-row mb-3">
                                <label for="">Icon Class Name</label>
                                <input type="text" name="icon_class" id="icon_class" placeholder="Enter Class" class="form-control">
                            </div>
                            <div class="form-row">
                                <label for="">Category Name</label>
                                <textarea name="description" id="description" class="form-control" rows="5" placeholder="Enter Category Description..."></textarea>
                                <small class="text-danger">Max 150 character Description Text</small>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" name="status" id="statusCheck" value="inactive">
                                  <label class="form-check-label" for="gridCheck">
                                    Check status
                                  </label>
                                </div>
                              </div>
                            <div class="btn-group mt-3">
                                <button type="submit" id="saveBtn" class="btn l-coral">Save Category</button>
                                <button type="button" id="addModalClose" class="btn l-parpl">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--        ------------------------------------------Add Modal end modal is here ------------------------------------ --}}




{{--        ------------------------------------------Edit Modal Start modal is here ------------------------------------ --}}
    <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="card">
                    <div class="modal-header">
                        <h3 class="modal-title"> </h3>
                        <button type="button" class="close editcancel">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <form  id="categoryUpdateForm"  >
                            <input type="hidden" name="cat_id" id="cat_id">
                            <div class="form-row mb-3">
                                <label for="">Category Name</label>
                                <input type="text" name="name" id="u_name" placeholder="Enter Category Name..." class="form-control">

                                <small class="text-danger" style="display: none;" id="nameValid">Name field must not be empty !</small>
                            </div>
                            <div class="form-row mb-3">
                                <label for="">Icon Class Name</label>
                                <input type="text" name="icon_class" id="u_icon_class" placeholder="Enter Class" class="form-control">
                            </div>
                            <div class="form-row">
                                <label for="">Category Name</label>
                                <textarea name="description" id="u_description" class="form-control" rows="5" placeholder="Enter Category Description..."></textarea>
                                <small class="text-danger">Max 150 character Description Text</small>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                  <input class="form-check-input" name="status" type="checkbox" id="editCheck">
                                  <label class="form-check-label" for="gridCheck">
                                    Check status
                                  </label>
                                </div>
                              </div>
                            <div class="btn-group mt-3">
                                <button type="submit" id="updateBtn" class="btn l-coral">Update Category</button>
                                <button type="button"  class="btn l-parpl editcancel">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--        ------------------------------------------Edit Modal end modal is here ------------------------------------ --}}








@endsection

@push('js')

 <!-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script> -->


    <script>

        $(document).ready(function(){


            $('#statusCheck').val('inactive');

            $('#statusCheck').click(function(){
               if ($('#statusCheck').is(':checked') == true) {
                 $('#statusCheck').val('active');
               }else{
                 $('#statusCheck').val('inactive');
               }
            })






        })

      function editFormReset(){

                $('.modal-title').html('')
                $('#cat_id').val('')
                $("#u_name").val('')
                $("#u_icon_class").val('')
                $("#u_description").val('')
                $('#editCheck').prop('checked', false);
                $("#editCheck").val('inactive')
                $('#edit-modal').modal('hide');
             }
       function addModalReset(){
           $('.modal-title').html('');
           $('#cat_id').val('');
           $("#name").val('')
           $("#icon_class").val('')
           $("#description").val('')
           $('#statusCheck').prop('checked', false)
           $('#statusCheck').val('inactive');
          $('#add-modal').modal('hide');
       }



       $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   }
             });
     // Modal Show AddCategory
       function addPost(){
           $('.modal-title').html('Add New Category');
           $('#cat_id').val('');
           $("#name").val('')
           $("#icon_class").val('')
          $("#description").val('')
          $('#add-modal').modal('show');
       }
     // Add Model Close
     $("body").delegate('#addModalClose', 'click', function(){
        addModalReset();
     })

    // Edit Category

           $("body").delegate('.edit-button','click', function(){
            var c_id = $(this).data('id');
            $.ajax({

                url:`/app/category/${c_id}/edit`,
                type: "GET",
                success: function(response) {

                    $('.modal-title').html('Edit Category')
                    $('#cat_id').val(response.id)
                    $("#u_name").val(response.name)
                    $("#u_icon_class").val(response.icon_class)
                    $("#u_description").val(response.description)
                    var checkBox = $("#editCheck").val(response.status)
                    if (response.status == 'active') {
                        $('#editCheck').prop('checked', true);
                    }else{
                          $('#editCheck').prop('checked', false);
                    }
                    $('#edit-modal').modal('show');

                }
            })

           });


           // Cancel Modal
           $("body").delegate('.editcancel', 'click', function(){
                 editFormReset();
           });


   // Category Add
        $('#saveBtn').click( function (e) {

            e.preventDefault();
            $(this).html('Sending..');

             var formData = $('#categoryForm').serializeArray();
                  if ( $("#statusCheck").is(':checked') == true) {
                         formData.push({name:'status', value:'active'});
                    }else{
                          formData.push({name:'status', value:'inactive'});
                    }


                 $.ajax({

                      data: formData,
                      url: "{{ route('app.category.store') }}",
                      type: "POST",
                      dataType: 'json',

                      beforeSend: function() {
                          $(".preloader").show();
                       },

                      success: function (data) {

                         if(data.code == 200) {
                               table.ajax.reload();
                               $('.modal-title').html('');
                               $('#cat_id').val('');
                               $('#add-modal').modal('hide');
                                $('.preloader').hide();
                            }

                      },

                      error: function (data) {
                          console.log('Error:', data);
                          $('#saveBtn').html('Save Changes');
                      }
                  });


    });




        // update
        $('#categoryUpdateForm').submit(function(e){
           e.preventDefault();

           var cat_id = $("#cat_id").val();
           var name = $("#u_name").val();
           var icon_class = $("#u_icon_class").val();
           var desctiptioin = $("#u_description").val();
           var data = $('#categoryUpdateForm').serializeArray();



            if ( $("#editCheck").is(':checked') == true) {
                 data.push({name:'status', value:'active'});
            }else{
                  data.push({name:'status', value:'inactive'});
            }



           if (name == '') {
              $('#nameValid').show();
           }

           if (cat_id != '') {
            var url = '{{ route("app.category.update", ":id") }}';
            url = url.replace(':id', cat_id );
            $.ajax({
                url:url,
                data:data,
                dataType:"json",
                type:"PUT",
                 beforeSend:function(){
                    $('.preloader').show();
                 },
                success:function(response){
                    table.ajax.reload();
                    $('#edit-modal').modal('hide');
                    $('.preloader').hide();
                }

            })
           }
        })



         // Delete category

     $('body').delegate('.delete-button', 'click', function(e){
        e.preventDefault();
        var id = $(this).data('id');

        // Swal Toster

         swal({
            title: "Are you sure?",
            text: "You will not be able to recover this imaginary file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        }, function() {
            // var url = e.target.href;
            // var token = $("meta[name='csrf-token']").attr("content");
            $.ajax({
                url:`/app/delete/category/${id}`,
                // data:{_token:token, id:id},
                type: 'GET',

                success: function (data) {


                    swal({title: "Updated!", text: "yourText", type: "success"},function() {
                                 table.ajax.reload();
                        })


                }

            });
        });


     })


// Data Read and set into Datatable
   var table =  $('#categoryTable').DataTable({
        ajax: "{{url('/app/get-category')}}",
        // paging: false,
        // searching: false,
        columns:[
                 {data: 'SrNo',
                       render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                       }
                    },
                 {'data': 'name'},
                 {
                    'data': 'null',
                    render: function(data, type, row){
                        return `<i class="${row.icon_class}"></i>`
                    }
                 },
                 {'data': 'description',
                 render: function(data,  type, row){
                    var des = data;
                   var desLength =  jQuery.trim(data).substring(0, 20).split(" ");
                    if (desLength.length >= 3) {
                        return jQuery.trim(data).substring(0, 20).split(" ").slice(0 , -1).join(" ") + "...";
                    }else{
                        return des;
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
                    "data": 'status',
                    render: function(data, type, row){
                        if(data == 'active'){
                            return `<span class="badge badge-success">Active</span>`;
                        }else{
                            return `<span class="badge badge-danger">inactive</span>`;
                        }
                    }
                 },
                 {
                     'data': 'null',
                     render: function(data, type, row){
                        return `<a data-id="${row.id}" id="showCategory"  class="btn btn-sm btn-primary show-button text-white">
                                    <i class="icon-eye" ></i>
                                </a>

                                <a data-id="${row.id}" id="editCategory" class="btn btn-sm  btn-success  edit-button text-white">
                                    <i class="icon-pencil" ></i>
                                </a>



                                <a data-id="${row.id}" id="deleteCategory" class="btn btn-sm  btn-danger delete-button text-white">
                                    <i class="icon-trash" ></i>
                                </a>`;
                     }

                 },




        ]
    })




    </script>



@endpush
