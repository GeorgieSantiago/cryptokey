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
$currency = $coins["Currency"]->result;
$market = $coins["Market"]->result;
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
										<th>Price(BTC)</th>
										<th>Price USD</th>
										<th>Volume USD</th>
										<th>Rank</th>
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
				} else {
					continue;
				}
			}
		?>
									<tr>
										<td><img class="coin-logo" style="max-width: 10%;" src="{{$currentMarket->LogoUrl}}" id="{{$currentMarket->MarketCurrency}}" /></td>
										<td id="{{$currency[$n]->Currency}}">{{$currency[$n]->Currency}}</td>
										<td>DataPoint</td>
										<td>DataPoint</td>
										<td>DataPoint</td>
										<td id="updated"></td>
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
