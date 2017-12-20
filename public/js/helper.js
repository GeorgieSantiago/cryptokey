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

function GetPriceStream(){
$.ajax({
  type: "GET",
  url: 'https://api.coinmarketcap.com/v1/ticker/',
  dataType: 'json',
  cache: false, // otherwise will get fresh copy every page load
  success: function(data) {
      datastream = data;
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
      }
    }})
  }

function subscriptionTrigger()
{
  console.log("Subscriber added");
}
