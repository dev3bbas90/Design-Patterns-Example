@extends('layouts.front.front')

@section('content')

	<style>
		body {
			font-family: 'Roboto', sans-serif;
			background-color: #fafafa;
		}
		.wrapper {
			width: 100%;
			text-align: center;
			/* margin-top:150px; */
		}

		.container {
			margin: 0 auto;
			width: 100%;
			text-align: left;
		}

		.booking-details {
			float: left;
			text-align: left;
			/* margin-left: 35px; */
			font-size: 12px;
			position: relative;
			/* height: 401px; */
		}

		.booking-details h2 {
			margin: 25px 0 20px 0;
			font-size: 17px;
		}

		.booking-details h3 {
			margin: 5px 5px 0 0;
			font-size: 14px;
		}

		div.seatCharts-cell {
			color: #182C4E;
			height: 30px;
			width: 30px;
			line-height: 25px;

		}

		div.seatCharts-seat {
			color: #FFFFFF;
			cursor: pointer;
		}

		div.seatCharts-row {
			height: 35px;
			display: inline-flex;
		}
		div.seatCharts-seat.focused {
			background-color: #4d1789;
		}

		div.seatCharts-seat.selected {
			background-color: #4d1789 !important;
		}

		div.seatCharts-seat.unavailable {
			background-color: #472B34 !important;
		}

		div.seatCharts-container {
			border-right: 1px dotted #000000;
			padding: 0 20px;
			float: left;
			height: 500px;
			overflow: scroll;
			width: 100%;
			display: grid;
		}

		.screen-part {
			position: relative;
		}

		div.seatCharts-legend {
			/* padding-left: 0px; */
			text-align: center;
			margin: auto;
			align-items: center;
			bottom: 16px;
		}

		ul.seatCharts-legendList {
			padding-left: 0px;
			display: inline-flex;

		}

		span.seatCharts-legendDescription {
			margin-left: 5px;
			line-height: 30px;
		}

		.checkout-button {
			display: block;
			margin: 10px 0;
			font-size: 14px;
		}

		#selected-seats {
			max-height: 90px;
			overflow-y: scroll;
			overflow-x: none;
		}

		.seatCharts-seat.seatCharts-cell.point {
			border-radius: 50%;
			width: 10px;
			height: 10px;
		}

		.seatCharts-legendDescription.label_seat {
			line-height: 1 !important;
		}

		.ticket-info {
			height: 620px;
		}

		.screen {
			content: '';
			width: 100%;
			height: 100px;
			border-radius: 30% / 100%;
			border-top-left-radius: 0;
			border-top-right-radius: 0;
            background-color: #CC9966;
			/* background-image: -webkit-linear-gradient(0deg, rgba(var(--theme-color2), 1) 0%, rgba(var(--theme-color), 1) 100%); */
			border: 7px double #fff;
            font-size: 50px;
            padding-top: 28px!important;

		}
 @foreach ($categories as $category)div.seatCharts-seat.{!!str_replace(' ','-',$category->name)!!}  { background-color: {{$category->color}} ;} @endforeach

	</style>

	<div class="breadcumb-wrapper breadcumb-layout1 pt-150 pb-50" data-overlay="">
		<div class="container z-index-common">
			<div class="breadcumb-content text-center">
				<h1 class="breadcumb-title h1 text-white my-0">Booking Seat</h1>
				<h2 class="breadcumb-bg-title">Book</h2>
				<ul class="breadcumb-menu-style1 text-white mx-auto fs-xs">
					<li><a href="index.html"><i class="fal fa-home"></i>Home</a></li>
					<li class="active">Booking Seat</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="wrapper mb-5">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-9 col-md-12 screen-part">
					<div id="legend"></div>
					<div id="seat-map">
						<div class="front-indicator screen py-1 mb-5 text-white text-center">Screen</div>
					</div>

				</div>
				<div class="col-lg-3 col-md-12 ticket-info">
					<div class="card booking-details w-100">
						<div class="card-header">
							Booking Details
						</div>
                        <form method="post" action="{{route('checkout')}}">
                            @csrf
                            <input type="hidden" name="event_id" id="event_id" value="{{$event->id}}">
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Seats Number <span id="counter" class="p-2
                                                mx-2 badge badge-secondary">0</span></li>
                                    <li class="list-group-item data__info">
                                        <!-- <ul > </ul> -->
                                        <table class="table text-center">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Type</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>

                                                <tbody id="selected-seats">

                                                </tbody>
                                        </table>
                                    </li>
                                    <li class="list-group-item ">
                                        <table class="table text-center">
                                                <tr>
                                                    <th scope="col">Name</th>
                                                    <td>
                                                        <input name="name" id="name" required type="text">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">email</th>
                                                    <td>
                                                        <input type="email" id="email" name="email" required>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Phone</th>
                                                    <td>
                                                        <input type="number" id="phone" name="phone" required>
                                                    </td>
                                                </tr>
                                        </table>
                                    </li>
                                    <li class="list-group-item">Total <b>$<span id="total" class="p-2 mx-2
                                                    badge badge-secondary">0</span></b></li>
                                </ul>
                            </div>
                            <div class="card-footer m-auto">
                                <a  id="submit_btn"  class="btn checkout-button vs-btn
                                        gradient-btn ">Checkout</a>
                            </div>
                        </form>
					</div>
				</div>
			</div>
		</div>
	</div>


