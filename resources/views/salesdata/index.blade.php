@extends('layout.app')
@section('content')
@section('pageTitle', 'Database')

@section('action')
<div class="d-flex align-items-center">

		<a href="{{ url('salesdata/import') }}" style="padding: 3px 15px!important;" class="btn btn-white font-weight-bold py-3 px-6"><i class="fa fa-upload" style="font-size: 12px;"></i> Import Raw Data</a>
		<a href="{{ url('salesdata/importcategories') }}" style="padding: 3px 15px!important; margin-left: 15px;" class="btn btn-white font-weight-bold py-3 px-6"><i class="fa fa-upload" style="font-size: 12px;"></i> Import Data With Categories</a>
		<a href="#" style="padding: 3px 15px!important; margin-left: 15px;" class="btn btn-white font-weight-bold py-3 px-6"><i class="fa fa-download" style="font-size: 12px;"></i> Export</a>


	<!--end::Dropdown-->
</div>
<!--end::Toolbar-->
@endsection
<!--begin::Container-->
<div class="container">
    <div class="card card-custom">
        <div class="card-body">
            <!--begin: Search Form-->
            <!--begin::Search Form-->
            <div class="mb-7">
                <div class="row align-items-center">
                    <div class="col-lg-9 col-xl-9">
                        <div class="row align-items-center">
                            <div class="col-md-6 my-2 my-md-0">
                                <div class="d-flex align-items-center">
                                    <label class="mr-3 mb-0 d-none d-md-block">From Date:</label>
                                </div>
                            </div>
                            <div class="col-md-6 my-2 my-md-0">
                                <div class="d-flex align-items-center">
                                    <label class="mr-3 mb-0 d-none d-md-block">To Date:</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xl-3 mt-5 mt-lg-0">
                        <a href="javascript:void(0);" class="btn btn-light-primary px-6 font-weight-bold">Search</a>

                        <a href="{{ url('salesdata/exportdata') }}" class="btn btn-primary font-weight-bolder ml-30">
                        <span class="svg-icon svg-icon-md">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"></rect>
                                    <path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3"></path>
                                    <path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000"></path>
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>Export</a>
                    </div>
                </div>
            </div>
            <!--end::Search Form-->
            <!--end: Search Form-->
            <!--begin: Datatable-->
            <div class="datatable datatable-bordered datatable-head-custom datatable-default datatable-primary datatable-subtable datatable-loaded" style="">
                <table class="datatable-table" id="database"    >
                    <thead class="datatable-head">
                    <tr class="datatable-row">
                        <th data-field="checkbox" class="datatable-cell-center datatable-cell datatable-cell-check"><span style="width: 20px;">
                            <label class="checkbox checkbox-single checkbox-all kt-checkbox--solid">
                            <input type="checkbox">&nbsp;<span></span></label></span>
                        </th>
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
    @push('link')
        <link href="{{ URL::asset('public/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    @endpush

    @push('script')
        <script src="{{ URL::asset('public/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                /* datatable */
                $("#database").DataTable({
                    "responsive": true,
                    "autoWidth": false,
                    processing: true,
                    serverSide: true,
                    ajax: {
                        'url': "{{ route('salesdata.getall') }}",
                        'type': 'POST',
                        'data': function (d) {
                            d._token = "{{ csrf_token() }}";
                        }
                    },
                    columns: [
                        {data: 'id'},
                        {data: 'order_id'},
                        {data: 'created'},
                        {data: 'name'},
                        {data: 'email'},
                        {data: 'total'},
                        {data: 'company'},
                        {data: 'action', "orderable": false},
                    ]
                });
            });
        </script>
    @endpush
@endsection
