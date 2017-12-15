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
          @foreach($price as $name => $value)
            @if($name == $symbol || $name . "E" == $symbol || "BIT" . $name == $symbol)
              <td>{{$value}}</td>
            @else
              <?php continue; ?>
            @endif
          @endforeach
      </tr>
@endforeach
</tbody>
</table>
</div>
<script class="js">
$('#table').basictable();
</script>

<!---->



                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
