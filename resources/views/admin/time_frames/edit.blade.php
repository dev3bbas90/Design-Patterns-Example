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
                        <h3 class="card-title">Edit TimeFrame</h3>
                    </div>
                    <!--begin::Form-->
                    <form class="form" method="post" enctype="multipart/form-data" action="{{route('hall_time_frames.update',$hallTimeFrame)}}">
                        @csrf
                        @method('PUT')
                        <input hidden name="id" value="{{$hallTimeFrame->id}}">

                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>{{__('Theater Name')}} :</label>
                                    <select required class="form-control" id='theaters' required name="theater_id">
                                        <option>{{__('Select Theater')}}</option>
                                        @foreach ($theaters as $theater)
                                            <option value="{{$theater->id}}" @if($theater->id == $hallTimeFrame->hall->theater_id) selected="" @endif>{{$theater->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('theater_id')
                                        <span class="form-text" style="color:red">{{ $message }}</span>
                                     @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label>{{__('Hall code')}} :</label>
                                    <select required class="form-control" id='halls' required name="hall_id">
                                        <option>{{__('Select Hall')}}</option>
                                        @foreach ($hallTimeFrame->hall->theater->halls as $hall)
                                            <option value="{{$hall->id}}" @if($hall->id == $hallTimeFrame->hall_id) selected="" @endif>{{$hall->code}}</option>
                                        @endforeach
                                    </select>
                                    @error('hall_id')
                                    <span class="form-text" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label>{{__('From Time')}} :</label>
                                    <input type="time" class="form-control" required placeholder="{{__('From Time')}}" value="{{$hallTimeFrame->from}}" name="from" />
                                    @error('from')
                                        <span class="form-text" style="color:red">{{ $message }}</span>
                                     @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label>{{__('To Time')}} :</label>
                                    <input type="time" class="form-control" required placeholder="{{__('Theater Name')}}" name="to" value="{{$hallTimeFrame->to}}" />
                                    @error('to')
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
</script>
@endsection
