<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    function index()
    {
        // $brand = Brand::find($id);
        $all_brand_name = Brand::all();
        return view('admin.brand.index', compact('all_brand_name'));
    }

    function store(Request $request)
    {
        // dd($request);
        Brand::insert([
            'brand_name' => $request->brand_name,
        ]);
        $notification = array(
            'message' => 'Brand Name Add Sucessfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('brandName')->with($notification);
    }

    function edit($id)
    {
        // dd($request);
        $brand = Brand::find($id);
        return view('admin.brand.edit', compact('brand'));
    }

    function update(Request $request)
    {
        // return $request;
        Brand::find($request->id)->update([
            'brand_name' => $request->brand_name,
        ]);
        $notification = array(
            'message' => 'Brand Name Update Sucessfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('brandName')->with($notification);
    }

    public function destroy($id)
    {
        // echo $user_id;
        Brand::find($id)->delete();
        return response()->json(['success' => 'Delete sucessfull']);
    }
}
