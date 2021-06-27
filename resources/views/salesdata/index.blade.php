@extends('layout.app')
@section('content')
@section('pageTitle', 'Database')

@section('action')
<div class="d-flex align-items-center">
	
		<a href="{{ url('salesdata/import') }}" style="padding: 3px 15px!important;" class="btn btn-white font-weight-bold py-3 px-6"><i class="fa fa-upload" style="font-size: 12px;"></i> Import Raw Data</a>
		<a href="{{ url('salesdata/importcategories') }}" style="padding: 3px 15px!important; margin-left: 15px;" class="btn btn-white font-weight-bold py-3 px-6"><i class="fa fa-upload" style="font-size: 12px;"></i> Import Data With Categories</a>
		<a href="{{ url('salesdata/exportdata') }}" style="padding: 3px 15px!important; margin-left: 15px;" class="btn btn-white font-weight-bold py-3 px-6"><i class="fa fa-download" style="font-size: 12px;"></i> Export</a>
		
	
	<!--end::Dropdown-->
</div>
<!--end::Toolbar-->
@endsection
<!--begin::Container-->
<div class="container">
	<!--begin::Notice-->
	<div class="alert alert-custom alert-white alert-shadow fade show gutter-b" role="alert" style="display: block;height: 250px; text-align: center;">
		<h3 style="line-height: 190px;"> Welcom to TSSC Sales Database</h3>
	<!--end::Notice-->
	
	</div>
<!--end::Container-->
</div>
@endsection