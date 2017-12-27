<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrendController extends Controller
{


  public function index()
  {
    $x;
    $limit = 3;
    $b;


    $data = $this->getCoinData();
    return view('trend.index' , compact('data'));
  }
}
