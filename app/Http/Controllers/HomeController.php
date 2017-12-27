<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coins = $this->getCoinData();
		    $currency = $coins["Currency"]->result;
		    $market = $coins["Market"]->result;
	    	$summary = $coins["Summary"]->result;
        return view('home' , compact('coins', 'currency' , 'market', 'summary'));
    }

//TODO VolatileIndex will put together the top three hot markets.
    protected function VolatileIndex()
    {
      return false;
    }
}
