<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HallTimeFrameRequest;
use App\Http\Services\HallTimeFrameService;
use App\Models\HallTimeFrame;
use App\Repositories\TheaterRepositoryInterface;
use Exception;
use Illuminate\Http\Request;

class HallTimeFrameController extends Controller
{
    private $hallTimeFrameService;
    private $theaterRepository;
    public function __construct(HallTimeFrameService $hallTimeFrameService,TheaterRepositoryInterface $theaterRepository)
    {
        $this->middleware('auth');
        $this->hallTimeFrameService=$hallTimeFrameService;
        $this->theaterRepository=$theaterRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->hall_id)
        {
            $time_frames = $this->hallTimeFrameService->get(['hall_id'=>$request->hall_id]);

        }
        else
        {
            $time_frames = $this->hallTimeFrameService->all();
        }
        return view('admin.time_frames.index',compact('time_frames'));
    }
    public function get($hall_id =null)
    {
        if($hall_id)
        {
            return $this->hallTimeFrameService->get(['hall_id'=>$hall_id]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function create()
    {
        $theaters = $this->theaterRepository->all();
          return view('admin.time_frames.create',compact('theaters'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HallTimeFrameRequest $request)
    {
        try{
            $this->hallTimeFrameService->store($request->all());
           return  redirect(route('hall_time_frames.index'))->with('added', ' added Successfully');
        }catch(Exception $e)
        {
             return view('errors.404');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HallTimeFrame  $hallTimeFrame
     * @return \Illuminate\Http\Response
     */
    public function show(HallTimeFrame $hallTimeFrame)
    {
           return view('admin.time_frame.view',compact('hallTimeFrame'));
    }
    public function get_data(Request $request)
    {
        return $this->hallTimeFrameService->get($request->all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HallTimeFrame  $hallTimeFrame
     * @return \Illuminate\Http\Response
     */
    public function edit(HallTimeFrame $hallTimeFrame)
    {
        $theaters = $this->theaterRepository->all();
        return view('admin.time_frames.edit',compact('hallTimeFrame','theaters'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HallTimeFrame  $hallTimeFrame
     * @return \Illuminate\Http\Response
     */
    public function update(HallTimeFrameRequest $request, HallTimeFrame $hallTimeFrame)
    {
          $inputs = $request->all();
        try{
            $this->hallTimeFrameService->update($hallTimeFrame->id,$inputs);
            return redirect(route('hall_time_frames.index'))->with('updated', ' updated Successfully');
        }catch(Exception $e)
        {
             return view('errors.404');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HallTimeFrame  $hallTimeFrame
     * @return \Illuminate\Http\Response
     */
    public function destroy(HallTimeFrame $hallTimeFrame)
    {
          try{
            $this->hallTimeFrameService->delete($hallTimeFrame->id);
            return redirect(route('hall_time_frames.index'))->with('deleted', ' deleted Successfully');
        }catch(Exception $e)
        {
             return view('errors.404');
        }
    }
}
