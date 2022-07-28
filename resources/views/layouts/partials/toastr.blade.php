<script>
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
</script>
@if(session()->has('added'))
    <script>
        toastr.success("Added Successfully");
    </script>
@endif
@if(session()->has('updated'))
    <script>
        toastr.info("Upadeted Successfully");
    </script>
@endif
@if(session()->has('deleted'))
    <script>
        toastr.error("Deleted Successfully");
    </script>
@endif
@if(session()->has('alert'))
    <script>
        toastr.error("You cant delete a Category that has a Program");
    </script>
@endif



