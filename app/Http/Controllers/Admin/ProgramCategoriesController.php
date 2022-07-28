<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProgramCategoriesRequest;
use App\Http\Services\ProgramCategoriesService;
use App\Models\ProgramCategory;
use Exception;

class ProgramCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private ProgramCategoriesService $ProgramCategoriesService;
    public function __construct(ProgramCategoriesService $ProgramCategoriesService)
    {
        $this->middleware('auth');
        $this->ProgramCategoriesService = $ProgramCategoriesService;
    }

    public function index()
    {
        //
        $programCategories = $this->ProgramCategoriesService->all();
        return view('admin.program_categories.index',compact('programCategories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.program_categories.create');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProgramCategoriesRequest $request)
    {
        //
        try{
            $this->ProgramCategoriesService->store($request->all());
            return redirect(route('program-category.index'))->with('added', ' added Successfully');
        }catch(Exception $e)
        {
            // return $e;
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
    public function edit(ProgramCategory $programCategory)
    {
        //
        return view('admin.program_categories.edit' ,compact('programCategory'));



    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProgramCategoriesRequest $request, ProgramCategory $programCategory)
    {
        //

        try{
            $this->ProgramCategoriesService->update($programCategory->id,$request->all());
            return redirect(route('program-category.index'))->with('updated', ' updated Successfully');
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
    public function destroy(ProgramCategory $programCategory)
    {
        try{
            if($programCategory->is_deletable()){
                $this->ProgramCategoriesService->delete($programCategory->id);
                return redirect(route('program-category.index'))->with('deleted', ' deleted Successfully');
            }else{
                return back()->with('alert', 'You cant delete a Category that has a Programs');
            }
        }catch(Exception $e)
        {
             return view('errors.404');
        }
    }
}
