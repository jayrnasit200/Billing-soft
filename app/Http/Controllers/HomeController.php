<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
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
        $des['totale_sell'] = DB::table('payment')->where('system', 'credit')->sum('amount');
        $des['totale_purchase'] = DB::table('payment')->where('system', 'debit')->sum('amount');
        $des['total_profit'] = $des['totale_sell']- $des['totale_purchase'];
        $des['total_Clients'] = DB::table('sell_client')->count();
        $des['current_sell'] = DB::table('payment')->whereYear('created_at', date('Y'))->where('system', 'credit')->sum('amount');
        $des['current_purchase'] = DB::table('payment')->whereYear('created_at', date('Y'))->where('system', 'debit')->sum('amount');
        $des['total_brand'] = DB::table('brand')->count();
        $des['total_product'] = DB::table('product')->count();

        // echo "<pre>";
        // print_r($des['total_product']);
        // exit;
        $des['title'] = 'Dashboard';
        return view('home')->with($des);
    }
}
