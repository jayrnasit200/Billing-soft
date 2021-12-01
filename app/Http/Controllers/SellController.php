<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; 

class SellController extends Controller
{
    public function index()
    {
        $bills['bills'] = DB::table('add_bill')
        ->join('payment', 'add_bill.payment_id', '=', 'payment.id')
        ->select('add_bill.id','add_bill.client_name','add_bill.bill_no','add_bill.bill_date','add_bill.bill_gst','payment.amount','payment.Payment_ststus','add_bill.created_at')
        ->get();
        // echo "<pre>";
        // print_r($bills['bills']);
        // exit;
        $bills['title'] = 'Sell';
        return view('sell/list')->with($bills);
    }

    //  public function delete()
    // {
    //     // print_r(request()->id);
    //     $data = DB::table('add_bill')->where('id', request()->id)->first();
    //     // print_r($data->payment_id);
    //     // exit;
    //     DB::table('payment')->where('id', $data->payment_id)->delete();
    //     DB::table('add_bill')->where('id', request()->id)->delete();
    //     // exit;
    //     return redirect('bill')->with('status', 'bill Success Deleted');;
    // }
    public function create()
    {
        return view('sell/create',['title' => 'Sell Create']);
        
    }
    // public function submit_create()
    // {
    // //    print_r(request()->all());
    // //    exit;
    //     $this->validate(request(), [
    //         "bil_no" => "required|unique:add_bill,bill_no",
    //         "c_name" => "required",
    //         "bill_date" => "required|date_format:Y-m-d",
    //         "bill_amount" => "required|numeric|min:0",
    //         "bill_gst" => "required",
    //         "ststus" => "required",
    //     ]);
    //     $payment_id = DB::table('payment')->insertGetId([
    //             'amount' => request()->bill_amount,
    //             'system' => 'credit',
    //             'Payment_ststus' => request()->ststus,
    //             'created_at' => current_date_time(),
    //             'updated_at' => current_date_time(),
    //             ]);
    //         echo $payment_id;
    //     DB::table('add_bill')->insert([
    //         'client_name' => request()->c_name,
    //         'bill_no' => request()->bil_no,
    //         'bill_gst' => request()->bill_gst,
    //         'bill_date' => request()->bill_date,
    //         'payment_id' => $payment_id,
    //         'created_at' => current_date_time(),
    //         'updated_at' => current_date_time(),
    //         ]);
    //     return redirect('bill')->with('status', 'Bills Success Created');;

    // }
    // public function edit($id)
    // {
    //     $bills['title'] = 'Brand Edit';
    //     $bills['data'] =DB::table('add_bill')->where('add_bill.id', request()->id)
    //     ->join('payment', 'add_bill.payment_id', '=', 'payment.id')
    //     ->select('add_bill.id','add_bill.client_name','add_bill.bill_no','add_bill.bill_date','add_bill.bill_gst','add_bill.payment_id','payment.amount','payment.Payment_ststus','add_bill.created_at')
    //     ->first();
    //     // print_r($bills['data']);
    //     // exit;
    //     return view('bills/edit')->with($bills);
        
    // }
    // public function submit_update()
    // {
    //     // print_r(request()->all());
    //     // exit;
    //     $id =request()->id;
    //     $this->validate(request(), [
    //         "bil_no" => "required|unique:add_bill,bill_no,$id",
    //         "c_name" => "required",
    //         "bill_date" => "required|date_format:Y-m-d",
    //         "bill_amount" => "required|numeric|min:0",
    //         "bill_gst" => "required",
    //         "ststus" => "required",
    //     ]);
    //     DB::table('payment')->where('id', request()->paym_id)->update([
    //             'amount' => request()->bill_amount,
    //             'system' => 'credit',
    //             'Payment_ststus' => request()->ststus,
    //             'created_at' => current_date_time(),
    //             'updated_at' => current_date_time(),
    //             ]);
    //     DB::table('add_bill')->where('id', $id)->update([
    //         'client_name' => request()->c_name,
    //         'bill_no' => request()->bil_no,
    //         'bill_gst' => request()->bill_gst,
    //         'bill_date' => request()->bill_date,
    //         'created_at' => current_date_time(),
    //         'updated_at' => current_date_time(),
    //         ]);
    //     return redirect('bill')->with('status', 'Bill updated');;

    // }
    public function getproductdata()
    {
        $data = DB::table('product')->where('id', request()->productId)->select('id','name','quantity','MRP','rate','GST')->first();
        // print_r(json_encode($data)); 
        return response()->json($data);

    }
    public function getallproductdata()
    {
        $data = DB::table('product')->select('id','name','quantity','MRP','rate','GST')->get();
        // print_r(json_encode($data)); 
        return response()->json($data);

    }
}
