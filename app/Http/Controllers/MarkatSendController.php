<?php

namespace App\Http\Controllers;

use App\Models\CompanyName;
use App\Models\MarkatMultipleSend;
use App\Models\MarkatReceived;
use App\Models\MarkatSend;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use PDF;

class MarkatSendController extends Controller
{
    //
    function index()
    {
        $all_markat_received_chalan_id = MarkatReceived::select('received_chalan_id', 'id')->get();
        $all_company_name =  CompanyName::get();
        return view('admin.markat.markat-send.index', [
            'all_markat_received_chalan_id' => $all_markat_received_chalan_id,
            'all_company_name' => $all_company_name,
        ]);
    }

    function store(Request $request)
    {
        $markat_send_id = MarkatSend::create([
            'received_chalan_id' => $request->received_chalan_id,
            'company_id' => $request->company_id,
        ]);


        $form_count = $request->form_count;
        $send_chalan_id = $request->send_chalan_id;
        $date = $request->date;
        $style = $request->style;
        $lot_no = $request->lot_no;
        $body = $request->body;
        $balance = $request->balance;

        for ($i = 0; $i < count($form_count); $i++) {
            MarkatMultipleSend::insert([
                'markat_send_id' => $markat_send_id->id,
                'send_chalan_id' => $send_chalan_id[$i],
                'date' => $date[$i],
                'style' => $style[$i],
                'lot_no' => $lot_no[$i],
                'body' => $body[$i],
                'balance' => $balance[$i],
                'created_at' => Carbon::now(),
            ]);
        }

        $notification = array(
            'message' => 'Making Dyeing Received Sucessfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('markatSendShow')->with($notification);
    }

    function show()
    {
        $all_markat_send = MarkatSend::get();
        return view('admin.markat.markat-send.show', [
            'all_markat_send' => $all_markat_send
        ]);
    }

    function edit($markat_send_id)
    {
        $all_company_name = CompanyName::get();
        $all_markat_send = MarkatSend::find($markat_send_id);
        return view('admin.markat.markat-send.edit', [
            'all_markat_send' => $all_markat_send,
            'all_company_name' => $all_company_name,

        ]);
    }

    function update(Request $request)
    {
        MarkatSend::find($request->markat_send_id)->update([
            'received_chalan_id' => $request->received_chalan_id,
            'company_id' => $request->company_id,
        ]);
        $notification = array(
            'message' => 'Making Dyeing Received Sucessfully!',
            'alert-type' => 'info'
        );
        return redirect()->route('markatSendShow')->with($notification);
    }

    function destroy($id)
    {
        MarkatSend::find($id)->delete();
        MarkatMultipleSend::where('markat_send_id', $id)->delete();
        return response()->json(['success' => 'Delete sucessfull']);
    }

    function markatSendView($markat_send_id)
    {

        $all_markat_send = MarkatMultipleSend::where('markat_send_id', $markat_send_id)->get();
        return view('admin.markat.markat-send.view', [
            'all_markat_send' => $all_markat_send,
        ]);
    }

    function markatSendMultipleEdit($markat_send_id)
    {

        $all_markat_multiple_send = MarkatMultipleSend::find($markat_send_id);
        return view('admin.markat.markat-send.markatSendMultipleEdit', [
            'all_markat_multiple_send' => $all_markat_multiple_send,
        ]);
    }
    function markatSendMultipleUpdate(Request $request)
    {
        MarkatMultipleSend::find($request->markat_send_multiple_id)->update([
            'send_chalan_id' => $request->send_chalan_id,
            'date' => $request->date,
            'style' => $request->style,
            'lot_no' => $request->lot_no,
            'body' => $request->body,
            'balance' => $request->balance,
        ]);
        $notification = array(
            'message' => 'Making Update Sucessfully!',
            'alert-type' => 'info'
        );
        return redirect()->to('markat-send-view/' . $request->markat_send_id)->with($notification);
        // return redirect()->route('markatSendShow')->with($notification);
    }
    function markatSendMultipleDelete($id)
    {
        MarkatMultipleSend::find($id)->delete();
        return response()->json(['success' => 'Delete sucessfull']);
    }
    function markatSendPDFView($markat_send_id)
    {


        $pdf = PDF::loadView('admin.markat.markat-send.invoice', [
            'markat_send_id' => $markat_send_id
        ]);

        return view('admin.markat.markat-send.invoice', [

            'markat_send_id' => $markat_send_id,

        ]);
    }
    function markatSendPDFDownload($markat_send_id)
    {
        $pdf = PDF::loadView('admin.markat.markat-send.invoice', [
            'markat_send_id' => $markat_send_id
        ]);
        return $pdf->download('markatSend_' . $markat_send_id . '.pdf');
    }
}
