<?php

namespace App\Http\Controllers;

use App\User;
use Freshbitsweb\Laratables\Laratables;

class CustomLaraTableController extends Controller
{
    /**
     * Show Table Header column
     *
     *
     * @return \Illuminate\Http\Response
     **/
    public function index()
    {
        return view('customLaraTable');
    }

    /**
     * return data of the custom datatables.
     *
     *
     * @param Type $var Description
     * @return Json
     **/
    public function customLaraTableData()
    {
        return Laratables::recordsOf(User::class);
    }
}
