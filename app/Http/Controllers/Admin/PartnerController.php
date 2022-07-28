<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\PartnersRequest;
use App\Models\Partner;
use App\Http\Services\PartnersService;
use Illuminate\Http\Request;
use Exception ;
class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $PartnersService;

    public function __construct(PartnersService $PartnersService)

    {
        $this->middleware('auth');
        $this->PartnersService = $PartnersService;

    }
    public function index()
    {
        //
        $partners = $this->PartnersService->all();
        return view('admin.partners.index',compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.partners.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PartnersRequest $request)
    {
        //
        try{
            $this->PartnersService->store($request->all());
            return redirect(route('partners.index'))->with('added', ' added Successfully');

        }catch(Exception $e)
        {
             return view('errors.404');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner $partner)
    {
        //
        return view('admin.partners.edit',compact('partner'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(PartnersRequest $request, Partner $partner)
    {
        //
        try{
            $this->PartnersService->update($partner->id,$request->all());
            return redirect(route('partners.index'))->with('updated', ' updated Successfully');
        }catch(Exception $e)
        {
             return view('errors.404');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner)
    {
        //
        try{
            $this->PartnersService->delete($partner->id);
            return redirect(route('partners.index'))->with('deleted', ' deleted Successfully');
        }catch(Exception $e)
        {
             return view('errors.404');
        }
    }
}
