<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\CompanyName;
use App\Models\Kapor;
use App\Models\KnittingSendLekraBrand;
use App\Models\KnittingSendSutaBrand;
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
        return view('admin.making.knitting-send.index', [
            'all_company_name' => $all_company_name,
            'all_brand_name' => $all_brand_name,
            'all_suta_name' => $all_suta_name,
            'all_kapor_name' => $all_kapor_name,
            'all_lekra_brand_name' => $all_lekra_brand_name

        ]);
    }

    function store(Request $request)
    {
        // return $request->all();

        $knitting_send_id = MakingKnittingSend::create([
            'send_chalan_id' => $request->send_chalan_id,
            'date' =>  $request->date,
            'company_id' => $request->company_id,
            'created_at' => Carbon::now()
        ]);

        $form_count = $request->form_count;
        $suta_id = $request->suta_id;
        $brand_id = $request->brand;
        $kapor_id = $request->kapor;
        $weight = $request->weight;
        $cartoon = $request->cartoon;
        $rate = $request->rate;

        for ($i = 0; $i < count($form_count); $i++) {
            KnittingSendSutaBrand::insert([
                'knitting_send_id' => $knitting_send_id->id,
                'suta_id' => $suta_id[$i],
                'brand_id' => $brand_id[$i],
                'kapor_id' => $kapor_id[$i],
                'weight' => $weight[$i],
                'cartoon' => $cartoon[$i],
                'rate' => $rate[$i],
                'created_at' => Carbon::now(),
            ]);
        }

        $lekra_brand_form_count = $request->lekra_brand_form_count;
        $lekra_cartoon = $request->lekra_cartoon;
        $lekra_brand_id = $request->lekra_brand;
        $lekra_rate = $request->lekra_rate;

        for ($i = 0; $i < count($lekra_brand_form_count); $i++) {
            KnittingSendLekraBrand::insert([
                'knitting_send_id' => $knitting_send_id->id,
                'lekra_cartoon' => $lekra_cartoon[$i],
                'lekra_brand_id' => $lekra_brand_id[$i],
                'lekra_rate' => $lekra_rate[$i],
                'created_at' => Carbon::now()
            ]);
        }

        $notification = array(
            'message' => 'Making Knitting Send Sucessfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('KnittingSendShow')->with($notification);

        // MakingKnittingSend::insert([
        // 'send_chalan_id' => $request->send_chalan_id,
        // 'date' =>  $request->date,
        //     'name_of_suta' => $request->suta_id,
        //     'brand' => $request->brand,
        //     'kapor' => $request->kapor,
        //     'weight' => $request->weight,
        //     'cartoon' => $request->cartoon,
        //     'rate' => $request->rate,
        //     'lekra_brand' => $request->lekra_brand,
        //     'lekra_cartoon' => $request->lekra_cartoon,
        //     'lekra_rate' => $request->lekra_rate,
        //     'send_company_name' => $request->send_company_name,
        //     'created_at' => Carbon::now(),
        // ]);
        // $notification = array(
        //     'message' => 'Making Knitting Send Sucessfully!',
        //     'alert-type' => 'success'
        // );
        // return redirect()->route('KnittingSendShow')->with($notification);
    }

    function show()
    {
        $all_knitting_send = MakingKnittingSend::get();
        // dd($all_knitting_send[1]->rel_to_kintting_send_suta_brand_id[0]->rel_to_suta);
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
        $all_suta_brand = KnittingSendSutaBrand::where('knitting_send_id', $knitting_send_id)->get();
        $all_lekra_brand = KnittingSendLekraBrand::where('knitting_send_id', $knitting_send_id)->get();
        $pdf = PDF::loadView('admin.making.knitting-send.invoice', [
            'all_suta_brand' => $all_suta_brand,
            'all_lekra_brand' => $all_lekra_brand
        ]);


        return $pdf->download('makingSend.pdf');
    }
    function knittingSendgeneratePDFview($knitting_send_id)
    {
        // echo $knitting_send_id;
        $all_suta_brand = KnittingSendSutaBrand::where('knitting_send_id', $knitting_send_id)->get();
        $all_lekra_brand = KnittingSendLekraBrand::where('knitting_send_id', $knitting_send_id)->get();
        // dd($all_suta_brand[0]->rel_to_suta);

        // $pdf = PDF::loadView('admin.making.knitting-send.invoice', [
        //     'knitting_send_id' => $knitting_send_id
        // ]);
        return view('admin.making.knitting-send.invoice', [
            'all_suta_brand' => $all_suta_brand,
            'all_lekra_brand' => $all_lekra_brand
        ]);
    }
}
