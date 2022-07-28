<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BookingDataTable;
use App\Http\Controllers\Controller;
use App\Http\Resources\BookingResource;
use App\Http\Services\ReportService;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    private $reportService;
    public function __construct(ReportService $reportService)
    {
        $this->middleware('auth');
        $this->reportService = $reportService;
    }
    public function  booking(BookingDataTable $datatable)
    {

        return $datatable->render('admin.reports.booking');

        // $data = $this->reportService->booking($request->all());
        // $data  = BookingResource::collection($query);
        // return view('admin.reports.booking',compact('data'));
    }
}
