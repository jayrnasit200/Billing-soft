<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AddBillsController extends Controller
{
    public function index()
    {
        $product['product'] = DB::table('product')
        ->join('brand', 'product.Brand', '=', 'brand.id')
        ->select('product.id','product.name','product.quantity','product.MRP','product.HSN','product.rate','product.GST','product.ststus','brand.name as Brand')
        ->get();
        // print_r($product['product']);
        // exit;
        $product['title'] = 'Bill';
        return view('bills/list')->with($product);
    }

    //  public function delete()
    // {
    //     // print_r(request()->id);
    //     DB::table('product')->where('id', request()->id)->delete();;
    //     // exit;
    //     return redirect('product')->with('status', 'Product Success Deleted');;
    // }
    public function create()
    {
        return view('bills/create',['title' => 'Bill Create']);
        
    }
    public function submit_create()
    {
    //    print_r(request()->all());
    //    exit;
        $this->validate(request(), [
            "bil_no" => "required|unique:add_bill,bill_no",
            "c_name" => "required",
            "bill_date" => "required|date_format:Y-m-d",
            "bill_amount" => "required|numeric|min:0",
            "bill_gst" => "required",
            "ststus" => "required",
        ]);
        $payment_id = DB::table('payment')->insertGetId([
                'amount' => request()->bill_amount,
                'system' => 'credit',
                'Payment_ststus' => request()->ststus,
                'created_at' => current_date_time(),
                'updated_at' => current_date_time(),
                ]);
            echo $payment_id;
        DB::table('add_bill')->insert([
            'client_name' => request()->c_name,
            'bill_no' => request()->bil_no,
            'bill_gst' => request()->bill_gst,
            'bill_date' => request()->bill_date,
            'payment_id' => $payment_id,
            'created_at' => current_date_time(),
            'updated_at' => current_date_time(),
            ]);
        return redirect('bill')->with('status', 'Bills Success Created');;

    }
    // public function edit($id)
    // {
    //     $data = DB::table('product')->where('id', request()->id)->first();
    //     // print_r($data);
    //     // exit;
    //     return view('product/edit',['title' => 'Brand Edit','data'=>$data]);
        
    // }
    // public function submit_update()
    // {
    //     // print_r(request()->all());
    //     // exit;
    //     $id =request()->id;
    //     $this->validate(request(), [
    //         "name" => "required|unique:brand,name,$id",
    //         "brand" => "required",
    //         "qty" => "required|numeric|min:0",
    //         "mrp" => "required|numeric|min:0",
    //         // "hsm" => "required",
    //         "rate" => "required|numeric|min:0",
    //         "gst" => "required",
    //         "ststus" => "required",
    //     ]);
    //     DB::table('product')->where('id', $id)->update([
    //             'name' => request()->name,
    //             'Brand' => request()->brand,
    //             'quantity' => request()->qty,
    //             'MRP' => request()->mrp,
    //             'rate' => request()->rate,
    //             'GST' => request()->gst,
    //             'HSN' => request()->hsm,
    //             'ststus' => request()->ststus,
    //             ]);
    //     return redirect('product')->with('status', 'Product update Created');;

    // }
}
