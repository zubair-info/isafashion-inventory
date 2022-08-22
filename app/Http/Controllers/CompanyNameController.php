<?php

namespace App\Http\Controllers;

use App\Models\CompanyName;
use Illuminate\Http\Request;

class CompanyNameController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    function index()
    {
        // $company = CompanyName::find($id);
        $all_company_name = CompanyName::all();
        return view('admin.company.index', compact('all_company_name'));
    }

    function store(Request $request)
    {
        // dd($request);
        CompanyName::insert([
            'company_name' => $request->company_name,
        ]);
        $notification = array(
            'message' => 'Company Name Add Sucessfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('companyName')->with($notification);
    }

    function edit($id)
    {
        // dd($request);
        $company = CompanyName::find($id);
        return view('admin.company.edit', compact('company'));
    }

    function update(Request $request)
    {
        // return $request;
        CompanyName::find($request->id)->update([
            'company_name' => $request->company_name,
        ]);
        $notification = array(
            'message' => 'Company Name Update Sucessfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('companyName')->with($notification);
    }

    public function destroy($id)
    {
        // echo $user_id;
        CompanyName::find($id)->delete();
        return response()->json(['success' => 'Delete sucessfull']);
    }
}
