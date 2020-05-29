<div class="col-md-4">
    <div class="card r-card pb-card--listing">
        <div class="card-header header-elements-inline border-bottom-0">
            <h5 class="card-title text-uppercase font-weight-semibold">Today's Staff</h5>
        </div>
        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-solid nav-justified border-0">
                <li class="nav-item text-uppercase font-weight-semibold">
                    <a href="#regular-staff" class="nav-link rounded-left active d-block" data-toggle="tab">
                        Regular
                    </a>
                </li>
                <li class="nav-item text-uppercase font-weight-semibold">
                    <a href="#replacement-staff" class="nav-link rounded-right d-block" data-toggle="tab">
                        Replacement
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="regular-staff">
                    <div>
                        @foreach ($regular_staffs as $staff)
                        <div class="card bd-card pb-card--approved card-body">
                            <div class="d-flex justify-content-between align-items-top">
                                <div>
                                    <div class="d-flex align-items-center mb-2">
                                        <div>
                                            <span class="text-default font-size-lg font-weight-semibold">
                                                {{ $staff->full_name }}
                                            </span>
                                            <div class="text-muted font-size-sm">{{ $staff->client->company }}</div>
                                        </div>
                                    </div>
                                </div>
                                @if ($staff->staff_shift)
                                <div class="pb-card-status">
                                    <div class="d-flex align-items-center">
                                        <span></span>
                                        <div class="font-weight-semibold" style="color: #00B894;">
                                            {{ $staff->staff_shift }}    
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="ccrm-badge mb-0">
                                        <div class="ccrm-badge--title text-danger font-weight-semibold">
                                            {{ $staff->working_hrs }} Hours / Day
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="ccrm-badge mb-0">
                                        <div class="ccrm-badge--title text-success font-weight-semibold">
                                            {{ $staff->working_days }} Days in Week
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade" id="replacement-staff">
                    <div>
                        @forelse ($replacement_staffs as $staff)
                        <div class="card bd-card pb-card--approved card-body">
                            <div class="d-flex justify-content-between align-items-top">
                                <div>
                                    <div class="d-flex align-items-center mb-2">
                                        <div>
                                            <a href="#" class="text-default font-size-lg font-weight-semibold">
                                                {{ $staff->full_name }}
                                            </a>
                                            <div class="text-muted font-size-sm">{{ $staff->client->company }}</div>
                                        </div>
                                    </div>
                                </div>
                                @if ($staff->staff_shift)
                                <div class="pb-card-status">
                                    <div class="d-flex align-items-center">
                                        <span></span>
                                        <div class="font-weight-semibold" style="color: #00B894;">
                                            {{ $staff->staff_shift }}    
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                              <div class="row">
                                <div class="col-6">
                                    <div class="ccrm-badge mb-0">
                                        <div class="ccrm-badge--title text-danger font-weight-semibold">
                                            {{ $staff->working_hrs }} Hours / Day
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="ccrm-badge mb-0">
                                        <div class="ccrm-badge--title text-success font-weight-semibold">
                                            {{ $staff->working_days }} Days in Week
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="card bd-card card-body">
                            NO STAFFS!!!
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>