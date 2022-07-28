@extends('layouts.front.front')

@section('content')

    <section class="carosal__banner">
        <div class="owl-carousel owl-theme">
            @foreach ( $slider as $slider )
                <div class="item">
                    <img src="{{$slider->path}}" alt="{{$slider->alt}}">
                    <div class="cover">
                        <div class="container">
                            <div class="header-content">
                                <div class="line"></div>
                                <h2>{{$slider->short_title}}</h2>
                                <h1>{{$slider->title}}</h1>
                                <h4>{{$slider->description}}</h4>
                            <a href="{{$slider->url}}" class="btn btn-sm vs-btn gradient-btn my-3">{{__('messages.details')}} </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <div class="bg1 bg-light-dark bg-fixed" >
        <div class="vs-video-area pt-5">
            <div class="container">
                <div class="section-title">
                    <span class="sub-title1">{{__('messages.theaters')}}</span>
                    <h2 class="sec-title1 text-white">{{__('messages.theaters')}}</h2>
                </div>
                <div class="row align-items-center gx-xl-0 arrow-white vs-carousel" data-slide-show="3" data-sm-slide-show="2" data-xs-slide-show="1" data-arrows="true" data-xl-arrows="true" data-ml-arrows="true" data-center-mode="true" data-xl-center-mode="true" data-ml-center-mode="true" data-lg-center-mode="true" data-md-center-mode="true">
                    @foreach ($theaters as $theater )
                        <div class="col-lg-4 col-sm-12">
                            <div class="video-box1">
                                <div class="vs-blog popup-video th__list">
                                    <div class="blog-image">
                                        <a href="{{ route('front.theater',['theater'=> $theater->slug]) }}">
                                            <img src="{{$theater->path}}" alt="{{$theater->name}}" class="w-100 img-fluid" />
                                        </a>
                                    </div>
                                    <div class="blog-content py-3">
                                        <h3 class="blog-title text-white fs-20">
                                            <a href="{{ route('front.theater',['theater'=> $theater->slug]) }}">
                                                {{$theater->name}}
                                            </a>
                                        </h3>
                                        <div class="blog-meta text-light fs-xs">
                                            <a href="{{ route('front.theater',['theater'=> $theater->slug]) }}">
                                                {!! Str::limit( strip_tags($theater->description) , 150, '...') !!}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ route('front.theater',['theater'=> $theater->slug]) }}" class="play-btn btn overlay-center">
                                    <i class="fas fa-angle-double-right"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
