<?php

namespace App\Http\Controllers;

use App\Models\CompanyName;
use App\Models\CuttingMultipleReceived;
use App\Models\CuttingReceived;
use App\Models\CuttingSend;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use PDF;

class CuttingReceivedController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    function index()
    {
        $all_company_name = CompanyName::get();
        $cutting_send_chalan_id = CuttingSend::select('send_chalan_id')->get();
        return view('admin.cutting.cutting-received.index', [
            'all_company_name' => $all_company_name,
            'cutting_send_chalan_id' => $cutting_send_chalan_id,
        ]);
    }

    function store(Request $request)
    {
        // return $request->all();
        $cutting_received_id = CuttingReceived::create([
            'send_chalan_id' => $request->send_chalan_id,
            'company_id' => $request->company_id,
            'date' => $request->date,
        ]);

        $form_count = $request->form_count;
        $received_chalan_id = $request->received_chalan_id;
        // $date = $request->date;
        $style = $request->style;
        $lot_no = $request->lot_no;
        $body = $request->body;
        $balance = $request->balance;

        for ($i = 0; $i < count($form_count); $i++) {
            CuttingMultipleReceived::insert([
                'cutting_received_id' => $cutting_received_id->id,
                'received_chalan_id' => $received_chalan_id[$i],
                // 'date' => $date[$i],
                'style' => $style[$i],
                'lot_no' => $lot_no[$i],
                'body' => $body[$i],
                'balance' => $balance[$i],
                'created_at' => Carbon::now(),
            ]);
        }
        $notification = array(
            'message' => 'Cutting Received Add Sucessfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('cuttingReceivedShow')->with($notification);
    }

    function show()
    {
        $all_cutting_received = CuttingReceived::get();
        return view('admin.cutting.cutting-received.show', [
            'all_cutting_received' => $all_cutting_received
        ]);
    }

    function destroy($id)
    {
        CuttingReceived::find($id)->delete();
        CuttingMultipleReceived::where('cutting_received_id', $id)->delete();
        return response()->json(['success' => 'Delete sucessfull']);
    }

    function cuttingReceivedView($cutting_received_id)
    {
        $all_cuting_received = CuttingMultipleReceived::where('cutting_received_id', $cutting_received_id)->get();
        return view('admin.cutting.cutting-received.view', [
            'all_cuting_received' => $all_cuting_received
        ]);
    }

    function cuttingReceivedMultipleEdit($cutting_received_id)
    {
        // echo $dyeing_multiple_id;
        $all_cutting_multiple_received = CuttingMultipleReceived::find($cutting_received_id);
        return view('admin.cutting.cutting-received.cuttingReceivedMultipleEdit', [
            'all_cutting_multiple_received' => $all_cutting_multiple_received,

        ]);
    }
    function cuttingReceivedMultipleUpdate(Request $request)
    {
        CuttingMultipleReceived::find($request->cutting_received_multiple_id)->update([
            'received_chalan_id' => $request->received_chalan_id,
            // 'date' => $request->date,
            'style' => $request->style,
            'lot_no' => $request->lot_no,
            'body' => $request->body,
            'balance' => $request->balance,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Cutting Received Update Sucessfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('cuttingReceivedShow')->with($notification);
    }

    function cuttingRecevedMultipleDelete($id)
    {
        CuttingMultipleReceived::find($id)->delete();
        return response()->json(['success' => 'Delete sucessfull']);
    }

    function cuttingReceivedPDFView($cutting_received_id)
    {

        // return $cutting_received_id;
        $pdf = PDF::loadView('admin.cutting.cutting-received.invoice', [
            'cutting_received_id' => $cutting_received_id
        ]);

        return view('admin.cutting.cutting-received.invoice', [

            'cutting_received_id' => $cutting_received_id,

        ]);
    }

    function cuttingReceivdPDFDownload($cutting_received_id)
    {
        $pdf = PDF::loadView('admin.cutting.cutting-received.invoice', [
            'cutting_received_id' => $cutting_received_id
        ]);
        return $pdf->download('cuttingReceived.pdf');
    }
}
