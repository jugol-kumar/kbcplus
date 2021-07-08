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
                            <form action="{{ route('app.product.update', $product->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
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
                                                                <input type="hidden" name="product_id"  value="{{ $product->product_id }}">
                                                                <input type="text" class="form-control text-center" value="{{ $product->product_id }}" disabled>
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
                                                                <input type="text" name="title" class="form-control" value="{{ $product->title }}">
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="">Product Unit</label>
                                                                <input type="text" name="unit" class="form-control" value="{{ $product->product_unit }}">
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
                                                                <input type="number" name="purchasePrice" class="form-control" value="{{ $product->purchase_price }}">
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="">Product Minimum Sell Price</label>
                                                                <input type="number" name="minSellprice" class="form-control" value="{{ $product->min_sell_price }}">
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
                                                                    @foreach($categories as $cat)
                                                                        <option value="{{ $cat->id }}" {{ $cat->id == $product->category_id ? 'selected' : '' }}>{{ $cat->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col" id="subCatCard">
                                                            <div class="form-group">
                                                                <label for="">Sub-Category</label>
                                                                <select name="sCategory" class="form-control" id="sCategory">
                                                                    <option disabled selected>~~~Select Product Sub Category~~~</option>
                                                                    @foreach($subCategories as $sCat)
                                                                        <option value="{{ $sCat->id }}" {{ $sCat->id == $product->sub_category_id ? 'selected' : ''}}>{{ $sCat->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="">Brands</label>
                                                                <select name="brand" class="form-control" id="brand">
                                                                    <option disabled selected>~~~Select Product Brands~~~</option>
                                                                    @foreach($brands as $brand)
                                                                        <option value="{{ $brand->id }}" {{ $brand->id == $product->brand_id ? 'selected' : ''}}>{{ $brand->name }}</option>
                                                                    @endforeach
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
                                                                <input type="number" name="product_discount" class="form-control tax-input" value="{{ $product->product_discount }}">
                                                                <select name="discount_type" class="tax-type form-control" id="">
                                                                    <option disabled selected>~~~Select Descount Type~~~</option>
                                                                    <option value="1" {{ $product->discount_type == 1 ? 'selected' : '' }}>Tk</option>
                                                                    <option value="0" {{ $product->discount_type == 0 ? 'selected' : '' }}>%</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="">Product Tax</label>
                                                                <input type="number" name="product_Tax" class="form-control tax-input" value="{{ $product->product_tax }}">
                                                                <select name="tax_type" class="tax-type form-control" id="">
                                                                    <option disabled selected>~~~Select Tax Type~~~</option>
                                                                    <option value="1" {{ $product->tax_type == 1 ? 'selected' : '' }}>Tk</option>
                                                                    <option value="0" {{ $product->tax_type == 0 ? 'selected' : '' }}>%</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="">Product Condition</label>
                                                                <select name="condition" class="form-control" id="">
                                                                    <option disabled selected>~~~Select Product Conditon~~~</option>
                                                                    <option value="new"{{ $product->condition == 'new' ? 'selected' : '' }}>New</option>
                                                                    <option value="used"{{ $product->condition == 'used' ? 'selected' : '' }}>Used</option>
                                                                    <option value="refurbished"{{ $product->condition == 'refurbished' ? 'selected' : '' }}>Refurbished</option>
                                                                    <option value="damaged"{{ $product->condition == 'damaged' ? 'selected' : '' }}>Damaged</option>
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
                                                                <textarea name="short_description" class="summernote" id="details" rows="3">{!! $product->short_description !!}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="details" class="col-sm-3">Product Details</label>
                                                                <textarea name="details" class="summernote" id="details" rows="3">{!! $product->details !!}</textarea>
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
                                                                    <input class="toggle-state"  name="pStatus" {{ $product->publication_status == 1 ? 'checked' : '' }} type="checkbox" id="pStatus" />
                                                                    <div class="indicator pstatus"></div>
                                                                </div>
                                                                <div class="label-text">Publication Status</div>
                                                            </label>
                                                        </div>
                                                        <div class="col">
                                                            <label class="label">
                                                                <div class="toggle">
                                                                    <input class="toggle-state"  name="fStatus" type="checkbox" {{ $product->featured_status == 1 ? 'checked' : '' }} id="fStatus" />
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
                                            <button type="submit" class="btn btn-lg l-amber mr-2">Update Product</button>
                                            <button type="reset" class="btn btn-lg l-coral">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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




