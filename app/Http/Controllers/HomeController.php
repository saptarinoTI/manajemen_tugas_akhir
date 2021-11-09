<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\ConnectException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\ConnectionException;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function edit($id)
    {
        //
    }
}
