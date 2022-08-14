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


class MakingDyeingSendController extends Controller
{
    //
    function index()
    {
        $all_company_name = CompanyName::get();
        $all_brand_name = Brand::get();
        $all_suta_name = Suta::get();
        $all_kapor_name = Kapor::get();
        $all_lekra_brand_name = LekraBrand::get();
        // dd($all_company_name);
        // die();
        return view('admin.making.dyeing-send.index', [
            'all_company_name' => $all_company_name,
            'all_brand_name' => $all_brand_name,
            'all_suta_name' => $all_suta_name,
            'all_kapor_name' => $all_kapor_name,
            'all_lekra_brand_name' => $all_lekra_brand_name

        ]);
    }
}
