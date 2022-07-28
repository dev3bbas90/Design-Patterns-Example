<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Http\Services\EventService;
use App\Http\Services\HallService;
use App\Http\Services\ProgramService;
use App\Http\Services\TheaterService;
use App\Models\Event;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    private $eventService;
    private $programService;
    private $hallService;
    private $theaterService;
    public function __construct(
        EventService   $eventService,
        HallService    $hallService,
        ProgramService $programService,
        TheaterService $theaterService

        )
    {
        $this->middleware('auth');
        $this->eventService = $eventService;
        $this->hallService = $hallService;
        $this->programService = $programService;
        $this->theaterService = $theaterService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->theater_id){
            $events = $this->eventService->get(['theater_id'=>$request->theater_id]);
        }elseif($request->hall_id){
            $events = $this->eventService->get(['hall_id'=>$request->hall_id]);
        }elseif($request->program_id){
            $events = $this->eventService->get(['program_id'=>$request->program_id]);
        }else{
            $events = $this->eventService->all();
        }
        
        return view('admin.events.index',compact('events'));
    }
    public function get($theater_id =null)
    {
        if($theater_id)
        {
            return $this->eventService->get(['theater_id'=>$theater_id]);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function create()
    {
         $halls    = $this->hallService->all();
         $programs = $this->programService->all();
         $theaters = $this->theaterService->all();
         return view('admin.events.create',compact('halls','programs','theaters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {
        DB::beginTransaction();
        try{
            $this->eventService->store($request->all());
            DB::commit();
            return redirect(route('events.index'))->with('added', ' added Successfully');

        }catch(Exception $e)
        {
            DB::rollback();
             return view('errors.404');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $halls    = $this->hallService->all();
        $programs = $this->programService->all();
        $theaters = $this->theaterService->all();
        return view('admin.events.edit',compact('event','halls','programs','theaters'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(EventRequest $request, Event $event)
    {
        try{
            $this->eventService->update($event->id,$request->all());
            return redirect(route('events.index'))->with('updated', ' updated Successfully');
        }catch(Exception $e){
             return view('errors.404');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
         try{
            $this->eventService->delete($event->id);
            return redirect(route('events.index'))->with('deleted', ' deleted Successfully');
        }catch(Exception $e)
        {
             return view('errors.404');
        }
    }
}
