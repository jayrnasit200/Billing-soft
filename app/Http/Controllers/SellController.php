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
        $sell['sell'] = DB::table('sell')->where('sell.id', $id)
        ->join('sell_client', 'sell.client_id', '=', 'sell_client.id')
        ->select('sell.id','sell_client.client_name','sell_client.client_Contact','sell_client.client_address','sell_client.client_gst_no','sell.totel_amount','sell.sum_amount','sell.Gst_Total','sell.bill_date','sell.Payment_status','sell.Payment_type','sell.created_at')
        ->get()->first();

        $sell['product'] = DB::table('sell_products')->where('sell_products.sell_id', $id)
        ->join('product', 'sell_products.product_id', '=', 'product.id')
        ->select('sell_products.id','sell_products.totel_gst','sell_products.totel_amount','sell_products.quantity','product.name','product.HSN','product.rate')
        ->get();

        // echo "<pre>";
        // print_r($sell['product']);
        // exit;
        $sell['title'] = 'Sell';
        return view('sell/invoice')->with($sell); 
    }
     public function delete()
    {
        $id = request()->id;
        $sell = DB::table('sell')->where('id', $id)->get()->first();
        print_r($sell);
        DB::table('payment')->where('id', $sell->payment_id)->delete();
        $sell_productslist = DB::table('sell_products')->where('sell_id', $id)->get();
        foreach($sell_productslist as $x => $val){
            
           DB::table('sell_products')->where('id', $val->id)->delete();
           $pro_qt=DB::table('product')->where('id', $val->product_id)->first();
           $new_qty = $pro_qt->quantity + $val->quantity;
           $pro_qt=DB::table('product')->where('id', $val->product_id)->update([
                           'quantity' => $new_qty,
                           ]);
       }
        DB::table('sell')->where('id', $id)->delete();
        return redirect('bill')->with('status', 'Sell Success Deleted');;
    }
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
            $pro_qt=DB::table('product')->where('id', $val)->first();
            $new_qty = $pro_qt->quantity - request()->quantity[$x];
            $pro_qt=DB::table('product')->where('id', $val)->update([
                            'quantity' => $new_qty,
                            ]);
        }
        return redirect('sell')->with('status', 'Selling Bill Success Created');

    }
    public function edit($id)
    {
        $sell['title'] = 'Sell Edit';
        $sell['sell'] = DB::table('sell')->where('sell.id', $id)
        ->select('id','client_id','totel_amount','sum_amount','Gst_Total','bill_date','Payment_status','Paid_amount','Due_Total','Payment_type','payment_id','created_at')
        ->get()->first();

        $sell['product'] = DB::table('sell_products')->where('sell_products.sell_id', $id)
        ->join('product', 'sell_products.product_id', '=', 'product.id')
        ->select('sell_products.id','sell_products.product_id','sell_products.totel_gst','sell_products.totel_amount','sell_products.quantity','product.name','product.HSN','product.rate')
        ->get();
        // echo '<pre>';
        // print_r($sell['sell']);
        // exit;
        return view('sell/edit')->with($sell);
        
    }
    public function submit_update()
    {
        // print_r(request()->all());
        // exit;
        $sell_id =request()->id;
        $this->validate(request(), [
            "Client_name" => "required_if:Select_client,==,old_Client",
            "new_c_name" => "required_if:Select_client,==,new_Client",
            "client_contact" => "required_if:Select_client,==,new_Client",
            "client_gst" => "required_if:Select_client,==,new_Client",
            "client_addres" => "required_if:Select_client,==,new_Client",
            // 'productName.*' => [ "required",
            //     new CheckSelProductlRule()
            // ]
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
        DB::table('payment')->where('id', request()->payment_id)->delete();
        $payempt_id = DB::table('payment')->insertGetId([
            'amount' => request()->totalAmount,
            'system' => "credit",
            'Payment_ststus' => "available",
            'created_at' => current_date_time(),
            'updated_at' => current_date_time(),
            ]);
        // $payempt_id= "3" ;
            
        DB::table('sell')->where('id', $sell_id)->update([
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
        DB::table('sell_products')->where('sell_id', $sell_id)->delete();
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
        return redirect('sell')->with('status', 'Selling Bill Success updateed');


    }
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
