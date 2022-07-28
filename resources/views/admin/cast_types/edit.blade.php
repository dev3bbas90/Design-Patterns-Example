@extends('layouts/dashboard')
@section('scripts')
<script src="{{asset('assets/js/pages/crud/file-upload/image-input.js')}}"></script>
@endsection
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
                        <h3 class="card-title">Edit Cast Type</h3>
                    </div>
                    <!--begin::Form-->
                    <form class="" method="post" enctype="multipart/form-data" action="{{route('casts-type.update',$castsType)}}">
                        @csrf
                        @method("PUT")
                        <input hidden name="id" value="{{$castsType->id}}">
                        <div class="card-body">
                            <div class="form-group row">

                                <div class="col-lg-6">
                                    <label>{{__('castsType Title')}} </label>
                                    <input type="text" class="form-control" required placeholder="{{__('castsType Title')}}" value="{{$castsType->title}}" name="title" />
                                    @error('title')
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
