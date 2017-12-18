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
  setInterval(GetPriceStream , 10000);

  function GetPriceStream(){
  $.ajax({
    type: "GET",
    url: 'https://min-api.cryptocompare.com/data/price?fsym=ETH&tsyms=BTC,USD,EUR',
    dataType: 'json',
    cache: false, // otherwise will get fresh copy every page load
    success: function(data) {
      console.log(data);
      var k;
      data.forEach(function(k in data){
        document.getElementById(symbol).innerHTML = value;
      });
      console.log(k);
    }
  })
}
  </script>
@endsection
