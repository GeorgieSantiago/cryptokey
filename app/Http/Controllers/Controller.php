<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

/*
  This Data Constructure handles everything that comes from
  remote APIs including variable creation, storage and filtering
  TODO: Use new query perams in the urls to grab mass data and store
  it using the $this->StoreStatic()
*/
    protected function getCoinData()
    {
      $coins = [];
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
          session_start();
          $_SESSION['error']  = $key . " " . $value . " Has returned null";
        }
        $coins[$key] = $data;
      }

      $this->StaticStore();
      return $coins;
    }

/*
  This method is for storing static values in the db for quicker query.
  TODO
*/
    private function StaticStore()
    {

    }
}
