@extends('admin::layout')
@section('title')Assignment Management @stop
@section('breadcrum')Assignment Management @stop

@section('script')
<script src="{{asset('admin/global/js/plugins/tables/datatables/datatables.min.js')}}"></script>
<script src="{{asset('admin/global/js/plugins/forms/selects/select2.min.js')}}"></script>
@stop

@section('content') 
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Create Assignment</h5>
        <div class="header-elements">

        </div>
    </div>

    <div class="card-body">

        {!! Form::open(['route'=>'assignments.store','method'=>'POST','class'=>'form-horizontal','id'=>'assignment_submit','role'=>'form','files' => true]) !!}
        
            @include('assignments::partial.action',['btnType'=>'Save']) 
        
        {!! Form::close() !!}
    </div>
</div>
@endsection