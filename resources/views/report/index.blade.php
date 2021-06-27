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
     <div class="chart_12" class="d-flex justify-content-center"></div>
     <!--end::Chart-->
    </div>
    <div class="col-lg-6">
    	<label style="width: 100%;    display: block;    text-align: center;    font-size: 16px;
    font-weight: 600;    margin-bottom: 50px;">Shipping Method</label>
     <div class="chart_13" class="d-flex justify-content-center"></div>
    </div>
    <div class="col-lg-12">
    	<label style="width: 100%;    display: block;    text-align: center;    font-size: 16px;    font-weight: 600;     margin-bottom: 25px;    margin-top: 30px; ">Taken By</label>
     <div class="chart_14" class="d-flex justify-content-center"></div>
    </div>
    <!--end::Card-->
    <div class="col-lg-6">
    	<label style="width: 100%;    display: block;    font-size: 16px;    font-weight: 600;
    margin-bottom: 50px;    margin-top: 15px;">Top 10 Main Industry( Based on Pound Spend)</label>
     <div id="kt_amcharts_2" style="height: 500px;"></div>
    </div>
   </div>
  </div>
 </div>
</div>

@push('script')
<script src="//www.amcharts.com/lib/3/amcharts.js"></script>
		<script src="//www.amcharts.com/lib/3/serial.js"></script>
		<script src="//www.amcharts.com/lib/3/radar.js"></script>
		<script src="//www.amcharts.com/lib/3/pie.js"></script>
		<script src="//www.amcharts.com/lib/3/plugins/tools/polarScatter/polarScatter.min.js"></script>
		<script src="//www.amcharts.com/lib/3/plugins/animate/animate.min.js"></script>
		<script src="//www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
		<script src="//www.amcharts.com/lib/3/themes/light.js"></script>
<script type="text/javascript">
	$(function(){


		const primary = '#6993FF';
		const success = '#1BC5BD';
		const info = '#8950FC';
		const warning = '#FFA800';
		const danger = '#F64E60';
		const apexChart = ".chart_12";
		const apexChart1 = ".chart_13";
		const apexChart2 = ".chart_14";
		var options = {
			series: [44, 55, 13, 43, 22],
			chart: {
				width: '100%',
				height:"250",
				type: 'pie',
			},
			labels: ['Team A', 'Team B', 'Team C', 'Team D', 'Team E'],
			responsive: [{
				breakpoint: 480,
				options: {
					chart: {
						width: 200
					},
					legend: {
						position: 'bottom'
					}
				}
			}],
			colors: [primary, success, warning, danger, info]
		};

		var chart = new ApexCharts(document.querySelector(apexChart), options);
		chart.render();
		var chart1 = new ApexCharts(document.querySelector(apexChart1), options);
		chart1.render();
		var chart2 = new ApexCharts(document.querySelector(apexChart2), options);
		chart2.render();

		 var chart4 = AmCharts.makeChart("kt_amcharts_2", {
            "rtl": KTUtil.isRTL(),
            "type": "serial",
            "addClassNames": true,
            "theme": "light",
            "autoMargins": false,
            "marginLeft": 0,
            "marginRight": 0,
            "marginTop": 0,
            "marginBottom": 0,
            "balloon": {
                "adjustBorderColor": false,
                "horizontalPadding": 10,
                "verticalPadding": 8,
                "color": "#ffffff"
            },

            "dataProvider": [
            {
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