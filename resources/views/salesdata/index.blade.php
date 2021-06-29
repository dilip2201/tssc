@extends('layout.app')
@section('content')
@section('pageTitle','Database')

@section('action')
<style type="text/css">
    .selectwith .btn-group{
    width: 100%;
}
button.multiselect.dropdown-toggle.btn.btn-default{
    text-align: left;
}
 .multiselect-selected-text{
    color: #3a3a3a;
 }
.checkbox > input{
        opacity: 1!important;
        position: inherit!important;
        margin-bottom: 5px!important;
            margin-right: 5px;
}
label.checkbox{
    width: 100%;
}
.multiselect-container>li>a>label{
        padding: 3px 20px 3px 15px!important;
}
ul.multiselect-container.dropdown-menu{
    height: 200px;
    overflow-y: scroll;
}
ul.multiselect-container.dropdown-menu::-webkit-scrollbar {
  width: 5px;
  height: 10px;
}

ul.multiselect-container.dropdown-menu::-webkit-scrollbar-track {
  box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
}



ul.multiselect-container.dropdown-menu::-webkit-scrollbar-thumb {
  background-color: darkgrey;
  outline: 1px solid slategrey;
}
</style>
<div class="d-flex align-items-center">

		<a href="{{ url('salesdata/import') }}" style="padding: 3px 15px!important;" class="btn btn-white font-weight-bold py-3 px-6"><i class="fa fa-upload" style="font-size: 12px;"></i> Import Raw Data</a>
		<a href="{{ url('salesdata/importcategories') }}" style="padding: 3px 15px!important; margin-left: 15px;" class="btn btn-white font-weight-bold py-3 px-6"><i class="fa fa-upload" style="font-size: 12px;"></i> Import Data With Categories</a>
		<a href="#" style="padding: 3px 15px!important; margin-left: 15px;" class="btn btn-white font-weight-bold py-3 px-6"><i class="fa fa-download" style="font-size: 12px;"></i> Export</a>
        <a href="#" style="padding: 3px 15px!important; margin-left: 15px;" class="btn btn-white font-weight-bold py-3 px-6 delete-databases"><i class="fa fa-trash" style="font-size: 12px;"></i> Delete</a>



	<!--end::Dropdown-->
</div>
<!--end::Toolbar-->
@endsection
<style>
    .dataTables_wrapper .dataTables_paginate .pagination .page-item.active > .page-link{
        background: #6eb32b !important;
    }
    .dataTables_wrapper .dataTables_paginate .pagination .page-item:hover:not(.disabled) > .page-link {
        background: #6eb32b !important;
    }
