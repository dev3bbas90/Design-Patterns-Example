@extends('layouts.front.front')

@section('content')

<div class="breadcumb-wrapper breadcumb-layout1 pt-160 pb-20" data-bg-src="{{$program->path}}" data-overlay="">
    <div class="container z-index-common">
        <div class="breadcumb-content text-center">
            <h1 class="breadcumb-title h1 text-white my-0">{{$program->title}}</h1>
            <h2 class="breadcumb-bg-title">fate</h2>
            <ul class="breadcumb-menu-style1 text-white mx-auto fs-xs">
                <li>
                    <a href="#">
                        <i class="fal fa-home">
                        </i>{{__('messages.home')}}
                    </a>
                </li>
                <li class="active">{{$program->title}}</li>
            </ul>
        </div>
    </div>
</div>
<section class="vs-product-details p-5 ">
    <div class="container">
        <div class="position-relative z-index-common py-lg-60">
            <div class="product-details-shape bg-smoke"></div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="product-main-img text-center pt-30 mb-50 ">
                        <img src="{{$program->path}}" class="zoom-img" alt="{{$program->title}}" />
                    </div>
                    <div class="product-thum-slide">
                        <div class="vs-carousel" data-slide-show="3" id="thumbSlide">
                            <div class="thumb">
                                <img src="{{$program->path}}" class="zoom-thumb" data-zoom-image="{{$program->path}}" alt="Product Image" />
                            </div>
                        </div>
                        <div class="slide-btn d-none d-sm-block">
                            <button data-slick-prev="#thumbSlide"><i class="far fa-angle-left"></i></button>
                            <button data-slick-next="#thumbSlide"><i class="far fa-angle-right"></i></button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product-about p-5">
                        <h3 class="product-name font-theme text-normal">{{$program->title}}</h3>
                            <hr class="border-dashed-light mt-25 mb-20" />
                            @foreach ($categories as $key=>$category )

                            <p class="mb-2"><span style="font-weight:bold; color:black">{{$category->first()->casttype->title}} :</span>
                                @foreach ($category as $cast)
                                    {{$cast->name}},
                                @endforeach
                            </p>
                            @endforeach
                            <p class="mb-2">
                                <span style="font-weight:bold; color:black">{{__('messages.details')}} :</span>
                                {!!$program->description!!}
                            </p>
                            <div class="cart-btn-group text-end">
                                <a href="{{route('front.booking',['program'=>$program->id])}}" class="vs-btn">{{__('messages.book')}}</a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="pt-10 pt-lg-10">
            <ul class="nav nav-tabs tab-menu2" id="myTab" role="tablist">
                @foreach ($events as $date =>$event)
                <li class="nav-item" role="presentation"><a class="nav-link  {{ $loop->first ? 'active' : '' }}" id="review-tab" data-bs-toggle="tab" href="#event_{{strtotime($date)}}" role="tab" aria-controls="theaters_rel" aria-selected="false">
                    <span class="commented-on">
                        {{date('D',strtotime($date))}}
                    </span>
                    <br>
                    {{date('d M',strtotime($date))}} </a></li>
                @endforeach
            </ul>
            <div class="tab-content" id="myTabContent">
                @foreach ($events as $date=>$event_group)
                    <div class="tab-pane show {{ $loop->first ? 'active' : '' }}" id="event_{{strtotime($date)}}" role="tabpanel" aria-labelledby="theaters_rel-tab">
                        <div class="vs-comment-area list-style-none vs-comments-layout1">
                            <ul class="comment-list">
                               @foreach ($event_group as $event)
                                <li class="vs-comment">
                                        <div class="vs-post-comment">
                                            <div class="author-img m-auto ">
                                                <img src="{{$event->theater->path}}" alt="Author" class="img-thumbnail my-auto" />
                                            </div>
                                            <div class="comment-content mx-3">
                                                <div class="comment-top">
                                                    <div class="comment-author">
                                                        <h4 class="name">{{$event->theater->name}}</h4>
                                                        <div class="mb-10">
                                                            <span class="commented-on">{{date('d M,Y',strtotime($event->date))}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="cart-btn-group text-end">
                                                        <a href="{{route('booking_seats',[
                                                            'theater'=>$event->theater_id,
                                                            'date'=>$date,
                                                            'time'=>$event->hall_time_frame_id,
                                                            'program'=>$program->id,
                                                        ])}}" class="vs-btn"><i class="fas fa-ticket-alt"></i>{{__('messages.book')}}</a>
                                                    </div>
                                                </div>
                                                <p class="text bg-light text-dark p-2">From : {{$event->time_frame->from}} - To : {{$event->time_frame->to}}</p>
                                            </div>
                                        </div>
                                    </li>
                               @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
