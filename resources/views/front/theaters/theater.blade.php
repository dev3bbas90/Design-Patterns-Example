@extends('layouts.front.front')

@section('content')
<div class="breadcumb-wrapper breadcumb-layout1 pt-160 pb-20" data-bg-src="assets/img/c1.jpg" data-overlay="">
    <div class="container z-index-common">
      <div class="breadcumb-content text-center">
        <h1 class="breadcumb-title h1 text-white my-0">{{__('messages.theatersdetails')}}</h1>
        <h2 class="breadcumb-bg-title">{{__('messages.theaters')}}</h2>
        <ul class="breadcumb-menu-style1 text-white mx-auto fs-xs">
          <li><a href="index.html"><i class="fal fa-home"></i>{{__('messages.home')}}</a></li>
          <li class="active">{{__('messages.theatersdetails')}}</li>
        </ul>
      </div>
    </div>
</div>
<section class="vs-team-wrapper py-3 newsletter-pb bc__th">
    <div class="container">
        <div class="row">
        <div class="widget widget_search">
            {{-- <form class="search-form">
            <input type="text" placeholder="Search Here" />
            <button type="submit"><i class="far fa-search"></i></button>
            </form> --}}
        </div>
        <div class="col-lg-8 col-sm-12">
            <div class="vs-box1 d-md-flex mb-20 info-box4 align-items-center theater__info">
            <div class="pro-tag position-absolute end-0 top-0 bg-gradient
                    text-white">
            </div>
            <div class="inner-img1">
                <img src="{{$theater->path}}" class="img-thumbnail" alt="Theater
                    Image" />
            </div>
            <div class="media-body ml-lg-30">
                <table class="info-table mb-0 table__conf">
                <tbody>
                    <tr>
                    <td>{{__('messages.name')}}:</td>
                    <td>{{$theater->name}}</td>
                    </tr>
                    <tr>
                    <td>{{__('messages.des')}}:</td>
                    <td>{!!$theater->description!!}</td>
                    </tr>
                    <tr>
                    {{-- <td>Website:</td>
                    <td><a href="#">www.conference.com</a></td> --}}
                    </tr>
                    <tr>
                    <td>{{__('messages.hall')}}:</td>
                    <td>{{$theater->halls()->count()}}</td>
                    </tr>
                    <tr>
                    <td>{{__('messages.address')}}:</td>
                    <td><i class="fas fa-map-marker-alt mr-5"></i>
                        {{$theater->address}}</td>
                    </tr>
                </tbody>
                </table>
            </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-12">
            <h3 class="sidebox-title-v2 h5">{{__('messages.loction')}}</h3>
            <div class="vs-sidebox-v2">
                <div class="responsive-map">
                    {!!$theater->location!!}
                </div>
            </div>
        </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-sm-12">
                <div class="vs-box1 prog__cat p-0 mb-5">
                    <div class="nav tab-menu1 tab-indicator justify-content-center
                            justify-content-sm-start" role="tablist">
                        @foreach ($categories as $key=>$category)
                        <a class="nav-link @if($key==0) active @endif" id="{{str_replace(' ','-',$category->title)}}-tab" data-bs-toggle="tab" href="#{{str_replace(' ','-',$category->title)}}" role="tab"
                            aria-controls="{{str_replace(' ','-',$category->title)}}" aria-selected="true">
                            {{$category->title}}
                        </a>
                        @endforeach
                    </div>
                    <div class="tab-content mt-30">
                    @foreach ($categories as $key=>$category)
                        <div class="tab-pane show @if($key==0) active @endif" id="{{str_replace(' ','-',$category->title)}}" role="tabpanel" aria-labelledby="{{str_replace(' ','-',$category->title)}}-tab">
                            @foreach ($theater_programs->where('program_category_id',$category->id) as $program)
                                <div class="skill-box1 d-sm-flex px-30 pb-30 text-center">
                                    <div class="media-img position-relative">
                                        {{-- <a href="{{route('front.program',$program->slug)}}" class="play-btn small-size overlay-center "></a> <img src="{{$program->path}}" alt="theater " /> --}}
                                        <a href="{{ route('front.program',['program'=> $program->slug]) }}" class="play-btn small-size overlay-center popup-video"><i class="fas fa-play"></i></a> <img src="{{$program->path}}" alt="theater " />
                                    </div>
                                    <div class="media-body align-self-center ml-lg-30">
                                        <h5 class="fs-20 mb-0 font-theme">{{$program->title}}</h5>
                                        <div class="col-lg-12 col-sm-12 px-0">
                                            <span class="text-theme2 fs-xs"> {!!$program->description!!} </span>
                                            {{-- <p class="bg-light text-dark p-2">Date: from 29 Aug - to 31 Aug</p> --}}
                                            <div class="text-end py-3 book__p">
                                                <a class="btn btn-outline-secondary book my-2" href="{{route('front.booking',['program'=>$program->id,'theater'=>$theater->id])}}"><i class="fa fa-ticket fa-1x"></i>{{__('messages.buy')}}</a> <a href="{{ route('front.program',['program'=> $program->slug]) }}" class="btn btn-outline-secondary my-2">{{__('messages.more')}}</a>
                                                {{-- <a class="btn btn-outline-secondary book my-2" href="{{route('front.program',$program->slug)}}"><i class="fa fa-ticket fa-1x"></i> {{__('messages.buy')}}</a> <a href="{{ route('front.program',['program'=> $program->slug]) }}" class="btn btn-outline-secondary my-2">{{__('messages.more')}}</a> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        <div class="col-lg-4 col-sm-12">
            <aside class="sidebar-area   overflow-hidden">
                {{-- <h3 class="sidebox-title-v2 h5">Top Programs</h3>
                <div class="vs-sidebox bg-smoke">
                    <div class="row no-gutters g-3">
                    <div class="col-6">

                        <div class="image-scale-hover tabula-tooltip" data-bs-toggle="tooltip" data-bs-html="true" title="Program 1">
                        <a href="#"><img src="assets/img/widget/sidebbox-img-1.jpg" class="w-100" alt="Sidebox Image" /></a>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="image-scale-hover tabula-tooltip" data-bs-toggle="tooltip" data-bs-html="true" title="Program 1">
                        <a href="#"><img src="assets/img/widget/sidebbox-img-2.jpg" class="w-100" alt="Sidebox Image" /></a>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="image-scale-hover tabula-tooltip" data-bs-toggle="tooltip" data-bs-html="true" title="Program 1">
                        <a href="#"><img src="assets/img/widget/sidebbox-img-3.jpg" class="w-100" alt="Sidebox Image" /></a>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="image-scale-hover tabula-tooltip" data-bs-toggle="tooltip" data-bs-html="true" title="Program 1">
                        <a href="#"><img src="assets/img/widget/sidebbox-img-4.jpg" class="w-100" alt="Sidebox Image" /></a>
                        </div>
                    </div>
                    </div>
                </div> --}}
                <h3 class="sidebox-title-v2 h5">{{__('messages.lastprograms')}}</h3>
                <div class="vs-sidebox bg-smoke">
                    <div class="row no-gutters g-3">
                    @foreach ( $last_programs as $program)
                    <div class="col-6">
                        <div class="image-scale-hover tabula-tooltip" data-bs-toggle="tooltip" data-bs-html="true" title="Program 1">
                        <a href="{{route('front.program',$program->slug)}}"><img src="{{$program->path}}" class="w-100" alt="Sidebox Image" /></a>
                        </div>
                    </div>
                    @endforeach
                    {{-- <div class="col-6">
                        <div class="image-scale-hover tabula-tooltip" data-bs-toggle="tooltip" data-bs-html="true" title="Program 1">
                        <a href="#"><img src="assets/img/widget/sidebbox-img-2.jpg" class="w-100" alt="Sidebox Image" /></a>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="image-scale-hover tabula-tooltip" data-bs-toggle="tooltip" data-bs-html="true" title="Program 1">
                        <a href="#"><img src="assets/img/widget/sidebbox-img-3.jpg" class="w-100" alt="Sidebox Image" /></a>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="image-scale-hover tabula-tooltip" data-bs-toggle="tooltip" data-bs-html="true" title="Program 1">
                        <a href="#"><img src="assets/img/widget/sidebbox-img-4.jpg" class="w-100" alt="Sidebox Image" /></a>
                        </div>
                    </div> --}}
                    </div>
                </div>
            </aside>
        </div>
        </div>
    </div>
</section>

@endsection
