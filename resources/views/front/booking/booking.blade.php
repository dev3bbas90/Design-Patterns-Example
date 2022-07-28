@extends('layouts.front.front')

@section('content')
<div class="breadcumb-wrapper breadcumb-layout1 pt-200 pb-20" data-bg-src="assets/img/c1.jpg" data-overlay="">
    <div class="container z-index-common">
        <div class="breadcumb-content text-center">
            <h1 class="breadcumb-title h1 text-white my-0">Booking Details</h1>
            <h2 class="breadcumb-bg-title">Booking</h2>
            <ul class="breadcumb-menu-style1 text-white mx-auto fs-xs">
                <li><a href="index.html"><i class="fal fa-home"></i>Home</a></li>
                <li class="active">Booking Details</li>
            </ul>
        </div>
    </div>
</div>
<section class="vs-team-wrapper py-3 newsletter-pb bc__th">
    <div class="container">
        <div class="row">
           <form method="get" action="{{route('booking_seats')}}">
               @csrf
            <div class="col-lg-12">
                <div class="vs-box1 d-md-flex mb-20 info-box4 align-items-center">
                    <div class="pro-tag position-absolute end-0 top-0 bg-gradient
                    text-white">
                    </div>
                    <div class="inner-img1 text-center m-auto">
                        <img src="{{$program->path}}" img-thumbnail alt="Theater
                        Image" />
                    </div>
                    <div class="media-body ml-lg-30">
                        <table class="info-table mb-0 table__conf">
                            <tbody>
                                <tr>
                                    <td class="py-1">Name:</td>
                                    <td class="py-1">{{$program->title}}</td>
                                </tr>
                                <tr>
                                    <td class="py-1">Theater:</td>
                                    <td class="py-1">
                                        <select class="form-select" name="theater" aria-label="Default select example" id="theater">
                                            <option selected>Select Theater</option>
                                            @foreach ($theaters as $theater)
                                            <option @if(request()->theater == $theater->id) selected="" @endif  value="{{$theater->id}}">{{$theater->name}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-1">Date:</td>
                                    <td class="py-1">
                                        <select class="form-select" name="date" aria-label="Default select example" id="date">
                                            <option selected >Select Date</option>
                                            @foreach ($events as $event)
                                            <option value="{{$event}}">{{$event}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-1">Time:</td>
                                    <td class="py-1">
                                        <select class="form-select" name="time" aria-label="Default select example" id="time">
                                            <option selected>Select Show Time</option>
                                        </select>
                                    </td>
                                </tr>
                                {{-- <tr>
                                    <td class="py-1">Name:</td>
                                    <td class="py-1">
                                        <input class="form-select" name="time" aria-label="Default select example" id="time">

                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-1">Time:</td>
                                    <td class="py-1">
                                        <select class="form-select" name="time" aria-label="Default select example" id="time">
                                            <option selected>Select Show Time</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-1">Time:</td>
                                    <td class="py-1">
                                        <select class="form-select" name="time" aria-label="Default select example" id="time">
                                            <option selected>Select Show Time</option>
                                        </select>
                                    </td>
                                </tr> --}}
                                {{-- <tr>
                                    <td class="py-1">
                                        Hall:
                                    </td>
                                    <td class="py-1">
                                        <select class="form-select" aria-label="Default select example" id="hall">
                                            <option selected>Select Hall</option>
                                        </select>
                                    </td>
                                </tr> --}}
                            </tbody>
                        </table>
                        <div class="text-end my-3 next_btn">
                           <button id="submit-btn" class="vs-btn gradient-btn" disabled type="submit">Book</button>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="program" id="program" value="{{$program->id}}">
           </form>
        </div>
    </div>
</section>
@endsection
@section('scripts')
<script>
    $('#theater').on('change', function() {
        $('#submit-btn').attr("disabled", "disabled");
        var theater = $('#theater').val();
        var program = $('#program').val();
        $.ajax({
            type: "GET",
            url: "{{route('front.events.get')}}",
            data: {
                theater: theater,
                program: program
            },
            success: function(data) {
                var options = "<option value=''>select date</option>";
                if (data != null) {
                    for (var i = 0; i < data.length; i++) {
                        options += '<option value="' + data[i] + '" > ' + data[i] + '</option>';
                    }
                }
                $('#date').html("");
                $('#time').html("");

                $('#date').html(options);
            }
        });

    });
    $('#date').on('change', function() {
        $('#submit-btn').attr("disabled", "disabled");
        var theater = $('#theater').val();
        var program = $('#program').val();
        var date = $('#date').val();
        $.ajax({
            type: "GET",
            url: "{{route('front.time_frames.get')}}",
            data: {
                theater: theater,
                program: program,
                date: date,
            },
            success: function(data) {
                var options = "<option value=''>Select Show Time</option>";
                    for (i in data) {
                        options += '<option value="' + data[i]['id'] + '" > From : ' + data[i]['from'] + ' To : ' + data[i]['to'] + ' Hall : ' + data[i]['hall'] + '</option>';
                        console.log(data[i]);
                    }
                $('#time').html("");
                $('#time').html(options);
            }
        });
    });
    $('#time').on('change', function() {
        if($('#time').val() != null && $('#time').val()!= "")
        {
            $('#submit-btn').removeAttr('disabled');
        }
    });

</script>
@endsection
