<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use App\Http\Requests\FrontBookingRequest;
use App\Http\Services\FrontBookingService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    private  $bookingService;
    public function __construct(FrontBookingService $bookingService )
    {
        $this->bookingService = $bookingService;
    }

    public function booking(Request $request)
    {
        if($request->program != NULL)
        {
            $data = $this->bookingService->booking($request->all());
            return view('front.booking.booking',$data);
        }
    }
    public function get_events(Request $request)
    {
        return $this->bookingService->get_events($request->all());
    }
    public function get_time_frames(Request $request)
    {
        return $this->bookingService->get_time_frames($request->all());
    }

    function booking_seats(FrontBookingRequest $request)
    {
        $data = $this->bookingService->booking_seats($request->all());
        return view('front.booking.booking-seat',$data);
    }
    function checkout(CheckoutRequest $request)
    {
        // DB::beginTransaction();
        // try
        // {
            $callback= $this->bookingService->checkout($request->all());
            return json_encode($callback);
        //     DB::commit();
        //     return 'success';
        // }
        // catch(Exception $e)
        // {
        //     DB::rollback();
        //      return view('errors.404');
        // }
    }
    public function booking_details($token)
    {
        $data =$this->bookingService->booking_details($token);
        return view('front.booking.ticket-details',$data);
    }
}
