<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $payment_methods = \DB::table('sales_data')->distinct()->pluck('payment_method')->toArray();
        $payment_statuses = \DB::table('sales_data')->distinct()->pluck('payment_status')->toArray();
        $taken_bys = \DB::table('sales_data')->distinct()->pluck('taken_by')->toArray();
        return view('report.index',compact('payment_methods','payment_statuses','taken_bys'));
    }
}

