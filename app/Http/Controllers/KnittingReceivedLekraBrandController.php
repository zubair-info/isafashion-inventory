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
        return back();
    }
}
