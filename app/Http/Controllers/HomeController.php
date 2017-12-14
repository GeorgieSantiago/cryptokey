<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $urls = [
        "CoinList" => "https://www.cryptocompare.com/api/data/coinlist/",
        "PriceExample" => "https://min-api.cryptocompare.com/data/price?fsym=ETH&tsyms=BTC,USD,EUR",
        "PriceHistory" => "https://min-api.cryptocompare.com/data/pricehistorical",
        "HistoryMinutes" => "https://min-api.cryptocompare.com/data/histominute",
        "HistoryHours" => "https://min-api.cryptocompare.com/data/histohour",
        "HistoryDays" => "https://min-api.cryptocompare.com/data/histoday",
        "MiningEquipment" => "https://www.cryptocompare.com/api/data/miningequipment/",
        "TopPairs" => "https://min-api.cryptocompare.com/data/top/pairs?fsym=BTC&limit=20"
      ];

      foreach ($urls as $key => $value)
      {
        $result = file_get_contents($value);
        $data = json_decode($result);
        if($data == null)
        {
          die($key . " " . $value . " Has returned null");
        }
        $this->coins[$key] = $data;
      }

        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('home');
    }
}
