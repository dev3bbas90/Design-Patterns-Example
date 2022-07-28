<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\FrontBookingRequest;
use App\Http\Requests\NewsletterRequest;
use Illuminate\Http\Request;
use App\Http\Services\FrontService;
use App\Models\Theater;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Exception;

class IndexController extends Controller
{
    private  $FrontService;
    public function __construct(FrontService $FrontService )
    {
        $this->FrontService = $FrontService;


    }
    public function index()
    {
        $data = $this->FrontService->index();
       return view('front.index' ,$data);

    }
    public function programs()
    {
        //
        $data = $this->FrontService->programs();
        return view('front.programs.programs' ,$data);
    }
    public function program($program)
    {
        $title = Str::replace('-', ' ', $program);
        $data = $this->FrontService->program($title);
        return view('front.programs.program' ,$data);
    }
    public function contact_submit(Request $request)
    {
        //


        try{

            $this->FrontService->contact_submit($request->all());
            return back()->with('thank-you','success');
        }catch(Exception $e)
        {
             return view('errors.404');
        }

    }
    public function theaters()
    {
        //
        $data = $this->FrontService->theaters();
        return view('front.theaters.theaters' ,$data);
    }
    public function theater($theater)
    {
        $title = Str::replace('-', ' ', $theater);
        $data = $this->FrontService->theater($title);
        return view('front.theaters.theater' ,$data);
    }
    public function newsletter(NewsletterRequest $request)
    {
        try{
            $this->FrontService->newsletter($request->all());
            return back()->with('thank-you','success');
        }catch(Exception $e)
        {
             return view('errors.404');
        }
    }
    public function booking(Request $request)
    {
        if($request->program != NULL)
        {
            $data = $this->FrontService->booking($request->all());
            return view('front.booking.booking',$data);
        }
    }
    public function get_events(Request $request)
    {
        return $this->FrontService->get_events($request->all());
    }
    public function get_time_frames(Request $request)
    {
        return $this->FrontService->get_time_frames($request->all());
    }
}
