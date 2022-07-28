@extends('layouts/dashboard')
@section('css')
    <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('plugins')
    <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
@endsection
@section('scripts')
    <script src="{{asset('assets/js/pages/crud/datatables/extensions/buttons.js')}}"></script>
    <script src="{{asset('vendor/datatables/buttons.server-side.js')}}"></script>
    {{$dataTable->scripts()}}
@endsection
@section('content')
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <span class="card-icon">
                <i class="flaticon2-supermarket text-primary"></i>
            </span>
            <h3 class="card-label">Booking Report</h3>
        </div>

    </div>
    <div class="card-body">
        {{$dataTable->table()}}
    </div>


</div>
@endsection
