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
										<th>Price(BTC)</th>
										<th>Volume USD</th>
										<th>High</th>
										<th>Low</th>
										<th>Created At</th>
									</tr>
								</thead>
								<tbody>
@for($n = 0;$n < count($currency);$n++)
		<?php
			for($t = 0;$t < count($market);$t++)
			{
				if($market[$t]->MarketCurrency == $currency[$n]->Currency && isset($market[$t]))
				{
					$currentMarket = $market[$t];
					$currentSummary = $summary[$t];
				} else {
					continue;
				}
				//dd($currentSummary);
			}
		?>
									<tr>
										<td><img class="coin-logo" style="max-width: 10%;" src="{{$currentMarket->LogoUrl}}" id="{{$currentMarket->MarketCurrency}}" /></td>
										<td id="{{$currency[$n]->Currency}}">{{$currency[$n]->Currency}}</td>
										<td>{{$currentSummary->Last}}</td>
										<td>{{$currentSummary->BaseVolume}}</td>
										<td>{{$currentSummary->High}}</td>
										<td>{{$currentSummary->Low}}</td>
										<td>{{$currentSummary->Created}}</td>
									</tr>
@endfor

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
/*  GetPriceStream();
  setInterval(GetPriceStream , 1000);
*/
  </script>
@endsection
