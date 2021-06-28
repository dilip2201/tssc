<!--begin::Header-->
	<div id="kt_header" class="header header-fixed" style="background: #fff;">
		<!--begin::Container-->
		<div class="container d-flex align-items-stretch justify-content-between">
			<!--begin::Left-->
			<div class="d-flex align-items-stretch mr-3">
				<!--begin::Header Logo-->
				<div class="header-logo">
					<a href="{{ url('dashboard')}}">
						<img alt="Logo" src="{{ URL::asset('public/assets/media/logos/logo.jpg') }}" class="logo-default " style="max-height: 55px;    width: auto;" />
						<img alt="Logo" src="{{ URL::asset('public/assets/media/logos/logosmall.jpg') }}" class="logo-sticky max-h-40px" />
					</a>
				</div>
				<!--end::Header Logo-->
				<!--begin::Header Menu Wrapper-->
				<div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
					<!--begin::Header Menu-->
					<div id="kt_header_menu" class="header-menu header-menu-left header-menu-mobile header-menu-layout-default">
						<!--begin::Header Nav-->
						<ul class="menu-nav">
							 @if(checkPermission(['superadmin','dashboard','data_access_only','data_access_without_import_export']))
                
                
							<li class="menu-item menu-item-submenu menu-item-rel"  >
								<a href="{{ url('dashboard')}}" class="menu-link {{ activeMenu('dashboard')}}">
									<span class="menu-text">Dashboard</span>
									<i class="menu-arrow"></i>
								</a>
								
							</li>
							@endif
							@if(checkPermission(['superadmin']))
							<li class="menu-item menu-item-submenu menu-item-rel"  >
								<a href="{{ url('users')}}" class="menu-link {{ activeMenu('users')}}">
									<span class="menu-text">Users</span>
									<i class="menu-arrow"></i>
								</a>
								
							</li>
							@endif
							@if(checkPermission(['superadmin']))
							<li class="menu-item menu-item-submenu menu-item-rel"  >
								<a href="{{ url('salesdata')}}" class="menu-link {{ activeMenu('salesdata')}} {{ activeMenu('import')}}">
									<span class="menu-text">Database</span>
									<i class="menu-arrow"></i>
								</a>
								
							</li>
							@endif

							<li class="menu-item menu-item-submenu menu-item-rel"  >
								<a href="{{ url('report')}}" class="menu-link {{ activeMenu('report')}} {{ activeMenu('import')}}">
									<span class="menu-text">Report</span>
									<i class="menu-arrow"></i>
								</a>
								
							</li>
							
						</ul>
						<!--end::Header Nav-->
					</div>
					<!--end::Header Menu-->
				</div>
				<!--end::Header Menu Wrapper-->
			</div>
			<!--end::Left-->
			<!--begin::Topbar-->
			<div class="topbar">
				
				<!--begin::User-->
				<div class="dropdown">
					<!--begin::Toggle-->
					<div class="topbar-item">
						<div class="btn btn-icon btn-hover-transparent-white d-flex align-items-center btn-lg px-md-2 w-md-auto" id="kt_quick_user_toggle">
							<span class=" opacity-70 font-weight-bold font-size-base d-none d-md-inline mr-1" style="color: #3F4254;">Hi,</span>
							<span class=" opacity-90 font-weight-bolder font-size-base d-none d-md-inline mr-4" style="color: #3F4254;">{{ auth()->user()->name }} </span>
							<span class="symbol symbol-35">
								<span class="symbol-label  font-size-h5 font-weight-bold bg-white-o-30" style="color: #3F4254;     background: #dedede!important;">{{ substr(auth()->user()->name, 0, 1) }}</span>
							</span>
						</div>
					</div>
					<!--end::Toggle-->
				</div>
				<!--end::User-->
			</div>
			<!--end::Topbar-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::Header-->