<script src="{{asset('front/assets-en/js/vendor/jquery-1.12.4.min.js')}}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset('front/assets-en/js/app.min.js')}}"></script>
<script src="{{asset('front/assets-en/js/vscustom-carousel.min.js')}}"></script>
<script src="{{asset('front/assets-en/js/vs-cursor.min.js')}}"></script>
<script src="{{asset('front/assets-en/js/vsmenu.min.js')}}"></script>
<script src="https://ditu.google.cn/maps/api/js?key=AIzaSyDC3Ip9iVC0nIxC6V14CKLQ1HZNF_65qEQ"></script>
<script src="{{asset('front/assets-en/js/map.js')}}"></script>
<script src="{{asset('front/assets-en/js/ajax-mail.js')}}"></script>
<script src="{{asset('front/assets-en/js/main.js')}}"></script>
<script>
    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        dots:false,
        nav:true,
        mouseDrag:false,
        autoplay:true,
        animateOut: 'slideOutUp',
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });
</script>
@yield('scripts')
