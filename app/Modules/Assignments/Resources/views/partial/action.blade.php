<script src="{{ asset('admin/global/js/plugins/pickers/daterangepicker.js')}}"></script>
<script src="{{ asset('admin/global/js/demo_pages/picker_date.js')}}"></script>
<script type="text/javascript" src="{{ asset('admin/validation/assignment.js') }}"></script>
<fieldset class="mb-3">
    <legend class="text-uppercase font-size-sm font-weight-bold"></legend>
    <div class="form-group row">
        <label class="col-form-label col-lg-2">Class:<span class="text-danger">*</span></label>
        <div class="col-lg-10 form-group-feedback form-group-feedback-right">
            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-pencil5"></i></span>
                </span>
                <!-- {!! Form::text('title', null, ['placeholder'=>'Enter Reminder Title','class'=>'form-control']) !!} -->
                 {!! Form::select('class',[ '1'=>'1','2'=>'2','3'=>'3','4'=>'4'], $value = null, ['id'=>'class','class'=>'form-control','placeholder'=>'--Select Class --',]) !!}
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-form-label col-lg-2">Section:<span class="text-danger">*</span></label>
        <div class="col-lg-10 form-group-feedback form-group-feedback-right">
            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-pencil5"></i></span>
                </span>
                {!! Form::select('section',[ 'A'=>'A','B'=>'B'], null, ['placeholder'=>'--Select Section --','class'=>'form-control']) !!}
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-form-label col-lg-2">Session:<span class="text-danger">*</span></label>
        <div class="col-lg-10 form-group-feedback form-group-feedback-right">
            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-pencil5"></i></span>
                </span>
                {!! Form::text('session', null, ['placeholder'=>'Enter Session','class'=>'form-control','numeric']) !!}
            </div>
        </div>
    </div>

     <div class="form-group row">
        <label class="col-form-label col-lg-2">Subject:<span class="text-danger">*</span></label>
        <div class="col-lg-10 form-group-feedback form-group-feedback-right">
            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-pencil5"></i></span>
                </span>
                {!! Form::text('subject', null, ['placeholder'=>'Enter Subject','class'=>'form-control']) !!}
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-form-label col-lg-2">Title:<span class="text-danger">*</span></label>
        <div class="col-lg-10 form-group-feedback form-group-feedback-right">
            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-pencil5"></i></span>
                </span>
                {!! Form::text('title', null, ['placeholder'=>'Enter title','class'=>'form-control']) !!}
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-form-label col-lg-2">Description:</label>
        <div class="col-lg-10 form-group-feedback form-group-feedback-right">
            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-pencil5"></i></span>
                </span>
                {!! Form::textarea('description', null, ['class'=>'form-control', 'rows' => 5]) !!}
            </div>
        </div>
    </div>


   <!--   <div class="form-group row">
        <label class="col-form-label col-lg-2">Description:</label>
        <div class="col-lg-10 form-group-feedback form-group-feedback-right">
            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-pencil5"></i></span>
                </span>
                {!! Form::textarea('description', null, ['class'=>'form-control', 'rows' => 5]) !!}
            </div>
        </div>
    </div> -->
 
    <div class="form-group row">
        <label class="col-form-label col-lg-2">Submission Date:<span class="text-danger">*</span></label>
        <div class="col-lg-10 form-group-feedback form-group-feedback-right">
            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-pencil5"></i></span>
                </span>
               {!! Form::text('submission_date', null, ['class'=>'form-control daterange-single', 'placeholder' => 'Enter Submission Date']) !!}
            </div>
        </div>
    </div>

     <div class="form-group row">
        <label class="col-form-label col-lg-2">File:</label>
        <div class="col-lg-10 form-group-feedback form-group-feedback-right">
            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-pencil5"></i></span>
                </span>
              {!! Form::file('docs', ['id'=>'docs','class'=>'form-control']) !!}
            </div>
        </div>
    </div>
   
</fieldset>
<div class="text-right">
    <button type="submit" class="btn bg-teal-400">{{ $btnType }} <i class="icon-database-insert"></i></button>
</div>
