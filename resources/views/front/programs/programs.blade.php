@extends('layouts.front.front')

@section('content')
<div class="breadcumb-wrapper breadcumb-layout1 pt-160 pb-20 thBK" data-bg-src="{{asset('front/assets-en/img/thBK.jfif')}}" data-overlay="">
    <div class="container z-index-common">
        <div class="breadcumb-content text-center">
            <h1 class="breadcumb-title h1 text-white my-0">{{__('messages.programs')}}</h1>
            <h2 class="breadcumb-bg-title">Events</h2>
            <ul class="breadcumb-menu-style1 text-white mx-auto fs-xs">
                <li><a href="index.html"><i class="fal fa-home"></i>{{__('messages.home')}}</a></li>
                <li class="active">{{__('messages.programs')}}</li>
            </ul>
        </div>
    </div>
</div>
<!-- modal card__des -->

<section class="vs-match-wrapper vs-match-layout1 newsletter-pb filter-th py-3">
    <div class="container">
        <div class="mb-15 filter-active row list__the">
            @foreach ( $programs as $program )
            <div class="col-md-6 col-lg-6 grid-item MX4D Point90 Arkan">
                <div class="vs-events d-lg-flex" data-bg-src="{{asset('front/assets-en/img/shape/events-bg-1.png')}}">
                    <div class="media-img text-center my-3">
                        <img src="{{$program->path}}" alt="{{$program->title}}" />
                    </div>
                    <div class="media-body align-self-center">
                        <h3 class="events-name h5 text-white"><a href="{{ route('front.program',['program'=> $program->slug]) }}">{{$program->title}}</a></h3>
                        <ul class="events-list list-style-none">
                            {{-- <li class="text-light2"><span class="text-white">Location:</span> Americana Plaza</li> --}}
                            <li class="text-light2"><span class="text-white">
                                    <a href="{{ route('front.program',['program'=> $program->slug]) }}" class="btn btn-sm vs-btn gradient-btn my-3">{{__('messages.details')}}</a></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center">
            <a href="" class="btn btn-sm vs-btn gradient-btn p-3">{{__('messages.more')}} <i class="fas fa-angle-double-right ml-2"></i></a>
        </div>
    </div>
</section>
<section class="vs-events-wrapper ev__list events-layout1 pt-3 space-md-bottom">
    <div class="container">
        <div class="section-title">
            <span class="sub-title1">{{__('messages.theaters')}}</span>
            <h2 class="sec-title1 text-dark">{{__('messages.theaters')}}</h2>
        </div>
        <div class="row justify-content-center vs-carousel arrow-white treaters__list__card" data-slide-show="2" data-lg-slide-show="4" data-md-slide-show="4" data-sm-slide-show="3" data-xs-slide-show="2" data-arrows="true" data-xl-arrows="true" data-ml-arrows="true" data-lg-arrows="true">

          @foreach ($theaters as $theater)
            <div class="col-md-6">
                <div class="vs-events d-lg-flex">
                    <div class="media-img text-center my-3">
                        <img src="{{$theater->path}}" alt="Tournament Image" />
                    </div>
                    <div class="media-body align-self-center">
                        <h3 class="events-name h5"><a href="{{ route('front.theater',['theater'=> $theater->slug]) }}">{{$theater->name}} </a></h3>
                        <ul class="events-list list-style-none">
                            <li class="text-light2">{!!\Illuminate\Support\Str::limit($theater->description, 150, '...')!!}</li>
                            <li class="text-light2"><span class="text-white">
                                    <a href="{{ route('front.theater',['theater'=> $theater->slug]) }}" class="btn btn-sm vs-btn gradient-btn my-3">{{__('messages.details')}}</a></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
          @endforeach

        </div>
    </div>
</section>
@endsection
