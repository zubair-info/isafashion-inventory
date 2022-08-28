<?php

namespace App\Http\Controllers;

use App\Models\AccesoriesInput;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AccesoriesInputController extends Controller
{
    //
    function index()
    {
        $all_accessories_input = AccesoriesInput::get();
        return view('admin.accesories.input.index', [
            'all_accessories_input' => $all_accessories_input
        ]);
    }

    function store(Request $request)
    {
        // return $request;
        $validated = $request->validate([
            'name' => 'required',
            'total_price' => 'required',
            'total_qty' => 'required',
            'single_price' => 'required',
            'save_to_stock' => 'required',
        ]);

        AccesoriesInput::insert([
            'name' => $request->name,
            'total_price' => $request->total_price,
            'total_qty' => $request->total_qty,
            'single_price' => $request->single_price,
            'save_to_stock' => $request->save_to_stock,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Input Add Sucessfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('accesoriesInput')->with($notification);
    }

    function destroy($id)
    {
        AccesoriesInput::find($id)->delete();
        return response()->json(['success' => 'Delete sucessfull']);
    }

    function edit($accessories_input_id)
    {
        $all_accessories_input = AccesoriesInput::find($accessories_input_id);
        return view('admin.accesories.input.edit', [
            'all_accessories_input' => $all_accessories_input
        ]);
    }

    function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'total_price' => 'required',
            'total_qty' => 'required',
            'single_price' => 'required',
            'save_to_stock' => 'required',
        ]);

        AccesoriesInput::find($request->accessories_input_id)->update([
            'name' => $request->name,
            'total_price' => $request->total_price,
            'total_qty' => $request->total_qty,
            'single_price' => $request->single_price,
            'save_to_stock' => $request->save_to_stock,
        ]);

        $notification = array(
            'message' => 'Input Update Sucessfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('accesoriesInput')->with($notification);
    }
}
