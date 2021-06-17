@extends('layouts.admin.app')
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/summernote/dist/summernote.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/switch/switch.css') }}">
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
    /*    for tax style*/
        .tax-type{
            width: 120px;
            float: right;
            margin: -36px 0px;
        }
    </style>

@endpush

@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2>Add Product</h2>
                        </div>
                        <div class="body">
                            <ul class="nav nav-tabs-new">
                                <li class="nav-item"><a class="nav-link g-roseanna active show" data-toggle="tab" href="#Home-new">Product Details</a></li>
                                <li class="nav-item"><a class="nav-link g-summer" data-toggle="tab" href="#Profile-new">Business Details</a></li>
                                <li class="nav-item"><a class="nav-link g-margo" data-toggle="tab" href="#product-price">Price details</a></li>
                            </ul>
                            <form action="{{ route('app.product.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="tab-content">
                                    <div class="tab-pane show active" id="Home-new">
                                        <div class="col-md-9 mx-auto">
                                            <h4 class="text-center">Product Brand's and Categories</h4>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="form-group row">
                                                        <label for="product_id" class="col-sm-3">Product Id</label>
                                                        @php($id ='KBC-'.rand(000000,999999))
                                                        <div class="col-sm-9">
                                                            <input type="text" disabled class="form-control" value="{{ $id }}" id="product_id" placeholder="Product Id...">
                                                            <input type="hidden" name="product_id" class="form-control" value="{{ $id }}" id="product_id" placeholder="Product Id...">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="form-group row">
                                                        <label for="product_id" class="col-sm-3">Product Title</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="product_title" class="form-control" placeholder="Product Title...">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="form-group row">
                                                        <label for="product_id" class="col-sm-3">Category</label>
                                                        <div class="col-sm-9">
                                                            <select id="category" name="category_id" class="form-control show-tick ms">
                                                                <option selected>~~~Select Category~~~</option>
                                                                @foreach($categories as $key => $category)
                                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card" id="subCategory-card" style="display: none;">
                                                <div class="card-body">
                                                    <div class="form-group row">
                                                        <label for="product_id" class="col-sm-3">Sub Category</label>
                                                        <div class="col-sm-9">
                                                            <select id="sub_category" name="subcategory_id" class="form-control show-tick ms">
                                                                <option selected>~~~This Is Sub Category~~~</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card" id="brand-card" style="display:none;">
                                                <div class="card-body">
                                                    <div class="form-group row">
                                                        <label for="brands" class="col-sm-3">Brand's</label>
                                                        <div class="col-sm-9">
                                                            <select id="brands" name="brands_id" class="form-control show-tick ms">
                                                                <option selected>~~~Select Brand's~~~</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="form-group row">
                                                        <label for="brands" class="col-sm-3">Tag's</label>
                                                        <div class="col-sm-9">
                                                            <div class="input-group demo-tagsinput-area">
                                                                <input type="text" name="tags" class="form-control" data-role="tagsinput">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="Profile-new">
                                        <div class="col-md-12 mx-auto">
                                            <h4 class="text-center">Product Details</h4>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="form-group row">
                                                        <label for="details" class="col-sm-3">Short Description</label>
                                                        <textarea name="short_description" class="summernote" id="details" rows="5"></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="form-group row">
                                                        <label for="details">Short Description</label>
                                                        <textarea name="full_description" row="8" class="summernote"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <div class="custom-file-container" data-upload-id="singlefile">
                                                                <label>product Featured
                                                                    <span class="custom-file-container__image-clear" title="Clear Image" ></span>
                                                                </label>
                                                                <label class="custom-file-container__custom-file">
                                                                    <input type="file" name="avatar" class="custom-file-container__custom-file__custom-file-input" accept="*" aria-label="Choose File" />
                                                                    <span class="custom-file-container__custom-file__custom-file-control" ></span>
                                                                </label>
                                                                <div class="custom-file-container__image-preview"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <div class="custom-file-container" data-upload-id="myUniqueUploadId">
                                                                <label>Images
                                                                    <span class="custom-file-container__image-clear" title="Clear Image" ></span>
                                                                </label>
                                                                <label class="custom-file-container__custom-file">
                                                                    <input type="file" name="images[]" class="custom-file-container__custom-file__custom-file-input" multiple accept="*" aria-label="Choose File" />
                                                                    <span class="custom-file-container__custom-file__custom-file-control" ></span>
                                                                </label>
                                                                <div class="custom-file-container__image-preview"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="product-price">
                                        <h4 class="text-center">Product Price Details</h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label for="">Sale Price</label>
                                                            <input name="sell_price" type="number" class="form-control" placeholder="Sell price..">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label for="">Purchase Price</label>
                                                            <input name="purchase_price" type="number" class="form-control" placeholder="Purchase price..">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label for="">Product Tax</label>
                                                            <input type="number" name="product_tax" class="form-control" placeholder="Product Tax..." style="width:300px">
                                                            <select name="tax_type" class="tax-type form-control" id="">
                                                                <option disabled selected>~~~Select Tax Type~~~</option>
                                                                <option value="1">Tk</option>
                                                                <option value="0">%</option>
                                                            </select>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label for="">Product Discount</label>
                                                            <input type="number" name="product_discount" class="form-control" placeholder="Product Tax..." style="width:300px">
                                                            <select name="discount_type" class="tax-type form-control" id="">
                                                                <option disabled selected>~~~Select Tax Type~~~</option>
                                                                <option value="1">Tk</option>
                                                                <option value="0">%</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label for="">Product Unit</label>
                                                            <input type="text" name="product_unit" class="form-control" placeholder="Unit (e.g. Kg, Pc Etc.)">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="card-body">
                                                                <div class="form-group">
                                                                    <label class="label">
                                                                        <div class="toggle">
                                                                            <input class="toggle-state" type="checkbox" id="allCheck" name="publication_status" value="check" />
                                                                            <div class="indicator"></div>
                                                                        </div>
                                                                        <div class="label-text">Product Published</div>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="card-body">
                                                                <div class="form-group">
                                                                    <label class="label">
                                                                        <div class="toggle">
                                                                            <input class="toggle-state" type="checkbox" id="allCheck" name="featured_status" value="check" />
                                                                            <div class="indicator"></div>
                                                                        </div>
                                                                        <div class="label-text">Product Featured</div>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-lg g-roseanna">Submit</button>
                                        <button type="reset" class="btn btn-lg l-blue">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
@endsection
@push('js')
    <script src="{{ asset('assets/admin/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/ajax.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/summernote/dist/summernote.js') }}"></script>

    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <script src="https://unpkg.com/file-upload-with-preview@4.1.0/dist/file-upload-with-preview.min.js"></script>
    <script>
        var upload = new FileUploadWithPreview("singlefile");
        var upload = new FileUploadWithPreview("myUniqueUploadId");
        // CKEDITOR.replace( 'short_description' );
    </script>
@endpush
