<?php

namespace App\Http\Controllers;

use App\Models\LekraBrand;
use Illuminate\Http\Request;

class LekraBrandController extends Controller
{
    //
    function index()
    {
        // $lekra_brand = lekra_brand::find($id);
        $all_lekra_brand_name = LekraBrand::all();
        return view('admin.lekra-brand.index', compact('all_lekra_brand_name'));
    }

    function store(Request $request)
    {
        // dd($request);
        LekraBrand::insert([
            'lekra_brand_name' => $request->lekra_brand_name,
        ]);
        $notification = array(
            'message' => 'Lekra Brand Name Add Sucessfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('lekraBrandName')->with($notification);
    }


    function update(Request $request)
    {
        // return $request;
        LekraBrand::find($request->id)->update([
            'lekra_brand_name' => $request->lekra_brand_name,
        ]);
        $notification = array(
            'message' => 'Lekra Brand Name Update Sucessfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('lekraBrandName')->with($notification);
    }

    public function destroy($id)
    {
        // echo $user_id;
        LekraBrand::find($id)->delete();
        return response()->json(['success' => 'Delete sucessfull']);
    }
}
