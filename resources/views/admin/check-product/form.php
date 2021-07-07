
<div class="row clearfix">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="header">
                <h2>Add Product</h2>
            </div>
            <div class="body">
                <ul class="nav nav-tabs-new">
                    <li class="nav-item"><a class="nav-link g-roseanna active show" data-toggle="tab" href="#Home-new">Product Details</a></li>
                    <li class="nav-item"><a class="nav-link g-summer" data-toggle="tab" href="#Profile-new">Profile</a></li>
                    <li class="nav-item"><a class="nav-link g-virgin" data-toggle="tab" href="#Contact-new">Contact</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane show active" id="Home-new">
                        <div class="col-md-9 mx-auto">
                            <h4 class="text-center">Product Details</h4>
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="product_id" class="col-sm-3">Product Id</label>
                                        @php($id ='KBC-'.rand(000000,999999))
                                        <div class="col-sm-9">
                                            <input type="text" disabled class="form-control" value="{{ $id }}" id="product_id" placeholder="Product Id...">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="product_id" class="col-sm-3">Product Title</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="product_id" placeholder="Product Id...">
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
                                                <option selected>~~~Select Sub Category~~~</option>
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
                                                <input type="text" class="form-control" data-role="tagsinput">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <a class="btn g-limeade"> <i class="icon-arrow-left"></i><span class="ml-2">Previous</span></a>
                                    <a class="btn g-margo" data-toggle="tab" href="#Profile-new"><span class="mr-2">Next</span><i class="icon-arrow-right"></i></a>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="tab-pane" id="Profile-new">
                        <h6>Profile</h6>
                        <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel </p>
                    </div>
                    <div class="tab-pane" id="Contact-new">
                        <h6>Contact</h6>
                        <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
