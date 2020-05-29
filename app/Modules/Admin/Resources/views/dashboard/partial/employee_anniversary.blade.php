@if($joinDate->count() > 0)
    @foreach($joinDate as $key=>$joinDate_value)
        <li class="media flex-column">
            <span class="text-blue-400 d-flex align-items-center pb-1">
                <svg fill="#29b6f6" class="mr-1" xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                viewBox="0 0 512 512"><path
                d="M437.019 74.981C388.667 26.629 324.38 0 256 0S123.333 26.63 74.981 74.981 0 187.62 0 256s26.629 132.667 74.981 181.019C123.332 485.371 187.62 512 256 512s132.667-26.629 181.019-74.981C485.371 388.667 512 324.38 512 256s-26.629-132.668-74.981-181.019zM256 470.636C137.65 470.636 41.364 374.35 41.364 256S137.65 41.364 256 41.364 470.636 137.65 470.636 256 374.35 470.636 256 470.636z"/><path
                d="M341.221 311.97l-64.538-64.537V114.809c0-11.422-9.259-20.682-20.682-20.682-11.422 0-20.682 9.26-20.682 20.682V256c0 5.486 2.179 10.746 6.058 14.625l70.594 70.595c4.038 4.039 9.332 6.058 14.625 6.058 5.293 0 10.586-2.019 14.626-6.058 8.075-8.078 8.075-21.173-.001-29.25z"/></svg>
                    {{ date('jS M, Y',strtotime($joinDate_value->date))}}
            </span>
            <h6 class="m-0 font-weight-semibold text-grey-400">{{$joinDate_value->employee->first_name." ".$joinDate_value->employee->middle_name." ".$joinDate_value->employee->last_name}}</h6>
            <p class="m-0 text-muted">{{$joinDate_value->title}}</p>
        </li>
    @endforeach
@else
    <li class="media">
        <div class="alert alert-success border-0 alert-dismissible w-100 text-center">
            No Employee Anniversary.
        </div>
    </li>
@endif