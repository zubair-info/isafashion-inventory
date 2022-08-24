<?php

namespace App\Http\Controllers;

use App\Models\LekraBrand;
use App\Models\CompanyName;
use App\Models\KnittingReceivedLekraBrand;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use PDF;

class KnittingReceivedLekraBrandController extends Controller
{
    //
    function index()
    {
        $all_lekra_brand_name = LekraBrand::get();
        $all_company_name = CompanyName::get();
        return view('admin.knitting-received.lekra-brand.index', [
            'all_lekra_brand_name' => $all_lekra_brand_name,
            'all_company_name' => $all_company_name
        ]);
    }

    function store(Request $request)
    {
        KnittingReceivedLekraBrand::insert([
            'send_chalan_id' => $request->send_chalan_id,
            'company_id' => $request->company_id,
            'date' => $request->date,
            'lekra_cartoon' => $request->lekra_cartoon,
            'lekra_brand_id' => $request->lekra_brand,
            'lekra_rate' => $request->lekra_rate,
            'created_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Knitting Received Suta Update Sucessfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('KnittingReceivedLekraBrandShow')->with($notification);
    }
    function show()
    {
        $all_knitting_received_lekra_brand = KnittingReceivedLekraBrand::get();
        return view('admin.knitting-received.lekra-brand.show', compact('all_knitting_received_lekra_brand'));
    }

    function edit($knitting_received_lekrabrand_id)
    {
        $all_lekra_brand_name = LekraBrand::get();
        $all_company_name = CompanyName::get();
        $all_knitting_received_lekrabrand = KnittingReceivedLekraBrand::find($knitting_received_lekrabrand_id);
        return view('admin.knitting-received.lekra-brand.edit', [
            'all_lekra_brand_name' => $all_lekra_brand_name,
            'all_company_name' => $all_company_name,
            'all_knitting_received_lekrabrand' => $all_knitting_received_lekrabrand,
        ]);
    }

    function update(Request $request)
    {
        KnittingReceivedLekraBrand::find($request->knitting_received_lekrabrand_id)->update([
            'send_chalan_id' => $request->send_chalan_id,
            'company_id' => $request->company_id,
            'date' => $request->date,
            'lekra_cartoon' => $request->lekra_cartoon,
            'lekra_brand_id' => $request->lekra_brand,
            'lekra_rate' => $request->lekra_rate,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Knitting Received Suta Update Sucessfully!',
            'alert-type' => 'info'
        );
        return redirect()->route('KnittingReceivedLekraBrandShow')->with($notification);
    }
    public function destroy($id)
    {
        // echo $user_id;
        KnittingReceivedLekraBrand::find($id)->delete();
        return response()->json(['success' => 'Delete sucessfull']);
    }

    function KnittingReceivedLekraBrandPDFview($knitting_received_lekrabrand_id)
    {
        // return $dyeing_multiple_id;

        $pdf = PDF::loadView('admin.knitting-received.lekra-brand.invoice', [
            'knitting_received_lekrabrand_id' => $knitting_received_lekrabrand_id
        ]);

        return view('admin.knitting-received.lekra-brand.invoice', [

            'knitting_received_lekrabrand_id' => $knitting_received_lekrabrand_id,

        ]);
    }
    function KnittingReceivedLekraBrandPDFdown($knitting_received_lekrabrand_id)
    {
        // return $dyeing_multiple_id;

        $pdf = PDF::loadView('admin.knitting-received.lekra-brand.invoice', [
            'knitting_received_lekrabrand_id' => $knitting_received_lekrabrand_id
        ]);
        return $pdf->download('receivedLekra_' . $knitting_received_lekrabrand_id . '.pdf');
    }
}
