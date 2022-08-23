<?php

namespace App\Http\Controllers;

use App\Models\CompanyName;
use App\Models\Kapor;
use App\Models\MarkatMultipleReceived;
use App\Models\MarkatReceived;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use League\CommonMark\Input\MarkdownInput;
use PDF;

class MarkatReceivedController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    function index()
    {
        $all_company_name = CompanyName::all();
        $all_kapor_name = Kapor::get();
        return view('admin.markat.markat-received.index', [
            'all_company_name' => $all_company_name,
            'all_kapor_name' => $all_kapor_name
        ]);
    }

    function store(Request $request)
    {
        // return $request;
        $received_markat_id = MarkatReceived::create([
            'received_chalan_id' => $request->received_chalan_id,
            'date' => $request->date,
            'company_id' => $request->company_id,
        ]);
        $form_count = $request->form_count;
        $kapor_id = $request->kapor_id;
        $rate = $request->rate;
        $body = $request->body;
        $roll = $request->roll;
        $balance = $request->balance;

        for ($i = 0; $i < count($form_count); $i++) {
            MarkatMultipleReceived::insert([
                'received_markat_id' => $received_markat_id->id,
                'kapor_id' => $kapor_id[$i],
                'rate' => $rate[$i],
                'body' => $body[$i],
                'roll' => $roll[$i],
                'balance' => $balance[$i],
                'created_at' => Carbon::now(),
            ]);
        }
        // return back();
        $notification = array(
            'message' => 'Cutting Received Add Sucessfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('markatReceivedShow')->with($notification);
    }

    function show()
    {
        $all_markat_received = MarkatReceived::get();
        return view('admin.markat.markat-received.show', [
            'all_markat_received' => $all_markat_received
        ]);
    }

    function destroy($id)
    {
        MarkatReceived::find($id)->delete();
        MarkatMultipleReceived::where('received_markat_id', $id)->delete();
        return response()->json(['success' => 'Delete sucessfull']);
    }
    function edit($markat_received_id)
    {
        // return view('admin.making.dyeing-received.edit');
        $all_company_name = CompanyName::get();
        $all_markat_received = MarkatReceived::find($markat_received_id);
        // dd($dyeing_received_id);
        return view('admin.markat.markat-received.edit', [
            'all_markat_received' => $all_markat_received,
            'all_company_name' => $all_company_name,

        ]);
    }

    function update(Request $request)
    {
        // return $request;
        MarkatReceived::find($request->markat_received_id)->update([
            'received_chalan_id' => $request->received_chalan_id,
            'date' => $request->date,
            'company_id' => $request->company_id,

        ]);
        $notification = array(
            'message' => 'Markat Received Add Sucessfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('markatReceivedShow')->with($notification);
    }


    function markatReceivedView($markat_received_id)
    {
        $all_markat_received = MarkatMultipleReceived::where('received_markat_id', $markat_received_id)->get();
        return view('admin.markat.markat-received.view', [
            'all_markat_received' => $all_markat_received,
        ]);
    }

    function markatReceivedMultipleEdit($markat_received_id)
    {
        $all_markat_multiple_received = MarkatMultipleReceived::find($markat_received_id);
        $all_kapor_name = Kapor::get();
        return view('admin.markat.markat-received.markatReceivedMultipleEdit', [
            'all_markat_multiple_received' => $all_markat_multiple_received,
            'all_kapor_name' => $all_kapor_name

        ]);
    }

    function markatRecivedMultipleUpdate(Request $request)
    {
        MarkatMultipleReceived::find($request->markat_received_multiple_id)->update([
            'kapor_id' => $request->kapor_id,
            'rate' => $request->rate,
            'body' => $request->body,
            'roll' => $request->roll,
            'balance' => $request->balance,
        ]);
        $notification = array(
            'message' => 'Markat Received Update Sucessfully!',
            'alert-type' => 'info'
        );

        return redirect()->route('markatReceivedShow')->with($notification);
    }

    function markatRecevedMultipleDelete($id)
    {
        MarkatMultipleReceived::find($id)->delete();
        return response()->json(['success' => 'Delete sucessfull']);
    }

    function markatReceivedPDFView($markat_received_id)
    {

        // return $cutting_received_id;
        $pdf = PDF::loadView('admin.markat.markat-received.invoice', [
            'markat_received_id' => $markat_received_id
        ]);

        return view('admin.markat.markat-received.invoice', [

            'markat_received_id' => $markat_received_id,

        ]);
    }

    function markatReceivdPDFDownload($markat_received_id)
    {
        $pdf = PDF::loadView('admin.markat.markat-received.invoice', [
            'markat_received_id' => $markat_received_id
        ]);
        return $pdf->download('markatReceived.pdf');
    }
}
