<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ReportController extends Controller
{
    public function index()
    {
        $report['title'] = 'Report';
        return view('report/report')->with($report);
    }
    public function report_get()
    {
        $this->validate(request(), [
            "start_date" => 'required|date|before:end_date',
            "end_date" => 'required|date|after:start_date',
        ]);
        $from  =$report['from'] = request()->start_date;
        $to = $report['to'] =  request()->end_date;
        
        $report['bill'] = DB::table('add_bill')->whereBetween('add_bill.bill_date', [$from, $to])->join('payment', 'add_bill.payment_id', '=', 'payment.id')->get();
        $report['sell'] = DB::table('sell')->whereBetween('sell.bill_date', [$from, $to])->join('sell_client', 'sell.client_id', '=', 'sell_client.id')->get();
        // echo "<pre>";
        // print_r($bill);
        // print_r($report['bill']);
        // exit;
        $report['title'] = 'Report';
        return view('report/report_dataview')->with($report);
    }
}