</style>
<!--begin::Container-->
<div class="container">
    <div class="card card-custom">
        <div class="card-body">
            <!--begin: Search Form-->

            <div class="row ">
                <div class="col-lg-3 col-md-3 col-sm-3 mb-7">
                    <input class="form-control kt_daterangepicker_1" id="" readonly="readonly" placeholder="Select time" type="text" />
                </div>
                @if(!empty($payment_methods))
                <div class="col-lg-3 col-md-3 col-sm-3 mb-7 selectwith">
                    <select id="multiple-checkboxes" class="payment_method" multiple="multiple">
                        @foreach($payment_methods as $payment_method)
                        <option value="{{ $payment_method }}">{{ $payment_method }}</option>
                        @endforeach
                    </select>
                </div>
                @endif
                @if(!empty($payment_statuses))
                <div class="col-lg-3 col-md-3 col-sm-3 mb-7 selectwith">
                    <select id="multiple-checkboxes" class="payment_status" multiple="multiple">
                        @foreach($payment_statuses as $payment_status)
                        <option value="{{ $payment_status }}">{{ $payment_status }}</option>
                        @endforeach

                    </select>
                </div>
                @endif
                @if(!empty($taken_bys))
                <div class="col-lg-3 col-md-3 col-sm-3 mb-7 selectwith">
                    <select id="multiple-checkboxes" class="taken_bys" multiple="multiple">

                        @foreach($taken_bys as $taken_by)
                        <option value="{{ $taken_by }}">{{ $taken_by }}</option>
                        @endforeach

                    </select>
                </div>
                @endif
                @if(!empty($companies))
                 <div class="col-lg-3 col-md-3 col-sm-3 mb-7 selectwith">
                    <select id="multiple-checkboxes" class="companies" multiple="multiple">

                        @foreach($companies as $company)
                        <option value="{{ $company }}">{{ $company }}</option>
                        @endforeach

                    </select>
                </div>
                @endif
                @if(!empty($shippings))
                <div class="col-lg-3 col-md-3 col-sm-3 mb-7 selectwith">
                    <select id="multiple-checkboxes" class="shippings" multiple="multiple">

                        @foreach($shippings as $shipping)
                        <option value="{{ $shipping }}">{{ $shipping }}</option>
                        @endforeach

                    </select>
                </div>
                @endif
                @if(!empty($b_citys))
                <div class="col-lg-3 col-md-3 col-sm-3 mb-7 selectwith">
                    <select id="multiple-checkboxes" class="b_citys" multiple="multiple">

                        @foreach($b_citys as $b_city)
                        <option value="{{ $b_city }}">{{ $b_city }}</option>
                        @endforeach

                    </select>
                </div>
                @endif
                @if(!empty($skus))
                <div class="col-lg-3 col-md-3 col-sm-3 mb-7 selectwith">
                    <select id="multiple-checkboxes" class="skus" multiple="multiple">

                        @foreach($skus as $sku)
                        <option value="{{ $sku }}">{{ $sku }}</option>
                        @endforeach

                    </select>
                </div>
                @endif
                @if(!empty($main_industries))
                <div class="col-lg-4 col-md-3 col-sm-3 mb-7 selectwith">
                    <select id="multiple-checkboxes" class="main_industries" multiple="multiple">

                        @foreach($main_industries as $main_industry)
                        <option value="{{ $main_industry }}">{{ $main_industry }}</option>
                        @endforeach

                    </select>
                </div>
                @endif
                @if(!empty($sub_industries))
                <div class="col-lg-4 col-md-3 col-sm-3 mb-7 selectwith">
                    <select id="multiple-checkboxes" class="sub_industries" multiple="multiple">

                        @foreach($sub_industries as $sub_industry)
                        <option value="{{ $sub_industry }}">{{ $sub_industry }}</option>
                        @endforeach

                    </select>
                </div>
                @endif
                @if(!empty($types))
                <div class="col-lg-4 col-md-3 col-sm-3 mb-7 selectwith">
                    <select id="multiple-checkboxes" class="types" multiple="multiple">

                        @foreach($types as $type)
                        <option value="{{ $type }}">{{ $type }}</option>
                        @endforeach

                    </select>
                </div>
                @endif
                <div class="col-lg-3 col-md-3 col-sm-3 mb-7 selectwith">
                   <button style="background: #71ba2b;" class="btn btn-primary clicktosearch spinner-right spinner-white">Search</button>
                </div>
            </div>
            <!--end::Search Form-->
            <!--end: Search Form-->
            <!--begin: Datatable-->
            <div class="datatable datatable-bordered datatable-head-custom datatable-default datatable-primary datatable-subtable datatable-loaded" style="">
                <table class="datatable-table" id="database">
                    <thead class="datatable-head">
                    <tr class="datatable-row">
                        <th data-field="checkbox" class=""><span style="width: 20px;"></th>
                        <th class="datatable-cell datatable-cell-sort"><span style="width: 110px;">OrderId</span></th>
                        <th class="datatable-cell datatable-cell-sort"><span style="width: 110px;">Created</span></th>
                        <th class="datatable-cell datatable-cell-sort"><span style="width: 110px;">Name</span></th>
                        <th class="datatable-cell datatable-cell-sort"><span style="width: 110px;">Email</span></th>
                        <th class="datatable-cell datatable-cell-sort"><span style="width: 110px;">Total</span></th>
                        <th class="datatable-cell datatable-cell-sort"><span style="width: 110px;">Company</span></th>
                        <th class="datatable-cell datatable-cell-sort"><span style="width: 125px;">Actions</span></th>
                    </tr>
                    </thead>
                    <tbody class="datatable-body">

                    </tbody>

                </table>
            <!--end: Datatable-->
        </div>

    </div>
