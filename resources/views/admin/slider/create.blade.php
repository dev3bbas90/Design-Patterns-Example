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
                        <h3 class="card-title">Add New Slider </h3>
                    </div>
                    <!--begin::Form-->
                    <form class="" method="post" enctype="multipart/form-data" action="{{route('slider.store')}}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">


                                <div class="col-lg-6">
                                    <label>{{__('title')}} </label>
                                    <input type="text" class="form-control" required placeholder="{{__('Slider title')}}" value="{{old('title')}}" name="title"  />
                                    @error('title')
                                        <span class="form-text" style="color:red">{{ $message }}</span>
                                     @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label>{{__('Short title')}} </label>
                                    <input type="text" class="form-control" required placeholder="{{__('short title ')}}" value="{{old('short_title')}}" name="short_title"  />
                                    @error('short_title')
                                        <span class="form-text" style="color:red">{{ $message }}</span>
                                     @enderror
                                </div>

                                <div class="col-lg-12">
                                    <label>{{__('Slider Description')}} :</label>
                                    <textarea  class="form-control" id="" name="description"></textarea>
                                    @error('description')
                                        <span class="form-text" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label>{{__('Alt')}} </label>
                                    <input type="text" class="form-control" required placeholder="{{__('Slider alt')}}" value="{{old('alt')}}" name="alt"  />
                                    @error('alt')
                                        <span class="form-text" style="color:red">{{ $message }}</span>
                                     @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label>{{__('url ')}} </label>
                                    <input type="text" class="form-control" required placeholder="{{__('url')}}" value="{{old('url')}}" name="url"  />
                                    @error('url')
                                        <span class="form-text" style="color:red">{{ $message }}</span>
                                     @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-xl-6 col-lg-6 col-form-label text-left">{{__('Image')}}</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="image-input image-input-outline image-input-circle" id="kt_image_3">
                                            <div class="image-input-wrapper" style="background-image: url({{asset('assets/media/users/blank.png')}})"></div>
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
