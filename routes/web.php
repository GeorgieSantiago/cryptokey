<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
//  $json = file_get_contents("https://www.cryptocompare.com/api/data/price/");
  $json = file_get_contents("https://min-api.cryptocompare.com/data/pricemulti?fsyms=ETH,DASH&tsyms=BTC,USD,EUR");
  $data = json_decode($json);
  dd($data);
  $coins = $data->Data;
  echo "<select>";
  foreach($coins as $coin)
  {
    echo "<option value='" . $coin->Id . "' >" . $coin->CoinName . "</option>";
  }
  echo "</select>";
  exit;
});
