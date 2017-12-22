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

function GetPriceStream(urlstream){
$.ajax({
  type: "GET",
  url: urlstream,
  dataType: 'json',
  cache: false, // otherwise will get fresh copy every page load
  success: function(data) {
    $('#graph2').graphify({
      start: 'donut',
      obj: {
        id: 'lol',
        legend: false,
        showPoints: true,
        width: 775,
        legendX: 450,
        pieSize: 200,
        shadow: true,
        height: 400,
        animations: true,
        x: ["USD", "EUR", "GBP"],
        points: [data.bpi.USD.rate_float, data.bpi.EUR.rate_float, data.bpi.GBP.rate_float],
        xDist: 90,
        scale: 2500,
        yDist: 35,
        grid: false,
        xName: 'Year',
        dataNames: ['Amount'],
        design: {
          lineColor: 'red',
          tooltipFontSize: '20px',
          pointColor: 'red',
          barColor: 'blue',
          areaColor: 'orange'
        }
      }
    });


/*      datastream = data;
      console.log(data);
      for(var i = 0;i < datastream.length;i++){
        console.log(datastream[i]);
        var target = document.getElementById(datastream[i].symbol);
        if(target)
        {
          target.innerHTML = datastream[i].price_btc;
          document.getElementById(datastream[i].symbol + "USD").innerHTML = datastream[i].price_usd;
          document.getElementById(datastream[i].symbol + "24h_volume_usd").innerHTML = datastream[i].price_usd;
          document.getElementById(datastream[i].symbol + "Rank").innerHTML = datastream[i].rank;
          document.getElementById("updated").innerHTML = getTime();
        } else {
          target.innerHTML = "-";
          document.getElementById(datastream[i].symbol + "USD").innerHTML = "-";
          document.getElementById(datastream[i].symbol + "24h_volume_usd").innerHTML = "-";
          document.getElementById(datastream[i].symbol + "Rank").innerHTML = "-";
        }
      }*/
    }})
  }

function subscriptionTrigger()
{
  console.log("Subscriber added");
}
