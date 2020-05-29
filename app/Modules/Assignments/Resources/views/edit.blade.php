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
        <h5 class="card-title">Edit Assignment</h5>
        <div class="header-elements">

        </div>
    </div>

    <div class="card-body">

        {!! Form::model($assignment, ['route'=>['assignments.update', $assignment->id],'method'=>'PATCH','class'=>'form-horizontal','id'=>'assignment_submit','role'=>'form','files' => true]) !!}
        
            @include('assignments::partial.action',['btnType'=>'Update']) 
        
        {!! Form::close() !!}
    </div>
</div>
@endsection