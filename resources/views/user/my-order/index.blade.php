@extends('layouts.frontend.app')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
@endpush

@section('content')
    <div class="container">
        <div class="row">
            @include('user.user-sidebar.sidebar')
            <div class="col-lg-8 p-4 bg-white rounded shadow-sm">
                <div class="osahan-promos">
                    <h4 class="mb-4 profile-title">Avaiable Promos</h4>
                    @php($promos = true)
                    @if(isset($promos))

                        <div class="dataTables_wrapper" style="display: inline;float: right; margin-bottom: -30px; z-index: 999" >
                            <div class="dataTables_filter">
                                <select name="" id="" class="form-control">
                                    <option value="">First</option>
                                    <option value="">First</option>
                                    <option value="">First</option>
                                    <option value="">First</option>
                                    <option value="">First</option>
                                    <option value="">First</option>
                                </select>
                            </div>
                        </div>
                        <table id="example" class="display">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>61</td>
                                <td>2011/04/25</td>
                                <td>$320,800</td>
                            </tr>
                                <tr>
                                    <td>Garrett Winters</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>63</td>
                                    <td>2011/07/25</td>
                                    <td>$170,750</td>
                                </tr>
                                <tr>
                                    <td>Donna Snider</td>
                                    <td>Customer Support</td>
                                    <td>New York</td>
                                    <td>27</td>
                                    <td>2011/01/25</td>
                                    <td>$112,000</td>
                                </tr>
                        </tbody>
                        </table>






                    @else
                        <div class="pb-3">
                            <div class="col-9 user-profile-notfound">
                                <img class="" src="{{ asset('assets/frontend/img/user-page-empty.svg') }}" alt="" >
                                <h3>No Promos Founted</h3>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="{{ asset('assets/frontend/js/bootstrap-datatable.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                paging:   false,
                ordering: false,
                info:     false,
                // searching: true,
            });

            $('th').removeClass('sorting sorting_asc');
            $('th').removeClass('sorting sorting_desc');
        } );
        $(document).on('click', 'th', function (){
            $('th').removeClass('sorting sorting_asc');
            $('th').removeClass('sorting sorting_desc');
        })
    </script>



    <script>
        var oTable= $('#userTable').dataTable({
            "bPaginate": false,
            "bLengthChange": false,
            "bFilter": false,
            "bProcessing": false,
            "bSortable": true,
            "bInfo": false,
            "bAutoWidth": false,
            "aoColumns": [{
                "bSortable": false
            }, //checkbox
                { "asSorting": [ "desc", "asc" ] },
                { "asSorting": [ "desc", "asc" ] },
                { "asSorting": [ "desc", "asc" ] },
                { "asSorting": [ "desc", "asc" ] },
                { "asSorting": [ "desc", "asc" ] },
                { "asSorting": [ "desc", "asc" ] },
                { "asSorting": [ "desc", "asc" ] },
                {
                    "bSortable": false //Status
                }],
            aaSorting: [[2, 'desc']],
            "bServerSide": true,
            "sAjaxSource": "/account/UserLists",
            "fnServerData": function(sSource, aoData, fnCallback){
                var initLoad = true;
                if (typeof sortIndex != 'undefined' || typeof sortOrder != 'undefined') {
                    initLoad = false;
                }
                    //To get the selected column & order.
                sortIndex = fnGetKey(aoData, "iSortCol_0");
                sortOrder = fnGetKey(aoData, "sSortDir_0");
                if (sortIndex == 2) {
                    sortIndex = 0;
                }
                else if (sortIndex != 0 && sortIndex != 1) {
                    sortIndex = sortIndex - 1;
                }
                if (sortOrder == "asc") {
                    sortOrder = 1;
                }
                else {
                    sortOrder = 0;
                }
                if (!initLoad) { //To avoid duplicate call on first load.
                    getResponse(userStatus, start, rows); //This function triggers the getJSON call & //displays the data after parsing.Not using the sAjaxSource & fncallback. Also using the custom processing icon & //text.
                }
            }
        });
    </script>

@endpush