<!-- modal card__des -->

    <section class="vs-match-wrapper vs-match-layout1 py-5 progs__">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4 col-xl-5">
                    <div class="section-title">
                        <span class="sub-title1">{{__('messages.trendingprograms')}}</span>
                        <h2 class="sec-title1 text-white">{{__('messages.programs')}}</h2>
                    </div>
                </div>
                <div class="col-lg-8 col-xl-7 text-center text-lg-end">
                    <div class="filter-menu-style1 filter-menu-active mb-70">
                        <button data-filter="*" class="active">{{__('messages.all')}}</button>
                        @foreach ( $ProgramCategories as $programCategory )
                            <button data-filter=".program-{{$programCategory->id}}">{{{$programCategory->title}}}</button>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="mb-15 filter-active row">
                @foreach ( $ProgramCategories as $programCategory )
                    @foreach ( $programCategory->latest_programs as $program)
                        <div class="modal fade py-3 mt-5" id="program_{{$program->id}}_card" tabindex="-1" role="dialog" aria-labelledby="program_{{$program->id}}_card" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content py-2 ">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-12 py-3">
                                                <img src="{{$program->path}}" alt="{{$program->path}}" class="w-100 img-fluid" />
                                            </div>
                                            <div class="col-lg-6 col-sm-12 m-auto text-center">
                                                <h3>{{$program->title}}</h3>
                                                <a href="{{ route('front.program',['program'=> $program->slug]) }}" class="btn btn-sm vs-btn gradient-btn p-2">{{__('messages.details')}}</a>
                                                <a href="{{route('front.booking',['program'=>$program->id])}}" class="btn  vs-btn gradient-btn p-2">{{__('messages.book')}}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 grid-item program-{{$program->category->id}} my-2">
                            <div class="vs-events prog__item d-lg-flex p-2" data-bg-src="{{asset('front/assets-en/img/shape/events-bg-1.png')}}">
                                <div class="media-img text-center my-3">
                                    <img src="{{$program->path}}" alt="{{$program->path}}" />
                                </div>
                                <div class="media-body align-self-center mx-5">
                                    <h3 class="events-name h5 text-white"><a href="#">{{$program->title}}</a></h3>
                                    <ul class="events-list list-style-none">
                                        <li class="text-light2">
                                            {{$program->category->title}}
                                        </li>
                                        <li class="text-light2">
                                            <a href="" class="btn btn-sm vs-btn gradient-btn my-3" data-toggle="modal" data-target="#program_{{$program->id}}_card">{{__('messages.details')}}<i class="fas fa-angle-double-right px-2"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach

            </div>
        </div>
    </section>

  <section class="vs-member-area vs-member-layout1 bg-light-dark space-top space-md-bottom">
   <div class="container">
    <div class="section-title">
     <span class="sub-title1">{{__('messages.actor')}}</span>
     <h2 class="sec-title1 text-white">{{__('messages.actor')}}</h2>
    </div>


    <div class="row vs-carousel arrow-white" data-arrows="true" data-xl-arrows="true" data-lg-slide-show="4" data-md-slide-show="3" data-sm-slide-show="2" data-xs-slide-show="1" data-slide-show="4">
        @foreach ( $actors as $actor)
            <div class="col-lg-3">
                <div class="vs-member">
                    <div class="member-img">
                        <a href="#"><img src="{{$actor->path}}" class="w-100" alt="{{$actor->title}}" /></a>
                    </div>
                    <div class="member-content">
                        <h3 class="member-name fs-20"><a href="#">{{$actor->name}}</a></h3>
                    </div>
                </div>
            </div>
         @endforeach

    </div>
   </div>
  </section>
    <div class="vs-brand-wrapper bg-dark space">
        <div class="container">
            <div class="section-title text-center">
                <span class="sub-title1">{{__('messages.partners')}}</span>
            </div>
            <div class="row vs-carousel arrow-white" data-slide-show="5" data-lg-slide-show="4" data-md-slide-show="4" data-sm-slide-show="3" data-xs-slide-show="2" data-arrows="true" data-xl-arrows="true" data-ml-arrows="true" data-lg-arrows="true">
                @foreach ( $partner as $partner )
                    <div class="col-xl-2 text-center">
                        <img class="partners" src="{{$partner->path}}" alt="{{$partner->alt}}" />
                    </div>
                @endforeach

            </div>
        </div>
    </div>
  <section class="vs-contact-wrapper bg-light-dark space">
   <div class="container">
    <div class="section-title">
     <span class="sub-title1">{{__('messages.contact')}}</span>
     <h2 class="sec-title1 text-white">{{__('messages.get in touch')}}</h2>
    </div>
    <form action="{{route('contact_submit')}}" method="POST" class="contact-form-style1 form-dark px-80 py-80">
        {{-- <input type="hidden" name="_token" value="{{csrf_token()}}"> --}}
        @csrf
        <div class="row">
      <div class="col-lg-6 form-group">
       <label class="text-white" for="name">{{__('messages.name')}}</label>
       <input type="text" id="name" name="name" class="form-control" placeholder="Enter Your Name" />
       <i class="fal fa-user"></i>
      </div>
      <div class="col-lg-6 form-group">
       <label class="text-white" for="email">{{__('messages.email')}}</label>
       <input type="text" id="email" name="email" class="form-control" placeholder="Enter Your Email" />
       <i class="fal fa-envelope"></i>
      </div>
      <div class="col-12 form-group">
       <label class="text-white" for="message">{{__('messages.message')}}</label>
       <textarea class="form-control" id="message" rows="11" cols="50" name="message" placeholder="Your Message"></textarea>
       <i class="fal fa-pencil-alt"></i>
      </div>
      <div class="col-12 form-group mb-0 text-center">
       <button type="submit" class="vs-btn gradient-btn" >{{__('messages.submit')}}</button>

       <p class="form-messages text-white mt-20 mb-0 text-center"></p>
      </div>
     </div>
    </form>
   </div>
  </section>
    <!-- modal Thanks -->
    <div class="modal fade py-0" id="thank__you" tabindex="-1" role="dialog" aria-labelledby="thank__you" aria-hidden="true" >
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content m-auto">
          <div class="modal-body py-0">
            <div class="row text-center justify-content-center">
              <div class="col-sm-3 tic-p1">
                <i class="fas fa-qrcode"></i>
              </div>
              <div class="col-lg-9 tic-p2 py-3 m-auto">
               <h3 class="text-normal"> <i class="fa fa-ticket fa-1x mr-5"></i> Thank You.</h3>
                <button class="vs-btn gradient-btn" data-dismiss="modal">Close</button>
              </div>
             </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
@section('scripts')
@if (\Session::has('thank-you'))
    <script>
        $(document).ready(function(){
            $('#thank__you').modal('show');
        });
    </script>
@endif
@endsection

