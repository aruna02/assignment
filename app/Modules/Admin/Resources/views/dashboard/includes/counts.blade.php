<section>
	<div class="card bd-card p-4">
		<div class="row">
			<div class="col-lg-3">
				<div class="d-flex align-items-center justify-content-between border-right-1 border-grey-light pr-4">
					<div class="count">
						<h5 class="font-weight-semibold text-uppercase mb-0">Total Clients</h5>
						<h3>{{ $total_clients }}</h3>
						<a href="{{ route('rosterClient.index') }}">View All</a>
					</div>
					<span class="count-layout-one--icon text-center alpha-primary text-primary m-0">
						<i class="icon-city rounded-round pb-1"></i>
					</span>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="d-flex align-items-center justify-content-between border-right-1 border-grey-light pl-2 pr-4">
					<div class="count">
						<h5 class="font-weight-semibold text-uppercase mb-0">Total Staffs</h5>
						<h3>{{ $total_staffs }}</h3>
						<a href="{{ route('staff.index') }}">View All</a>
					</div>
					<span class="count-layout-one--icon text-center alpha-info text-info m-0">
						<i class="icon-users4 rounded-round pb-1"></i>
					</span>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="d-flex align-items-center justify-content-between border-right-1 border-grey-light pl-2 pr-4">
					<div class="count">
						<h5 class="font-weight-semibold text-uppercase mb-0">New Staffs</h5>
						<h3>{{ $new_staffs }}</h3>
						{!! Form::open(['route'=>'staff.index','method'=>'GET','id'=>'staff_submit','class'=>'form-horizontal','role'=>'form','files' => true]) !!}
						<input type="hidden" name="newstaff" value="1">
						 <input type="submit"  value="View All">
						 {!! Form::close() !!}
					</div>
					<span class="count-layout-one--icon text-center alpha-orange text-orange m-0">
						<i class="icon-user rounded-round pb-1"></i>
					</span>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="d-flex align-items-center justify-content-between pl-2 ">
					<div class="count">
						<h5 class="font-weight-semibold text-uppercase mb-0">Leave Type</h5>
						<h3>{{ $leave_types }}</h3>
						<a href="{{ route('staffLeave.index') }}">View All</a>
					</div>
					<span class="count-layout-one--icon text-center alpha-purple text-purple m-0">
						<i class="icon-notebook rounded-round pb-1"></i>
					</span>
				</div>
			</div>
		</div>
	</div>
</section>