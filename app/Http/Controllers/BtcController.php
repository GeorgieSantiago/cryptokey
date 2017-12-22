<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BtcController extends Controller
{

  public function index()
  {
    return view("btc.index");
  }
}
