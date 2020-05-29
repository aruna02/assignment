<section class="quick-links">
	<div class="row">
		<div class="col-sm-4 col-md-4 col-lg-4 col-xl-3">
			<a href="{{ route('rosterClient.index') }}" class="d-block">
				<div class="card border-0 card-body bd-card-body bluish roster-card">
					<div class="text-center position-relative">
						<i class="icon-city roster-card__icon rounded-round"></i>
						<h5 class="text-uppercase text-white m-0 font-weight-semibold roster-card__title">
							Clients
						</h5>
					</div>
				</div>
			</a>
		</div>
		<div class="col-sm-4 col-md-4 col-lg-4 col-xl-3">
			<a href="{{ route('rosterSetting.index') }}" class="d-block">
				<div class="card border-0 card-body bd-card-body greenish roster-card">
					<div class="text-center position-relative">
						<i class="icon-cog roster-card__icon rounded-round"></i>
						<h5 class="text-uppercase text-white m-0 font-weight-semibold roster-card__title">
							roster settings
						</h5>
					</div>
				</div>
			</a>
		</div>
		<div class="col-sm-4 col-md-4 col-lg-4 col-xl-3">
			<a href="{{ route('staffLeave.index') }}" class="d-block">
				<div class="card border-0 card-body bd-card-body sunish roster-card">
					<div class="text-center position-relative">
						<i class="icon-calendar roster-card__icon rounded-round"></i>
						<h5 class="text-uppercase text-white m-0 font-weight-semibold roster-card__title">
							leave mgmt.
						</h5>
					</div>
				</div>
			</a>
		</div>
		<div class="col-sm-4 col-md-4 col-lg-4 col-xl-3">
			<a href="{{ route('roster.payroll.generate') }}" class="d-block">
				<div class="card border-0 card-body bd-card-body pinkish roster-card">
					<div class="text-center position-relative">
						<i class="icon-clipboard3 roster-card__icon rounded-round"></i>
						<h5 class="text-uppercase text-white m-0 font-weight-semibold roster-card__title">
							roster payroll
						</h5>
					</div>
				</div>
			</a>
		</div>
	</div>
</section>
