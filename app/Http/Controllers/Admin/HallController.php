<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HallRequest;
use App\Http\Services\CategoryService;
use App\Http\Services\HallService;
use App\Http\Services\TheaterService;
use App\Models\Hall;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HallController extends Controller
{
    private $hallService ;
    private $theaterService ;
    private $categoryService ;
    public function __construct(
        HallService $hallService,
        TheaterService $theaterService,
        CategoryService $categoryService
        )
    {
        $this->middleware('auth');
        $this->hallService = $hallService;
        $this->theaterService  = $theaterService;
        $this->categoryService = $categoryService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->theater_id)
        {
            $halls = $this->hallService->get(['theater_id'=>$request->theater_id]);
        }
        else
        {
            $halls = $this->hallService->all();
        }
        return view('admin.halls.index',compact('halls'));
    }
    public function get($theater_id =null)
    {
        if($theater_id)
        {
            return $this->hallService->get(['theater_id'=>$theater_id]);
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $theaters = $this->theaterService->all();
        $categories = $this->categoryService->all();
        return view('admin.halls.create',compact('categories','theaters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HallRequest $request)
    {
        DB::beginTransaction();
           try{
            $this->hallService->store($request->all());
            DB::commit();
            return 'success';
        }catch(Exception $e)
        {
            DB::rollback();
             return view('errors.404');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hall  $hall
     * @return \Illuminate\Http\Response
     */
    public function show(Hall $hall)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hall  $hall
     * @return \Illuminate\Http\Response
     */
    public function edit(Hall $hall)
    {
        $data = $this->hallService->edit($hall);
        return view('admin.halls.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hall  $hall
     * @return \Illuminate\Http\Response
     */
    public function update(HallRequest $request, Hall $hall)
    {
         try{
            $this->hallService->update($hall->id,$request->all());
            return redirect(route('halls.index'))->with('updated', ' updated Successfully');

        }catch(Exception $e)
        {
             return view('errors.404');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hall  $hall
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hall $hall)
    {
           try{
            $this->hallService->delete($hall->id);
            return redirect(route('halls.index'))->with('deleted', ' deleted Successfully');
        }catch(Exception $e)
        {
             return view('errors.404');
        }
    }
}
