@extends('layouts.admin.app')
@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <div class="row clearfix mt-5">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">All Product Details</h5>
                            <table class="table table-striped" style="border-radius:3px;">
                                <tbody><tr>
                                    <th class="custom_td">Product Title</th>
                                    <td class="custom_td">{{ $product->product_title }}</td>
                                </tr>
                                <tr>
                                    <th class="custom_td"> Product Category </th>
                                    <td class="custom_td">{{ $product->category->name }}</td>
                                </tr>
                                <tr>
                                    <th class="custom_td"> Product Category </th>
                                    <td class="custom_td">{{ $product->category->name }}</td>
                                </tr>
                                <tr>
                                    <th class="custom_td"> Product Category </th>
                                    <td class="custom_td">{{ $product->category->name }}</td>
                                </tr>
                                </tbody>
                            </table>


                            <form action="">
                                <div class="form-group">
                                    <div class="field_wrapper">
                                        <div>
                                            <input type="text" name="field_name[]" value=""/>
                                            <a href="javascript:void(0);" class="add_button" title="Add field"><span class="btn btn-sm btn-outline-warning">+</span></a>
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
    <script type="text/javascript">
        $(document).ready(function(){
            var maxField = 10; //Input fields increment limitation
            var addButton = $('.add_button'); //Add button selector
            var wrapper = $('.field_wrapper'); //Input field wrapper
            var fieldHTML = '<div><input type="text" name="field_name[]" value=""/><a href="javascript:void(0);" class="remove_button"><span class="btn btn-sm btn-outline-warning">-</span></a></div>'; //New input field html
            var x = 1; //Initial field counter is 1
            //Once add button is clicked
            $(addButton).click(function(){
                //Check maximum number of input fields
                if(x < maxField){
                    x++; //Increment field counter
                    $(wrapper).append(fieldHTML); //Add field html
                }
            });

            //Once remove button is clicked
            $(wrapper).on('click', '.remove_button', function(e){
                e.preventDefault();
                $(this).parent('div').remove(); //Remove field html
                x--; //Decrement field counter
            });
        });
    </script>
@endpush
