@extends('layouts/dashboard')

@section('content')
<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <!--begin::Card-->
                <div class="card card-custom gutter-b example example-compact">
                    <div class="card-header">
                        <h3 class="card-title">Assign Progam To Hall</h3>
                    </div>
                    <!--begin::Form-->
                    <form class="" method="post" enctype="multipart/form-data" action="{{route('hall_programs.store')}}">
                        @csrf
                        <div class="card-body">
                            <div class=" row">

                                <div class="form-group col-lg-4">
                                    <label>{{__('Theater Name')}} :</label>
                                    <select required class="form-control" id='theaters' required name="theater_id">
                                        <option>{{__('Select Theater')}}</option>
                                        @foreach ($theaters as $theater)
                                            <option value="{{$theater->id}}">{{$theater->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('theater_id')
                                    <span class="form-text" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-4">
                                    <label>{{__('Hall code')}} :</label>
                                    <select required class="form-control" id='halls' required name="hall_id">
                                        <option>{{__('Select Hall')}}</option>
                                    </select>
                                    @error('hall_id')
                                    <span class="form-text" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-4">
                                    <label>{{__('Program')}} :</label>
                                    <select required class="form-control"  required name="program_id">
                                        <option>{{__('Select program')}}</option>
                                        @foreach ($programs as $program)
                                            <option value="{{$program->id}}">{{$program->title}}</option>
                                        @endforeach
                                    </select>
                                    @error('program_id')
                                    <span class="form-text" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>{{__('From Date')}} :</label>
                                    <input type="date" class="form-control" required placeholder="{{__('From Date')}}" name="from_date" />
                                    @error('from_date')
                                        <span class="form-text" style="color:red">{{ $message }}</span>
                                     @enderror
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>{{__('To Date')}} :</label>
                                    <input type="date" class="form-control" required placeholder="{{__('To Date')}}" name="to_date" />
                                    @error('to_date')
                                        <span class="form-text" style="color:red">{{ $message }}</span>
                                     @enderror
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>{{__('Default Price')}} :</label>
                                    <input type="number" step="0.01" class="form-control" required placeholder="{{__('Default Price')}}" name="weekday_price" />
                                    @error('weekday_price')
                                        <span class="form-text" style="color:red">{{ $message }}</span>
                                     @enderror
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>{{__('Weekend Price')}} :</label>
                                    <input type="number" step="0.01" class="form-control" required placeholder="{{__('Default Price')}}" name="weekend_price" />
                                    @error('weekend_price')
                                        <span class="form-text" style="color:red">{{ $message }}</span>
                                     @enderror
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>{{__('Show Times')}}</label>
                                    <div class="checkbox-inline " id="time_frames">

                                    </div>
                                    @error('time_frames')
                                    <span class="form-text" style="color:red">{{ $message }}</span>
                                 @enderror
                                </div>


                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12">

                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-lg-4"></div>
                                <div class="col-lg-8">
                                    <button type="submit" class="btn btn-primary mr-2">{{__('Submit')}}</button>

                                </div>
                            </div>
                        </div>
                    </form>
                    <!--end::Form-->
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
    $('#theaters').on('change',function(){
        var theater =$('#theaters').val();
        $.ajax({type: "GET",url:"{{url('admin/halls/get/')}}"+'/'+theater,success:function(data){
            var options ="<option>{{__('Select Hall')}}</option>";
            for(var i=0; i<data.length;i++)
            {
                options+="<option value="+data[i]['id']+">"+data[i]['code']+"</option>";
            }
            $('#halls').html("");
            $('#halls').html(options);
        }});
    });
    $('#halls').on('change',function(){
        var hall =$('#halls').val();
        $.ajax({type: "GET",url:"{{url('admin/hall_time_frames/get/')}}"+'/'+hall,success:function(data){
            var options ="";
            for(var i=0; i<data.length;i++)
            {
                options+='<label class="checkbox checkbox-lg"><input type="checkbox" value="'+data[i]["id"]+'" name="time_frames[]"><span></span> From : '+data[i]['from']+'- To : '+data[i]['to']+'</label>';
            }
            console.log(options);
            $('#time_frames').html("");
            $('#time_frames').html(options);
        }});
    });
</script>
@endsection
