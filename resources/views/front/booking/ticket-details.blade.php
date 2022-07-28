@extends('layouts.front.front')

@section('content')
<style>
    svg{
    width: 200px;
    height: 200px;
    }
</style>
<div class="breadcumb-wrapper breadcumb-layout1 pt-200 pb-20"  data-overlay="">
    <div class="container z-index-common">
      <div class="breadcumb-content text-center">
        <h1 class="breadcumb-title h1 text-white my-0">Ticket Details</h1>
        <h2 class="breadcumb-bg-title">Ticket</h2>
        <ul class="breadcumb-menu-style1 text-white mx-auto fs-xs">
          <li><a href="index.html"><i class="fal fa-home"></i>Home</a></li>
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
                <div class="inner-img1  m-auto">
                <img src="{{$booking->event->program->path}}" class="img-fluid" alt="Theater
                        Image" />
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
                        <p>Hall Code:  {{$booking->event->hall->code}}</p>
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
  </section>
@endsection
