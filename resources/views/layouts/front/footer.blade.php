<footer class="footer-wrapper footer-layout1 bg-fluid bg-black position-relative">
    <div class="bg-fluid d-none d-none d-xl-block position-absolute start-0 top-0 w-100 h-100"></div>
    <div class="footer-widget-wrapper dark-style1 z-index-common">
        <div class="inner-wrapper bg-black   top-50 start-50  w-100 px-60 py-40">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-6 text-center text-xl-start mb-3 mb-xl-0">
                    <span class="sub-title2 mt-2">Newsletter</span>
                    <h2 class="mb-0 text-white">{{__('messages.get')}}</h2>
                </div>
                <div class="col-md-10 col-lg-8 col-xl-6">
                    <form action={{route('newsletter')}} method="POST" class="newsletter-style1 d-md-flex" >
                        @csrf
                        <input type="email" class="form-control" name="email" placeholder="Enter email address" />
                        <button type="submit" class="vs-btn gradient-btn">{{__('messages.send')}}</button>
                    </form>
                </div>
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
       </div>
    </div>
    <div class="footer-copyright bg-black z-index-step1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 align-self-center text-center py-3 py-xl-0 ">
                    <p class="text-light fw-bold text-bold mb-0">Copyright &copy; {{ date('Y') }}. All rights reserved.<a target="_blank" href="ilead-grp.com">ILEAD</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>
<a href="#" class="scrollToTop icon-btn3"><i class="far fa-angle-up"></i></a>
<div class="vs-cursor"></div>
<div class="vs-cursor2"></div>
@include('layouts.front.footer-js')
@section('scripts')
@if (\Session::has('thank-you'))
    <script>
        $(document).ready(function(){
            $('#thank__you').modal('show');
        });
    </script>
@endif
