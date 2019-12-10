<?php

namespace App\Http\Controllers;

use App\User;
use Freshbitsweb\Laratables\Laratables;

class CustomLaratableController extends Controller
{
    /**
     * Display Home Page.
     *
     * @return \Illuminate\Http\Response
     **/
    public function index()
    {
        return view('custom_laratable');
    }

    /**
     * Returns data of the custom datatables.
     *
     * @return Illuminate\Http\JsonResponse
     **/
    public function customLaratableData()
    {
        return Laratables::recordsOf(User::class);
    }
}
