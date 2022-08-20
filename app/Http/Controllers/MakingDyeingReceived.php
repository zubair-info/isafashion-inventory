<?php

namespace App\Http\Controllers;

use App\Models\CompanyName;
use App\Models\MakingDyeingMultipleReceived;
use App\Models\MakingDyeingRecived;
use App\Models\MakingDyeingSend;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class MakingDyeingReceived extends Controller
{
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
        ]);
        $notification = array(
            'message' => 'Making Dyeig Received Sucessfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('dyeingReceivedShow')->with($notification);
    }
}
