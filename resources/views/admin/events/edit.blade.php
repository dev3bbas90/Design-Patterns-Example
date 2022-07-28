@extends('layouts/dashboard')

@section('content')

@if($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
@endif
<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <!--begin::Card-->
                <div class="card card-custom gutter-b example example-compact">
                    <div class="card-header">
                        <h3 class="card-title">Edit Event</h3>
                    </div>
                    <!--begin::Form-->
                    <form class="form" method="post" enctype="multipart/form-data" action="{{route('events.update',$event)}}">
                        @csrf
                        @method('PUT')
                        <input hidden name="id" value="{{$event->id}}">

                        <div class="card-body">
                            <div class=" row">
                                <div class="col-lg-4 form-group">
                                    <label>{{__('Theater Name')}} :</label>
                                    <select required class="form-control" id='theaters' required name="theater_id">
                                        <option>{{__('Select Theater')}}</option>
                                        @foreach ($theaters as $theater)
                                            <option value="{{$theater->id}}" @if($theater->id == $event->hall->theater_id) selected="" @endif>{{$theater->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('theater_id')
                                        <span class="form-text" style="color:red">{{ $message }}</span>
                                     @enderror
                                </div>
                                <div class="col-lg-4 form-group">
                                    <label>{{__('Hall code')}} :</label>
                                    <select required class="form-control" id='halls' required name="hall_id">
                                        <option>{{__('Select Hall')}}</option>
                                        @foreach ($event->hall->theater->halls as $hall)
                                            <option value="{{$hall->id}}" @if($hall->id == $event->hall_id) selected="" @endif>{{$hall->code}}</option>
                                        @endforeach
                                    </select>
                                    @error('hall_id')
                                    <span class="form-text" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class=" col-lg-4 form-group">
                                    <label>{{__('Program')}} :</label>
                                    <select required class="form-control"  required name="program_id">
                                        <option>{{__('Select program')}}</option>
                                        @foreach ($programs as $program)
                                            <option @if($program->id == $event->program_id) selected @endif value="{{$program->id}}">{{$program->title}}</option>
                                        @endforeach
                                    </select>
                                    @error('program_id')
                                    <span class="form-text" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class=" col-lg-6 form-group">
                                    <label>{{__('Date')}} :</label>
                                    <input type="date" class="form-control" value="{{$event->date}}" required placeholder="{{__('Date')}}" id="date" name="date" />
                                    @error('date')
                                        <span class="form-text" style="color:red">{{ $message }}</span>
                                     @enderror
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label>{{__('Show Time')}} :</label>
                                    <select required class="form-control" id='hall_time_frame_id' required name="hall_time_frame_id">
                                        <option>{{__('Select Show Time')}}</option>
                                        @foreach ($event->hall->time_frames as $time_frame)
                                            <option value="{{$time_frame->id}}" @if($time_frame->id == $event->hall_time_frame_id) selected="" @endif>From : {{$time_frame->from}} To : {{$time_frame->to}}</option>
                                        @endforeach
                                    </select>
                                    @error('hall_time_frame_id')
                                    <span class="form-text" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>{{__('Default Price')}} :</label>
                                    <input type="number" step="0.01" class="form-control" value="{{$event->weekday_price}}" required placeholder="{{__('Default Price')}}" name="weekday_price" />
                                    @error('weekday_price')
                                        <span class="form-text" style="color:red">{{ $message }}</span>
                                     @enderror
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>{{__('Weekend Price')}} :</label>
                                    <input type="number" step="0.01" class="form-control" value="{{$event->weekend_price}}" required placeholder="{{__('Weekend Price')}}" name="weekend_price" />
                                    @error('weekend_price')
                                        <span class="form-text" style="color:red">{{ $message }}</span>
                                     @enderror
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
            var options ="";
            for(var i=0; i<data.length;i++)
            {
                options+="<option value="+data[i]['id']+">"+data[i]['code']+"</option>";
            }
            $('#halls').html("");
            $('#halls').html(options);
        }});
    });
    $('#halls').on('change',function(){
        var hall      = $('#halls').val();
        $.ajax({type: "GET",url:"{{route('ajax.time_frames.get_data')}}",
        data:{
            hall_id:hall,
        },success:function(data){
            var options ="<option value=''>Select Show time</option>";
            if(data != null)
            {
               for(var i=0; i<data.length;i++)
               {
                options+="<option value="+data[i]['id']+"> From : "+data[i]["from"]+" - To : "+data[i]["to"]+"</option>";
               }
               console.log(options);
            }
               $('#hall_time_frame_id').html("");
               $('#hall_time_frame_id').html(options);
        }});
    });
</script>
@endsection
