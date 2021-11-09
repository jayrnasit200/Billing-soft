<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = DB::table('brand')->get();
        // print_r($brands);
        // exit;
        return view('Brand/list', ['title' => 'Brand','brands' => $brands]);
    }

     public function delete()
    {
        // print_r(request()->id);
        DB::table('brand')->where('id', request()->id)->delete();;
        // exit;
        return redirect('brand')->with('status', 'Brand Success Deleted');;
    }
    public function create()
    {
        return view('Brand/create',['title' => 'Brand Create']);
        
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
            'created_at' => current_date_time(),
            'updated_at' => current_date_time(),
            ]);
        return redirect('brand')->with('status', 'Brand Success Created');;

    }
    public function edit($id)
    {
        $data = DB::table('brand')->where('id', request()->id)->first();
        // print_r($data);
        // exit;
        return view('Brand/edit',['title' => 'Brand Edit','data'=>$data]);
        
    }
    public function submit_update()
    {
        // print_r(request()->all());
        // exit;
        $id =request()->id;
        $this->validate(request(), [
            "Brand_name" => "required|unique:brand,name,$id",
            "ststus" => "required",
        ]);
        DB::table('brand')->where('id', $id)->update([
            'name' => request()->Brand_name,
            'ststus' => request()->ststus,
            'updated_at' => current_date_time(),
            ]);
        return redirect('brand')->with('status', 'Brand update Created');;

    }
}
