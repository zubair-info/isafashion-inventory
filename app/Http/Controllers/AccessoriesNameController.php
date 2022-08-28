<?php

namespace App\Http\Controllers;

use App\Models\AccessoriesName;
use Illuminate\Http\Request;

class AccessoriesNameController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    function index()
    {
        // $accessories = Acc::find($id);
        $all_accessories_name = AccessoriesName::all();
        return view('admin.accesories.accessories-name.index', compact('all_accessories_name'));
    }

    function store(Request $request)
    {
        // dd($request);
        AccessoriesName::insert([
            'product_name' => $request->product_name,
        ]);
        $notification = array(
            'message' => 'Accessories Name Add Sucessfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('accessoriesName')->with($notification);
    }

    function edit($id)
    {
        // dd($request);
        $accessories = AccessoriesName::find($id);
        return view('admin.accessories.accessories-name.edit', compact('accessories'));
    }

    function update(Request $request)
    {
        // return $request;
        AccessoriesName::find($request->id)->update([
            'product_name' => $request->product_name,
        ]);
        $notification = array(
            'message' => 'accessories Name Update Sucessfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('accessoriesName')->with($notification);
    }

    public function destroy($id)
    {
        // echo $user_id;
        AccessoriesName::find($id)->delete();
        return response()->json(['success' => 'Delete sucessfull']);
    }
}
