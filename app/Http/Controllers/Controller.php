<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use View;
//use Phpml\Classification\KNearestNeighbors;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

/*
  This method is for storing static values in the db for quicker query.
  TODO
*/
    private function StaticStore($coins)
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

    public static function prettyPrint($data)
    {
      echo "<pre>";
      print_r($data);
      echo "</pre>";
    }
}
