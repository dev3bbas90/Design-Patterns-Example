<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Requests\SliderRequest;
use App\Http\Services\SliderService;
use Exception ;
class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $SliderService;

    public function __construct(SliderService $SliderService)

    {
        $this->middleware('auth');
        $this->SliderService = $SliderService;

    }
    public function index()
    {
        //
        $sliders = $this->SliderService->all();
        return view('admin.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.slider.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderRequest $request)
    {
        //
        try{
            $this->SliderService->store($request->all());
            return redirect(route('slider.index'))->with('added', ' added Successfully');

        }catch(Exception $e)
        {
             return view('errors.404');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        //
        return view('admin.slider.edit',compact('slider'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(SliderRequest $request, Slider $slider)
    {
        //
        try{
            $this->SliderService->update($slider->id,$request->all());
            return redirect(route('slider.index'))->with('updated', ' Updated Successfully');
        }catch(Exception $e)
        {
             return view('errors.404');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        //
        try{
            $this->PartnerSliderServicesService->delete($slider->id);
            return redirect(route('slider.index'))->with('deleted', ' deleted Successfully');
        }catch(Exception $e)
        {
             return view('errors.404');
        }
    }
    }
