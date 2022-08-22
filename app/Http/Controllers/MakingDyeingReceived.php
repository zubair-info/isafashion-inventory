<?php

namespace App\Http\Controllers;

use App\Models\CompanyName;
use App\Models\MakingDyeingMultipleReceived;
use App\Models\MakingDyeingRecived;
use App\Models\MakingDyeingSend;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use PDF;

class MakingDyeingReceived extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    function index()
    {
        $all_dyeing_send_chalan_id = MakingDyeingSend::select('send_chalan_id', 'id')->get();
        $all_company_name =  CompanyName::get();
        return view('admin.making.dyeing-received.index', [
            'all_dyeing_send_chalan_id' => $all_dyeing_send_chalan_id,
            'all_company_name' => $all_company_name,
            'created_at' => Carbon::now(),
        ]);
    }

    function store(Request $request)
    {

        // return $request;
        $making_dyeing_received_id = MakingDyeingRecived::create([
            'send_chalan_id' => $request->send_chalan_id,
            'company_id' => $request->company_id,
        ]);


        $form_count = $request->form_count;
        $received_chalan_id = $request->received_chalan_id;
        $date = $request->date;
        $color = $request->color;
        $style = $request->style;
        $lot_no = $request->lot_no;
        $body = $request->body;
        $rib = $request->rib;
        $balance = $request->balance;

        for ($i = 0; $i < count($form_count); $i++) {
            MakingDyeingMultipleReceived::insert([
                'dyeing_send_id' => $making_dyeing_received_id->id,
                'received_chalan_id' => $received_chalan_id[$i],
                'date' => $date[$i],
                'color' => $color[$i],
                'style' => $style[$i],
                'lot_no' => $lot_no[$i],
                'body' => $body[$i],
                'rib' => $rib[$i],
                'balance' => $balance[$i],
                'created_at' => Carbon::now(),
            ]);
        }
        $notification = array(
            'message' => 'Making Dyeing Received Sucessfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('dyeingReceivedShow')->with($notification);
    }

    function show()
    {
        $all_dyeing_received = MakingDyeingRecived::get();
        return view('admin.making.dyeing-received.show', compact('all_dyeing_received'));
    }

    function edit($dyeing_id)
    {
        // return view('admin.making.dyeing-received.edit');
        $all_company_name = CompanyName::get();
        $dyeing_received_id = MakingDyeingRecived::find($dyeing_id);
        // dd($dyeing_received_id);
        return view('admin.making.dyeing-received.edit', [
            'dyeing_received_id' => $dyeing_received_id,
            'all_company_name' => $all_company_name,

        ]);
    }

    function update(Request $request)
    {
        // return $request;
        MakingDyeingRecived::find($request->dyeing_received_id)->update([
            'send_chalan_id' => $request->send_chalan_id,
            'company_id' => $request->company_id,
            'updated_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Making Dyeig Received Sucessfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('dyeingReceivedShow')->with($notification);
    }

    public function destroy($id)
    {
        // echo $id;
        MakingDyeingRecived::find($id)->delete();
        MakingDyeingMultipleReceived::where('dyeing_send_id', $id)->delete();
        return response()->json(['success' => 'Delete sucessfull']);
    }

    function dyeingReceivedView($dyeing_id)
    {
        // return $dyeing_id;
        $all_dyeing_received = MakingDyeingMultipleReceived::where('dyeing_send_id', $dyeing_id)->get();
        // return $all_dyeing_send;
        return view('admin.making.dyeing-received.view', [
            'all_dyeing_received' => $all_dyeing_received
        ]);
    }

    function dyeingReceivedMultipleEdit($dyeing_multiple_id)
    {
        // echo $dyeing_multiple_id;
        $all_dyeing_multiple_received = MakingDyeingMultipleReceived::find($dyeing_multiple_id);
        // return $all_dyeing_multiple_send->received_chalan_id;
        $dyeing_received_chalan_id = MakingDyeingMultipleReceived::select('received_chalan_id')->get();
        // return $knetting_received_chalan_id;
        return view('admin.making.dyeing-received.dyeingReceivedMultipleEdit', [
            'all_dyeing_multiple_received' => $all_dyeing_multiple_received,
            'dyeing_received_chalan_id' => $dyeing_received_chalan_id,

        ]);
    }

    function dyeingReceivedMultipleUpdate(Request $request)
    {
        // return $request;
        // return  $request->dyeing_received_multiple_id;
        MakingDyeingMultipleReceived::find($request->dyeing_received_multiple_id)->update([
            'received_chalan_id' => $request->received_chalan_id,
            // 'date' => $request->date,
            'color' => $request->color,
            'style' => $request->style,
            'lot_no' => $request->lot_no,
            'body' => $request->body,
            'rib' => $request->rib,
            'balance' => $request->balance,
            'updated_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Dyeig Received Multiple Sucessfully!',
            'alert-type' => 'success'
        );
        return back();
        // return redirect()->route('dyeingReceivedShow')->with($notification);
    }

    function dyeingReceivedMultipleDelete($id)
    {
        // echo $id;
        MakingDyeingMultipleReceived::find($id)->delete();
        return response()->json(['success' => 'Delete sucessfull']);
    }
}
