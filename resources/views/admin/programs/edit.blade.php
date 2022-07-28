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
                        <h3 class="card-title">Edit Program </h3>
                    </div>
                    <!--begin::Form-->
                    <form class="" method="post" enctype="multipart/form-data" action="{{route('programs.update' ,$program)}}">
                        @csrf
                        @method("PUT")
                        <input hidden name="id" value="{{$program->id}}">
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>{{__('Program Name')}} </label>
                                    <input type="text" class="form-control" required placeholder="{{__('Program Name')}}" value="{{$program->title}}" name="title"  />
                                    @error('title')
                                        <span class="form-text" style="color:red">{{ $message }}</span>
                                     @enderror
                                </div>


                                <div class="col-lg-12">
                                    <label>{{__('Program Description')}} :</label>
                                    <textarea  class="form-control" id="" name="description">{{$program->description}}</textarea>
                                    @error('description')
                                        <span class="form-text" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-lg-6">
                                    <label class="col-xl-6 col-lg-6 col-form-label text-left">{{__('Image')}}</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="image-input image-input-outline image-input-circle" id="kt_image_3">
                                            <div class="image-input-wrapper" style='background-image: url({{asset("$program->path")}})'></div>
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


                                <div class="col-lg-6">
                                    <label>{{__('Program Categories')}} </label>

                                     <select class="form-control selectpicker" name="program_category_id">
                                        <option disabled selected>Select Category</option>
                                        @foreach($program_categories as $program_category)
                                        <option @if($program_category->id == $program->program_category_id) selected="" @endif value="{{$program_category->id}}">{{$program_category->title}}</option>

                                      {{-- <option value="{{$program_category->id}}">{{$program_category->title}}</option> --}}
                                      @endforeach
                                     </select>
                                        @error('program_category_id')
                                            <span class="form-text" style="color:red">{{ $message }}</span>
                                        @enderror
                                </div>
                                @foreach ($cast_types as $cast_type)
                                    <div class="col-lg-6">
                                        <label>{{$cast_type->title}} </label>
                                        <select class="form-control selectpicker " multiple name="casts[]">
                                            @foreach($cast_type->casts as $cast)
                                                {{-- <option value="{{$cast->id}}">{{$cast->name}}</option> --}}
                                             <option
                                             @if(in_array($cast->id,$program->casts()->pluck('casts.id')->toArray()) && $cast_type->id ==$cast->cast_type_id)
                                                selected=""
                                             @endif
                                             value="{{$cast->id}}">{{$cast->name}}</option>
                                                @endforeach
                                        </select>
                                            @error('program_category_id')
                                                <span class="form-text" style="color:red">{{ $message }}</span>
                                            @enderror
                                    </div>
                                @endforeach
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
