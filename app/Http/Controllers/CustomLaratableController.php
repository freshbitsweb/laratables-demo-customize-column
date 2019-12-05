<?php

namespace App\Http\Controllers;

use App\User;
use Freshbitsweb\Laratables\Laratables;

class CustomLaratableController extends Controller
{
    /**
     * Show Table Header column
     *
     *
     * @return \Illuminate\Http\Response
    **/
    public function index()
    {
        return view('custom_laratable');
    }

    /**
     * return data of the custom datatables.
     *
     *
     * @param Type $var Description
     * @return Json
     **/
    public function customLaratableData()
    {
        return Laratables::recordsOf(User::class);
    }
}
