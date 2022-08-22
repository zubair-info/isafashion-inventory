<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MarkatReceivedController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    function index()
    {
        return view('admin.markat.markat-received.index');
    }
}
