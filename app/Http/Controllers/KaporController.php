<?php

namespace App\Http\Controllers;

use App\Models\Kapor;
use Illuminate\Http\Request;

class KaporController extends Controller
{
    //

    function index()
    {
        // $kapor = kapor::find($id);
        $all_kapor_name = Kapor::all();
        return view('admin.kapor.index', compact('all_kapor_name'));
    }

    function store(Request $request)
    {
        // dd($request);
        Kapor::insert([
            'kapor_name' => $request->kapor_name,
        ]);
        $notification = array(
            'message' => 'Kapor Name Add Sucessfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('kaporName')->with($notification);
    }


    function update(Request $request)
    {
        // return $request;
        Kapor::find($request->id)->update([
            'kapor_name' => $request->kapor_name,
        ]);
        $notification = array(
            'message' => 'Kapor Name Update Sucessfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('kaporName')->with($notification);
    }

    public function destroy($id)
    {
        // echo $user_id;
        Kapor::find($id)->delete();
        return response()->json(['success' => 'Delete sucessfull']);
    }
}
