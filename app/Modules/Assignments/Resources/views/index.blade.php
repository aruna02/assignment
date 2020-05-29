@extends('admin::layout')
@section('title')Assignment Management @stop
@section('breadcrum')Assignment Management @stop

@section('script')
<script src="{{asset('admin/global/js/plugins/tables/datatables/datatables.min.js')}}"></script>
<script src="{{asset('admin/global/js/plugins/forms/selects/select2.min.js')}}"></script>
@stop

@section('content') 

<div class="card">
    <div class="card-body d-sm-flex align-items-sm-center justify-content-sm-between flex-sm-wrap row">
        <div class="col-md-4">
            <a href="{{ route('assignments.create') }}" class="btn bg-teal-400">
                <i class="icon-arrow-right16"></i>
                Create Assignment
            </a>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">List of Assignments</h5>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr class="bg-teal-400">
                	<th>Session</th>
                    <th>Class</th>
                    <th>Section</th>
                    <th>Subject</th>
                    <th>title</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            	@if($assignments->total() > 0)
	                @foreach ($assignments as $assignment)
	                    <tr>
	                        <td>{{ $assignment->session }}</td>
	                        <td>{{ $assignment->class }}</td>
	                        <td>{{ $assignment->section }}</td>
	                        <td>{{ $assignment->subject }}</td>
	                        <td>{{ $assignment->title  }} </td>
	                        <td>
	                            <a class="btn bg-warning btn-icon rounded-round" href="{{ route('assignments.edit', $assignment->id) }}" data-popup="tooltip" data-placement="bottom" data-original-title="Edit assignment">
	                            <i class="icon-pencil"></i>
	                        </a>

                           <a data-toggle="modal" data-target="#modal_view_client" class="btn bg-warning btn-icon rounded-round view_client" 
                                data-popup="tooltip" data-original-title="View Detail" data-placement="bottom" 
                                client_id="{{ $assignment->id }}">
                                <i class="icon-eye8"></i>
                            </a>

	                        <a data-toggle="modal" data-target="#modal_theme_warning" class="btn bg-danger btn-icon rounded-round delete-reminder" link="{{route('assignment.destroy',$assignment->id)}}" data-popup="tooltip" data-placement="bottom" data-original-title="Delete assignment">
	                        <i class="icon-bin"></i>
	                    </a>
	                        </td>
	                    </tr>
	                @endforeach
	            @else
	            <tr>
	            	<td>No Data Available !!</td>
	            </tr>

	            @endif

            </tbody>
        </table>
        <span style="margin: 5px;float: right;">
            @if($assignments->total() != 0)
            {{ $assignments->links() }}
            @endif
        </span>
    </div>
</div>

<div id="modal_theme_warning" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h6 class="modal-title">Are you sure to Delete Assignment  ?</h6>
            </div>

            <div class="modal-body">
                <a class="btn btn-success get_link" href="">Yes</a> &nbsp; | &nbsp;
                <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div id="modal_view_client" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h6 class="modal-title">Assignment Detail</h6>
            </div>
            <div class="modal-body">
                <div class="table-responsive result_view_detail">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-teal-400" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('document').ready(function() {
        $('.delete-reminder').on('click', function() {
            var link = $(this).attr('link');
            $('.get_link').attr('href', link);
        });

        $('.view_client').click( function () {
            var client_id = $(this).attr('client_id');
            $.ajax({
                type: 'GET',
                url: '/admin/assignments/'+client_id,
                success: function(response) {
                    $('.result_view_detail').html(response);
                }
            });
        });
    });
</script>

@endsection