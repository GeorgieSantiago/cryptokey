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

    protected function getCoinData()
    {
      $coins = [];

      $urls = [
          "Currency" => "https://bittrex.com/api/v1.1/public/getcurrencies",
          "Market" => "https://bittrex.com/api/v1.1/public/getmarkets",
          "Summary" => "https://bittrex.com/api/v1.1/public/getmarketsummaries"
      ];


      foreach ($urls as $key => $value)
      {

        $result = file_get_contents($value);
        $data = json_decode($result);

        if($data == null)
        {
          session_start();
          $_SESSION['error']  = $key . " " . $value . " Has returned null";
        }


        $coins[$key] = $data;
      }
      return $coins;
    }
}
