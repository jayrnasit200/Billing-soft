<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; 
use App\Rules\CheckSelProductlRule;
 
class SellController extends Controller
{
    public function index()
    {
        $sell['sell'] = DB::table('sell')
        ->join('sell_client', 'sell.client_id', '=', 'sell_client.id')
        ->select('sell.id','sell_client.client_name','sell.totel_amount','sell.bill_date','sell.Payment_status','sell.created_at')
        ->get();
        // echo "<pre>";
        // print_r($sell['sell']);
        // exit;
        $sell['title'] = 'Sell';
        return view('sell/list')->with($sell);
    }
    public function invoice($id)
    {
        $sell['sell'] = DB::table('sell')
        ->join('sell_client', 'sell.client_id', '=', 'sell_client.id')
        ->select('sell.id','sell_client.client_name','sell.totel_amount','sell.bill_date','sell.Payment_status','sell.created_at')
        ->get();
        // echo "<pre>";
        // print_r($sell['sell']);
        // exit;
        $sell['title'] = 'Sell';
        return view('sell/invoice')->with($sell); 
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
    public function submit_create()
    {
    //     echo "<pre>";
    //    print_r(request()->all());
    //    exit;
       
        $this->validate(request(), [
            "Client_name" => "required_if:Select_client,==,old_Client",
            "new_c_name" => "required_if:Select_client,==,new_Client",
            "client_contact" => "required_if:Select_client,==,new_Client",
            "client_gst" => "required_if:Select_client,==,new_Client",
            "client_addres" => "required_if:Select_client,==,new_Client",
            'productName.*' => [ "required",
                new CheckSelProductlRule()
            ]
        ],[
            'productName.*.required' => 'The product field is required',
        ]);
        // print_r(request()->Select_client);
        if(request()->Select_client == "new_Client"){
            // new
            $clinent_id = DB::table('sell_client')->insertGetId([
                            'client_name' => request()->new_c_name,
                            'client_Contact' => request()->client_contact,
                            'client_address' => request()->client_addres,
                            'client_gst_no' => request()->client_gst,
                            'created_at' => current_date_time(),
                            'updated_at' => current_date_time(),
                            ]);
            // $clinent_id= "1" ;
        }else{
            $clinent_id=request()->Client_name;
        }
        $payempt_id = DB::table('payment')->insertGetId([
            'amount' => request()->totalAmount,
            'system' => "credit",
            'Payment_ststus' => "available",
            'created_at' => current_date_time(),
            'updated_at' => current_date_time(),
            ]);
        // $payempt_id= "3" ;
            
        $sell_id = DB::table('sell')->insertGetId([
            'client_id' => $clinent_id,
            'bill_date' => request()->sell_date,
            'payment_id' => $payempt_id,
            'sum_amount' => request()->subTotal,
            'Gst_Total' => request()->gstTotal,
            'Paid_amount' => request()->paid,
            'Due_Total' => request()->due,
            'totel_amount' => request()->totalAmount,
            'Payment_type' => request()->paymentType,
            'Payment_status' => request()->paymentStatus,
            'created_at' => current_date_time(),
            'updated_at' => current_date_time(),
            ]);
        // $sell_id= "2" ;

        foreach(request()->productName as $x => $val){
             DB::table('sell_products')->insert([
            'sell_id' =>  $sell_id,
            'product_id' => $val,
            'totel_gst' => request()->gst[$x],
            'totel_amount' => request()->total[$x],
            'quantity' => request()->quantity[$x],
            'created_at' => current_date_time(),
            'updated_at' => current_date_time(),
            ]);
        }
        return redirect('sell')->with('status', 'Selling Bill Success Created');

    }
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
