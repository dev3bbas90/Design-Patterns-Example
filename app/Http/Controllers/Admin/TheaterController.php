<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TheaterRequest;
use App\Http\Services\TheaterService;
use App\Models\Theater;
use Exception;
use Illuminate\Http\Request;

class TheaterController extends Controller
{
    private TheaterService $theaterService;

    public function __construct(TheaterService $theaterService)
    {
        $this->middleware('auth');
        $this->theaterService = $theaterService;
    }
    public function index()
    {
        $theaters = $this->theaterService->all();
        return view('admin.theaters.index',compact('theaters'));
    }


    public function create()
    {
        return view('admin.theaters.create');
    }


    public function store(TheaterRequest $request)
    {

        try{
            $this->theaterService->store($request->all());
            return redirect(route('theaters.index'))->with('added', ' added Successfully');
        }catch(Exception $e)
        {
             return view('errors.404');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Theater  $theater
     * @return \Illuminate\Http\Response
     */
    public function show(Theater $theater)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Theater  $theater
     * @return \Illuminate\Http\Response
     */
    public function edit(Theater $theater)
    {
        return view('admin.theaters.edit',compact('theater'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Theater  $theater
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Theater $theater)
    {
        try{
            $this->theaterService->update($theater->id,$request->all());
            return redirect(route('theaters.index'))->with('updated', ' Updated Successfully');

        }catch(Exception $e)
        {
             return view('errors.404');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Theater  $theater
     * @return \Illuminate\Http\Response
     */
    public function destroy(Theater $theater)
    {
        try{
            $this->theaterService->delete($theater->id);
            return redirect(route('theaters.index'))->with('deleted', ' deleted Successfully');
        }catch(Exception $e)
        {
             return view('errors.404');
        }
    }
}
