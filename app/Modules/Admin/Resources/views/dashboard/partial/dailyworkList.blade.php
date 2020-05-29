
    <table class="table table-dark table-bordered table-striped table-hover bg-grey-600">
        <thead>
        <tr class="bg-teal">
            <th>#</th>
            <th>Date</th>
            <th>Employer Name</th>
            <th>Total Work Hr (PMT)</th>
            <th>Daily Hr Spend</th>
        </tr>
        </thead>
        <tbody class="table_data">
        @if($daily_work->total() != 0)
            @foreach($daily_work as $key => $value)

                @php
                    $department = $value->UserInfo->department;
                    if($department == '1'){

                    $date = $value->date;
                    $user_id = $value->created_by;

                    $task_activities = App\Modules\OpulenceCamp\Entities\TaskTrack::getTaskActivityByDate($user_id,$date);
                    $task_track_time = array();

                    if(count($task_activities) > 0){
                    foreach($task_activities as $key => $val){
                    array_push($task_track_time, $val['hr_spend_formate']);
                    }

                    $seconds = 0;
                    foreach ($task_track_time as $time)
                    {
                    list($hour,$minute,$second) = explode(':', $time);
                    $seconds += $hour*3600;
                    $seconds += $minute*60;
                    $seconds += $second;
                    }

                    $hours = floor($seconds/3600);
                    $seconds -= $hours*3600;
                    $minutes = floor($seconds/60);
                    $seconds -= $minutes*60;

                    $finalTime = App\Modules\OpulenceCamp\Entities\TaskTrack::getFinalTime($hours,$seconds,$minutes);

                    }else{
                    $finalTime = "00:00:00";
                    }

                @endphp

                <tr>
                    <td>{{++$key}}</td>
                    <td>{{date('jS M, Y',strtotime($value->date))}}</td>
                    <td>{{$value->UserInfo->first_name.' '.$value->UserInfo->last_name }}</td>
                    <td>{{$finalTime}}</td>
                    <td>{{$value->total_work_hour}} hr</td>
                </tr>
                @php } @endphp


            @endforeach

        @else
            <tr>
                <td colspan="5">No Information Found !!!</td>
            </tr>
        @endif
        </tbody>
    </table>
    <span class="pagination_block" style="margin: 5px;float: right;">
            @if($daily_work->total() != 0)
            {{--{{ $daily_work->links() }}--}}
            {!! $daily_work->render() !!}
        @endif
        </span>
