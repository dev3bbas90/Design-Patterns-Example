<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\CastService;
use App\Http\Services\CastTypeService;
use Illuminate\Http\Request;
use App\Http\Requests\CastRequest;
use App\Models\Cast;
use Exception;
class CastController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $castService;

    public function __construct(
       CastService $castService,
       CastTypeService $CastTypeService)
    {
        $this->middleware('auth');
        $this->castService = $castService;
        $this->CastTypeService = $CastTypeService;


    }
    public function index()
    {


        $casts = $this->castService->all();
        return view('admin.cast.index',compact('casts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $castsType = $this->CastTypeService->all();
        return view('admin.cast.create',compact('castsType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CastRequest $request)
    {
        //
        try{
            $this->castService->store($request->all());
            return  redirect(route('casts.index'))->with('added', ' added Successfully');

        }catch(Exception $e)
        {
             return view('errors.404');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cast $cast)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cast $cast)
    {
        //
        $castsType = $this->CastTypeService->all();

        return view('admin.cast.edit',compact('cast' ,'castsType'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CastRequest $request, Cast $cast)
    {
        //
        try{
            $this->castService->update($cast->id,$request->all());
            return  redirect(route('casts.index'))->with('updated', ' updated Successfully');


        }catch(Exception $e)
        {
             return view('errors.404');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cast $cast)
    {
        //
        try{
            $this->castService->delete($cast->id);
            return   redirect(route('casts.index'))->with('deleted', ' deleted Successfully');
        }catch(Exception $e)
        {
             return view('errors.404');
        }
    }

}
