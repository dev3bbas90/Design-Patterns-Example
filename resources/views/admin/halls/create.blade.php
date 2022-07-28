@extends('layouts/dashboard')
@section('content')
    <style>

        .front-indicator {
            width: 100%;
            margin: 5px;
            background-color: #adadad;
            color: black;
            text-align: center;
            padding: 3px;
            border-radius: 5px;
            display: grid;
        }

        .wrapper {
            width: 100%;
            text-align: center;
            /* margin-top:150px; */
        }

        .container {
            margin: 0 auto;
            width: 100%;
            text-align: left;
        }

        .booking-details {
            float: left;
            text-align: left;
            margin-left: 35px;
            font-size: 12px;
            position: relative;
            height: 120px;
        }

        .booking-details h2 {
            margin: 25px 0 20px 0;
            font-size: 17px;
        }

        .booking-details h3 {
            margin: 5px 5px 0 0;
            font-size: 14px;
        }

        div.seatCharts-cell {
            color: #182C4E;
            height: 30px;
            width: 45px;
            line-height: 25px;

        }

        div.seatCharts-seat {
            color: #FFFFFF;
            cursor: pointer;
            margin-right: 5px;
            padding: 5px;
        }

        div.seatCharts-row {
            height: 35px;
            display: flex
        }

        div.seatCharts-seat.available {
            background-color: #B9DEA0;

        }

        div.seatCharts-seat.available.vip {
            /* 	background: url(vip.png); */
            background-color: #daa616;
        }

        div.seatCharts-seat.available.first-class {
            /* 	background: url(vip.png); */
            background-color: #3a78c3;
        }

        div.seatCharts-seat.focused {
            background-color: #76B474;
        }

        div.seatCharts-seat.selected {
            background-color: #E6CAC4 !important;
        }

        div.seatCharts-seat.unavailable {
            background-color: #472B34 !important;
        }

        div.seatCharts-container {
            border-right: 1px dotted #adadad;
            /* width: 100%; */
            padding: 20px;
            float: left;
            width: 100%;
            overflow: scroll;
            display: grid;
        }


        div.seatCharts-legend {
            padding-left: 0px;
            position: absolute;
            bottom: 16px;
        }

        ul.seatCharts-legendList {
            padding-left: 0px;
            display: inline-flex
        }

        span.seatCharts-legendDescription {
            margin-left: 5px;
            line-height: 30px;
        }

        .checkout-button {
            display: block;
            margin: 10px 0;
            font-size: 14px;
        }

        #selected-seats {
            max-height: 90px;
            overflow-y: scroll;
            overflow-x: none;
            width: 170px;
        }
        .seatCharts-legendItem{
            margin-right: 45px;
            width: 70px;
        }
        .seatCharts-header .seatCharts-cell{
            text-align: center;
            margin-right: 5px;
        }
        .seatCharts-space{

            margin-right: 5px;
        }
 @foreach ($categories as $category)div.seatCharts-seat.{!!str_replace(' ','',$category->name)!!}  { background-color: {{$category->color}} ;} @endforeach

    </style>

    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container-fluid">
            <div class="row">
            <div class="col-md-12">
                    <!--begin::Card-->
                    <div class=" card card-custom gutter-b example example-compact">
                        <div class="card-header">
                            <h3 class="card-title">Add New Hall</h3>
                        </div>
                        <!--begin::Form-->
                        <form method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6 form-group ">
                                        <label>{{__('Code')}} </label>
                                        <input type="text" id="code" class="form-control" required placeholder="{{__('Hall Code')}}" value="{{old('code')}}" name="code"  />
                                        @error('code')
                                            <span class="form-text" style="color:red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 form-group ">
                                        <label>{{__('Theater')}} </label>
                                        <select class="form-control select2" name="theater_id" id="theater_id" required>
                                            @foreach ($theaters as $theater)
                                                <option value="{{$theater->id}}">{{$theater->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('theater_id')
                                            <span class="form-text" style="color:red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 form-group ">
                                        <label>{{__('Rows Number')}} </label>
                                        <input type="number" class="form-control" id="rows_no" required placeholder="{{__('Rows Number')}}" value="5" name="rows_no" id="rows_no" />
                                        @error('rows_no')
                                            <span class="form-text" style="color:red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 form-group ">
                                        <label>{{__('Number Of Columns Per Row')}} </label>
                                        <input type="number" id="cols_no" class="form-control" required placeholder="{{__('Number Of Columns Per Row')}}" value="5" name="cols_no" id="cols_no"  />
                                        @error('cols_no')
                                            <span class="form-text" style="color:red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <hr>
                                <div class="col-lg-12">
                                    <div id="kt_repeater_1">
                                        <h2>Set Blank</h2>
                                        <div class="form-group row">
                                            <div data-repeater-list="blanks" class="col-lg-10">
                                                <div data-repeater-item="blank_item"  class="form-group row align-items-center">
                                                    <div class="col-md-3">
                                                        <label>Selection Type</label>
                                                        <select class="form-control selection_type selection_type_blank " onchange="return selection_type_change(this,'blanks')" name="selection_type">
                                                            <option value=""></option>
                                                            <option value="row">By Row</option>
                                                            <option value="col">By Column</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label>Selection Value</label>
                                                        <select class="form-control selection_value" name="selection_value">
                                                            <option value=""></option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label>Selection Attribute</label>
                                                        <select class="form-control selection_attr" onchange="return selection_attr_change(this,'blanks')"  name="selection_attr">
                                                            <option value=""></option>
                                                            <option value="all">All</option>
                                                            <option value="from_to">From/To</option>
                                                            <option value="single">Single Seat</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2 selector">

                                                    </div>
                                                    {{-- <div class="col-md-2 ">
                                                        <a class="btn btn-sm font-weight-bolder btn-light-success" onclick="return update_view(this,'blanks')">Update View</a>
                                                    </div> --}}
                                                    <div class="col-md-3">
                                                        <a href="javascript:;"  data-repeater-delete="" class="btn btn-sm font-weight-bolder btn-light-danger">
                                                        <i class="la la-trash-o"></i>Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label text-right"></label>
                                             <div class="col-lg-4">
                                                <a href="javascript:;" data-repeater-create="blank" class="btn btn-sm font-weight-bolder btn-light-primary">
                                                <i class="la la-plus"></i>Add</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="col-lg-12">
                                    <div id="kt_repeater_2">
                                        <h2>Set Category</h2>
                                        <div class="form-group row">
                                            <div data-repeater-list="categories" class="col-lg-10">
                                                <div data-repeater-item="category_item"  class="form-group row align-items-center">
                                                    <div class="col-md-2">
                                                        <label>Category</label>
                                                        <select class="form-control category_id" name="category_id">
                                                           @foreach ($categories as $category)
                                                               <option value="{{$category->code}}">{{$category->name}}</option>
                                                           @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label>Selection Type</label>
                                                        <select class="form-control selection_type selection_type_category" onchange="return selection_type_change(this,'categories')" name="selection_type">
                                                            <option value=""></option>
                                                            <option value="row">By Row</option>
                                                            <option value="col">By Column</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label>Selection Value</label>
                                                        <select class="form-control selection_value" name="selection_value">
                                                            <option value=""></option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label>Selection Attribute</label>
                                                        <select class="form-control selection_attr" onchange="return selection_attr_change(this,'categories')"  name="selection_attr">
                                                            <option value=""></option>
                                                            <option value="all">All</option>
                                                            <option value="from_to">From/To</option>
                                                            <option value="single">Single Seat</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2 selector">

                                                    </div>
                                                    {{-- <div class="col-md-2 ">
                                                        <a class="btn btn-sm font-weight-bolder btn-light-success" onclick="return update_view(this,'categories')">Update View</a>
                                                    </div> --}}
                                                    <div class="col-md-3">
                                                        <a href="javascript:;" onclick="return delete_row()" data-repeater-delete="" class="btn btn-sm font-weight-bolder btn-light-danger">
                                                        <i class="la la-trash-o"></i>Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label text-right"></label>
                                            <div class="col-lg-4">
                                                <a href="javascript:;" data-repeater-create="category" class="btn btn-sm font-weight-bolder btn-light-primary">
                                                <i class="la la-plus"></i>Add</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-lg-4"></div>
                                    <div class="col-lg-8">
                                        <a onclick="return submit_data()"  class="btn btn-primary mr-2">{{__('Submit')}}</a>

                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
                    <div class="card card-custom gutter-b example example-compact">
                        <div class="card-header">
                            <h3 class="card-title">Sample Preview  <a  id="refresh"  class="btn btn-primary mr-2">{{__('refresh')}}</a></h3>

                        </div>
                        <div class="card-body">
                             <div class="">
                                    <div class="container-fluid">
                                        <div class="booking-details ">

                                            <div id="legend" class=""></div>
                                        </div>

                                        <div id="seat-map">
                                            <div class="front-indicator">Screen</div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">

                                {{-- <div class="col-lg-8">
                                    <a  id="refresh"  class="btn btn-primary mr-2">{{__('refresh')}}</a>
                                </div> --}}
                            </div>
                        </div>
                    </div>

                    <!--end::Card-->
            </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
@endsection
@section('scripts')
    <script>
        var GlobalLabels=[
                'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z',
                'AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ',
                'BA','BB','BC','BD','BE','BF','BG','BH','BI','BJ','BK','BL','BM','BN','BO','BP','BQ','BR','BS','BT','BU','BV','BW','BX','BY','BZ',
                'CA','CB','CC','CD','CE','CF','CG','CH','CI','CJ','CK','CL','CM','CN','CO','CP','CQ','CR','CS','CT','CU','CV','CW','CX','CY','CZ',
                'DA','DB','DC','DD','DE','DF','DG','DH','DI','DJ','DK','DL','DM','DN','DO','DP','DQ','DR','DS','DT','DU','DV','DW','DX','DY','DZ',
                'EA','EB','EC','ED','EE','EF','EG','EH','EI','EJ','EK','EL','EM','EN','EO','EP','EQ','ER','ES','ET','EU','EV','EW','EX','EY','EZ',
                'GA','GB','GC','GD','GE','GF','GG','GH','GI','GJ','GK','GL','GM','GN','GO','GP','GQ','GR','GS','GT','GU','GV','GW','GX','GY','GZ',
            ];
        var GlobalMap=[];
        var category_set=[];
        var category_object=[];
        var seat_map=[];
        var items =[];
        var GlobalRows;
        var GlobalCols;
        var rows_no = $('#rows_no').val();
        var cols_no = $('#cols_no').val();
        var categories =JSON.parse({!!json_encode($categories->toJson())!!});
        var category_object=[];
        $('#rows_no').change(function(){
            rows_no = $('#rows_no').val();
            generateMap();
        });
        $('#cols_no').change(function(){
            cols_no = $('#cols_no').val();
            generateMap();
        });
        function initCategories()
        {
            //set categories
            category_object=[];
            items =[];
            for (var i =0; i <categories.length;i++) {

                var code =categories[i]['code'];
                var body = {
                    price:100,
                    classes:categories[i]['name'].replace(/\s/g, ''),
                    category: categories[i]['name']
                };
                category_object[code]= body;
                items.push([categories[i]['code'],'available',categories[i]['name']]);
            }
        }
        function generateMap()
        {
            GlobalMap=[];
            category_set=[];
            for (let i=1 ;i<= rows_no; i++)
            {
                GlobalMap[i]=[];
                category_set[i]=[];
                for (let x=1 ;x<= cols_no; x++) {
                    GlobalMap[i].push(x);
                    category_set[i].push(categories[0]['code']);
                }
            }
            getSeatMap();
        }
        function getSeatMap()
        {
            seat_map=[];
            for(i in category_set)
            {
                let row='';
                for(x in category_set[i])
                {
                    row =row.concat(category_set[i][x]);
                }
                seat_map.push(row);
            }
        }
        $( document ).ready(function(){
            initCategories();
            generateMap();
        });
        $('#refresh').click(function () {
            generateMap();
            $('.selection_type_blank').each(function(index, element) {
                update_view(element,'blanks');
            });
            $('.selection_type_category').each(function(index, element) {
                update_view(element,'categories');
            });
                var firstSeatLabel = 1;
                $('#legend').html('');
                $('.seatCharts-row').remove();

                sc = $('#seat-map').seatCharts({
                    map: seat_map,
                    seats: category_object,
                    naming: {
                        top: true,
                        left: true,
                        getLabel: function (character, row, column) {
                            var newValue = row + firstSeatLabel++;
                            if (column == cols_no) {
                                firstSeatLabel = 1;
                            }
                            return newValue;
                        },
                        getId: function (character, row, column) {
                            return row + '_' + column;
                        },

                    },
                    legend: {
                        node: $('#legend'),
                        items:items
                    },

                });
        });
        function selection_type_change(element,type)
        {
                element   = $(element);
                let name  = element.attr('name');
                let index = name.replace ( /[^\d.]/g, '' );
                $.ajax({type: "GET",url:"{{route('get_columns')}}",data:{rows:rows_no},success:function(data){
                    rows= JSON.parse(data);
                    generate_options(element.val(),rows,index,type);
                }});
        }
        function generate_options(value,rows,index,type)
        {
            let cols = $('#cols_no').val();
            GlobalRows ="<option value=''>select row</option>";
            for (let row in rows) {
                GlobalRows+="<option value='"+rows[row]+"'>"+rows[row]+"</option>";
            }
            GlobalCols ="<option value=''>select column</option>";
                for (let i=1 ;i<= cols; i++) {
                    GlobalCols+="<option value='"+i+"'>"+i+"</option>"
                }
            $('select[name="'+type+'['+index+'][selection_value]"]' ).html("");
            if(value =='row')
            {
                $('select[name="'+type+'['+index+'][selection_value]"]' ).html(GlobalRows);
            }
            else if(value =='col')
            {
                $('select[name="'+type+'['+index+'][selection_value]"]' ).html(GlobalCols);
            }
        }
        function selection_attr_change(element,type)
        {
            element =$(element);
            let name =element.attr('name');
            let index =name.replace ( /[^\d.]/g, '' );
            let from   ='<select class="form-control from" name="'+type+'['+index+'][from]"></select>';
            let to     ='<select class="form-control to" name="'+type+'['+index+'][to]"></select>';
            let single ='<select class="form-control single" name="'+type+'['+index+'][single]"></select>';

            if(element.val() == 'single')
            {
                element.parent().next().html("");
                element.parent().next().html(single);
                get_attribute_column(index,'single',type);

            }
            else if(element.val() == 'from_to')
            {
                element.parent().next().html("");
                element.parent().next().html(from+to);
                get_attribute_column(index,'from_to',type);

            }
            else
            {
                element.parent().next().html("");
            }
        }
        function get_attribute_column(index,attribute,type)
        {
            let selection_type =$('select[name="'+type+'['+index+'][selection_type]"]' ).val();
            if(attribute == 'from_to')
            {
                if(selection_type =='row')
                {
                    $('select[name="'+type+'['+index+'][from]"]' ).html(GlobalCols);
                    $('select[name="'+type+'['+index+'][to]"]' ).html(GlobalCols);
                }
                else if(selection_type == 'col')
                {
                    $('select[name="'+type+'['+index+'][from]"]' ).html(GlobalRows);
                    $('select[name="'+type+'['+index+'][to]"]' ).html(GlobalRows);
                }
            }
            else if( attribute == 'single')
            {
                if(selection_type =='row')
                {
                    $('select[name="'+type+'['+index+'][single]"]' ).html(GlobalCols);
                }
                else if(selection_type == 'col')
                {
                    $('select[name="'+type+'['+index+'][single]"]' ).html(GlobalRows);
                }
            }
        }
        function update_view(element,type)
        {
            name = $(element).attr('name');
            index   = name.replace ( /[^\d.]/g, '' );
            selection_type  = $('select[name="'+type+'['+index+'][selection_type]"]' ).val();
            selection_value = $('select[name="'+type+'['+index+'][selection_value]"]' ).val();
            selection_attr  = $('select[name="'+type+'['+index+'][selection_attr]"]' ).val();
            from   = $('select[name="'+type+'['+index+'][from]"]' ).val();
            to     = $('select[name="'+type+'['+index+'][to]"]' ).val();
            single = $('select[name="'+type+'['+index+'][single]"]' ).val();
            let replacement= '_';
            if(type =='categories')
            {
                category_code = $('select[name="'+type+'['+index+'][category_id]"]' ).val();
                replacement =category_code;
            }
            if(selection_type =='row')
            {
                changed_row = GlobalLabels.indexOf(selection_value)+1;
                console.log(category_set[changed_row]);
                if(selection_attr == 'all')
                {
                    for(i in category_set[changed_row])
                    {
                        if(category_set[changed_row][i] != "_")
                        {
                            category_set[changed_row][i]=replacement;
                        }
                    }
                }
                else if(selection_attr == 'single')
                {
                    if(category_set[changed_row][single-1] != "_")
                    {
                        category_set[changed_row][single-1]=replacement;
                    }
                }
                else if(selection_attr == 'from_to')
                {
                    for(i=from-1;i<to;i++)
                    {
                        if(category_set[changed_row][i] != '_')
                        {
                            category_set[changed_row][i]=replacement;
                        }
                    }
                }
            }
            else if(selection_type =='col')
            {
                changed_col = selection_value;
                if(selection_attr == 'all')
                {
                    for(i=0 ;i<category_set.length;i++)
                    {
                        if( Array.isArray(category_set[i]))
                        {
                            for(x=0 ;x<category_set[i].length;x++)
                            {
                                if(x == changed_col-1)
                                {
                                    if(category_set[i][x] != "_")
                                    {
                                        category_set[i][x]=replacement;
                                    }
                                }
                            }
                        }
                    }
                }
                else if(selection_attr == 'single')
                {
                    single_row = GlobalLabels.indexOf(single)+1;
                    if(category_set[single_row][changed_col-1] !="_")
                    {
                        category_set[single_row][changed_col-1]=replacement;
                    }
                }
                else if(selection_attr == 'from_to')
                {
                    from_row =GlobalLabels.indexOf(from)+1;
                    to_row =GlobalLabels.indexOf(to)+1;
                    for(i=from_row;i<=to_row;i++)
                    {
                        if(category_set[i][changed_col-1] != "_"){
                            category_set[i][changed_col-1]=replacement;
                        }
                    }
                }
            }
            getSeatMap();
        }
        function submit_data()
        {
            if(category_set.length >0)
            {
                code = $('#code').val();
                theater_id= $('#theater_id').val();
                rows_no= $('#rows_no').val();
                cols_no= $('#cols_no').val();
                $.ajax({type: "post",url:"{{route('halls.store')}}",
                data:{
                    _token:"{{csrf_token()}}",
                    seats:JSON.stringify(category_set),
                    code:code,
                    theater_id:theater_id,
                    rows_no:rows_no,
                    cols_no:cols_no
                },success:function(data){
                    Swal.fire("Data Save Successfully");
                    location.replace('{{route("halls.index")}}');
                },statusCode: {
                    422: function(data) {
                        data =jQuery.parseJSON(data['responseText']);
                        Swal.fire(data['errors']['code'][0]);

                    },
                    404: function() {
                        Swal.fire('Some Thing Went Wrong ! Please Contact Support Team');

                    }
                }
            });
            }
        }
    </script>
@endsection
