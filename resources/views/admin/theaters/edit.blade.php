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
                        <h3 class="card-title">Edit Theater</h3>
                    </div>
                    <!--begin::Form-->
                    <form class="form" method="post" enctype="multipart/form-data" action="{{route('theaters.update',$theater)}}">
                        @csrf
                        @method('PUT')
                        <input hidden name="id" value="{{$theater->id}}">

                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>{{__('Theater Name')}} :</label>
                                    <input type="text" class="form-control" required placeholder="{{__('Theater Name')}}" name="name" value="{{$theater->name}}" />
                                    @error('name')
                                        <span class="form-text" style="color:red">{{ $message }}</span>
                                     @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-xl-6 col-lg-6 col-form-label text-left">{{__('Image')}}</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="image-input image-input-outline image-input-circle" id="kt_image_3">
                                            <div class="image-input-wrapper" style='background-image: url({{asset("$theater->path")}})'></div>
                                            <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                                <i class="fa fa-pen icon-sm text-muted"></i>
                                                <input type="file" name="image" accept=".png, .jpg, .jpeg" />
                                                <input type="hidden" name="profile_avatar_remove" />
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
                                <div class="col-lg-12">
                                    <label>{{__('Description')}} :</label>
                                    <textarea  class="ckeditor form-control" required  name="description" >{{$theater->description}}</textarea>
                                    @error('description')
                                        <span class="form-text" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label>{{__('Theater address')}} :</label>
                                    <input type="text" class="form-control" required placeholder="{{__('Theater address')}}" name="address" value="{{$theater->address}}" />
                                    @error('address')
                                        <span class="form-text" style="color:red">{{ $message }}</span>
                                     @enderror
                                </div>
                                <div class="col-lg-12">
                                    <label>{{__('Location')}} "iframe" :</label>
                                    <textarea class="form-control" required  name="location" >{{$theater->location}}</textarea>
                                    @error('location')
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
