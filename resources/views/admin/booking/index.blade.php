
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
            <h3 class="card-label">{{__('Booking')}}</h3>
        </div>
        <div class="card-toolbar">


        </div>
    </div>
    <div class="card-body">
        <!--begin: Datatable-->
        <table class="table table-head-custom table-checkable" id="kt_datatable1">
            <thead>
                <tr>
                    <th>{{__('ID')}}</th>
                    <th>{{__('Name')}}</th>
                    <th>{{__('Email')}}</th>
                    <th>{{__('phone')}}</th>
                    <th>{{__('Theater')}}</th>
                    <th>{{__('Hall')}}</th>
                    <th>{{__('Program')}}</th>
                    <th>{{__('total')}}</th>
                    <th>{{__('Actions')}}</th>

                </tr>
            </thead>
            <tbody>
               @foreach($bookings as $booking)
                <tr>
                    <td>{{$booking->id}}</td>
                    <td>{{$booking->name}}</td>
                    <td>{{$booking->email}}</td>
                    <td>{{$booking->phone}}</td>
                    <td>{{$booking->event->theater->name}}</td>
                    <td>{{$booking->event->hall->code}}</td>
                    <td>{{$booking->event->program->title}}</td>
                    <td>{{$booking->total_price}} $</td>
                   <td> <a class="text-success m-l-5" href="{{route('booking.show',$booking)}}"><span class="fa fa-eye xx" ></span></a> </td>

                </tr>
                @endforeach
            </tbody>
        </table>
        <!--end: Datatable-->
    </div>
</div>
<!--end::Card-->
@endsection
