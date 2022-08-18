<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\CompanyName;
use App\Models\MakingDyeingMultipleSend;
use App\Models\MakingDyeingSend;
use App\Models\MakingknittingMultipleReceived;
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
        // $dyeing_received_colors = MakingknittingMultipleReceived::select('color')->get();
        // return $dyeing_received_colors;

        return view('admin.making.dyeing-send.index', [
            'all_company_name' => $all_company_name,
            'knetting_received_chalan_id' => $knetting_received_chalan_id,
            // 'dyeing_received_colors' => $dyeing_received_colors,

        ]);
    }

    function getColor(Request $request)
    {
        $str = '';

        $get_color = MakingknittingMultipleReceived::where('received_chalan_id', $request->received_chalan_id)->select('color', 'id')->get();

        foreach ($get_color as $color) {
            // echo $size->size_id . ',';
            $str .= '<option value="' . $color->color . '">' . $color->color . '</option>';
        }
        // foreach ($get_color as $color) {
        //     // echo $size->size_id . ',';
        //     $str .= '<option value="' . $color->color . '"' .  $color->received_chalan_id == $request->received_chalan_id ? "selected" : "" . '>' . $color->color . '</option>';
        // }
        echo $str;
        // return $get_color;
    }

    function store(Request $request)
    {
        // return $request;

        $dyeing_dyeing_send_id = MakingDyeingSend::create([
            'send_chalan_id' => $request->send_chalan_id,
            'date' =>  $request->date,
            'company_id' => $request->company_id,
            'created_at' => Carbon::now()
        ]);


        $form_count = $request->form_count;
        $received_chalan_id = $request->received_chalan_id;
        $color = $request->color;
        $roll = $request->roll;
        $body = $request->body;
        $rib = $request->rib;
        $total = $request->total;
        $lost_percentage = $request->lost_percentage;

        for ($i = 0; $i < count($form_count); $i++) {
            MakingDyeingMultipleSend::insert([
                'dyeing_send_id' => $dyeing_dyeing_send_id->id,
                'received_chalan_id' => $received_chalan_id[$i],
                'color' => $color[$i],
                'roll' => $roll[$i],
                'body' => $body[$i],
                'rib' => $rib[$i],
                'total' => $total[$i],
                'lost_percentage' => $lost_percentage[$i],
                'created_at' => Carbon::now(),
            ]);
        }

        $notification = array(
            'message' => 'Making Dyeing Send Sucessfully!',
            'alert-type' => 'success'
        );
        return back()->with($notification);
        // return redirect()->route('dyeingSendShow')->with($notification);
    }

    function show()
    {
        $all_dyeing_send = MakingDyeingSend::get();
        return view('admin.making.dyeing-send.show', compact('all_dyeing_send'));
    }

    function edit($dyeing_id)
    {
        $all_company_name = CompanyName::get();
        $knetting_received_chalan_id = MakingDyeingMultipleSend::select('received_chalan_id')->get();
        $dyeing_received_colors = MakingknittingMultipleReceived::select('color')->get();
        $dyeing_send_id = MakingDyeingSend::find($dyeing_id);
        return view('admin.making.dyeing-send.edit', [
            'dyeing_send_id' => $dyeing_send_id,
            'all_company_name' => $all_company_name,
            'knetting_received_chalan_id' => $knetting_received_chalan_id,
            'dyeing_received_colors' => $dyeing_received_colors,
        ]);
    }

    function update(Request $request)
    {
        MakingDyeingSend::find($request->dyeing_id)->update([
            'send_chalan_id' => $request->send_chalan_id,
            'date' =>  $request->date,
            'company_id' => $request->company_id,
            'updated_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Making Knitting Send Update Sucessfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('dyeingSendShow')->with($notification);
    }

    public function destroy($id)
    {
        // echo $id;
        MakingDyeingSend::find($id)->delete();
        MakingDyeingMultipleSend::where('dyeing_send_id', $id)->delete();
        return response()->json(['success' => 'Delete sucessfull']);
    }

    function dyeingSendView($dyeing_id)
    {
        // return $dyeing_id;
        $all_dyeing_send = MakingDyeingMultipleSend::where('dyeing_send_id', $dyeing_id)->get();
        // return $all_dyeing_send;
        return view('admin.making.dyeing-send.view', [
            'all_dyeing_send' => $all_dyeing_send
        ]);
    }

    function dyeingSendMultipleEdit($dyeing_multiple_id)
    {
        // echo $dyeing_multiple_id;
        $all_dyeing_multiple_send = MakingDyeingMultipleSend::find($dyeing_multiple_id);
        // return $all_dyeing_multiple_send->received_chalan_id;
        $knetting_received_chalan_id = MakingknittingMultipleReceived::select('received_chalan_id')->get();
        // return $knetting_received_chalan_id;
        return view('admin.making.dyeing-send.dyeingMultipleEdit', [
            'all_dyeing_multiple_send' => $all_dyeing_multiple_send,
            'knetting_received_chalan_id' => $knetting_received_chalan_id,

        ]);
    }

    function dyeingSendMultipleUpdate(Request $request)
    {
        // return  $request->dyeing_send_multiple_id;
        MakingDyeingMultipleSend::find($request->dyeing_send_multiple_id)->update([

            'received_chalan_id' => $request->received_chalan_id,
            'color' => $request->color,
            'roll' => $request->roll,
            'body' => $request->body,
            'rib' => $request->rib,
            'total' => $request->total,
            'lost_percentage' => $request->lost_percentage,
            'updated_at' => Carbon::now()

        ]);
        $notification = array(
            'message' => 'Making Dyeing Send Update Sucessfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('dyeingSendShow')->with($notification);
    }

    function dyeingSendgeneratePDFview($dyeing_multiple_id)
    {
        // return $dyeing_multiple_id;

        $pdf = PDF::loadView('admin.making.dyeing-send.invoice', [
            'dyeing_multiple_id' => $dyeing_multiple_id
        ]);

        return view('admin.making.dyeing-send.invoice', [

            'dyeing_multiple_id' => $dyeing_multiple_id,

        ]);
    }

    function dyeingSendgeneratePDFDown($dyeing_multiple_id)
    {

        $pdf = PDF::loadView('admin.making.dyeing-send.invoice', [
            'dyeing_multiple_id' => $dyeing_multiple_id
        ]);
        return $pdf->download('dyeingSend.pdf');
    }
    function knittingRecivedMultipleDelete($id)
    {
        MakingDyeingMultipleSend::find($id)->delete();
        return response()->json(['success' => 'Delete sucessfull']);
    }
}