</div>
</div>
<!-- modal -->
<div class="modal fade sales_edit_modal" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title modaltitle"></h5>
            </div>
            <div class="modal-body saleseditform">
                <div class="col-sm-12 col-md-12" style="text-align: center">
                    <span class="spinner-success spinner-lg editformspinner"></span>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- modal -->
<div class="modal fade sales_view_modal" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title modaltitle"></h5>
            </div>
            <div class="modal-body salesviewform">
                <div class="col-sm-12 col-md-12" style="text-align: center">
                    <span class="spinner-success spinner-lg editformspinner"></span>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
    @push('link')
        <link href="{{ URL::asset('public/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
        <link type="text/css" href="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/css/dataTables.checkboxes.css" rel="stylesheet" />

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">

    @endpush

    @push('script')
        <script src="{{ URL::asset('public/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
        <script type="text/javascript" src="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>

    <script type="text/javascript">
        $(function(){

            $('body').on('click','.clicktosearch',function(){
                $('#database').DataTable().ajax.reload();
            })
            $('.kt_daterangepicker_1').daterangepicker({
                buttonClasses: ' btn',
                applyClass: 'btn-primary',
                cancelClass: 'btn-secondary'
            });
            $('.payment_method').multiselect({
              includeSelectAllOption: true,
              selectAllText:' Select all',
              filterPlaceholder: 'Search',
              enableFiltering:true,
              nonSelectedText: 'Payment Method',
            });
            $('.taken_bys').multiselect({
              includeSelectAllOption: true,
              selectAllText:' Select all',
              filterPlaceholder: 'Search',
              enableFiltering:true,
              nonSelectedText: 'Taken By',
            });

            $('.companies').multiselect({
              includeSelectAllOption: true,
              selectAllText:' Select all',
              filterPlaceholder: 'Search',
              enableFiltering:true,
              nonSelectedText: 'Company',


            });
             $('.shippings').multiselect({
              includeSelectAllOption: true,
              selectAllText:' Select all',
              filterPlaceholder: 'Search',
              enableFiltering:true,
              nonSelectedText: 'Shipped Method',


            });
              $('.b_citys').multiselect({
              includeSelectAllOption: true,
              selectAllText:' Select all',
              filterPlaceholder: 'Search',
              enableFiltering:true,
              nonSelectedText: 'City',
              maxHeight:false,



            });
               $('.skus').multiselect({
              includeSelectAllOption: true,
              selectAllText:' Select all',
              filterPlaceholder: 'Search',
              enableFiltering:true,
              nonSelectedText: 'SKU Numbers',


            });
                $('.main_industries').multiselect({
              includeSelectAllOption: true,
              selectAllText:' Select all',
              filterPlaceholder: 'Search',
              enableFiltering:true,
              nonSelectedText: 'Main Industry',


            });
                 $('.sub_industries').multiselect({
              includeSelectAllOption: true,
              selectAllText:' Select all',
              filterPlaceholder: 'Search',
              enableFiltering:true,
              nonSelectedText: 'Sub Industry',


            });
                  $('.types').multiselect({
              includeSelectAllOption: true,
              selectAllText:' Select all',
              filterPlaceholder: 'Search',
              enableFiltering:true,
              nonSelectedText: 'Type',


            });

            $('.payment_status').multiselect({
                includeSelectAllOption: true,
                selectAllText: ' Select all',
                filterPlaceholder: 'Search',
                enableFiltering: true,
                nonSelectedText: 'Payment Status',


            });
            var startDate = '';
            var endDate = '';
            /* datatable */
            var tbl = $("#database").DataTable({
                "responsive": true,
                "autoWidth": false,
                processing: true,
                serverSide: true,
                ajax: {
                    'url': "{{ route('salesdata.getall') }}",
                    'type': 'POST',
                    'data': function (d) {
                        d._token = "{{ csrf_token() }}";
                        d.payment_method = $('.payment_method').val();
                        d.takenby = $('.taken_bys').val();
                        d.companies = $('.companies').val();
                        d.shippings = $('.shippings').val();
                        d.skus = $('.skus').val();
                        d.b_citys = $('.b_citys').val();
                        d.payment_status = $('.payment_status').val();
                        d.startdate = startDate;
                        d.enddate = endDate;
                    }
                },
                'columnDefs': [
                    {
                        'targets': 0,
                        'checkboxes': {
                            'selectRow': true,
                            'label': 'id'
                        }
                    }
                ],
                'select': {
                    'style': 'multi'
                },
                columns: [
                    {data: 'id'},
                    {data: 'order_id'},
                    {data: 'created'},
                    {data: 'name'},
                    {data: 'email'},
                    {data: 'total'},
                    {data: 'company'},
                    {data: 'action', orderable: false},
                ]
            });


            /********** Delete User ************/
            $('body').on('click', '.delete-databases', function () {

                var selectedIds = tbl.columns().checkboxes.selected()[0];
                var ids = [];
                selectedIds.forEach(function (selectedId) {
                    ids.push(selectedId);
                });
                if (ids.length > 0) {
                    Swal.fire({
                        title: "Are you sure?",
                        text: "You want to delete Sales.",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Yes"
                    }).then(function (result) {
                        if (result.value) {
                            $.ajax({
                                url: '{{ url("salesdata/deletemultiple") }}',
                                type: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                data: {ids: ids},
                                success: function (data) {
                                    if (data.status == 400) {
                                        Swal.fire("Oh no!", "Something went wrong!", "error");
                                    }
                                    if (data.status == 200) {
                                        location.reload();
                                    }
                                },
                                error: function () {
                                    Swal.fire("Oh no!", "Something went wrong!", "error");
                                }
                            });
                        }
                    });
                } else {
                    Swal.fire("Warning!", "Please Select At least one record!", "warning");
                }
            });
            /********* Add New User ************/
            $('body').on('click', '.editsales', function () {
                var id = $(this).data('id');
                $('.modaltitle').text('Edit Salesdata');
                $.ajax({
                    url: "{{ url('salesdata/edit')}}",
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: {id: id},
                    beforeSend: function () {
                        $('.editformspinner').addClass('spinner');
                    },
                    success: function (data) {
                        $('.saleseditform').html(data);
                    },
                });
            });

            /********** Submit form ************/
            $('body').on('submit', '.formsubmit', function (e) {
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('action'),
                    data: new FormData(this),
                    type: 'POST',
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function () {
                        $('.submitbutton').addClass('spinner');
                    },
                    success: function (data) {

                        if (data.status == 400) {
                            $('.submitbutton').removeClass('spinner');
                            toastr.error(data.msg)
                        }
                        if (data.status == 200) {
                            $('.submitbutton').removeClass('spinner');
                            $('.sales_edit_modal').modal('hide');
                            $('#database').DataTable().ajax.reload();
                            toastr.success(data.msg, 'Success!')
                        }
                    },
                });
            });


            /********* View Sales Details ************/
            $('body').on('click', '.viewsales', function () {
                var id = $(this).data('id');
                $('.modaltitle').text('View Salesdata');
                $.ajax({
                    url: "{{ url('salesdata/show')}}",
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: {id: id},
                    beforeSend: function () {
                        $('.editformspinner').addClass('spinner');
                    },
                    success: function (data) {
                        $('.salesviewform').html(data);
                    },
                });
            });

            /*********** Cancel form ***********/
            $('body').on('click', '.resetaddeditform', function () {
                let html = '<div class="col-sm-12 col-md-12" style="text-align: center">'+
                    '<span class="spinner-success spinner-lg addformspinner"></span>'+
                    '</div>';
                $('.salesviewform').html(html);
            });
        });
        </script>
    @endpush
@endsection
