<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\CompanyName;
use App\Models\Kapor;
use App\Models\KnittingReceivedLekraBrand;
use App\Models\KnittingReceivedSutaBrand;
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
    public function __construct()
    {
        $this->middleware('auth');
    }
    //view

    function index()
    {
        $all_company_name = CompanyName::get();
        $all_brand_name = Brand::get();
        $all_suta_name = Suta::get();
        $all_kapor_name = Kapor::get();
        $all_lekra_brand_name = LekraBrand::get();
        $all_knitting_received_suta_chalan_id = KnittingReceivedSutaBrand::select('send_chalan_id', 'id')->get();
        $all_knitting_received_lekra_chalan_id = KnittingReceivedLekraBrand::select('send_chalan_id', 'id')->get();
        // return $all_send_chalan_id_suta_brand;
        // dd($all_company_name);
        // die();
        return view('admin.making.knitting-send.index', [
            'all_company_name' => $all_company_name,
            'all_brand_name' => $all_brand_name,
            'all_suta_name' => $all_suta_name,
            'all_kapor_name' => $all_kapor_name,
            'all_lekra_brand_name' => $all_lekra_brand_name,
            'all_knitting_received_suta_chalan_id' => $all_knitting_received_suta_chalan_id,
            'all_knitting_received_lekra_chalan_id' => $all_knitting_received_lekra_chalan_id

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
        $knitting_received_suta_chalan_id = $request->knitting_received_suta_chalan_id;
        $brand_id = $request->brand_id;
        $kapor_id = $request->kapor_id;
        $weight = $request->weight;
        $cartoon = $request->cartoon;
        $rate = $request->rate;

        for ($i = 0; $i < count($form_count); $i++) {
            KnittingSendSutaBrand::insert([
                'knitting_send_id' => $knitting_send_id->id,
                'suta_id' => $suta_id[$i],
                'knitting_received_suta_chalan_id' => $knitting_received_suta_chalan_id[$i],
                'brand_id' => $brand_id[$i],
                'kapor_id' => $kapor_id[$i],
                'weight' => $weight[$i],
                'cartoon' => $cartoon[$i],
                'rate' => $rate[$i],
                'created_at' => Carbon::now(),
            ]);
        }

        $lekra_brand_form_count = $request->lekra_brand_form_count;
        $knitting_received_lekra_chalan_id = $request->knitting_received_lekra_chalan_id;
        $lekra_cartoon = $request->lekra_cartoon;
        $lekra_brand_id = $request->lekra_brand;
        $lekra_rate = $request->lekra_rate;

        for ($i = 0; $i < count($lekra_brand_form_count); $i++) {
            KnittingSendLekraBrand::insert([
                'knitting_send_id' => $knitting_send_id->id,
                'knitting_received_lekra_chalan_id' => $knitting_received_lekra_chalan_id[$i],
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
        KnittingSendSutaBrand::where('knitting_send_id', $id)->delete();
        KnittingSendLekraBrand::where('knitting_send_id', $id)->delete();
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
        $all_knitting_send = MakingKnittingSend::get();
        $all_suta_brand = KnittingSendSutaBrand::where('knitting_send_id', $knitting_send_id)->get();
        $all_lekra_brand = KnittingSendLekraBrand::where('knitting_send_id', $knitting_send_id)->get();
        // dd($all_suta_brand[0]->rel_to_suta);

        // $pdf = PDF::loadView('admin.making.knitting-send.invoice', [
        //     'knitting_send_id' => $knitting_send_id
        // ]);
        return view('admin.making.knitting-send.invoice', [
            'all_suta_brand' => $all_suta_brand,
            'all_lekra_brand' => $all_lekra_brand,
            'all_knitting_send' => $all_knitting_send,
            'knitting_send_id' => $knitting_send_id
        ]);
    }

    function knittingSendView($knitting_send_id)
    {
        $all_suta_brand = KnittingSendSutaBrand::get();
        $all_lekra_brand = KnittingSendLekraBrand::where('knitting_send_id', $knitting_send_id)->get();
        return view('admin.making.knitting-send.view', [
            'all_suta_brand' => $all_suta_brand,
            'all_lekra_brand' => $all_lekra_brand
        ]);
    }

    function sutaBrandEdit($suta_brand_id)
    {
        $all_suta_brand_id = KnittingSendSutaBrand::find($suta_brand_id);
        $all_brand_name = Brand::get();
        $all_suta_name = Suta::get();
        $all_kapor_name = Kapor::get();
        return view('admin.making.knitting-send.sutaBrandEdit', [
            'all_suta_brand_id' => $all_suta_brand_id,
            'all_brand_name' => $all_brand_name,
            'all_suta_name' => $all_suta_name,
            'all_kapor_name' => $all_kapor_name
        ]);
    }

    function sutaBrandUpdate(Request $request)
    {
        // echo $request->suta_brand_id;
        // dd($request);
        KnittingSendSutaBrand::find($request->suta_brand_id)->update([
            'suta_id' => $request->suta_id,
            'brand_id' => $request->brand_id,
            'kapor_id' => $request->kapor_id,
            'weight' => $request->weight,
            'cartoon' => $request->cartoon,
            'rate' => $request->rate,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Making Knitting Suta Brand Update Sucessfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('KnittingSendShow')->with($notification);
    }

    function sutaBrandDelete($id)
    {
        KnittingSendSutaBrand::find($id)->delete();
        return response()->json(['success' => 'Delete sucessfull']);
    }

    function lekraBrandEdit($knitting_received_multiple_id)
    {
        $all_knitting_received_multiple = KnittingSendLekraBrand::find($knitting_received_multiple_id);
        return view('admin.making.knitting-send.lekraBrandEdit', [
            'all_knitting_received_multiple' => $all_knitting_received_multiple,

        ]);
    }

    function sendLekraBrandUpdate(Request $request)
    {
        // dd($request);
        KnittingSendLekraBrand::find($request->all_lekra_brand_id)->update([
            'lekra_brand' => $request->lekra_brand,
            'lekra_cartoon' => $request->lekra_cartoon,
            'lekra_rate' => $request->lekra_rate,
        ]);
        $notification = array(
            'message' => 'Making Knitting Lekra Brand Update Sucessfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('KnittingSendShow')->with($notification);
    }

    function lekraBrandDelete($id)
    {
        // echo $id;
        KnittingSendLekraBrand::find($id)->delete();
        return response()->json(['success' => 'Delete sucessfull']);
    }

    function weightStockCount(Request $request)
    {
        echo $request->weight;
    }
}
