@extends('layouts.admin.app')
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/switch/switch.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/productPageStyle.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/summernote/dist/summernote.css') }}">
    <link
        rel="stylesheet"
        type="text/css"
        href="https://unpkg.com/file-upload-with-preview@4.1.0/dist/file-upload-with-preview.min.css"
    />
@endpush
@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <div class="row mt-5 mt-5 clearfix">
                <div class="col-lg-12 ">
                    <h3 class="title float-left"><i class=" icon-pie-chart mr-2"></i>Product</h3>
                    <button onclick="addModal()" class="btn l-amber btn-default float-right mb-3">
                        <i class="icon-plus mr-2"></i>Add New
                    </button>
                    <div class="card">
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-striped js-basic-example  table-custom">
                                    <thead>
                                    <tr>
                                        <th>#Id</th>
                                        <th>Product Image</th>
                                        <th style="width: 5px;">Product Title</th>
                                        <th>Category</th>
                                        <th>Brand</th>
                                        <th>Publication Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>#Id</th>
                                        <th>Product Image</th>
                                        <th>Product Title</th>
                                        <th>Category</th>
                                        <th>Brand</th>
                                        <th>Publication Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @php($i = 1)
                                        @foreach($products as $product)
                                            <tr>
                                                <td>#{{ $i++ }}</td>
                                                <td><img src="{{ asset("storage/product/1625658625836.jpg") }}" class="rounded-circle" width="50" height="50" alt=""></td>
                                                <td>{{ $product->title }}</td>
                                                <td>{{ isset($product->category->name) ? $product->category->name : 'NULL' }}</td>
                                                <td>{{ isset($product->brand->name) ? $product->brand->name : 'NULL'  }}</td>
                                                <td>
                                                    <label class="label">
                                                        <div class="toggle">
                                                            <input class="toggle-state" type="checkbox" id="allCheck"
                                                                   {{ $product->publication_status == 1 ? 'checked' : '' }}
                                                                   name="featured_status"/>
                                                            <div class="indicator"></div>
                                                        </div>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Action
                                                        </button>
                                                        <div class="dropdown-menu bg-btn-color" aria-labelledby="btnGroupDrop1" x-placement="bottom-start">
                                                            <a class="dropdown-item" href="{{ route('app.product.show', $product->id) }}"><i class="icon-paper-plane mr-2"></i> View Product</a>
                                                            <a class="dropdown-item" href="{{ route('app.product-att-form', $product->id) }}"><i class="icon-settings mr-2"></i> Product Setting</a>
                                                            <a class="dropdown-item" href="{{ route('app.product.edit', $product->id) }}"><i class="icon-social-dribbble mr-2"></i> Edit Product</a>
                                                            <a class="dropdown-item" onclick="showCancelMessage({{ $product->id }}); event.preventDefault();"><i class="icon-trash mr-2"></i> Delete Product</a>
                                                            <form id="delete-data-{{ $product->id }}" action="{{ route('app.product.destroy', $product->id) }}" enctype="multipart/form-data" method="post" style="display: none;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        </div>
                                                    </div>
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

    <div class="modal fade " id="add-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <form action="{{ route('app.product.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="card">
                        <div class="modal-header">
                            <h3 class="modal-title"> </h3>
                            <button type="button" class="close" id="addModalClose">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card-body">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group text-center">
                                                    <label class="text-center">Product Id</label>
                                                    <input type="hidden" name="product_id"  value="KBC-{{ rand(000000, 999999) }}">
                                                    <input type="text" class="form-control text-center" value="KBC-{{ rand(000000, 999999) }}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="">Product Title</label>
                                                    <input type="text" name="title" class="form-control" placeholder="Enter Product Title...">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="">Product Unit</label>
                                                    <input type="text" name="unit" class="form-control" placeholder="Product Unit like Pc,Kg,Litter....">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="">Product Purchase Price</label>
                                                    <input type="number" name="purchasePrice" class="form-control" placeholder="Product Purchase Price...">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="">Product Minimum Sell Price</label>
                                                    <input type="number" name="minSellprice" class="form-control" placeholder="Product Minimum Sell Price....">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="">Category</label>
                                                    <select name="categorey" class="form-control" id="categories">
                                                        <option disabled selected>~~Select Product Category~~</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col" id="subCatCard" style="display: none;">
                                                <div class="form-group">
                                                    <label for="">Sub-Category</label>
                                                    <select name="sCategory" class="form-control" id="sCategory">
                                                        <option disabled selected>~~~Select Product Sub Category~~~</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="">Brands</label>
                                                    <select name="brand" class="form-control" id="brand">
                                                        <option disabled selected>~~~Select Product Brands~~~</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="">Product Discount</label>
                                                    <input type="number" name="product_discount" class="form-control tax-input" placeholder="Product Descount...">
                                                    <select name="discount_type" class="tax-type form-control" id="">
                                                        <option disabled selected>~~~Select Descount Type~~~</option>
                                                        <option value="1">Tk</option>
                                                        <option value="0">%</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="">Product Tax</label>
                                                    <input type="number" name="product_Tax" class="form-control tax-input" placeholder="Product Tax...">
                                                    <select name="tax_type" class="tax-type form-control" id="">
                                                        <option disabled selected>~~~Select Tax Type~~~</option>
                                                        <option value="1">Tk</option>
                                                        <option value="0">%</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="">Product Condition</label>
                                                    <select name="condition" class="form-control" id="">
                                                        <option disabled selected>~~~Select Product Conditon~~~</option>
                                                        <option value="new">New</option>
                                                        <option value="used">Used</option>
                                                        <option value="refurbished">Refurbished</option>
                                                        <option value="damaged">Damaged</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="details" class="col-sm-3">Short Description</label>
                                                    <textarea name="short_description" class="summernote" id="details" rows="3"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="details" class="col-sm-3">Product Details</label>
                                                    <textarea name="details" class="summernote" id="details" rows="3"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <label class="label">
                                                    <div class="toggle">
                                                        <input class="toggle-state"  name="pStatus" type="checkbox" id="pStatus" />
                                                        <div class="indicator pstatus"></div>
                                                    </div>
                                                    <div class="label-text">Publication Status</div>
                                                </label>
                                            </div>
                                            <div class="col">
                                                <label class="label">
                                                    <div class="toggle">
                                                        <input class="toggle-state"  name="fStatus" type="checkbox" id="fStatus" />
                                                        <div class="indicator fstatus"></div>
                                                    </div>
                                                    <div class="label-text">Featured Status</div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group ">
                                <label class="fancy-checkbox">
                                    <input type="checkbox" name="checkbox" data-parsley-multiple="checkbox" value="" id="colorCheck">
                                    <span>Click For Variation Product Without Color</span>
                                </label>
                                <p id="error-checkbox"></p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="card card-style">
                            <div class="card-body">
                                <div class="field_wrapper">
                                    <div class="row mt-3 mb-5">
                                        <div class="col-md-3">
                                            <div class="input-group disabledColorPanel">
                                                <input type="color" name="color[0][]" class="form-control-color optionInput"/>
                                                <a href="javascript:void(0);" class="add_button btn btn-outline-secondary">
                                                    <img src="{{ asset('assets/admin/images/add-icon.png') }}"/>
                                                </a>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-file-container" data-upload-id="firstImage">
                                                    <label>product Featured
                                                        <span class="custom-file-container__image-clear" title="Clear Image" ></span>
                                                    </label>
                                                    <label class="custom-file-container__custom-file">
                                                        <input type="file" name="color[0][image][]" class="custom-file-container__custom-file__custom-file-input" multiple accept="*" aria-label="Choose File" />
                                                        <span class="custom-file-container__custom-file__custom-file-control" ></span>
                                                    </label>
                                                    <div class="custom-file-container__image-preview"></div>
                                                </div>
                                            </div>
                                            <div class="form-group disabledColorPanel">
                                                <div class="input-group">
                                                    <input type="text" name="color[0][]" class="form-control extTitle" placeholder="Extra Product Url">
                                                </div>
                                            </div>
                                        </div>

                                        <div id="childSec" class="child_secton col-md-8" >
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" value="KBC-{{ rand(000000, 999999) }}" disabled>
                                                    <input type="hidden" name="color[0][sku][]" value="KBC-{{ rand(000000, 999999) }}">
                                                    <input type="text" class="form-control col-md-3" name="color[0][size][]" placeholder="Size...">
                                                    <input type="text" class="form-control col-md-3" name="color[0][price][]" placeholder="Price...">
                                                    <input type="text" class="form-control  col-md-3 optionInput" name="color[0][qty][]" placeholder="Quantity...">
                                                    <div class="input-group-append">
                                                        <a href="javascript:void(0);" class="add_child_button btn btn-outline-secondary"><img src="{{ asset('assets/admin/images/add-icon.png') }}"/></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <button type="submit" class="btn btn-lg l-amber mr-2">Save Product</button>
                                <button type="reset" class="btn btn-lg l-coral">Cancle</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>



















@endsection
@push('js')
    <script src="{{ asset('assets/admin/vendor/select2/select2.min.js') }}"></script>

    <script src="{{ asset('assets/admin/vendor/summernote/dist/summernote.js') }}"></script>
    <script src="https://unpkg.com/file-upload-with-preview@4.1.0/dist/file-upload-with-preview.min.js"></script>
    <script>


        //ajax csrf token setup
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        //product publication status update without page reload.
        $('.publication_status').change(function (){
            var status = $(this).prop('checked') == true ? 1 : 0;
            var id = $(this).data('id');
            $.ajax({
                url: '{{ route('app.product.published') }}',
                method: 'GET',
                dataType: 'JSON',
                data: { 'status':status, 'id': id},
                success:function (data){
                    if(data.publication_status == 1){
                        swal({
                            position: 'top-end',
                            type: 'success',
                            title: 'Successful',
                            text:'Product Published Successfully Done',
                            showConfirmButton: true,
                        });
                    }else{
                        swal({
                            position: 'top-end',
                            type: 'success',
                            title: 'Successful',
                            text:'Product Unpublished Successfully Done',
                            showConfirmButton: true,
                        });
                    }
                }
            })
        });




        //get here categorey and brand and open add product modal.
        function addModal(){
            $('#add-modal').modal('show')
            $.ajax({
                url: "{{ route('app.active.category') }}",
                type: "GET",
                dataType:"JSON",
                success:function (res){
                    if (res != null){
                        // $('#categories').empty();
                        $('#categories').append(`<option selected disabled>Processing......</option>`);
                        $('#categories').empty();
                        $('#categories').append(`<option selected disabled>~~Select Category name~~</option>`);
                        $.each(res.categories, function (key, category){
                            $('#categories').append(`<option value="${category.id}">${category.name}</option>`);
                        });
                        // $('#categories').empty();
                        $('#brand').append(`<option selected disabled>Processing......</option>`);
                        $('#brand').empty();
                        $('#brand').append(`<option selected disabled>~~Select Product Brand name~~</option>`);
                        $.each(res.brands, function (key, brand){
                            $('#brand').append(`<option value="${brand.id}">${brand.name}</option>`);
                        });
                    }
                }
            })
        }

        //modal hide
        $('#addModalClose').on('click', function (){
            $('#add-modal').modal('hide');
        })

        //get all sub-category is here
        $('#categories').on('change', function (){
            var id = $(this).val();

            if (id != null) {

                $.ajax({
                    url:"{{ route('app.active.subcategory')}}",
                    _token : "{{ csrf_token() }}",
                    type: "post",
                    data: {id:id},
                    dataType: "JSON",
                    success: function (res) {
                        if(res.sCat.length != 0){
                            $('#subCatCard').show('slow');
                            $('#sCategory').append(`<option selected disabled>Processing......</option>`);
                            $('#sCategory').empty();
                            $('#sCategory').append(`<option selected disabled>~~Select Sub Category name~~</option>`);
                            $.each(res.sCat, function (key, value){
                                $('#sCategory').append(`<option value="${value.id}">${value.name}</option>`);
                            });
                        }else{
                            $('#subCatCard').hide('slow');
                            swal({
                                position: 'top-end',
                                type: 'error',
                                title: 'Error',
                                text:'No have sub category for this category',
                                showConfirmButton: true,
                            });
                        }
                    }
                })
            }
        });







    </script>
    <script type="text/javascript">
        $(document).ready(function (){
            var x=1;
            var maxField = 10;
            var index = 0;
            var addButton = $('.add_button');
            var cardAdd = $('.card-style');
            //Once add button is clicked
                $(addButton).click(function(){
                    index++;
                    $('#colorCheck').prop('disabled', true);
                    $('.fancy-checkbox').addClass('d-none');
                    if (x < maxField) {
                        $(cardAdd).parent('div').append('<div>' +
                            '<div class="card card-style mt-3">' +
                            '<div class="card-body">' +
                            '<div class="field_wrapper">' +
                            '<div class="row mt-3 mb-3">' +
                            '<div class="col-md-3">' +
                            '<div class="input-group disabledColorPanel">' +
                            '<input type="color" name="color[' + index + '][]" id="colorId' + index + '" class="form-control-color optionInput"/>' +
                            '<a href="javascript:void(0);" class="remove_button btn btn-outline-secondary" title="Add field">' +
                            '<img src="{{ asset('assets/admin/images/remove-icon.png') }}"/></a>' +
                            '</div>' +
                            '<div class="form-group">' +
                            '<div class="custom-file-container" data-upload-id="firstImage' + index + '">' +
                            '<label>product Featured' +
                            '<span class="custom-file-container__image-clear" title="Clear Image" ></span>' +
                            '</label>' +
                            '<label class="custom-file-container__custom-file">' +
                            '<input type="file" name="color[' + index + '][image][]" class="custom-file-container__custom-file__custom-file-input" multiple accept="*" aria-label="Choose File" />' +
                            '<span class="custom-file-container__custom-file__custom-file-control" ></span>' +
                            '</label>' +
                            '<div class="custom-file-container__image-preview"></div>' +
                            '</div>' +
                            '</div>' +

                            '<div class="form-group">'+
                            '<div class="input-group">'+
                            '<input type="text" name="color['+ index +'][]" class="form-control" placeholder="Extra Product Url">'+
                            '</div>'+
                            '</div>'+
                            '</div>' +
                            '<div id="childSec" class="child_secton col-md-8" >' +
                            '<div class="form-group"><div class="input-group">' +
                            '<input type="text" class="form-control" value="KBC-' + parseInt(Math.random() * 999999) + '" disabled>' +
                            '<input type="hidden" name="color[' + index + '][sku][]" value="KBC-' + parseInt(Math.random() * 999999) + '">' +
                            '<input type="text" class="form-control col-md-3" name="color[' + index + '][size][]" placeholder="Size...">' +
                            '<input type="text" class="form-control col-md-3 optionInput" name="color[' + index + '][price][]" placeholder="Price...">' +
                            '<input type="text" class="form-control col-md-3 optionInput" name="color[' + index + '][qty][]" placeholder="Quantity...">' +
                            '<div class="input-group-append">' +
                            '<a href="javascript:void(0);" class="add_child_button btn btn-outline-secondary" title="Add field">' +
                            '<img src="{{ asset('assets/admin/images/add-icon.png') }}"/></a></div></div></div></div></div></div></div></div></div>'); //Add field html
                    }else{
                        swal({
                            position: 'top-end',
                            type: 'error',
                            title: 'Error',
                            text:'This is Too Learg For Your Length. Not add new Panel... :(',
                            showConfirmButton: true,
                        });
                    }

                    // $(cardAdd).parent('div').append(fieldHTML.replace('sku[0]', 'sku['+index+']')); //Add field html

                    var upload = new FileUploadWithPreview(`firstImage${index}`);
                    x++;

                });

            //Once remove button is clicked
            $('body').on('click', '.remove_button', function(e){
                e.preventDefault();
                $(this).parent('div').parent('div').parent('div').parent('div').parent('div').parent('div').remove(); //Remove field html
                x--; //Decrement field counter

                if(x==1){
                    $('.fancy-checkbox').removeClass('d-none');
                    $('#colorCheck').prop('disabled', false);
                }

            });
            //this is new code for card desing .
            $('body').on('click', '.add_child_button', function (e){
                $(this).parent('div').parent('div').parent('div').parent('div').append(`
                <div>
                    <div class="input-group mt-2">
                        <input type="text" class="form-control" value="KBC-${ parseInt(Math.random()*999999) }" disabled>
                        <input type="hidden" name="color[${index}][sku][]" value="KBC-${ parseInt(Math.random()*999999) }">
                        <input type="text" class="form-control col-md-3" name="color[${index}][size][]" placeholder="Size...">
                        <input type="text" class="form-control col-md-3 optionInput" name="color[${index}][price][]" placeholder="Price...">
                        <input type="text" class="form-control  col-md-3 optionInput" name="color[${index}][qty][]" placeholder="Quantity...">
                        <div class="input-group-append">
                            <a href="javascript:void(0);" class="child_remove_button btn btn-outline-secondary" title="Add field"><img src="{{ asset('assets/admin/images/remove-icon.png') }}"/></a>
                        </div>
                    </div>
                </div>
            `);
            });
            var upload = new FileUploadWithPreview("firstImage");
            // var upload = new FileUploadWithPreview(`myUniqueUploadId${index}`);

            $('body').on('click', '.child_remove_button', function (e){
                e.preventDefault();
                $(this).parent('div').parent('div').parent('div').remove();
            })
        });


        $('#colorCheck').on('change', function () {
            let status = $(this).prop('checked') == true ? 1 : 0;
            if (status == 1) {
                $('input[type="color"]').prop("disabled", true);
                $('.disabledColorPanel').addClass('d-none')
                $('.extTitle').prop("disabled", true)
            }else{
                $('input[type="color"]').prop("disabled", false);
                $('.disabledColorPanel').removeClass('d-none')
                $('.extTitle').prop("disabled", false)
            }
        });

        $('#pStatus').on('click', function (){
            $('.pstatus').toggleClass('indicator-change');
        })
        $('#fStatus').on('click', function (){
            $('.fstatus').toggleClass('indicator-change1');
        });
    </script>

@endpush




