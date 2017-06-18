$(document).ready(function(){

  Date.prototype.getWeek = function() {
    var onejan = new Date(this.getFullYear(),0,1);
    var today = new Date(this.getFullYear(),this.getMonth(),this.getDate());
    var dayOfYear = ((today - onejan +1)/86400000);
    return Math.ceil(dayOfYear/7)
  };

  function KtoC(F){
    return parseFloat(parseFloat(parseFloat(F) - 273.15)).toFixed(1);
  }

  function getDay(index){
    var weekday = new Array(7);
    weekday[0] = "Sun";
    weekday[1] = "Mon";
    weekday[2] = "Tue";
    weekday[3] = "Wed";
    weekday[4] = "Thu";
    weekday[5] = "Fri";
    weekday[6] = "Sat";

    return weekday[index];
  }

  function getMonth(index){
    var months = new Array(7);
    months[0] = "January";
    months[1] = "February";
    months[2] = "March";
    months[3] = "April";
    months[4] = "May";
    months[5] = "June";
    months[6] = "July";
    months[7] = "August";
    months[8] = "September";
    months[9] = "October";
    months[10] = "November";
    months[11] = "December";

    return months[index];
  }

  function getWeatherCurrent(){
    $.ajax({ type: 'GET', url: '/api/weather-current.php', dataType: 'json', success: function(data){
      var data = data['data'];
      $("#current-temp").html(KtoC(data['main']['temp'])+"°C");
      $("#current-description").html(data['weather'][0]['description']);
      $("#current-min-max").html(KtoC(data['main']['temp_min'])+"°C / "+KtoC(data['main']['temp_max'])+"°C");
      $("#current-pressure").html(data['main']['pressure']+" hPa");
      $("#current-humidity").html(data['main']['humidity']+"%");
      $("#current-wind").html(data['wind']['speed']+" m/s");
      $("#current-icon").attr("src", "gfx/"+data['weather'][0]['icon']+".png");
    }});

    setTimeout(getWeatherCurrent, 60000);
  }

  function getWeatherForecast(){
    $.ajax({ type: 'GET', url: '/api/weather-forecast.php', dataType: 'json', success: function(data){
      $.each(data['data']['list'], function(index, element){
        if(index == 0 || index > 4){
          return;
        }

	var day = new Date(1000 * parseInt(element['dt']));
        $("#day"+index+" .name").html(getDay(day.getDay()));
        $("#day"+index+" .icon").attr('src', "gfx/"+element['weather'][0]['icon']+".png");
        $("#day"+index+" .temp").html(KtoC(element['temp']['max'])+"°C");
        $("#day"+index+" .day-night").html(KtoC(element['temp']['day'])+"°C / "+KtoC(element['temp']['night'])+"°C");
        $("#day"+index+" .wind").html(element['speed']+" m/s");
        $("#day"+index+" .pressure").html(element['pressure']+" hPa");

      });
    }});

    setTimeout(getWeatherForecast, 60000);
  }

  function getTemps(){
    $.ajax({ type: 'GET', url: '/api/sensors.php', dataType: 'json', success: function(data){
      $.each(data['sensors'], function(index, element){
        if(index == 0){ //Inside
          $("#inside .value").html(element['value']+"°C");
          var description = $("#inside .description");
        }
        else if(index == 1){ //Outside
          $("#outside .value").html(element['value']+"°C");
          var description = $("#outside .description");
        }
        else{
          return;
        }

        var now = new Date();
        var last = new Date(parseInt(element['lastSeen']));
        var delta = parseInt((now-last)/1000);

        if(delta >= 86400){ delta /= 86400; dunit="d"; } //days
        else if(delta >= 3600){ delta /= 3600; dunit="h"; } //hours
        else if(delta >= 60){ delta /= 60; dunit="m"; } //mins
        else{ dunit = "s"; }

//          if(parseFloat(element['value']) > parseFloat(element['previousValue'])){
//            last += "U";
//          }
//          else{
//            last += " D";
//          }

        description.html("(updated " + parseInt(delta) + dunit +" ago)");


      });
    }});

    setTimeout(getTemps, 5000);
  }

  function showDateTime(){
    var now     = new Date();
    var year    = now.getFullYear();
    var month   = now.getMonth();
    var day     = now.getDate();
    var hour    = now.getHours();
    var minute  = now.getMinutes();
    var second  = now.getSeconds();
    var week    = now.getWeek();


    if(day.toString().length == 1){  var day = '0'+day; }
    if(hour.toString().length == 1){ var hour = '0'+hour; }
    if(minute.toString().length == 1){ var minute = '0'+minute; }
    if(second.toString().length == 1){ var second = '0'+second; }

    $("#clock .value").html(hour + ":" + minute + ":" + second);
    $("#clock .title").html(getDay(now.getDay())+", "+day+" "+getMonth(month)+" "+year);
    $("#clock .description").html("Week "+week);
  }

  getTemps();
  getWeatherCurrent();
  getWeatherForecast();

  setInterval(showDateTime, 1000);
});
