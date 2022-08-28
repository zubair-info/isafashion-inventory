<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccesoriesOutputController extends Controller
{
    //
    function accessoriesOutputAdd(Request $request)
    {
        return view('admin.accesories.output.index');
    }
    function accessoriesOutputStore(Request $request)
    {
        return $request;
    }
}