@endsection
@section('scripts')
<script src="{{asset('js/seat_charts.js')}}"></script>
<script>
    var seats=[];
    var keys=[];
        $(document).ready(function () {
            var
            $cart = $('#selected-seats'),
            $counter = $('#counter'),
            $total = $('#total'),
            $firstSeatLabel = 1,
            $cols_number  = {!!$event->hall->cols_no!!},
            $rows_no  = 1,
            $seat_map = {!!json_encode($hallString)!!},
            $category_object =  {!!json_encode($category_object)!!},
            $legends = {!!json_encode($legends)!!},
            $bookedSeats={!!json_encode($bookingSeats)!!};
            sc = $('#seat-map').seatCharts({
                    map: $seat_map,
                    seats: $category_object,
                    naming: {
                        top: false,
                        left: true,
                        getLabel: function (character, row, column) {
                            var newValue = row + $firstSeatLabel++;
                            if (column ==  $cols_number) {
                                $firstSeatLabel = 1;
                            }
                            return newValue;
                        },
                        getId: function (character, row, column) {
                            return row + '_' + column;
                        },

                    },
                    legend: {
                        node: $('#legend'),
                        items:$legends
                    },
                    click: function () {

						if (this.status() == 'available') {
							//let's create a new <li> which we'll add to the cart items
							$('<tr><td><input type="hidden" name="seats[]" value="'+this.settings.id+'"><input type="hidden" name="keys[]" value="'+this.settings.label+'">' + this.settings.label + '</td><td class="' + this.data().category + '"> ' + this.data().category + '</td><td> $' + this.data().price + '</td><td><a class="cancel-cart-item"><i class="far fa-trash-alt"></i></a></td></tr>')
								.attr('id', 'cart-item-' + this.settings.id)
								.data('seatId', this.settings.id)
								.appendTo($cart);
                                keys.push(this.settings.label);
                                seats.push(this.settings.id);

							/*
							 * Lets update the counter and total
							 *
							 * .find function will not find the current seat, because it will change its stauts only after return
							 * 'selected'. This is why we have to add 1 to the length and the current seat price to the total.
							 */
							$counter.text(sc.find('selected').length + 1);
							$total.text(recalculateTotal(sc) + this.data().price);

							return 'selected';
						} else if (this.status() == 'selected') {
							//update the counter
							$counter.text(sc.find('selected').length - 1);
							//and total
							$total.text(recalculateTotal(sc) - this.data().price);

							//remove the item from our cart
							$('#cart-item-' + this.settings.id).remove();

							//seat has been vacated

							return 'available';
						} else if (this.status() == 'unavailable') {
							//seat has been already booked
							return 'unavailable';
						} else {
							return this.style();
						}

					}

            });

        //this will handle "[cancel]" link clicks
        $('#selected-seats').on('click', '.cancel-cart-item', function () {
            //remove from keys and seats
            keys_index =keys.indexOf($(this).parent().parent().data('seatId'));
            keys.splice(keys_index,1);
            seat_index = $("#"+$(this).parent().parent().data('seatId')).text();
            console.log(seat_index);
            seats_index =seats.indexOf(seat_index);
            seats.splice(seats_index,1);
            //let's just trigger Click event on the appropriate seat, so we don't have to repeat the logic here
            sc.get($(this).parent().parent().data('seatId')).click();
        });

        //let's pretend some seats have already been booked
        sc.get($bookedSeats).status('unavailable');

    });

    function recalculateTotal(sc) {
        var total = 0;

        //basically find every selected seat and sum its price
        sc.find('selected').each(function () {
            total += this.data().price;
        });

        return total;
    }
    var event = 'ontouchstart' in window ? 'touchstart' : 'click';

    $('#submit_btn').on(event,function(){
        {
            console.log(event);
        name  = $('#name').val();
        email = $('#email').val();
        phone = $('#phone').val();
        event_id = $('#event_id').val();
        if(parseInt($('#counter').text()) >0 && name != "" && email != "" && phone != "" )
        {
            $("#submit_btn").attr("disabled","disabled");
            $.ajax({type: "post",url:"{{route('checkout')}}",
                data:{
                    _token:"{{csrf_token()}}",
                    name:name,
                    event_id:event_id,
                    email:email,
                    phone:phone,
                    keys:keys,
                    seats:seats
                },success:function(data){
                    data= JSON.parse(data);
                    if(data['check'] ==true)
                    {
                        location.replace(data['url']);
                    }
                    else
                    {
                        // $("#submit_btn").attr("onclick","return submit()");
                        $("#submit_btn").removeAttr("disabled");
                        alert('sorry some seats are not available now');
                        for(i =0;i<data['unavailable_seats'].length;i++)
                        {
                            keys_index =keys.indexOf(data['unavailable_seats'][i]);
                            keys.splice(keys_index,1);
                            seat_index = $('#'+data['unavailable_seats'][i]).text();
                            seats_index =seats.indexOf(seat_index);
                            seats.splice(seats_index,1);
                            console.log(data['unavailable_seats'][i]);
                            $('#'+data['unavailable_seats'][i]).click();
                        }
                        sc.get(data['unavailable_seats']).status('unavailable');
                    }
                }
            });
        }
    }
    });


</script>

@endsection
