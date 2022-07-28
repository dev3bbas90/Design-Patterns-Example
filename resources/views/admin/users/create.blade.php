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
                        <h3 class="card-title">Add New User </h3>
                    </div>
                    <!--begin::Form-->
                    <form class="" method="post" enctype="multipart/form-data" action="{{route('users.store')}}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">

                                <div class="col-lg-6">
                                    <label>{{__('User Name')}} </label>
                                    <input type="text" class="form-control" required placeholder="{{__('User Name')}}" value="{{old('name')}}" name="name"  />
                                    @error('name')
                                        <span class="form-text" style="color:red">{{ $message }}</span>
                                     @enderror
                                </div>

                                <div class="col-lg-6">
                                    <label>{{__('User Email')}} </label>
                                    <input type="email" class="form-control" required placeholder="{{__('User email')}}" value="{{old('email')}}" name="email"  />
                                    @error('email')
                                        <span class="form-text" style="color:red">{{ $message }}</span>
                                     @enderror
                                </div>

                                <div class="col-lg-6">
                                    <label>{{__('User password')}} </label>
                                    <input type="password" class="form-control" required placeholder="{{__('User password')}}" value="{{old('password')}}" name="password"  />
                                    @error('password')
                                        <span class="form-text" style="color:red">{{ $message }}</span>
                                     @enderror
                                </div>

                                <div class="col-lg-6">
                                    <label>{{__('Password Confirmation')}} </label>
                                    <input type="password" class="form-control" required placeholder="{{__('User password')}}" value="{{old('password_confirmation')}}" name="password_confirmation"  />
                                    @error('password_confirmation')
                                        <span class="form-text" style="color:red">{{ $message }}</span>
                                     @enderror
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
