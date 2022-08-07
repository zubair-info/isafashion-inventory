<?php

namespace App\Http\Controllers;

use App\Models\Suta;
use Illuminate\Http\Request;

class SutaController extends Controller
{
    //
    function index()
    {
        // $suta = suta::find($id);
        $all_suta_name = Suta::all();
        return view('admin.suta.index', compact('all_suta_name'));
    }

    function store(Request $request)
    {
        // dd($request);
        Suta::insert([
            'suta_name' => $request->suta_name,
        ]);
        $notification = array(
            'message' => 'Suta Name Add Sucessfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('sutaName')->with($notification);
    }

    function edit($id)
    {
        // dd($request);
        $suta = Suta::find($id);
        return view('admin.suta.edit', compact('suta'));
    }

    function update(Request $request)
    {
        // return $request;
        Suta::find($request->id)->update([
            'suta_name' => $request->suta_name,
        ]);
        $notification = array(
            'message' => 'Suta Name Update Sucessfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('sutaName')->with($notification);
    }

    public function destroy($id)
    {
        // echo $user_id;
        Suta::find($id)->delete();
        return response()->json(['success' => 'Delete sucessfull']);
    }
}
