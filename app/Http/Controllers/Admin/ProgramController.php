<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\CastService;
use App\Http\Services\CastTypeService;
use App\Http\Services\ProgramCategoriesService;
use App\Http\Services\ProgramService;
use App\Models\Program;
use Illuminate\Http\Request;
use App\Http\Requests\ProgramsRequest;
use Exception;

class ProgramController extends Controller
{
    private  $programService;
    private  $castService;
    private  $castTypeService;
    private  $programCategoriesService;
    public function __construct(
        ProgramService $programService,
        CastService $castService,
        CastTypeService $castTypeService,
        ProgramCategoriesService $programCategoriesService
        )
    {

        // $programCategoriesService = $this->$programCategoriesService;
        $this->middleware('auth');
        $this->programService = $programService;
        $this->castService = $castService;
        $this->castTypeService = $castTypeService;
        $this->programCategoriesService = $programCategoriesService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           $programs=$this->programService->all();
           $casts = $this->castService->all();
           $cast_types = $this->castTypeService->all();
           $program_categories =$this->programCategoriesService->all();
        return view('admin.programs.index',compact('casts' ,'programs' ,'cast_types' ,'program_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cast_types = $this->castTypeService->all();
          $casts = $this->castService->all();
          $program_categories =$this->programCategoriesService->all();

        return view('admin.programs.create',compact('cast_types' ,'casts' ,'program_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProgramsRequest $request )
    {
          //
        try{
            $this->programService->store($request->all());
            return redirect(route('programs.index'))->with('added', ' added Successfully');
        }catch(Exception $e)
        {
             return view('errors.404');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function show(Program $program)
    {
            //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function edit(Program $program )
    {
        $cast_types = $this->castTypeService->all();
        $casts = $this->castService->all();
        $program_categories =$this->programCategoriesService->all();

           return view('admin.programs.edit',compact('program' ,'cast_types' ,'casts' ,'program_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function update(ProgramsRequest $request, Program $program)
    {
            try{
            $this->programService->update($program->id,$request->all());
            return redirect(route('programs.index'))->with('updated', ' updated Successfully');
        }catch(Exception $e)
            {
                 return view('errors.404');
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function destroy(Program $program)
    {
        dd($program->events->count() > 0);
           try{
                if($program->events->count() > 0){
                    return back()->with('alert', 'You cant delete a Program that has a Events');
                }else{
                    $this->programService->delete($program->id);
                    return redirect(route('programs.index'))->with('deleted', ' deleted Successfully');                }
                }catch(Exception $e)
                {
                     return view('errors.404');
                }
            }
}
