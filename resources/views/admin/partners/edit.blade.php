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
                        <h3 class="card-title">Add New Partner </h3>
                    </div>
                    <!--begin::Form-->
                    <form class="" method="post" enctype="multipart/form-data" action="{{route('partners.update' ,$partner)}}">
                        @csrf
                        @method("PUT")
                        <input hidden name="id" value="{{$partner->id}}">
                        <div class="card-body">
                            <div class="form-group row">

                                <div class="col-lg-6">
                                    <label>{{__('Alt')}} </label>
                                    <input type="text" class="form-control" required placeholder="{{__('Partner alt')}}"  value="{{$partner->alt}}" name="alt"  />
                                    @error('alt')
                                        <span class="form-text" style="color:red">{{ $message }}</span>
                                     @enderror
                                </div>

                                <div class="col-lg-6">
                                    <label class="col-xl-6 col-lg-6 col-form-label text-left">{{__('Image')}}</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="image-input image-input-outline image-input-circle" id="kt_image_3">
                                            <div class="image-input-wrapper" style='background-image: url({{asset("$partner->path")}})'></div>
                                            <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                                <i class="fa fa-pen icon-sm text-muted"></i>
                                                <input type="file" name="image" value='{{$partner->image}}' accept=".png, .jpg, .jpeg" />
                                                <input type="hidden" value='{{$partner->image}}' name="profile_avatar_remove" />
                                            </label>
                                            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                                            </span>
                                        </div>
                                        @error('image')
                                        <span class="form-text" style="color:red">{{$message}}</span>
                                        @enderror

                                    </div>
                                </div>

                        </div>
                        <div class="card-footer">
                            <div class="row">
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
