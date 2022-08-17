<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Kapor;
use App\Models\MakingknittingMultipleReceived;
use App\Models\MakingKnittingReceived;
use App\Models\MakingKnittingSend;
use App\Models\Suta;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use PDF;

class MakingKnittingReceivedController extends Controller
{
    //
    function index()
    {
        $all_brand_name = Brand::get();
        $all_suta_name = Suta::get();
        $all_kapor_name = Kapor::get();
        $all_send_chalan_id = MakingKnittingSend::select('send_chalan_id', 'id')->get();
        return view('admin.making.knitting-Received.index', [

            'all_brand_name' => $all_brand_name,
            'all_suta_name' => $all_suta_name,
            'all_kapor_name' => $all_kapor_name,
            'all_send_chalan_id' => $all_send_chalan_id
        ]);
    }

    function store(Request $request)
    {
        $knitting_received_id = MakingKnittingReceived::create([
            'send_chalan_id' => $request->send_chalan_id,
            'date' =>  $request->date,
            'created_at' => Carbon::now()
        ]);

        $form_count = $request->form_count;
        $received_chalan_id = $request->received_chalan_id;
        $suta_id = $request->suta_id;
        $brand_id = $request->brand_id;
        $kapor_id = $request->kapor_id;
        $body = $request->body;
        $rib = $request->rib;
        $color = $request->color;
        $roll = $request->roll;
        $total = $request->total;
        $total_used_lekra = $request->total_used_lekra;

        for ($i = 0; $i < count($form_count); $i++) {
            MakingknittingMultipleReceived::insert([
                'knitting_received_id' => $knitting_received_id->id,
                'received_chalan_id' => $received_chalan_id[$i],
                'suta_id' => $suta_id[$i],
                'brand_id' => $brand_id[$i],
                'kapor_id' => $kapor_id[$i],
                'body' => $body[$i],
                'rib' => $rib[$i],
                'color' => $color[$i],
                'roll' => $roll[$i],
                'total' => $total[$i],
                'total_used_lekra' => $total_used_lekra[$i],
                'created_at' => Carbon::now(),
            ]);
        }
        $notification = array(
            'message' => 'Making Knitting Received Sucessfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('KnittingReceivedShow')->with($notification);
    }

    function show()
    {
        $all_knitting_received = MakingKnittingReceived::get();
        // $all_send_chalan_id = MakingKnittingReceived::where('send_chalan_id', 'id')->select('send_chalan_id')->get();
        // return $all_knitting_received;
        return view('admin.making.knitting-received.show', [

            'all_knitting_received' => $all_knitting_received,
            // 'all_send_chalan_id' => $all_send_chalan_id,
        ]);
    }

    function edit($knitting_received_id)
    {
        $all_brand_name = Brand::get();
        $all_suta_name = Suta::get();
        $all_kapor_name = Kapor::get();
        $all_received_chalan_id  = MakingKnittingReceived::find($knitting_received_id);
        $all_send_chalan_id = MakingKnittingSend::select('send_chalan_id')->get();
        // return $all_send_chalan_id;
        // return $all_received_chalan_id->send_chalan_id;
        return view('admin.making.knitting-received.edit', [
            'all_brand_name' => $all_brand_name,
            'all_suta_name' => $all_suta_name,
            'all_kapor_name' => $all_kapor_name,
            'all_send_chalan_id' => $all_send_chalan_id,
            'all_received_chalan_id' => $all_received_chalan_id,
        ]);
    }

    function update(Request $request)
    {
        MakingKnittingReceived::find($request->id)->update([
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
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Making Knitting Send Update Sucessfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('KnittingReceivedShow')->with($notification);
    }

    public function destroy($id)
    {
        MakingKnittingReceived::find($id)->delete();
        return response()->json(['success' => 'Delete sucessfull']);
    }

    function knittingSendgeneratePDFDown($knitting_received_id)
    {

        $pdf = PDF::loadView('admin.making.knitting-received.invoice', [
            'knitting_received_id' => $knitting_received_id
        ]);
        // return view('admin.making.knitting-received.invoice', [
        //     'knitting_received_id' => $knitting_received_id
        // ]);
        return $pdf->download('makingReceived.pdf');
    }
    function knittingRecivedgeneratePDFview($knitting_received_id)
    {

        $pdf = PDF::loadView('admin.making.knitting-received.invoice', [
            'knitting_received_id' => $knitting_received_id
        ]);

        return view('admin.making.knitting-received.invoice', [

            'knitting_received_id' => $knitting_received_id,

        ]);
    }

    function knittingReceivedView($knitting_received_id)
    {
        $all_knitting_received_multiple = MakingknittingMultipleReceived::where('knitting_received_id', $knitting_received_id)->get();
        return view('admin.making.knitting-received.view', [
            'all_knitting_received_multiple' => $all_knitting_received_multiple
        ]);
    }

    function knittingReceivedMultipleEdit($knitting_received_multiple_id)
    {

        $all_knitting_received_multiple = MakingknittingMultipleReceived::find($knitting_received_multiple_id);
        $all_brand_name = Brand::get();
        $all_suta_name = Suta::get();
        $all_kapor_name = Kapor::get();
        return view('admin.making.knitting-received.receivedMultipleEdit', [
            'all_knitting_received_multiple' => $all_knitting_received_multiple,
            'all_brand_name' => $all_brand_name,
            'all_suta_name' => $all_suta_name,
            'all_kapor_name' => $all_kapor_name

        ]);
    }

    function knittingRecivedMultipleUpdate(Request $request)
    {
        MakingknittingMultipleReceived::find($request->knitting_received_multiple_id)->update([
            'received_chalan_id' => $request->received_chalan_id,
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
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Making Knitting Received Update Sucessfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('KnittingReceivedShow')->with($notification);
    }

    function knittingRecivedMultipleDelete($id)
    {
        MakingknittingMultipleReceived::find($id)->delete();
        return response()->json(['success' => 'Delete sucessfull']);
    }
}
