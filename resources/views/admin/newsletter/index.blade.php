@extends('layouts/dashboard')
@section('css')
    <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('plugins')
    <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
@endsection
@section('scripts')
    <script src="{{asset('assets/js/pages/crud/datatables/extensions/buttons.js')}}"></script>
@endsection
@section('content')
<!--begin::Card-->
<div class="card card-custom">
    <div class="card-header py-3">
        <div class="card-title">
            <span class="card-icon">
                <i class="flaticon2-shopping-cart text-primary"></i>
            </span>
            <h3 class="card-label">{{__('newsletter')}}</h3>
        </div>
        <div class="card-toolbar">


        </div>
    </div>
    <div class="card-body">
        <!--begin: Datatable-->
        <table class="table  table-head-custom table-checkable" id="kt_datatable1">
            <thead>
                <tr>
                    <th>{{__('ID')}}</th>
                    <th>{{__('Email')}}</th>
                    <th>{{__('Created At')}}</th>
                    <th>{{__('Updated At')}}</th>
                    <th>{{__('Actions')}}</th>

                </tr>
            </thead>
            <tbody>
               @foreach($newsletters as $newsletter)
                <tr>
                    <td>{{$newsletter->id}}</td>
                    <td>{{$newsletter->email}}</td>
                    <td>{{$newsletter->created_at}}</td>
                    <td>{{$newsletter->updated_at}}</td>
                    <td>
                     
                          <form action="{{route('newsletters.destroy',$newsletter)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-icon btn-light btn-hover-primary btn-sm" type="submit">
                                <span class="svg-icon svg-icon-md svg-icon-primary">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/General/Trash.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"></rect>
                                            <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path>
                                            <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path>
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </button>
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!--end: Datatable-->
    </div>
</div>
<!--end::Card-->
@endsection
