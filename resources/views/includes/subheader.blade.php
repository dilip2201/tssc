<!--begin::Subheader-->
<div class="subheader py-2 py-lg-12 subheader-transparent" id="kt_subheader" style="background:linear-gradient(180deg, #71ba2b 0%, #5c8634 100%) !important; height: 228px; padding: 0px 0 60px 0 !important">
	<div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
		<!--begin::Info-->
		<div class="d-flex align-items-center flex-wrap mr-1">
			<!--begin::Heading-->
			<div class="d-flex flex-column">
				<!--begin::Title-->
				<h2 class="text-white font-weight-bold my-2 mr-5">@yield('pageTitle')</h2>
				<!--end::Title-->
				<!--begin::Breadcrumb-->
				
				@if(activeMenu('report') !== 'active')
				<div class="d-flex align-items-center font-weight-bold my-2">
					<!--begin::Item-->
					<a href="{{ url('dashboard')}}" class="opacity-75 hover-opacity-100">
						<i class="flaticon2-shelter text-white icon-1x"></i>
					</a>
					<!--end::Item-->
					<!--begin::Item-->
					<span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
					<a href="#" class="text-white text-hover-white opacity-75 hover-opacity-100">@yield('pageTitle')</a>
					<!--end::Item-->
				
				</div>
				@endif
				<!--end::Breadcrumb-->
			</div>
			<!--end::Heading-->
		</div>
		<!--end::Info-->
		<!--begin::Toolbar-->
		@yield('action')
	</div>
</div>
<!--end::Subheader-->