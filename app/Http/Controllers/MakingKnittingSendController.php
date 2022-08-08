<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\CompanyName;
use App\Models\Kapor;
use App\Models\LekraBrand;
use App\Models\MakingKnittingSend;
use App\Models\Suta;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use PDF;

class MakingKnittingSendController extends Controller
{
    //view

    function index()
    {
        $all_company_name = CompanyName::get();
        $all_brand_name = Brand::get();
        $all_suta_name = Suta::get();
        $all_kapor_name = Kapor::get();
        $all_lekra_brand_name = LekraBrand::get();
        // dd($all_company_name);
        // die();
        return view('admin.making.knitting-send.index', compact('all_company_name', 'all_brand_name', 'all_suta_name', 'all_kapor_name', 'all_lekra_brand_name'));
    }

    function store(Request $request)
    {
        MakingKnittingSend::insert([
            'send_chalan_id' => $request->send_chalan_id,
            'date' =>  $request->date,
            'name_of_suta' => $request->name_of_suta,
            'brand' => $request->brand,
            'kapor' => $request->kapor,
            'weight' => $request->weight,
            'cartoon' => $request->cartoon,
            'rate' => $request->rate,
            'lekra_brand' => $request->lekra_brand,
            'lekra_cartoon' => $request->lekra_cartoon,
            'lekra_rate' => $request->lekra_rate,
            'send_company_name' => $request->send_company_name,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Making Knitting Send Sucessfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('KnittingSendShow')->with($notification);
    }

    function show()
    {
        $all_knitting_send = MakingKnittingSend::get();
        return view('admin.making.knitting-send.show', compact('all_knitting_send'));
    }

    function edit($knitting_send_id)
    {
        $all_company_name = CompanyName::get();
        $all_brand_name = Brand::get();
        $all_suta_name = Suta::get();
        $all_kapor_name = Kapor::get();
        $all_lekra_brand_name = LekraBrand::get();
        $knitting_send_id = MakingKnittingSend::find($knitting_send_id);
        return view('admin.making.knitting-send.edit', [
            'knitting_send_id' => $knitting_send_id,
            'all_lekra_brand_name' => $all_lekra_brand_name,
            'all_brand_name' => $all_brand_name,
            'all_suta_name' => $all_suta_name,
            'all_lekra_brand_name' => $all_lekra_brand_name,
            'all_kapor_name' => $all_kapor_name,
            'all_company_name' => $all_company_name
        ]);
    }

    function update(Request $request)
    {
        MakingKnittingSend::find($request->id)->update([
            'send_chalan_id' => $request->send_chalan_id,
            'date' =>  $request->date,
            'name_of_suta' => $request->name_of_suta,
            'brand' => $request->brand,
            'kapor' => $request->kapor,
            'weight' => $request->weight,
            'cartoon' => $request->cartoon,
            'rate' => $request->rate,
            'lekra_brand' => $request->lekra_brand,
            'lekra_cartoon' => $request->lekra_cartoon,
            'lekra_rate' => $request->lekra_rate,
            'send_company_name' => $request->send_company_name,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Making Knitting Send Update Sucessfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('KnittingSendShow')->with($notification);
    }

    // MakingKnittingSend delete
    function destroy($id)
    {
        MakingKnittingSend::find($id)->delete();
        return response()->json(['success' => 'Delete sucessfull']);
    }

    function knittingSendgeneratePDF($knitting_send_id)
    {
        $pdf = PDF::loadView('admin.making.knitting-send.invoice', [
            'knitting_send_id' => $knitting_send_id
        ]);


        return $pdf->download('makingSend.pdf');
    }
    function knittingSendgeneratePDFview($knitting_send_id)
    {
        $pdf = PDF::loadView('admin.making.knitting-send.invoice', [
            'knitting_send_id' => $knitting_send_id
        ]);
        return view('admin.making.knitting-send.invoice', [
            'knitting_send_id' => $knitting_send_id
        ]);
    }
}
