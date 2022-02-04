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
        $des['low_stock_products'] = DB::table('product')->where('product.quantity', '<=', sys_config('show_quantity')) ->join('brand', 'product.Brand', '=', 'brand.id')
        ->select('product.name','product.quantity','product.rate','product.Brand','brand.name as b_name','product.id',)->get();
        
        $chart = DB::table('payment')->selectRaw('year(created_at) as year, month(created_at) as month, sum(amount) as total_sale')
        ->groupBy('year','month')
        ->orderByRaw('min(created_at)')
        ->whereYear('created_at', date('Y'))
        ->get();
        $dataPoints =[];
        foreach($chart as $key=>$val){
            $dataPoints[$key] = array("x"=> $val->month, "y"=> $val->total_sale, "indexLabel"=>  $val->month.'/'.$val->year);
        }
        $des['chart']=$dataPoints;
        //   echo "<pre>";
        //         print_r($des['chart']);
                // exit;   
        $des['title'] = 'Dashboard';
        return view('home')->with($des);
    }
    public function setting()
    {
        $data['title']='Setting';
        return view('setting')->with($data);
    }
    public function setting_submit()
    {
        // echo "<pre>";
    	// print_r(Request()->all());
        // exit;
    	$this->validate(request(), [
            "site_name" => "required",
            "mobile" => "required",
            "GST" => "required",
            "Sell_biill_start" => "required|numeric",
            "bank_name" => "required",
            "bank_ac" => "required",
            "Bank_IFSC_Code" => "required",
            "Description1" => "required",
            "Description2" => "required",
            "show_quantity" => "required|numeric",
            "address" => "required",
        ]);

    	$data = array('site_name', 'mobile', 'GST', 'phoSell_biill_startne','bank_name','bank_ac','Bank_IFSC_Code','Description1','Description2','show_quantity','address');
		foreach ($data as $val) {
			DB::table('system_config')
				->where('option', $val)
				->update(['value' => request()->$val]);
		}
		return Redirect('setting')->with('status', 'Settings updated successfully.');
    }
}
