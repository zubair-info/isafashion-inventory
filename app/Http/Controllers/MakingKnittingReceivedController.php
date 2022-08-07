<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Kapor;
use App\Models\MakingKnittingReceived;
use App\Models\MakingKnittingSend;
use App\Models\Suta;
use Illuminate\Http\Request;

class MakingKnittingReceivedController extends Controller
{
    //
    function index()
    {

        $all_brand_name = Brand::get();
        $all_suta_name = Suta::get();
        $all_kapor_name = Kapor::get();
        $all_send_chalan_id = MakingKnittingSend::select('send_chalan_id')->get();
        // echo ($all_send_chalan_id);
        return view('admin.making.knitting-Received.index', [

            'all_brand_name' => $all_brand_name,
            'all_suta_name' => $all_suta_name,
            'all_kapor_name' => $all_kapor_name,
            'all_send_chalan_id' => $all_send_chalan_id
        ]);
    }

    function store(Request $request)
    {
        // dd($request);
        MakingKnittingReceived::insert([
            'send_chalan_id' => $request->send_chalan_id,
            'date' =>  $request->date,
            'suta_id' => $request->suta_id,
            'brand_id' => $request->brand_id,
            'kapor_id' => $request->kapor_id,
            'received_chalan_id' => $request->received_chalan_id,
            'body' => $request->body,
            'rib' => $request->rib,
            'color' => $request->color,
            'roll' => $request->roll,
            'total' => $request->total,
            'total_used_lekra' => $request->total_used_lekra,
        ]);
        $notification = array(
            'message' => 'Making Knitting Received Sucessfully!',
            'alert-type' => 'success'
        );
        return back();
        // return redirect()->route('KnittingReceivedShow')->with($notification);
    }
}
