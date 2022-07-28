
@extends('layouts.dashboard')
@section('css')
<link rel="stylesheet" href="{{asset('front/assets-en/css/fontawesome.min.css')}}" />
@endsection
@section('content')
<style>
    svg{
    width: 200px;
    height: 200px;
    }
</style>
<div class="content d-flex flex-column flex-column-fluid" >
    <div class="d-flex flex-column-fluid">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card card-custom gutter-b">
                        <div class="card-body">
                            <table class="table  table-head-custom table-checkable" id="kt_datatable1">

                                <tbody>


                                    <tr>
                                        <th>{{__('Name')}}</th>
                                        <td>{{$booking->name}}</td>
                                    </tr>
                                    <tr>
                                        <th>{{__('Email')}}</th>
                                        <td>{{$booking->email}}</td>
                                    </tr>
                                    <tr>

                                        <th>{{__('phone')}}</th>
                                        <td>{{$booking->phone}}</td>
                                    </tr>
                                    <tr>
                                        <th>{{__('Theater')}}</th>
                                        <td>{{$booking->event->theater->name}}</td>
                                    </tr>
                                    <tr>
                                        <th>{{__('Hall')}}</th>
                                        <td>{{$booking->event->hall->code}}</td>
                                    </tr>
                                    <tr>
                                        <th>{{__('Program')}}</th>
                                        <td>{{$booking->event->program->title}}</td>
                                    </tr>
                                    <tr>
                                        <th>{{__('total')}}</th>
                                        <td class="badge badge-lg badge-warning mr-5">{{$booking->total_price}} $</td>
                                    </tr>
                                    <tr>
                                        <th>{{__('Time')}}</th>
                                        <td>{{date('D d M',strtotime($booking->event->date))}}</td>
                                    </tr>
                                    <tr>
                                        <th>{{__('Date')}}</th>
                                        <td>From {{$booking->event->time_frame->from}} To {{$booking->event->time_frame->to}} </td>

                                    </tr>
                                    <tr>

                                        <th>{{__('Seats')}}</th>
                                        @foreach ($booking->details as $detail)
                                        <td class="badge badge-lg mr-5 text-white" style="background-color: {{$detail->seat->category->color}}">{{$detail->code}}</td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <th>{{__('Hall Code')}}</th>
                                        <td>{{$booking->event->hall->code}}</td>
                                    </tr>


                                </tbody>
                            </table>

                            <div class="breadcumb-wrapper breadcumb-layout1 pt-200 pb-20"  data-overlay="">
                                <div class="container z-index-common">
                                  <div class="breadcumb-content text-center">
                                    <h1 class="breadcumb-title h1 text-white my-0">Ticket Details</h1>
                                    <h2 class="breadcumb-bg-title">Tickets</h2>
                                    <ul class="breadcumb-menu-style1 text-white mx-auto fs-xs">

                                      <li class="active">Ticket Details</li>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                              <section class="vs-team-wrapper py-3 newsletter-pb bc__th">
                                <div class="container">
                                 @foreach ($booking->details as $detail)
                                    <div class="row">
                                        <div class="col-lg-12">
                                        <div class="vs-box1 d-md-flex text-lg-start text-sm-center mb-20 info-box4 align-items-center" style="border: 3px dotted #222;">
                                            <div class="pro-tag position-absolute end-0 top-0 bg-gradient
                                                text-white">
                                            </div>

                                            <div class="media-body ml-lg-30">
                                            <table class="info-table mb-0 table__conf">
                                                <tbody>
                                                <tr class="my-2">
                                                    <td>
                                                    <h2>
                                                        {{$booking->event->program->title}}
                                                    </h2>
                                                    </td>
                                                </tr>
                                                <tr class="my-2">
                                                    <td> {{date('D d M',strtotime($booking->event->date))}} </td>
                                                </tr>
                                                <tr class="my-2">
                                                    <td>{{$booking->event->time_frame->from}} - {{$booking->event->theater->name}} </td>
                                                </tr>
                                                <tr class="my-2">
                                                    <td>
                                                    <span class="badge badge-lg badge-warning mr-5">{{$detail->price}} $</span>
                                                    </td>
                                                </tr>
                                                <tr class="my-2">
                                                    <td>
                                                    <i class="fas fa-chair mr-5"></i> Seat : {{$detail->code}}
                                                    </td>
                                                </tr>
                                                <tr class="my-2">
                                                    <td>

                                                        <td class="badge badge-lg mr-5 text-white" style="background-color: {{$detail->seat->category->color}}" >{{$detail->seat->category->name}}

                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>

                                            </div>
                                            <div class="inner-img1 parcode m-auto">
                                            {!!$booking->QRCode!!}
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                 @endforeach
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
