<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CastTypeRequest;
use App\Http\Services\CastTypeService;
use App\Models\CastType;
use Exception;
use Illuminate\Http\Request;

class CastTypeController extends Controller
{
    private CastTypeService $CastTypeService;

    public function __construct(CastTypeService $CastTypeService)
    {
        $this->middleware('auth');
        $this->CastTypeService = $CastTypeService;
    }

    public function index()
    {
        $castsType = $this->CastTypeService->all();
        return view('admin.cast_types.index',compact('castsType'));

    }

    public function create()
    {
        return view('admin.cast_types.create');
    }

    public function store(CastTypeRequest $request)
    {
        try{
            $this->CastTypeService->store($request->all());
            return  redirect(route('casts-type.index'))->with('added', ' added Successfully');
        }catch(Exception $e)
        {
            return $e;
             return view('errors.404');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CastType $castsType)
    {
        //
        return view('admin.cast_types.edit',compact('castsType'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CastTypeRequest $request, CastType $castsType)
    {
        //
        try{
            $this->CastTypeService->update($castsType->id,$request->all());
            return  redirect(route('casts-type.index'))->with('updated', ' updated Successfully');
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
    public function destroy(CastType $castsType)
    {
        //
        dd($castsType->casts->count() > 0);

        try{
            if($castsType->casts->count() > 0){
                return back()->with('alert', 'You cant delete a Cast Type that has a Cast');
            }else{
                $this->CastTypeService->delete($castsType->id);
                return  redirect(route('casts-type.index'))->with('deleted', ' deleted Successfully');
            }
        }catch(Exception $e)
        {
             return view('errors.404');
        }


    }
}
