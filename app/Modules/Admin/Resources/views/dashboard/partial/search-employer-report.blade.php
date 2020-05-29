<div class="form-group row">
    <div class="col-lg-12">
        
        <select class="form-control search_employee" name="employer_id" placeholder="Select Employee">
            <option value="">-- Select Employee --</option>
                @foreach($employment as $key => $value)
                    <option value="{{$value->id}}">{{$value->first_name.' '.$value->last_name}}</option>
                @endforeach    
        </select>
        
    </div> 
    {{--<div class="col-lg-3">--}}
        {{--<button type="submit" class="btn bg-teal-400"><i class="icon-search4"></i></button>--}}
    {{--</div>--}}
</div>

<script type="text/javascript">
    $(document).ready(function () {

        $(document).on('click', '.search_employee', function () {

            var url = '{{route('dashboard.search')}}';
            var select_value= $('.search_employee').val();

                $.ajax({
                    type: 'GET',
                    url: url,
                    data:{employer_id:select_value},
                    success: function (resp) {

                        $('.table_data').children().remove();
                        $('.pagination_block').remove();

                        $('.table_data').append(resp);
                    },
                    error: function (resp) {
                        console.log(resp);
                    }
                });

        });
    });


</script>

     



