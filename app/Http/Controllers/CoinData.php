<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoinData extends Controller
{

  public $coins = [];

  public function __construct()
  {
/*
  For more data go to https://www.cryptocompare.com/api/ this be the docs
  Docs for min-api : https://min-api.cryptocompare.com/
*/
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
  }
}
