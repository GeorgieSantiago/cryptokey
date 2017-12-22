@extends('layouts.main')

@section('content')
<div class="col-md-12 agile-grid-right">
  <div class="w3l-chart1">
    <h3>Single Data Set</h3>
    <div id="graph2"></div>
  </div>
</div>
<div class="clearfix"> </div>
@endsection
@section('scripts')



<script src="js/graph.js"></script>
<script>
  GetPriceStream('https://api.coindesk.com/v1/bpi/currentprice.json');
</script>
@endsection
