<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ProductController extends Controller
{
    public function index()
    {
        $product = DB::table('product')->get();
        // print_r($product);
        // exit;
        return view('product/list', ['title' => 'Product','product' => $product]);
    }

    //  public function delete()
    // {
    //     // print_r(request()->id);
    //     DB::table('brand')->where('id', request()->id)->delete();;
    //     // exit;
    //     return redirect('brand')->with('status', 'Brand Success Deleted');;
    // }
    public function create()
    {
        return view('product/create',['title' => 'Product Create']);
        
    }
    public function submit_create()
    {
        $this->validate(request(), [
            "Brand_name" => "required|unique:brand,name",
            "ststus" => "required",
        ]);
        DB::table('brand')->insert([
            'name' => request()->Brand_name,
            'ststus' => request()->ststus,
            ]);
        return redirect('brand')->with('status', 'Brand Success Created');;

    }
    // public function edit($id)
    // {
    //     $data = DB::table('brand')->where('id', request()->id)->first();
    //     // print_r($data);
    //     // exit;
    //     return view('Brand/edit',['title' => 'Brand Edit','data'=>$data]);
        
    // }
    // public function submit_update()
    // {
    //     // print_r(request()->all());
    //     // exit;
    //     $id =request()->id;
    //     $this->validate(request(), [
    //         "Brand_name" => "required|unique:brand,name,$id",
    //         "ststus" => "required",
    //     ]);
    //     DB::table('brand')->where('id', $id)->update([
    //         'name' => request()->Brand_name,
    //         'ststus' => request()->ststus,
    //         ]);
    //     return redirect('brand')->with('status', 'Brand update Created');;

    // }
}
