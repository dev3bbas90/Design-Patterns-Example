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
                        <h3 class="card-title">Add New Program Categories</h3>
                    </div>
                    <!--begin::Form-->
                    <form class="" method="post" enctype="multipart/form-data" action="{{route('program-category.store')}}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">

                                <div class="col-lg-6">
                                    <label>{{__('Program Category Title')}} </label>
                                    <input type="text" class="form-control"  placeholder="{{__('Program Category Title')}}" value="{{old('title')}}" name="title"  />
                                    @error('title')
                                        <span class="form-text" style="color:red">{{ $message }}</span>
                                     @enderror
                                </div>




                            <div class="form-group row">
                                <div class="col-lg-12">

                                    <div class="col-lg-12">
                                        <label>{{__('Program Category Description')}} :</label>
                                        <textarea  class="form-control" id="" name="description"></textarea>
                                        @error('description')
                                            <span class="form-text" style="color:red">{{ $message }}</span>
                                        @enderror
                                    </div>


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
