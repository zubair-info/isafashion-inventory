<?php

namespace App\Http\Controllers;

use App\Models\CompanyName;
use App\Models\CuttingMultipleSend;
use App\Models\CuttingSend;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use PDF;

class CuttingSendController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    function index()
    {
        $all_company_name = CompanyName::get();
        return view('admin.cutting.cutting-send.index', [
            'all_company_name' => $all_company_name
        ]);
    }

    function store(Request $request)
    {
        // return $request;
        $cutting_send_id = CuttingSend::create([
            'send_chalan_id' => $request->send_chalan_id,
            'company_id' => $request->company_id,
            'date' => $request->date,
        ]);


        $form_count = $request->form_count;
        $roll = $request->roll;
        $balance = $request->balance;

        for ($i = 0; $i < count($form_count); $i++) {
            CuttingMultipleSend::insert([
                'cutting_send_id' => $cutting_send_id->id,
                'roll' => $roll[$i],
                'balance' => $balance[$i],
                'created_at' => Carbon::now(),
            ]);
        }
        $notification = array(
            'message' => 'Cutting Send Sucessfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('cuttingSendShow')->with($notification);
    }

    function show()
    {
        $all_cutting_send = CuttingSend::get();
        return view('admin.cutting.cutting-send.show', [
            'all_cutting_send' => $all_cutting_send
        ]);
    }

    function edit($cutting_send_id)
    {
        $all_cutting_send_id = CuttingSend::find($cutting_send_id);
        $all_company_name = CompanyName::get();
        return view('admin.cutting.cutting-send.edit', [
            'all_cutting_send_id' => $all_cutting_send_id,
            'all_company_name' => $all_company_name
        ]);
    }

    function update(Request $request)
    {
        // return $request;
        CuttingSend::find($request->cutting_send_id)->update([
            // 'roll' => $request->roll,
            // 'balance' => $request->balance,
            'send_chalan_id' => $request->send_chalan_id,
            'company_id' => $request->company_id,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Cutting Send Update Sucessfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('cuttingSendShow')->with($notification);
    }
    function destroy($id)
    {
        CuttingSend::find($id)->delete();
        CuttingMultipleSend::where('cutting_send_id', $id)->delete();
        return response()->json(['success' => 'Delete sucessfull']);
    }

    function cuttingSendView($cutting_id)
    {
        // return $dyeing_id;
        $all_cuting_send = CuttingMultipleSend::where('cutting_send_id', $cutting_id)->get();
        return view('admin.cutting.cutting-send.view', [
            'all_cuting_send' => $all_cuting_send
        ]);
    }

    function cuttingSendMultipleEdit($cutting_id)
    {
        // echo $dyeing_multiple_id;
        $all_cutting_multiple_send = CuttingMultipleSend::find($cutting_id);
        return view('admin.cutting.cutting-send.cuttingSendMultipleEdit', [
            'all_cutting_multiple_send' => $all_cutting_multiple_send,

        ]);
    }


    function cuttingSendMultipleUpdate(Request $request)
    {
        CuttingMultipleSend::find($request->cutting_send_multiple_id)->update([
            'roll' => $request->roll,
            'balance' => $request->balance,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Cutting Send Multiple Update Sucessfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('cuttingSendShow')->with($notification);
    }
    function cutingSendMultipleDelete($id)
    {
        CuttingMultipleSend::find($id)->delete();
        return response()->json(['success' => 'Delete sucessfull']);
    }

    function cuttingSendPDFView($cutting_send_id)
    {

        $pdf = PDF::loadView('admin.cutting.cutting-send.invoice', [
            'cutting_send_id' => $cutting_send_id
        ]);

        return view('admin.cutting.cutting-send.invoice', [

            'cutting_send_id' => $cutting_send_id,

        ]);
    }
}
