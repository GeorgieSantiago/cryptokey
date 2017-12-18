@extends('layouts.main')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">Dashboard</div>
				<div class="panel-body">
                    @if (session('status'))

					<div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

					<!---->
					<?php

$data = $coins['CoinList']->Data;
$price = $coins['PriceExample'];
?>
					<div class="table-heading">
						<h2>All Coins</h2>
					</div>
					<div class="agile-tables">
						<div class="w3l-table-info">
							<h3></h3>
							<table id="table" class="table">
								<thead>
									<tr>
										<th>Coin Symbol</th>
										<th>Id</th>
										<th>Price</th>
										<th>data</th>
										<th>data</th>
										<th>data</th>
									</tr>
								</thead>
								<tbody>
@foreach($data as $symbol => $info)

									<tr>
										<td>{{$symbol}}</td>
										<td>{{$info->Id}}</td>
										<td id="{{$symbol}}"></td>
									</tr>
@endforeach

								</tbody>
							</table>
						</div>
						<!---->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('scripts')

<script>
  GetPriceStream();
  setInterval(GetPriceStream , 30000);

  function GetPriceStream(){
  $.ajax({
    type: "GET",
    url: 'https://api.coinmarketcap.com/v1/prices/',
    dataType: 'json',
    cache: false, // otherwise will get fresh copy every page load
    success: function(data) {
				datastream = JSON.stringify(data);
				console.log(data);
			}})
    }




/*Bullshit helper function*/
		function getTime()
		{
			now = new Date();
year = "" + now.getFullYear();
month = "" + (now.getMonth() + 1); if (month.length == 1) { month = "0" + month; }
day = "" + now.getDate(); if (day.length == 1) { day = "0" + day; }
hour = "" + now.getHours(); if (hour.length == 1) { hour = "0" + hour; }
minute = "" + now.getMinutes(); if (minute.length == 1) { minute = "0" + minute; }
second = "" + now.getSeconds(); if (second.length == 1) { second = "0" + second; }
return year + "-" + month + "-" + day + " " + hour + ":" + minute + ":" + second;
		}
  </script>
@endsection
