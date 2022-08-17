<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\CompanyName;
use App\Models\Kapor;
use App\Models\LekraBrand;
use App\Models\MakingknittingMultipleReceived;
use App\Models\MakingKnittingReceived;
use App\Models\MakingKnittingSend;
use App\Models\Suta;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use PDF;


class MakingDyeingSendController extends Controller
{
    //
    function index()
    {

        $all_company_name = CompanyName::get();
        $knetting_received_chalan_id = MakingknittingMultipleReceived::select('received_chalan_id')->get();
        $knitting_received_colors = MakingknittingMultipleReceived::select('color')->get();
        // dd($all_company_name);
        // die();
        return view('admin.making.dyeing-send.index', [
            'all_company_name' => $all_company_name,
            'knetting_received_chalan_id' => $knetting_received_chalan_id,
            'knitting_received_colors' => $knitting_received_colors,

        ]);
    }

    function store(Request $request)
    {
        return $request;
    }
}
