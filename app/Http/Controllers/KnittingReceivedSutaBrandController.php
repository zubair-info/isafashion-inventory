<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\CompanyName;
use App\Models\Kapor;
use App\Models\KnittingReceivedSutaBrand;
use App\Models\KnittingSendSutaBrand;
use App\Models\Suta;
use Illuminate\Support\Carbon;
use PDF;

class KnittingReceivedSutaBrandController extends Controller
{
    //
    function index()
    {
        $all_company_name = CompanyName::get();
        $all_brand_name = Brand::get();
        $all_suta_name = Suta::get();
        $all_kapor_name = Kapor::get();

        return view('admin.knitting-received.suta-brand.index', [
            'all_company_name' => $all_company_name,
            'all_brand_name' => $all_brand_name,
            'all_suta_name' => $all_suta_name,
            'all_kapor_name' => $all_kapor_name,

        ]);
    }

    function store(Request $request)
    {
        KnittingReceivedSutaBrand::insert([
            'suta_id' => $request->suta_id,
            'send_chalan_id' => $request->send_chalan_id,
            'company_id' => $request->company_id,
            'date' => $request->date,
            'brand_id' => $request->brand_id,
            'kapor_id' => $request->kapor_id,
            'weight' => $request->weight,
            'cartoon' => $request->cartoon,
            'rate' => $request->rate,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Knitting Received Suta Add Sucessfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('KnittingSutaBrandShow')->with($notification);
    }

    function show()
    {
        $all_knitting_received_suta = KnittingReceivedSutaBrand::get();
        return view('admin.knitting-received.suta-brand.show', compact('all_knitting_received_suta'));
    }

    function edit($knitting_received_sutabrand_id)
    {
        $all_company_name = CompanyName::get();
        $all_brand_name = Brand::get();
        $all_suta_name = Suta::get();
        $all_kapor_name = Kapor::get();
        $knitting_received_sutabrand_id = KnittingReceivedSutaBrand::find($knitting_received_sutabrand_id);
        return view('admin.knitting-received.suta-brand.edit', [
            'all_company_name' => $all_company_name,
            'all_brand_name' => $all_brand_name,
            'all_suta_name' => $all_suta_name,
            'all_kapor_name' => $all_kapor_name,
            'knitting_received_sutabrand_id' => $knitting_received_sutabrand_id,

        ]);
    }
    function update(Request $request)
    {
        KnittingReceivedSutaBrand::find($request->knitting_received_sutabrand_id)->update([
            'suta_id' => $request->suta_id,
            'send_chalan_id' => $request->send_chalan_id,
            'company_id' => $request->company_id,
            'date' => $request->date,
            'brand_id' => $request->brand_id,
            'kapor_id' => $request->kapor_id,
            'weight' => $request->weight,
            'cartoon' => $request->cartoon,
            'rate' => $request->rate,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Knitting Received Suta Update Sucessfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('KnittingSutaBrandShow')->with($notification);
    }
    function destroy($id)
    {
        KnittingReceivedSutaBrand::find($id)->delete();
        return response()->json(['success' => 'Delete sucessfull']);
    }

    function KnittingReceivedSutaBrandPDFview($knitting_received_sutabrand_id)
    {
        $pdf = PDF::loadView('admin.knitting-received.suta-brand.invoice', [
            'knitting_received_sutabrand_id' => $knitting_received_sutabrand_id
        ]);

        return view('admin.knitting-received.suta-brand.invoice', [

            'knitting_received_sutabrand_id' => $knitting_received_sutabrand_id,

        ]);
    }

    function KnittingReceivedSutaBrandPDFdown($knitting_received_sutabrand_id)
    {
        $pdf = PDF::loadView('admin.knitting-received.suta-brand.invoice', [
            'knitting_received_sutabrand_id' => $knitting_received_sutabrand_id
        ]);
        return $pdf->download('receivedSuta_' . $knitting_received_sutabrand_id . '.pdf');
    }
}
