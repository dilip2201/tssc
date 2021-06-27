@extends('layout.app')
@section('content')
@section('pageTitle', 'Report')
<div class="container">
 <div class="card card-custom gutter-b">
  <div class="card-body">
   <div class="row">
    <div class="col-lg-6" style="    border-right: 1px solid #989898;">
     <!--begin::Card-->
     <!--begin::Chart-->
     <label style="width: 100%;    display: block;    text-align: center;    font-size: 16px;
    font-weight: 600;    margin-bottom: 50px;">Payment Method</label>
     <div id="chart_11" class="d-flex justify-content-center"></div>
     <!--end::Chart-->
    </div>
    <div class="col-lg-6">
    	<label style="width: 100%;    display: block;    text-align: center;    font-size: 16px;
    font-weight: 600;    margin-bottom: 50px;">Shipping Method</label>
     <div id="chart_12" class="d-flex justify-content-center"></div>
    </div>
    <!--end::Card-->
   </div>
  </div>
 </div>
</div>

@push('script')
<script src="{{ URL::asset('public/assets/js/pages/features/charts/apexcharts.js') }}"></script>
@endpush
@endsection