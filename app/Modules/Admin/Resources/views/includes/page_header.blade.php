<div class="row">
	<div class="col-xl-12">
		<div class="mb-3">
			<div class="page-header page-header-dark" @if($setting != null) style="background-color: {{$setting->page_header_color}};" @endif>
				<div class="page-header-content header-elements-inline px-3">
					<div class="page-title">
						
					</div>

				</div>

				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline px-3">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="{{route('dashboard1')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Dashboard</a>
							<span class="breadcrumb-item active">@yield('breadcrum')</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>