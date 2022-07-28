<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Http\Services\UserService;
use Exception;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $userService;
    public function __construct(UserService $userService)
    {
        $this->middleware('auth');
        $this->userService = $userService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userService->all();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $inputs = $request->all();
        $inputs['password']=Hash::make($inputs['password']);
        try{
            $this->userService->store($inputs);
            return redirect(route('users.index'))->with('added', ' added Successfully');
        }catch(Exception $e)
        {
             return view('errors.404');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.users.view',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {

        $inputs = $request->all();
        if($inputs['password']){
            $inputs['password']=Hash::make($inputs['password']);
        }
        try{
            $this->userService->update($user->id,$inputs);
            return redirect(route('users.index'))->with('updated', ' Updated Successfully');
        }catch(Exception $e)
        {
             return view('errors.404');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        try{
            $this->userService->delete($user->id);
            return redirect(route('users.index'))->with('deleted', ' Updated Successfully');
        }catch(Exception $e)
        {
             return view('errors.404');
        }
    }
}
