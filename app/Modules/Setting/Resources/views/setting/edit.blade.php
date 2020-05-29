@extends('admin::layout')
@section('title')Setting @stop
@section('breadcrum')Update Setting @stop

@section('script')
<!-- Theme JS files -->
<script src="{{asset('admin/global/js/plugins/forms/styling/uniform.min.js')}}"></script>
<script src="{{asset('admin/global/js/demo_pages/form_inputs.js')}}"></script>
<!-- /theme JS files -->
<script src="{{ asset('admin/validation/setting.js')}}"></script>
<script src="{{asset('admin/global/js/plugins/pickers/color/spectrum.js')}}"></script>
<script src="{{asset('admin/global/js/plugins/forms/styling/switchery.min.js')}}"></script>
<script src="{{asset('admin/global/js/demo_pages/picker_color.js')}}"></script>
<script src="{{asset('admin/global/js/plugins/forms/styling/uniform.min.js')}}"></script>
<script src="{{asset('admin/global/js/plugins/forms/styling/switchery.min.js')}}"></script>
<script src="{{asset('admin/global/js/plugins/forms/styling/switch.min.js')}}"></script>
<script src="{{asset('admin/global/js/demo_pages/form_checkboxes_radios.js')}}"></script>
@stop @section('content')

<!-- Form inputs -->
<div class="card">
    <div class="card-header bg-teal-400 header-elements-inline">
        <h5 class="card-title">Edit Setting</h5>
        <div class="header-elements">

        </div>
    </div>

    <div class="card-body">

        {!! Form::model($setting,['method'=>'PUT','route'=>['setting.update',$setting->id],'id'=>'setting_submit','class'=>'form-horizontal','role'=>'form','files'=>true]) !!} @include('setting::setting.partial.action',['btnType'=>'Update']) {!! Form::close() !!}
    </div>
</div>
<!-- /form inputs -->

@stop