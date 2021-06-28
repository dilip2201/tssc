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
        $payment_methods = \DB::table('sales_data')->whereNotnull('payment_method')->distinct()->pluck('payment_method')->toArray();
        $payment_statuses = \DB::table('sales_data')->whereNotnull('payment_status')->distinct()->pluck('payment_status')->toArray();
        $taken_bys = \DB::table('sales_data')->whereNotnull('taken_by')->distinct()->pluck('taken_by')->toArray();
        $companies = \DB::table('sales_data')->whereNotnull('company')->distinct()->pluck('company')->toArray();
        $shippings = \DB::table('sales_data')->whereNotnull('shipping')->distinct()->pluck('shipping')->toArray();
        $b_citys = \DB::table('sales_data')->whereNotnull('b_city')->distinct()->pluck('b_city')->toArray();
        $skus = \DB::table('sales_data')->whereNotnull('skus')->distinct()->pluck('skus')->toArray();
        $main_industries = \DB::table('sales_data')->whereNotnull('main_industry')->distinct()->pluck('main_industry')->toArray();
        $sub_industries = \DB::table('sales_data')->whereNotnull('sub_industry')->distinct()->pluck('sub_industry')->toArray();
        $types = \DB::table('sales_data')->whereNotnull('type')->distinct()->pluck('type')->toArray();

        return view('report.index',compact('payment_methods','payment_statuses','taken_bys','companies','shippings','b_citys','skus','main_industries','sub_industries','types'));
    }
}

