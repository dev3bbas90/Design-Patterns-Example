<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\GenerateColumns;
use Illuminate\Http\Request;
use App\Http\Services\DashboardService;

class HomeController extends Controller
{
    use GenerateColumns;

    private $DashboardService;
    private $theaterRepository;
    public function __construct(DashboardService $DashboardService)
    {
        $this->middleware('auth');
        $this->DashboardService=$DashboardService;
    }

    public function index()
    {
        $data = $this->DashboardService->all();
        return view('home',compact('data'));
    }
    public function get_columns(Request $request)
    {
        return json_encode($this->generate($request->rows));
    }
}
