@extends('layout.app')
@section('action')
<div class="d-flex align-items-center">
	<div class="dropdown dropdown-inline ml-2" data-toggle="tooltip" title="Quick actions" data-placement="top">
		<a href="#" class="btn btn-white font-weight-bold py-3 px-6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Add New</a>
		
	</div>
	<!--end::Dropdown-->
</div>
<!--end::Toolbar-->
@endsection
@section('content')
@section('pageTitle', 'Users')

<!--begin::Container-->
<div class="container">
	<div class="card card-custom">
									
									<div class="card-body">
										<!--begin: Datatable-->
										<table class="table table-separate table-head-custom table-checkable kt_datatable_2" id="">
											<thead>
												<tr>
													<th>Record ID</th>
													<th>Order ID</th>
													<th>Country</th>
													<th>Ship City</th>
													<th>Ship Address</th>
													<th>Actions</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>1</td>
													<td>1</td>
													<td>64616-103</td>
													<td>Brazil</td>
													<td>São Félix do Xingu</td>
													<td>698 Oriole Pass</td>
													<td nowrap="nowrap"></td>
												</tr>
												<tr>
													<td>1</td>
													<td>1</td>
													<td>64616-103</td>
													<td>Brazil</td>
													<td>São Félix do Xingu</td>
													<td>698 Oriole Pass</td>
													<td nowrap="nowrap"></td>
												</tr>
												<tr>
													<td>1</td>
													<td>1</td>
													<td>64616-103</td>
													<td>Brazil</td>
													<td>São Félix do Xingu</td>
													<td>698 Oriole Pass</td>
													<td nowrap="nowrap"></td>
												</tr>
												<tr>
													<td>1</td>
													<td>1</td>
													<td>64616-103</td>
													<td>Brazil</td>
													<td>São Félix do Xingu</td>
													<td>698 Oriole Pass</td>
													<td nowrap="nowrap"></td>
												</tr>
												<tr>
													<td>1</td>
													<td>1</td>
													<td>64616-103</td>
													<td>Brazil</td>
													<td>São Félix do Xingu</td>
													<td>698 Oriole Pass</td>
													<td nowrap="nowrap"></td>
												</tr>
												<tr>
													<td>1</td>
													<td>1</td>
													<td>64616-103</td>
													<td>Brazil</td>
													<td>São Félix do Xingu</td>
													<td>698 Oriole Pass</td>
													<td nowrap="nowrap"></td>
												</tr>
												<tr>
													<td>1</td>
													<td>1</td>
													<td>64616-103</td>
													<td>Brazil</td>
													<td>São Félix do Xingu</td>
													<td>698 Oriole Pass</td>
													<td nowrap="nowrap"></td>
												</tr>
												<tr>
													<td>1</td>
													<td>1</td>
													<td>64616-103</td>
													<td>Brazil</td>
													<td>São Félix do Xingu</td>
													<td>698 Oriole Pass</td>
													<td nowrap="nowrap"></td>
												</tr>
												<tr>
													<td>1</td>
													<td>1</td>
													<td>64616-103</td>
													<td>Brazil</td>
													<td>São Félix do Xingu</td>
													<td>698 Oriole Pass</td>
													<td nowrap="nowrap"></td>
												</tr>
												<tr>
													<td>1</td>
													<td>1</td>
													<td>64616-103</td>
													<td>Brazil</td>
													<td>São Félix do Xingu</td>
													<td>698 Oriole Pass</td>
													<td nowrap="nowrap"></td>
												</tr>
												<tr>
													<td>1</td>
													<td>1</td>
													<td>64616-103</td>
													<td>Brazil</td>
													<td>São Félix do Xingu</td>
													<td>698 Oriole Pass</td>
													<td nowrap="nowrap"></td>
												</tr>
												<tr>
													<td>1</td>
													<td>1</td>
													<td>64616-103</td>
													<td>Brazil</td>
													<td>São Félix do Xingu</td>
													<td>698 Oriole Pass</td>
													<td nowrap="nowrap"></td>
												</tr>
												<tr>
													<td>1</td>
													<td>1</td>
													<td>64616-103</td>
													<td>Brazil</td>
													<td>São Félix do Xingu</td>
													<td>698 Oriole Pass</td>
													<td nowrap="nowrap"></td>
												</tr>
											</tbody>
										</table>
										<!--end: Datatable-->
									</div>
								</div>
<!--end::Container-->
</div>

@push('link')
<link href="{{ URL::asset('public/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('script')
<script src="{{ URL::asset('public/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script type="text/javascript">
	$('.kt_datatable_2').DataTable({

	});
</script>
@endpush
@endsection