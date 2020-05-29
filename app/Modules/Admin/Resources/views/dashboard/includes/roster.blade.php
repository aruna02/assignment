@inject('dateConverter', 'App\Modules\Roster\Entities\DateConverter')
<div class="col-md-12">
	<div class="card r-card pb-card--pending">
		<div class="card-body">
			<ul class="nav nav-pills nav-pills-bordered nav-justified roster-pills">
				<li class="nav-item">
					<a href="#daily-roster-list" class="nav-link active" data-toggle="tab">
						<i class="icon-calendar22"></i> <br> 
						Daily Roster
					</a>
				</li>
				<li class="nav-item">
					<a href="#monthly-roster-list" class="nav-link" data-toggle="tab">
						<i class="icon-calendar3"></i> <br> 
						Monthly Roster
					</a>
				</li>
			</ul>

			<div class="tab-content">
				<div class="tab-pane fade show active" id="daily-roster-list">

					<div class="table-responsive">

						<div class="d-flex justify-content-between">
							<a href="{{ route('roster.create') }}" class="btn bg-slate-600 btn-labeled mb-2">
								<i class="icon-plus22"></i>
								Add Roster
							</a>
							<form class="pl-2">
								<input list="datalist-clients" class="form-control" placeholder="Search By Client..." name="search_client">

								<datalist id="datalist-clients">
									@foreach ($clients as $key => $client)
									<option value="{{ $client }}" client-id={{ $key }}></option>
									@endforeach
								</datalist>
										{{-- <input type="text" class="form-control border-right-0" placeholder="Search By Name..." name="search" value="">
										<span class="input-group-append">
											<button class="btn bg-slate-600" type="submit"><i class="icon-search4"></i></button>
										</span> --}}
									</form>
								</div>

								<table class="table table-borderless table-striped">
									<thead>
										<tr>
											<th>ID</th>
											<th>Company Name</th>
											<th>Roster Year</th>
											<th>Roster Month</th>
											<th>Roster Day</th>
											<th>Created Date</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										@foreach ($daily_rosters as $roster)

										@php 
										$nepali_month = ['Baisakh','Jestha','Ashad','Shrawan','Bhadra','Ashoj','Kartik','Mangsir','Poush','Magh','Falgun','Chaitra'];

            							$english_month = ['January','February','March','April','May','June','July','August','September','October','November','December'];

            							if($roster->timesheet->roster_calendar_type == 1)
            							{
            								$month=$nepali_month;
            							}
            							else
            							{
            								$month=$english_month;
            							}
            							$year = $roster->timesheet->year_month;
            							$years = explode('-',$year);

										@endphp
										<tr class="client-{{ optional(optional($roster->timesheet)->client)->id }} client-hide">
											<td><strong>{{ $loop->index + 1 }}</strong></td>
											<td>
												<div class="d-flex align-items-center">
											{{-- <div class="mr-3">
												<a href="#">
													<img src="http://demo.interface.club/limitless/demo/Template/global_assets/images/brands/amazon.png" class="rounded-circle" width="32" height="32" alt="">
												</a>
											</div> --}}
											<div>
												<a href="#" class="text-default font-weight-semibold">
													{{ optional(optional($roster->timesheet)->client)->company }}

												</a>
												<div class="text-muted font-size-sm">
													{{ optional(optional($roster->timesheet)->client)->address }}
												</div>
											</div>
										</div>
									</td>
									<td>
										<!-- {{ optional(optional($roster->timesheet)->yearmonthvalue($roster))->day['year'] }} -->
										{{$years[0]}}
									</td>
									<td>
										<!-- {{  optional(optional($roster->timesheet)->yearmonthvalue($roster))->day['month'] }} -->
										{{ $month[$years[1]]}}
									</td>
									<td>{{ $roster->day }}</td>
									<td>{{ Carbon::parse($roster->create_at)->toDateString() }}</td>
									<td class="text-right">
										<div class="list-icons">
											<div class="dropdown">
												<a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-more2"></i></a>
												<div class="dropdown-menu bd-card dropdown-menu-right" x-placement="bottom-end">
													@if($roster->is_locked == 0 || $roster->is_locked == 2)
													<a class="dropdown-item" href="{{route('dailyRoster.editDailyRoster',['timesheet_id'=>$roster->timesheet_id,'day'=>$roster->day])}}">
														<i class="icon-pencil6"></i> Edit
													</a>
													@endif
													<a class="dropdown-item" href="{{route('dailyRoster.viewDailyRoster',['timesheet_id'=>$roster->timesheet_id,'day'=>$roster->day])}}">
														<i class="icon-eye"></i> View
													</a>
												</div>
											</div>
										</div>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>

				</div>

				<div class="tab-pane fade" id="monthly-roster-list">
					<div class="table-responsive">

						<a href="{{ route('roster.create') }}" class="btn bg-slate-600 btn-labeled mb-2">
							<i class="icon-plus22"></i>
							Add Roster
						</a>

						<table class="table table-borderless table-striped">
							<thead>
								<tr>
									<th>ID</th>
									<th>Company Name</th>
									<th>Roster Month</th>
									<th>Created Date</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach ($monthly_rosters as $roster)
								<tr>
									<td><strong>{{ $loop->index + 1 }}</strong></td>
									<td>
										<div class="d-flex align-items-center">
												{{-- <div class="mr-3">
													<a href="#">
														<img src="http://demo.interface.club/limitless/demo/Template/global_assets/images/brands/amazon.png" class="rounded-circle" width="32" height="32" alt="">
													</a>
												</div> --}}
												<div>
													<a href="#" class="text-default font-weight-semibold">
														{{ $roster->client->company }}
													</a>
													<div class="text-muted font-size-sm">
														{{ $roster->client->address }}
													</div>
												</div>
											</div>
										</td>
										<td>
											{{ $roster->yearmonthvalue($roster->day)['year'] }} {{ $roster->yearmonthvalue($roster->day)['month'] }}
										</td>
										<td>{{ Carbon::parse($roster->create_at)->toDateString() }}</td>
										<td class="text-right">
											<div class="list-icons">
												<div class="dropdown">
													<a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-more2"></i></a>
													<div class="dropdown-menu bd-card dropdown-menu-right" x-placement="bottom-end">
														@if ($roster->staffExists())
														<a href="{{ route('roster.show', [$roster->id, 'action' => 'print-preview']) }}"
															class="dropdown-item" target="_blank">
															<i class="icon-printer"></i> Print Preview
														</a>
														<a href="{{ route('roster.edit', ['timesheet_id'=>$roster->id]) }}"
															class="dropdown-item">
															<i class="icon-pen"></i> Edit
														</a>
														@endif
														<a href="{{ route('dailyRoster.roster.view', $roster->id) }}"
															class="dropdown-item">
															<i class="icon-file-eye"></i> View
														</a>
													</div>
												</div>
											</div>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$(document).ready(function () {
			$('input[name=search_client]').on('keyup keypress', function(e) {
				var keyCode = e.keyCode || e.which;
				if (keyCode === 13) { 
					e.preventDefault();
					return false;
				}
			});
			
			$('input[name=search_client]').change(function () {
				var selectedValue = $(this).val();
				var curValue = $('#datalist-clients').find('option[value="' +selectedValue + '"]').attr('client-id');
				if (typeof curValue === "undefined") {
					$('.client-hide').removeClass('d-none');
				} else {
					$('.client-hide').addClass('d-none');
					$('.client-'+curValue).removeClass('d-none');
				}
			});
		});
	</script>