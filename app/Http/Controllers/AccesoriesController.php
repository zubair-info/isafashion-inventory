<?php

namespace App\Http\Controllers;

use App\Models\Accesories;
use App\Models\AccessoriesName;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use DB;

class AccesoriesController extends Controller
{
    //
    function accesoriesInput()
    {

        $all_accessories_input = Accesories::all();
        $all_accesories_name = AccessoriesName::all();
        return view('admin.accesories.input.index', [
            'all_accessories_input' => $all_accessories_input,
            'all_accesories_name' => $all_accesories_name,
        ]);
    }

    function accessoriesInputStore(Request $request)
    {
        // return $request;
        $validated = $request->validate([
            'product_name' => 'required',
            'total_price' => 'required',
            'total_qty' => 'required',
            'single_price' => 'required',
            'description' => 'required',
        ]);

        $stock = Accesories::orderBy('created_at', 'DESC')->where('product_name', $request->product_name)->select('stock')->value('stock');
        // return $stock;
        // $stock = $stock->total_qty + $request->total_qty;

        // if($stock)

        if ($stock != '') {
            $stock = $stock + $request->total_qty;
            Accesories::insert([
                'product_name' => $request->product_name,
                'total_price' => $request->total_price,
                'total_qty' => $request->total_qty,
                'single_price' => $request->single_price,
                'description' => $request->description,
                'stock' => $stock,
                'created_at' => Carbon::now(),
            ]);
        } else {
            $stock = $stock + $request->total_qty;
            Accesories::insert([
                'product_name' => $request->product_name,
                'total_price' => $request->total_price,
                'total_qty' => $request->total_qty,
                'single_price' => $request->single_price,
                'description' => $request->description,
                'stock' => $stock,
                'created_at' => Carbon::now(),
            ]);
        }
        // return $stock->total_qty;



        $notification = array(
            'message' => 'Acessories  Add Sucessfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('accesoriesInput')->with($notification);
    }

    function accessoriesInputDelete($id)
    {
        Accesories::find($id)->delete();
        return response()->json(['success' => 'Delete sucessfull']);
    }

    function accessoriesInputEdit($accessories_input_id)
    {
        $all_accessories_input = Accesories::find($accessories_input_id);
        return view('admin.accesories.input.edit', [
            'all_accessories_input' => $all_accessories_input
        ]);
    }

    function accessoriesInputUpdate(Request $request)
    {
        $validated = $request->validate([
            'product_name' => 'required',
            'total_price' => 'required',
            'total_qty' => 'required',
            'single_price' => 'required',
            'description' => 'required',
        ]);

        $updated_at_stock = Accesories::select('updated_at')->value('updated_at');

        if ($updated_at_stock != NULL) {
            $stock = Accesories::orderBy('created_at', 'DESC')->where('product_name', $request->product_name)->select('stock')->value('stock');
            // dd($stock);
            $stock = $stock + $request->total_qty;
            Accesories::find($request->accessories_input_id)->update([
                'product_name' => $request->product_name,
                'total_price' => $request->total_price,
                'total_qty' => $request->total_qty,
                'single_price' => $request->single_price,
                'description' => $request->description,
                'stock' => $stock,
                'updated_at' => Carbon::now(),
            ]);
        } else {

            $last_stock_id = Accesories::orderBy('created_at', 'DESC')->where('product_name', $request->product_name)->value('id');
            $last_previous_stock_id = Accesories::orderBy('created_at', 'DESC')->where('product_name', $request->product_name)->where('id', '<', $last_stock_id)->max('id');
            $last_previous_Stock = Accesories::find($last_previous_stock_id);
            $previous_Stock = $last_previous_Stock->stock;
            $stock = $previous_Stock + $request->total_qty;
            // return  $stock;
            Accesories::find($request->accessories_input_id)->update([
                'product_name' => $request->product_name,
                'total_price' => $request->total_price,
                'total_qty' => $request->total_qty,
                'single_price' => $request->single_price,
                'description' => $request->description,
                'stock' => $stock,
                'updated_at' => Carbon::now(),
            ]);
        }

        $notification = array(
            'message' => 'Input Update Sucessfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('accesoriesInput')->with($notification);
    }

    function inputProductNameSearch($input_product_name_search)
    {

        $search_results = AccessoriesName::where('product_name', 'like', '%' . $input_product_name_search . '%')->select('product_name', AccessoriesName::raw('count(*) as total'))->groupBy('product_name')->get();
        return response()->json(['data' => $search_results]);
    }

    function accessoriesOutputAdd()
    {

        // $all_output_accesories = Accesories::orderBy('created_at', 'DESC')->get()->groupBy('product_name');
        // $all_output_accesories = DB::table('accesories')->select(DB::raw('*, count(*)'))->groupBy('product_name')->get();
        $all_output_accesories = Accesories::all();
        $all_accesories_name = AccessoriesName::all();
        // return $all_accesories_name;
        $all_product_name = Accesories::select('product_name', Accesories::raw('count(*) as total'))->groupBy('product_name')->get();
        return view('admin.accesories.output.index', [
            'all_product_name' => $all_product_name,
            'all_output_accesories' => $all_output_accesories,
            'all_accesories_name' => $all_accesories_name,
            // 'all_output_accesories_stock' => $all_output_accesories_stock

        ]);
    }
    function accessoriesOutputStore(Request $request)
    {
        // return $request;
        $stock = Accesories::orderBy('created_at', 'DESC')->where('product_name', $request->product_name)->select('stock')->value('stock');
        $stock = $stock - $request->spend;

        Accesories::insert([
            'product_name' => $request->product_name,
            'spend' => $request->spend,
            'description' => $request->description,
            'stock' => $stock,
            // 'signature' => $request->signature,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Acessories Output Add Sucessfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('accessoriesOutputAdd')->with($notification);
    }

    function accessoriesOutputEdit($accessories_output_id)
    {
        $all_product_name = Accesories::select('product_name', Accesories::raw('count(*) as total'))->groupBy('product_name')->get();
        $all_accessories_output = Accesories::find($accessories_output_id);
        return view('admin.accesories.output.edit', [
            'all_accessories_output' => $all_accessories_output,
            'all_product_name' => $all_product_name
        ]);
    }

    function accessoriesOutputUpdate(Request $request)
    {

        $updated_at_stock = Accesories::select('updated_at')->value('updated_at');

        if ($updated_at_stock != NULL) {
            $stock = Accesories::orderBy('updated_at', 'DESC')->where('product_name', $request->product_name)->select('stock')->value('stock');
            // return  $stock;
            $stock = $stock - $request->spend;
            Accesories::find($request->accessories_output_id)->update([
                'product_name' => $request->product_name,
                'spend' => $request->spend,
                'description' => $request->description,
                'stock' => $stock,
                'updated_at' => Carbon::now(),
            ]);
        } else {

            $last_stock_id = Accesories::orderBy('created_at', 'DESC')->where('product_name', $request->product_name)->value('id');
            $last_previous_stock_id = Accesories::orderBy('created_at', 'DESC')->where('product_name', $request->product_name)->where('id', '<', $last_stock_id)->max('id');
            $last_previous_Stock = Accesories::find($last_previous_stock_id);
            // if ($last_previous_Stock->updated_at != NULL) {
            // }
            $previous_Stock = $last_previous_Stock->stock;
            $stock = $previous_Stock - $request->spend;
            // return  $previous_Stock;
            Accesories::find($request->accessories_output_id)->update([
                'product_name' => $request->product_name,
                'spend' => $request->spend,
                'description' => $request->description,
                'stock' => $stock,
                'updated_at' => Carbon::now(),
            ]);
        }

        $notification = array(
            'message' => 'Acessories  output Update Sucessfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('accessoriesOutputAdd')->with($notification);
    }
}
