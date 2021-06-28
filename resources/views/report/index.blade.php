@extends('layout.app')
@section('content')
@section('pageTitle', 'Report')
<style type="text/css">
    table td {
  border: 1px solid #000;
  padding: 4px;
  font-size: 10px;
  text-align: center;
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
.selectwith .btn-group{
    width: 100%;
}
button.multiselect.dropdown-toggle.btn.btn-default{
    text-align: left;
}
</style>
<div class="container">
 <div class="card card-custom gutter-b">
  <div class="card-body">
    <div class="form-group row">
    <div class="col-lg-3 col-md-3 col-sm-3">
        <input class="form-control kt_daterangepicker_1" readonly="readonly" placeholder="Select time" type="text" />
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 selectwith">
        <select id="multiple-checkboxes" class="payment_method" multiple="multiple">
            @if(!empty($payment_methods))
            @foreach($payment_methods as $payment_method)
            <option value="{{ $payment_method }}">{{ $payment_method }}</option>
            @endforeach
            @endif
        </select>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 selectwith">
        <select id="multiple-checkboxes" class="payment_status" multiple="multiple">
            @if(!empty($payment_statuses))
            @foreach($payment_statuses as $payment_status)
            <option value="{{ $payment_status }}">{{ $payment_status }}</option>
            @endforeach
            @endif
        </select>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 selectwith">
        <select id="multiple-checkboxes" class="taken_bys" multiple="multiple">
            @if(!empty($taken_bys))
            @foreach($taken_bys as $taken_by)
            <option value="{{ $taken_by }}">{{ $taken_by }}</option>
            @endforeach
            @endif
        </select>
    </div>
</div>
   <div class="row">
    <div class="col-lg-6" style="    border-right: 1px solid #989898;">
     <!--begin::Card-->
     <!--begin::Chart-->
     <label style="width: 100%;    display: block;    text-align: center;    font-size: 16px;
    font-weight: 600;   ">Payment Method</label>
     <div id="kt_amcharts_12" style="height: 300px;"></div>
     <!--end::Chart-->
    </div>
    <div class="col-lg-6">
    	<label style="width: 100%;    display: block;    text-align: center;    font-size: 16px;
    font-weight: 600; ">Shipping Method</label>
     <div id="kt_amcharts_13" style="height: 300px;"></div>
    </div>
    <div class="col-lg-12">
    	<label style="width: 100%;    display: block;    text-align: center;    font-size: 16px;    font-weight: 600;       margin-top: 30px; ">Taken By</label>
     <div id="kt_amcharts_14" style="height: 300px;"></div>
    </div>
    <!--end::Card-->
    <div class="col-lg-6">
    	<label style="width: 100%;    display: block;    font-size: 16px;    font-weight: 600;
        margin-top: 15px;">Top 10 Main Industry( Based on Pound Spend)</label>
     <div id="kt_amcharts_2" style="height: 300px;"></div>
     <table id="customers">
      <tr>
        <td>Category</td>
        <td>Construction</td>
        <td>Property Service</td>
        <td>Plant & Machinery</td>
        <td>Industrial</td>
        <td>Medical</td>
        <td>Information & Technology</td>
      </tr>
    <tr>
        <td>Number of orders</td>
        <td>645</td>
        <td>367</td>
        <td>356</td>
        <td>648</td>
        <td>255</td>
        <td>6124</td>
      </tr>
      
  </table>
    </div>
    <div class="col-lg-6">
        <label style="width: 100%;    display: block;    font-size: 16px;    font-weight: 600;
        margin-top: 15px;">Top 10 Main Industry (Based On Number of Orders)</label>
     <div id="kt_amcharts_3" style="height: 300px;"></div>
     <table id="customers">
      <tr>
        <td>Category</td>
        <td>Construction</td>
        <td>Property Service</td>
        <td>Plant & Machinery</td>
        <td>Industrial</td>
        <td>Medical</td>
        <td>Information & Technology</td>
      </tr>
    <tr>
        <td>Number of orders</td>
        <td>645</td>
        <td>367</td>
        <td>356</td>
        <td>648</td>
        <td>255</td>
        <td>6124</td>
      </tr>
      
  </table>
    </div>
   </div>
  </div>
 </div>
</div>
@push('link')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
@endpush
@push('script')
<script src="//www.amcharts.com/lib/3/amcharts.js"></script>
<script src="//www.amcharts.com/lib/3/serial.js"></script>
<script src="//www.amcharts.com/lib/3/radar.js"></script>
<script src="//www.amcharts.com/lib/3/pie.js"></script>
<script src="//www.amcharts.com/lib/3/plugins/tools/polarScatter/polarScatter.min.js"></script>
<script src="//www.amcharts.com/lib/3/plugins/animate/animate.min.js"></script>
<script src="//www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<script src="//www.amcharts.com/lib/3/themes/light.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
  
<script type="text/javascript">
	$(function(){
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

        $('.payment_status').multiselect({
          includeSelectAllOption: true,
          selectAllText:' Select all',
          filterPlaceholder: 'Search',
          enableFiltering:true,
          nonSelectedText: 'Payment Status',


        });

        var chart = AmCharts.makeChart("kt_amcharts_13", {
            "type": "pie",
            "theme": "light",
            "hideCredits":true,
            "dataProvider": [{
                "country": "Lithuania",
                "litres": 501.9
            }, {
                "country": "Czech Republic",
                "litres": 301.9
            }, {
                "country": "Ireland",
                "litres": 201.1
            }, {
                "country": "Germany",
                "litres": 165.8
            }, {
                "country": "Australia",
                "litres": 139.9
            }, {
                "country": "Austria",
                "litres": 128.3
            }, {
                "country": "UK",
                "litres": 99
            }, {
                "country": "Belgium",
                "litres": 60
            }, {
                "country": "The Netherlands",
                "litres": 50
            }],
            "valueField": "litres",
            "titleField": "country",
            "balloon": {
                "fixedPosition": true
            },
            
        });
        var chart = AmCharts.makeChart("kt_amcharts_12", {
            "type": "pie",
            "theme": "light",
            "hideCredits":true,
            "dataProvider": [{
                "country": "Lithuania",
                "litres": 501.9
            }, {
                "country": "Czech Republic",
                "litres": 301.9
            }, {
                "country": "Ireland",
                "litres": 201.1
            }, {
                "country": "Germany",
                "litres": 165.8
            }, {
                "country": "Australia",
                "litres": 139.9
            }, {
                "country": "Austria",
                "litres": 128.3
            }, {
                "country": "UK",
                "litres": 99
            }, {
                "country": "Belgium",
                "litres": 60
            }, {
                "country": "The Netherlands",
                "litres": 50
            }],
            "valueField": "litres",
            "titleField": "country",
            "balloon": {
                "fixedPosition": true
            },
            
        });
    
        var chart = AmCharts.makeChart("kt_amcharts_14", {
            "type": "pie",
            "theme": "light",
            "hideCredits":true,
            "dataProvider": [{
                "country": "Lithuania",
                "litres": 501.9
            }, {
                "country": "Czech Republic",
                "litres": 301.9
            }, {
                "country": "Ireland",
                "litres": 201.1
            }, {
                "country": "Germany",
                "litres": 165.8
            }, {
                "country": "Australia",
                "litres": 139.9
            }, {
                "country": "Austria",
                "litres": 128.3
            }, {
                "country": "UK",
                "litres": 99
            }, {
                "country": "Belgium",
                "litres": 60
            }, {
                "country": "The Netherlands",
                "litres": 50
            }],
            "valueField": "litres",
            "titleField": "country",
            "balloon": {
                "fixedPosition": true
            },
            
        });
    var chart = AmCharts.makeChart("kt_amcharts_3", {
            "rtl": KTUtil.isRTL(),
            "type": "serial",
            "addClassNames": true,
            "theme": "light",
            "autoMargins": false,
            "marginLeft": 30,
            "marginRight": 8,
            "marginTop": 10,
            "marginBottom": 26,
            "balloon": {
                "adjustBorderColor": false,
                "horizontalPadding": 10,
                "verticalPadding": 8,
                "color": "#ffffff"
            },

            "dataProvider": [{
                "year": 2009,
                "income": 23.5,
                "expenses": 21.1
            }, {
                "year": 2010,
                "income": 26.2,
                "expenses": 30.5
            }, {
                "year": 2011,
                "income": 30.1,
                "expenses": 34.9
            }, {
                "year": 2012,
                "income": 29.5,
                "expenses": 31.1
            }, {
                "year": 2013,
                "income": 30.6,
                "expenses": 28.2,
                "dashLengthLine": 5
            }, {
                "year": 2014,
                "income": 34.1,
                "expenses": 32.9,
                "dashLengthColumn": 5,
                "alpha": 0.2,
                "additional": "(projection)"
            }],
            "valueAxes": [{
                "axisAlpha": 0,
                "position": "left"
            }],
            "startDuration": 1,
            "graphs": [{
                "alphaField": "alpha",
                "balloonText": "<span style='font-size:12px;'>[[title]] in [[category]]:<br><span style='font-size:20px;'>[[value]]</span> [[additional]]</span>",
                "fillAlphas": 1,
                "title": "Income",
                "type": "column",
                "valueField": "income",
                "dashLengthField": "dashLengthColumn"
            }, {
                "id": "graph2",
                "balloonText": "<span style='font-size:12px;'>[[title]] in [[category]]:<br><span style='font-size:20px;'>[[value]]</span> [[additional]]</span>",
                "bullet": "round",
                "lineThickness": 3,
                "bulletSize": 7,
                "bulletBorderAlpha": 1,
                "bulletColor": "#FFFFFF",
                "useLineColorForBulletBorder": true,
                "bulletBorderThickness": 3,
                "fillAlphas": 0,
                "lineAlpha": 1,
                "title": "Expenses",
                "valueField": "expenses",
                "dashLengthField": "dashLengthLine"
            }],
            "categoryField": "year",
            "categoryAxis": {
                "gridPosition": "start",
                "axisAlpha": 0,
                "tickLength": 0
            },
            
        });

		
		 var chart = AmCharts.makeChart("kt_amcharts_2", {
            "rtl": KTUtil.isRTL(),
            "type": "serial",
            "addClassNames": true,
            "theme": "light",
            "autoMargins": false,
            "marginLeft": 30,
            "marginRight": 8,
            "marginTop": 10,
            "marginBottom": 26,
            "balloon": {
                "adjustBorderColor": false,
                "horizontalPadding": 10,
                "verticalPadding": 8,
                "color": "#ffffff"
            },

            "dataProvider": [{
                "year": 2009,
                "income": 23.5,
                "expenses": 21.1
            }, {
                "year": 2010,
                "income": 26.2,
                "expenses": 30.5
            }, {
                "year": 2011,
                "income": 30.1,
                "expenses": 34.9
            }, {
                "year": 2012,
                "income": 29.5,
                "expenses": 31.1
            }, {
                "year": 2013,
                "income": 30.6,
                "expenses": 28.2,
                "dashLengthLine": 5
            }, {
                "year": 2014,
                "income": 34.1,
                "expenses": 32.9,
                "dashLengthColumn": 5,
                "alpha": 0.2,
                "additional": "(projection)"
            }],
            "valueAxes": [{
                "axisAlpha": 0,
                "position": "left"
            }],
            "startDuration": 1,
            "graphs": [{
                "alphaField": "alpha",
                "balloonText": "<span style='font-size:12px;'>[[title]] in [[category]]:<br><span style='font-size:20px;'>[[value]]</span> [[additional]]</span>",
                "fillAlphas": 1,
                "title": "Income",
                "type": "column",
                "valueField": "income",
                "dashLengthField": "dashLengthColumn"
            }, {
                "id": "graph2",
                "balloonText": "<span style='font-size:12px;'>[[title]] in [[category]]:<br><span style='font-size:20px;'>[[value]]</span> [[additional]]</span>",
                "bullet": "round",
                "lineThickness": 3,
                "bulletSize": 7,
                "bulletBorderAlpha": 1,
                "bulletColor": "#FFFFFF",
                "useLineColorForBulletBorder": true,
                "bulletBorderThickness": 3,
                "fillAlphas": 0,
                "lineAlpha": 1,
                "title": "Expenses",
                "valueField": "expenses",
                "dashLengthField": "dashLengthLine"
            }],
            "categoryField": "year",
            "categoryAxis": {
                "gridPosition": "start",
                "axisAlpha": 0,
                "tickLength": 0
            },
            
        });
		
	})
</script>
@endpush
@endsection